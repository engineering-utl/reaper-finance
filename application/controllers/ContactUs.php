<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    // Display all active subscriptions
    public function index() {

        $data['menu'] = 'ContactUs';
        $this->load->view('user/contactUs', $data);


    }


}
