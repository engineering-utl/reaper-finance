<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Executive_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all executives
    public function get_all() {
        return $this->db->get('executives')->result_array();
    }

    // Get a single executive by ID
    public function get($id) {
        return $this->db->get_where('executives', ['id' => $id])->row_array();
    }

    // Insert a new executive
    public function insert($data) {
        $this->db->insert('executives', $data);
    }

    // Update an executive
    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('executives', $data);
    }

    // Delete an executive
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('executives');
    }

    // Get all enabled executives
    public function get_enabled() {
        $this->db->where('status', 'enabled');
        return $this->db->get('executives')->result_array();
    }
}
?>