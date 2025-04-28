<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Faq extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('AuthMiddleware');
        $this->authmiddleware->check();
        $this->load->database();
        $this->load->model('Faq_model');
        $this->load->library('pagination'); // Load pagination library
    }

    // Display all FAQs with pagination and search
    public function index() {
        $data['title'] = 'FAQs';

        // Pagination configuration
        $config['base_url'] = base_url('Faq/index');
        $config['total_rows'] = $this->Faq_model->count_all($this->input->get('search'));
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['reuse_query_string'] = TRUE;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Get FAQs with pagination and search
        $data['faqs'] = $this->Faq_model->get_all(
            $this->input->get('search'),
            $config['per_page'],
            $page
        );

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/faq_list', $data);
    }

    // Add a new FAQ
    public function add() {
        if ($_POST) {
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
                'order' => $this->input->post('order'),
                'status' => $this->input->post('status')
            ];

            if ($this->Faq_model->insert($data)) {
                $this->session->set_flashdata('success', 'FAQ added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Order number already exists.');
            }
            redirect('Faq');
        }
    }

    // Edit an FAQ
    public function edit($id) {
        $faq = $this->Faq_model->get($id);
        echo json_encode($faq); // Returning JSON response
    }

    // Update an FAQ
    public function update($id) {
        if ($_POST) {
            $data = [
                'question' => $this->input->post('question'),
                'answer' => $this->input->post('answer'),
                'order' => $this->input->post('order'),
                'status' => $this->input->post('status')
            ];

            if ($this->Faq_model->update($id, $data)) {
                $this->session->set_flashdata('success', 'FAQ updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Order number already exists.');
            }
            redirect('Faq');
        }
    }

    // Delete an FAQ
    public function delete($id) {
        $this->Faq_model->delete($id);
        $this->session->set_flashdata('success', 'FAQ deleted successfully.');
        redirect('Faq');
    }
}
?>