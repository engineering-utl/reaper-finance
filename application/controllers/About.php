<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Executive_model'); // Load the Executive model
        $this->load->model('Menu_model');
    }

    // Display all enabled executives
    public function index() {
        $data['menu'] = 'About';
        $data['executives'] = $this->Executive_model->get_enabled(); // Fetch only enabled executives

        // For footer common
        $data['Ecosystem'] = $this->Menu_model->get_menu_items('Ecosystem');
        $data['SocialMedia'] = $this->Menu_model->get_menu_items('Social Media');
        $data['MainMenu'] = $this->Menu_model->get_menu_items('Main Menu');
        $data['ReaperFamily'] = $this->Menu_model->get_menu_items('QFS Family');
        $data['Legal'] = $this->Menu_model->get_menu_items('Legal');

        $this->load->view('user/about', $data); 
    }
}
?>