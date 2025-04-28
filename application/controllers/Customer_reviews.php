<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York'); // Set this to your desired timezone

class Customer_reviews extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('AuthMiddleware');
        $this->authmiddleware->check();
        $this->load->database();
        $this->load->model('Customer_reviews_model');
    }

    public function index() {
        $data['title'] = 'Customer Reviews';
        $data['reviews'] = $this->Customer_reviews_model->get_all();
        $this->load->view('admin/customer_reviews_list', $data);
    }

    public function add() {
        if ($_POST) {
            $config['upload_path'] = './uploads/reviews/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $this->load->library('upload', $config);

            // if ($this->upload->do_upload('image')) {
            //     $upload_data = $this->upload->data();
            //     $_POST['image'] = $upload_data['file_name'];
            // } else {
            //     $_POST['image'] = ''; // Handle error if needed
            // }

            $this->Customer_reviews_model->insert($_POST);
            redirect('Customer_reviews');
        }
    }

    public function edit($id) {
        $review = $this->Customer_reviews_model->get($id);
        echo json_encode($review); // Returning JSON response
    }

    public function update($id) {
        if ($_POST) {
            // $config['upload_path'] = './uploads/reviews/';
            // $config['allowed_types'] = 'jpg|jpeg|png|gif';
            // $config['max_size'] = 2048; // 2MB
            // $this->load->library('upload', $config);

            // if ($this->upload->do_upload('image')) {
            //     $upload_data = $this->upload->data();
            //     $_POST['image'] = $upload_data['file_name'];
            // }

            $this->Customer_reviews_model->update($id, $_POST);
            redirect('Customer_reviews');
        }
    }

    public function delete($id) {
        $this->Customer_reviews_model->delete($id);
        redirect('Customer_reviews');
    }
}
?>