<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text'); // For slug generation
    }

    // Get all blogs with pagination, search, and sorting
    public function get_all($limit = 10, $offset = 0, $search = '', $sort_by = 'id', $sort_order = 'asc') {
        $this->db->select('*');
        $this->db->from('blogs');

        // Search functionality
        if (!empty($search)) {
            $this->db->like('title', $search);
            $this->db->or_like('blogger_name', $search);
            $this->db->or_like('description', $search);
        }

        // Sorting functionality
        $this->db->order_by($sort_by, $sort_order);

        // Pagination
        $this->db->limit($limit, $offset);

        return $this->db->get()->result_array();
    }

    // Get total count of blogs for pagination
    public function count_all($search = '') {
        $this->db->select('*');
        $this->db->from('blogs');

        // Search functionality
        if (!empty($search)) {
            $this->db->like('title', $search);
            $this->db->or_like('blogger_name', $search);
            $this->db->or_like('description', $search);
        }

        return $this->db->count_all_results();
    }

    // Get a single blog by ID
    public function get($id) {
        return $this->db->get_where('blogs', ['id' => $id])->row_array();
    }

    // Insert a new blog
    public function insert($data) {
        $data['slug'] = $this->generate_slug($data['title']); // Generate slug
        $this->db->insert('blogs', $data);
    }

    // Update a blog
    public function update($id, $data) {
        if (isset($data['title'])) {
            $data['slug'] = $this->generate_slug($data['title']); // Regenerate slug if title changes
        }
        $this->db->where('id', $id);
        $this->db->update('blogs', $data);
    }

    // Generate a slug from the title
    private function generate_slug($title) {
        $slug = url_title(convert_accented_characters($title), 'dash', TRUE);
        return $slug;
    }

    // Get a blog by slug
    public function get_by_slug($slug) {
        return $this->db->get_where('blogs', ['slug' => $slug])->row_array();
    }

    // Delete a blog
    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('blogs');
    }
}
?>