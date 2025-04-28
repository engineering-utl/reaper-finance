<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class AdminContact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('AuthMiddleware');
        $this->authmiddleware->check();
        $this->load->database();
        $this->load->model('Contact_model');
        $this->load->library('pagination'); // Load pagination library
    }

    // Display all contact submissions with search, pagination, and sorting
    public function index() {
        $data['title'] = 'Contact Submissions';

        // Pagination configuration
        $config['base_url'] = base_url('AdminContact/index');
        $config['total_rows'] = $this->Contact_model->count_all($this->input->get('search'));
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $config['reuse_query_string'] = TRUE;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        // Get contact submissions with search, pagination, and sorting
        $data['submissions'] = $this->Contact_model->get_all(
            $this->input->get('search'),
            $config['per_page'],
            $page,
            $this->input->get('sort_by') ?? 'created_at',
            $this->input->get('sort_order') ?? 'DESC'
        );

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/contact_submissions', $data);
    }

    // Update the status of a contact submission
    public function update_status($id) {
        if ($_POST) {
            $status = $this->input->post('status');
            $this->Contact_model->update_status($id, $status);
            $this->session->set_flashdata('success', 'Status updated successfully.');
            redirect('AdminContact/index');
        }
    }

    // Delete a contact submission
    public function delete($id) {
        $this->Contact_model->delete($id);
        $this->session->set_flashdata('success', 'Submission deleted successfully.');
        redirect('AdminContact/index');
    }
}
?>