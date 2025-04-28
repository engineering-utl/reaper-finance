<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trustline_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all FAQs with search and sorting
    public function get_all($search = '', $limit = 10, $offset = 0) {
        $this->db->select('*');
        $this->db->from('trustlines');

        // Search functionality
        if (!empty($search)) {
            $this->db->like('title', $search);
        }

        // Sort by order ascending
        $this->db->order_by('id', 'ASC');

        // Pagination
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }

    public function get_all_trustlines() {
        $this->db->select('*');
        $this->db->from('trustlines');
        $this->db->order_by('id', 'ASC');
        return $this->db->get()->result_array();
    }

    // Get total count of FAQs for pagination
    public function count_all($search = '') {
        $this->db->select('*');
        $this->db->from('trustlines');

        // Search functionality
        if (!empty($search)) {
            $this->db->like('title', $search);
        }

        return $this->db->count_all_results();
    }

    // Get a single FAQ by ID
    public function get($id) {
        return $this->db->get_where('trustlines', ['id' => $id])->row_array();
    }

    // Insert a new FAQ
    public function insert($data) {
        // Check if the title already exists
        $existing_faq = $this->db->get_where('trustlines', ['title' => $data['title']])->row_array();
        if ($existing_faq) {
            return false; // title already exists
        }

        $this->db->insert('trustlines', $data);
        return true;
    }

    // Update an FAQ
    public function update($id, $data) {
        // Check if the new title already exists (excluding the current FAQ)
        $existing_faq = $this->db->get_where('trustlines', ['title' => $data['title'], 'id !=' => $id])->row_array();
        if ($existing_faq) {
            return false; // title already exists
        }

        $this->db->where('id', $id);
        $this->db->update('trustlines', $data);
        return true;
    }

    // Delete an FAQ
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('trustlines');
    }
}
?>