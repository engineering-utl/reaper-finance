<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Blog_details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('Blog_model'); // Load the Blog model
        $this->load->model('Menu_model');
    }

    // Display blog details by slug
    public function index($slug) {
        $data['blog'] = $this->Blog_model->get_by_slug($slug); // Fetch blog details by slug
        if (empty($data['blog'])) {
            show_404(); // Show 404 if blog not found
        }

        // For footer common
        $data['Ecosystem'] = $this->Menu_model->get_menu_items('Ecosystem');
        $data['SocialMedia'] = $this->Menu_model->get_menu_items('Social Media');
        $data['MainMenu'] = $this->Menu_model->get_menu_items('Main Menu');
        $data['ReaperFamily'] = $this->Menu_model->get_menu_items('QFS Family');
        $data['Legal'] = $this->Menu_model->get_menu_items('Legal');

        $this->load->view('user/blog_details', $data);
    }
}
?>