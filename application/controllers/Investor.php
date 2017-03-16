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
        $this->js[] = 'assets/js/news.js';

	    $this->data['page'] = 'investor';
	    $this->sub_views[] = 'pages/investor/index';
		$this->main_view('Investor news');
	}

}
