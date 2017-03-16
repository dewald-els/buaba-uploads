<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: forest-sumo
 * Date: 2017/03/14
 * Time: 10:30 PM
 */

/**
 * Class MY_Controller
 * @property CI_Input $input
 * @property CI_URI $uri
 * @property CI_Session $session
 */
class MY_Controller extends CI_Controller
{
    protected $data = array();
    protected $sub_views = array();
    protected $css = array();
    protected $js = array();

    public function __construct()
    {
        parent::__construct();
    }

    protected function validate_login(){
        if ( $this->uri->segment(1) != 'login' && ! $this->session->userdata('logged_in')) {
            header('Location: ' . site_url('login'));
        }
    }

    public function main_view($page_title)
    {
        $this->validate_login();
        $this->data['page_title'] = $page_title;
        $this->data['sub_views'] = $this->sub_views;
        $this->data['js'] = $this->js;
        $this->data['css'] = $this->css;
        $this->load->view('main', $this->data);
    }

    public function bare_view($page_title)
    {
        $this->data['page_title'] = $page_title;
        $this->data['sub_views'] = $this->sub_views;
        $this->data['js'] = $this->js;
        $this->load->view('bare', $this->data);
    }
}
