<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    private $pincodes = array(
        '12345'
    );

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
	    $this->sub_views[] = 'pages/login/index';
		$this->bare_view('Login');
	}

	public function login()
    {
        $pincode = $this->input->post('pincode');
        if ($pincode) {
            if (in_array($pincode, $this->pincodes)) {
                $this->session->set_userdata('logged_in', TRUE);
                header('Location: ' . site_url('upload'));
            }
            else {
                header('Location: ' . site_url('login'));
                $this->session->set_flashdata('login_message', "You've entered an invalid pin code.");
            }
        }
        else {
            header('Location: ' . site_url('login'));
            $this->session->set_flashdata('login_message', 'Please enter a pin code.');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('logged_in');
        header('Location: ' . site_url('login'));
    }
}
