<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    private $table = 'menu_items';
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('text'); // For slug generation
    }

    public function get_menu_sections() {
        $sections = ['Ecosystem', 'Social Media', 'Main Menu', 'QFS Family', 'Legal'];
        $result = [];
        foreach ($sections as $section) {
            $result[$section] = $this->get_items_by_section($section);
        }
        return $result;
    }

    public function get_items_by_section($section) {
        $this->db->where('section', $section);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_menu_items($section) {
        $this->db->where('section', $section);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
}
?>