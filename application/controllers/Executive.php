<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Executive extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('AuthMiddleware');
        $this->authmiddleware->check();
        $this->load->database();
        $this->load->model('Executive_model');
    }

    // Display all executives
    public function index() {
        $data['title'] = 'Executive';
        $data['executives'] = $this->Executive_model->get_all();
        $this->load->view('admin/executive_list', $data);
    }

    // Add a new executive
    public function add() {
        if ($_POST) {
            $config['upload_path'] = './uploads/executives/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $this->load->library('upload', $config);

            // Upload executive image
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $_POST['image'] = $upload_data['file_name'];
            } else {
                $_POST['image'] = ''; // Handle error if needed
            }

            $this->Executive_model->insert($_POST);
            redirect('Executive');
        }
    }

    // Edit an executive
    public function edit($id) {
        $executive = $this->Executive_model->get($id);
        echo json_encode($executive); // Returning JSON response
    }

    // Update an executive
    public function update($id) {
        if ($_POST) {
            $config['upload_path'] = './uploads/executives/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $this->load->library('upload', $config);

            // Update executive image if a new one is uploaded
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $_POST['image'] = $upload_data['file_name'];
            }

            $this->Executive_model->update($id, $_POST);
            redirect('Executive');
        }
    }

    // Delete an executive
    public function delete($id) {
        $this->Executive_model->delete($id);
        redirect('Executive');
    }
}
?>