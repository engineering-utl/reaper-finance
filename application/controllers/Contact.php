<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation'); // Load the Form Validation Library
        $this->load->model('Contact_model');
    }

    // Handle form submission via AJAX
    public function submit() {
        if ($this->input->is_ajax_request()) { // Ensure the request is AJAX
            // Validate form data
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('message', 'Message', 'required');

            if ($this->form_validation->run() === FALSE) {
                // Return validation errors
                echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            } else {
                // Prepare data for insertion
                $data = [
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    'message' => $this->input->post('message'),
                    'status' => 'pending'
                ];

                // Insert data into the database
                $this->Contact_model->insert($data);

                // Return success response
                echo json_encode(['status' => 'success', 'message' => 'Your message has been sent successfully.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
        }
    }
}
?>