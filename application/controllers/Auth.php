<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Section_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }

    public function admin_login() {
        if ($this->session->userdata('logged_in')) {
            redirect('/Dashboard');
        }

        $this->load->view('admin/admin_login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->User_model->check_login($username, $password)) {
            $user_data = array(
                'username' => $username,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($user_data);

            echo "<script>
                    localStorage.setItem('isAdmin', btoa('true'));
                  </script>";

                  redirect('/Dashboard');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('auth/admin_login');
        }
    }

    public function dashboard() {
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/admin_login');
        }

        $data = array(
            'sidebar' => 'Dashboard',

        );

        $this->load->view('dashboard', $data);
    }

    public function logout() {

        $this->session->sess_destroy();
        echo "<script>
                localStorage.removeItem('isAdmin');
                window.location.href = '" . site_url('auth/login') . "';
              </script>";

        redirect('auth/admin_login');
    }

}
