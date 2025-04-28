<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York'); // Set this to your desired timezone

class Roadmap extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('AuthMiddleware');
        $this->authmiddleware->check();
        $this->load->database();
        $this->load->model('Roadmap_model');
    }

    public function index() {
    	$data['title'] = 'Roadmap';
        $data['roadmaps'] = $this->Roadmap_model->get_all();
        $this->load->view('admin/roadmap_list', $data);
    }

    public function add() {
        if ($_POST) {
            $this->Roadmap_model->insert($_POST);
            redirect('Roadmap');
        }
    }

    public function edit($id) {
        $roadmap = $this->Roadmap_model->get($id);
        echo json_encode($roadmap); // Returning JSON response
    }

    public function update($id) {
        if ($_POST) {
            $this->Roadmap_model->update($id, $_POST);
            redirect('Roadmap');
        }
    }

    public function delete($id) {
        $this->Roadmap_model->delete($id);
        redirect('Roadmap');
    }
}
?>