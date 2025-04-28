<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    // Change password page
    public function index() {
        $data['title'] = 'ChangePassword';
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/admin_login');
        }

        $this->load->view('admin/change_password', $data);
    }

    // Handle change password form submission
    public function update_password() {
        $data['title'] = 'ChangePassword';
        // Check if the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/admin_login');
        }

        // Get form inputs
        $username = $this->session->userdata('username');
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        // Validate current password
        if (!$this->User_model->validate_current_password($username, $current_password)) {
            $this->session->set_flashdata('error', 'Current password is incorrect.');
            redirect('ChangePassword');
        }

        // Validate new password and confirm password
        if ($new_password !== $confirm_password) {
            $this->session->set_flashdata('error', 'New password and confirm password do not match.');
            redirect('ChangePassword');
        }

        // Update the password
        $this->User_model->update_password($username, $new_password);

        // Set success message and redirect
        $this->session->set_flashdata('success', 'Password updated successfully.');
        redirect('ChangePassword');
    }
}
?>