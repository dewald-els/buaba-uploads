<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class News
 * @property News_m $news_m
 */
class News extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
        $this->data['page'] = 'news';
	    $this->load->model('news_m');
	    $this->data['news'] = $this->news_m->get()->result();
	    $this->sub_views[] = 'pages/news/index';
        $this->css[] = 'assets/lib/datatables/css/dataTables.bootstrap.min.css';
        $this->js[] = 'assets/lib/datatables/js/jquery.dataTables.min.js';
        $this->js[] = 'assets/lib/datatables/js/dataTables.bootstrap.min.js';
        $this->js[] = 'assets/js/news.js';
		$this->main_view('News');
	}
}
