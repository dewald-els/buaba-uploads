<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Investor
 * @property Investor_m $investor_m
 */
class Investor extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
        $this->data['page'] = 'investor';
        $this->load->model('investor_m');
        $this->data['investor_news'] = $this->investor_m->get()->result();

        $this->css[] = 'assets/lib/datatables/css/dataTables.bootstrap.min.css';
        $this->js[] = 'assets/lib/datatables/js/jquery.dataTables.min.js';
        $this->js[] = 'assets/lib/datatables/js/dataTables.bootstrap.min.js';
        $this->js[] = 'assets/js/investor.js';

	    $this->data['page'] = 'investor';
	    $this->sub_views[] = 'pages/investor/index';
		$this->main_view('Investor news');
	}

    public function disable_investor_item()
    {
        $news_id = $this->input->post('news_id');
        $this->load->model('investor_m');
        $this->investor_m->disable($news_id);
        echo json_encode(true);
    }

    public function enable_investor_item()
    {
        $news_id = $this->input->post('news_id');
        $this->load->model('investor_m');
        $this->investor_m->enable($news_id);
        echo json_encode(true);
    }

}
