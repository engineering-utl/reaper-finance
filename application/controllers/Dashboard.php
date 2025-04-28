<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('AuthMiddleware');
        $this->authmiddleware->check(); // Check if user is logged in
        $this->load->database(); // Load database
    }

    public function index() {
        // Example data to pass to the view
        $data['title'] = 'Dashboard';
        $data['username'] = $this->session->userdata('username'); // Get username from session

        $this->load->view('admin/dashboard', $data);
    }
}
