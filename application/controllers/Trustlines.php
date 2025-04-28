<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Trustlines extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('AuthMiddleware');
        $this->authmiddleware->check();
        $this->load->database();
        $this->load->model('Trustline_model');
        $this->load->library('pagination'); // Load pagination library
    }

    // Display all FAQs with pagination and search
    public function index() {
        $data['title'] = 'Trustlines';

        // Pagination configuration
        $config['base_url'] = base_url('Trustline/index');
        $config['total_rows'] = $this->Trustline_model->count_all($this->input->get('search'));
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['reuse_query_string'] = TRUE;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Get FAQs with pagination and search
        $data['trustlines'] = $this->Trustline_model->get_all(
            $this->input->get('search'),
            $config['per_page'],
            $page
        );

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/trustlines', $data);
    }

    // Add a new trustline
    public function add() {
        if ($_POST) {
            $data = [
                'title' => $this->input->post('title'),
                'title_link' => $this->input->post('title_link'),
                'trustline_link' => $this->input->post('trustline_link')
            ];

            if ($this->Trustline_model->insert($data)) {
                $this->session->set_flashdata('success', 'Trustline added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Trustline already exists.');
            }
            redirect('Trustlines');
        }
    }

    // Edit an trustline
    public function edit($id) {
        $trustline = $this->Trustline_model->get($id);
        echo json_encode($trustline); // Returning JSON response
    }

    // Update an trustline
    public function update($id) {
        if ($_POST) {
            $data = [
                'title' => $this->input->post('title'),
                'title_link' => $this->input->post('title_link'),
                'trustline_link' => $this->input->post('trustline_link')
            ];

            if ($this->Trustline_model->update($id, $data)) {
                $this->session->set_flashdata('success', 'Trustline updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Trustline already exists.');
            }
            redirect('Trustlines');
        }
    }

    // Delete an Trustline
    public function delete($id) {
        $this->Trustline_model->delete($id);
        $this->session->set_flashdata('success', 'Trustline deleted successfully.');
        redirect('Trustlines');
    }
}
?>