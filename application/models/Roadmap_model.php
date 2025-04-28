<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Roadmap_model extends CI_Model {

    public function get_all() {
        return $this->db->get('roadmap')->result_array();
    }

    public function get($id) {
        return $this->db->get_where('roadmap', ['id' => $id])->row_array();
    }

    public function insert($data) {
        $this->db->insert('roadmap', [
            'roadmap_date' => $data['roadmap_date'],
            'description' => $data['description'],
            'status' => $data['status']
        ]);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('roadmap', [
            'roadmap_date' => $data['roadmap_date'],
            'description' => $data['description'],
            'status' => $data['status']
        ]);
    }

    public function delete($id) {
        $this->db->delete('roadmap', ['id' => $id]);
    }

    public function get_enabled() {
        return $this->db->where('status', 'enabled')->order_by('roadmap_date', 'DESC')->get('roadmap')->result_array();
    }
}
?>