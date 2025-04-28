<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('AuthMiddleware');
        $this->authmiddleware->check();
        $this->load->database();
        $this->load->model('Menu_model');
        $this->load->library('pagination'); // Load pagination library

    }

    // Display all FAQs with pagination and search
    public function index() {
        $data['title'] = 'Menu';
        $data['menu_sections'] = $this->Menu_model->get_menu_sections();
        $this->load->view('admin/menu', $data);
    }

    public function add_item() {
        $section = $this->input->post('section');
        $title = $this->input->post('title');
        $link = $this->input->post('link');
        $id = $this->input->post('id');

        if ($id) {
            // Update existing item
            $this->db->where('id', $id);
            $this->db->update('menu_items', ['title' => $title, 'link' => $link]);
            echo json_encode(['id' => $id]);
        } else {
            // Insert new item
            $data = [
                'section' => $section,
                'title' => $title,
                'link' => $link
            ];
            $this->db->insert('menu_items', $data);
            echo json_encode(['id' => $this->db->insert_id()]);
        }
    }

    public function delete_item() {
        $id = $this->input->post('id');
        $this->db->delete('menu_items', array('id' => $id));
        echo json_encode(['status' => 'success']);
    }
}
?>