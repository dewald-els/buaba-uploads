<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'classes'.DIRECTORY_SEPARATOR.'NewsArticle.php';
require_once APPPATH.'classes'.DIRECTORY_SEPARATOR.'InvestorArticle.php';

/**
 * Class Upload
 * @property CI_Form_validation $form_validation
 * @property CI_Upload $upload
 * @property Uploadhelper $uploadhelper
 * @property Document_m $document_m
 * @property News_m $news_m
 * @property Investor_m $investor_m
 */
class Upload extends MY_Controller
{
    private $files = array();
    private $documents = array();
    private $upload_errors = array();
    private $document_insert_ids = array();
    private $article_id = -1;
    private $article_type = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->sub_views[] = 'pages/upload/index';
        $this->js[] = 'assets/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js';
        $this->js[] = 'assets/js/uploads.js';
        $this->css[] = 'assets/lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css';
        $this->data['page'] = 'uploads';
        $this->main_view('Upload a new article');
    }

    public function save()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('uploadhelper');

        $this->form_validation->set_rules('title', '<b>Title</b>', 'required');
        $this->form_validation->set_rules('summary', '<b>Summary</b>', 'required');
        $this->form_validation->set_rules('article_content', '<b>Content</b>', 'required');
        $this->form_validation->set_rules('date_created', '<b>Upload date</b>', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('form_errors', validation_errors());
            header('Location: ' . site_url('upload'));
        }
        else
        {

            $this->upload_documents();

            if (empty($this->upload_errors))
            {
                $this->document_insert_ids = $this->save_documents();

                if (count($this->document_insert_ids))
                {
                    $this->article_id = $this->save_article();
                    if ($this->link_article_to_documents())
                    {
                        $article = [
                            'article_id' => $this->article_id,
                            'type' => $this->article_type,
                            'title' => $this->input->post('title'),
                            'documents' => $this->files
                        ];
                        $this->session->set_flashdata('article', $article);
                        header('Location: '.site_url('upload/success'));
                    }
                    else
                    {
                        $this->session->set_flashdata('form_errors', "There was an error linking your document(s) to the article. Please remove the article from the ".$this->article_type." page and reupload your article.");
                        header('Location: '.site_url('upload'));
                    }
                }
                else
                {
                    $this->session->set_flashdata('form_errors', "We could not save your documents. Please reload the page and try again.");
                    header('Location: '.site_url('upload'));
                }
            }
            else
            {
                $this->session->set_flashdata('form_errors', implode(" ", $this->upload_errors));
                header('Location: '.site_url('upload'));
            }
        }
    }

    private function upload_documents()
    {
        // Save article.
        $config['upload_path'] = $this->uploadhelper->get_upload_path($this->input->post('upload_section'), $this->input->post('date_created'));
        $config['allowed_types'] = 'jpg|png|pdf|jpeg';
        $config['max_size'] = 3000;

        $this->load->library('upload', $config);

        for($i = 0; $i < $this->input->post('num_of_files'); $i++)
        {
            if ( ! $this->upload->do_upload('document'.($i+1)))
            {
                $this->upload_errors[] = $this->upload->display_errors();
            }
            else
            {
                array_push($this->files, $this->upload->data());
            }
        }
    }

    private function save_documents()
    {
        foreach ($this->files as $file)
        {
            $doc = new stdClass();
            $doc->name = $this->input->post('title');
            $doc->path = $file['orig_name'];
            array_push($this->documents, $doc);
        }

        $this->load->model('document_m');
        $insert_id = $this->document_m->save($this->documents);
        return $insert_id;
    }

    private function save_article()
    {
        if ($this->input->post('upload_section') == 'news')
        {
            $this->article_type = 'news';
            $this->load->model('news_m');
            $article = new \Bauba\NewsArticle();
            $article->news_title = $this->input->post('title');
            $article->news_summary = $this->input->post('summary');
            $article->content = $this->input->post('article_content');
            $article->date_created = date('Y-m-d 08:00', strtotime($this->input->post('date_created')));
            $article->year = date('Y', strtotime($this->input->post('date_created')));
            $article->news_id = $this->news_m->save($article);
            return $article->news_id;
        }
        else
        {
            $this->article_type = 'investor';
            $this->load->model('investor_m');
            $article = new \Bauba\InvestorArticle();
            $article->investor_news_title = $this->input->post('title');
            $article->investor_news_summary = $this->input->post('summary');
            $article->content = $this->input->post('article_content');
            $article->date_created = date('Y-m-d 08:00', strtotime($this->input->post('date_created')));
            $article->year = date('Y', strtotime($this->input->post('date_created')));
            $article->investor_news_id = $this->investor_m->save($article);
            return $article->investor_news_id;
        }
    }

    private function link_article_to_documents()
    {
        $link_ids = array();

        if ( ! isset($this->document_m)) {
            $this->load->model('document_m');
        }

        foreach ($this->document_insert_ids as $doc_id)
        {
            if ($this->article_type == 'news')
            {
                $link_ids[] = $this->document_m->link_news_doc($this->article_id, $doc_id);
            }
            else
            {
                $link_ids[] = $this->document_m->link_investor_doc($this->article_id, $doc_id);
            }
        }

        return count($link_ids);
    }

    public function success()
    {
        $this->data['page'] = 'success';
        $this->sub_views[] = 'pages/upload/success';
        $this->main_view('Upload success');
    }
}
