<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_reviews_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all() {
        
        return $this->db->get('customer_reviews')->result_array();
    }

    public function get($id) {
        return $this->db->get_where('customer_reviews', ['id' => $id])->row_array();
    }

    public function insert($data) {
        $this->db->insert('customer_reviews', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('customer_reviews', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('customer_reviews');
    }
}
?>