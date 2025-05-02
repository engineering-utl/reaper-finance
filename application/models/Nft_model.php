<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nft_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all() {
        return $this->db->get('nfts')->result_array();
    }

    public function get_all_active() {
        return $this->db->where('status', 'enabled')->get('nfts')->result_array();
    }

    public function get($id) {
        return $this->db->get_where('nfts', ['id' => $id])->row_array();
    }

    public function insert($data) {
        $this->db->insert('nfts', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('nfts', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('nfts');
    }
}
?>