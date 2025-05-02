<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthMiddleware {

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
    }

    public function check() {
        if (!$this->CI->session->userdata('logged_in')) {
            redirect('auth/admin_login');
        }
    }
}
