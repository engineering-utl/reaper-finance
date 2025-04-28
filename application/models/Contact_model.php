<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Insert a new contact submission
    public function insert($data) {
        $this->db->insert('contact_submissions', $data);
    }


    // Update the status of a contact submission
    public function update_status($id, $status) {
        $this->db->where('id', $id);
        $this->db->update('contact_submissions', ['status' => $status]);
    }

    // Get all contact submissions with search, pagination, and sorting
    public function get_all($search = '', $limit = 10, $offset = 0, $sort_by = 'created_at', $sort_order = 'DESC') {
        $this->db->select('*');
        $this->db->from('contact_submissions');

        // Search functionality
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('first_name', $search);
            $this->db->or_like('last_name', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('message', $search);
            $this->db->group_end();
        }

        // Sorting
        $this->db->order_by($sort_by, $sort_order);

        // Pagination
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }

    // Get total count of contact submissions for pagination
    public function count_all($search = '') {
        $this->db->select('*');
        $this->db->from('contact_submissions');

        // Search functionality
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('first_name', $search);
            $this->db->or_like('last_name', $search);
            $this->db->or_like('email', $search);
            $this->db->or_like('message', $search);
            $this->db->group_end();
        }

        return $this->db->count_all_results();
    }

    // Delete a contact submission
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('contact_submissions');
    }

}
?>