<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function check_login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', hash('sha256', $password)); // using SHA-256 for password
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function register($username, $password) {
        $data = array(
            'username' => $username,
            'password' => hash('sha256', $password) // using SHA-256 for password
        );
        return $this->db->insert('users', $data);
    }

    // Validate current password
    public function validate_current_password($username, $current_password) {
        $this->db->where('username', $username);
        $this->db->where('password', hash('sha256', $current_password)); // using SHA-256 for password
        $query = $this->db->get('users');

        if ($query->num_rows() == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // Update password
    public function update_password($username, $new_password) {
        $this->db->where('username', $username);
        $this->db->update('users', ['password' => hash('sha256', $new_password)]);
    }
}
