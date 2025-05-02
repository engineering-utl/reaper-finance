<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all FAQs with search and sorting
    public function get_all($search = '', $limit = 10, $offset = 0) {
        $this->db->select('*');
        $this->db->from('faqs');

        // Search functionality
        if (!empty($search)) {
            $this->db->like('question', $search);
        }

        // Sort by order ascending
        $this->db->order_by('order', 'ASC');

        // Pagination
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }

    public function get_all_active() {
        return $this->db->where('status', 'enabled')->get('faqs')->result_array();
    }

    // Get total count of FAQs for pagination
    public function count_all($search = '') {
        $this->db->select('*');
        $this->db->from('faqs');

        // Search functionality
        if (!empty($search)) {
            $this->db->like('question', $search);
        }

        return $this->db->count_all_results();
    }

    // Get a single FAQ by ID
    public function get($id) {
        return $this->db->get_where('faqs', ['id' => $id])->row_array();
    }

    // Insert a new FAQ
    public function insert($data) {
        // Check if the order already exists
        $existing_faq = $this->db->get_where('faqs', ['order' => $data['order']])->row_array();
        if ($existing_faq) {
            return false; // Order already exists
        }

        $this->db->insert('faqs', $data);
        return true;
    }

    // Update an FAQ
    public function update($id, $data) {
        // Check if the new order already exists (excluding the current FAQ)
        $existing_faq = $this->db->get_where('faqs', ['order' => $data['order'], 'id !=' => $id])->row_array();
        if ($existing_faq) {
            return false; // Order already exists
        }

        $this->db->where('id', $id);
        $this->db->update('faqs', $data);
        return true;
    }

    // Delete an FAQ
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('faqs');
    }
}
?>