<?php defined('BASEPATH') OR exit('No direct script access allowed');

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
                $this->load->model('document_m');
                $this->load->model('news_m');
                $this->load->model('investor_m');
                $document_insert_ids = $this->save_documents();
            }
            else
            {
                $this->session->set_flashdata('form_errors', implode(" ", $upload_errors));
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

        $insert_id = $this->document_m->save($this->documents);
        return $insert_id;
    }

    public function success()
    {

    }
}
