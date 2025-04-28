<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserFaq extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
       $this->load->model('Faq_model');
    }

    // Display all enabled executives
    public function index() {
        $data['menu'] = 'UserFaq';
        $data['faqs'] = $this->Faq_model->get_all();
        $this->load->view('user/userfaq', $data);
    }
}
?>