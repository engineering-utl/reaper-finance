<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Nft extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('AuthMiddleware');
        $this->authmiddleware->check();
        $this->load->database();
        $this->load->model('Nft_model');
    }

    public function index() {
        $data['title'] = 'NFTs';
        $data['nfts'] = $this->Nft_model->get_all();
        $this->load->view('admin/nft_list', $data);
    }

    public function add() {
        if ($_POST) {
            $config['upload_path'] = './uploads/nfts/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $this->load->library('upload', $config);

            // Upload NFT Image
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $_POST['image'] = $upload_data['file_name'];
            } else {
                $_POST['image'] = ''; // Handle error if needed
            }

            // Upload Handler Image
            if ($this->upload->do_upload('handler_image')) {
                $upload_data = $this->upload->data();
                $_POST['handler_image'] = $upload_data['file_name'];
            } else {
                $_POST['handler_image'] = ''; // Handle error if needed
            }

            $this->Nft_model->insert($_POST);
            redirect('Nft');
        }
    }

    public function edit($id) {
        $nft = $this->Nft_model->get($id);
        echo json_encode($nft); // Returning JSON response
    }

    public function update($id) {
        if ($_POST) {
            $config['upload_path'] = './uploads/nfts/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $this->load->library('upload', $config);

            // Update NFT Image if a new one is uploaded
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $_POST['image'] = $upload_data['file_name'];
            }

            // Update Handler Image if a new one is uploaded
            if ($this->upload->do_upload('handler_image')) {
                $upload_data = $this->upload->data();
                $_POST['handler_image'] = $upload_data['file_name'];
            }

            $this->Nft_model->update($id, $_POST);
            redirect('Nft');
        }
    }

    public function delete($id) {
        $this->Nft_model->delete($id);
        redirect('Nft');
    }
}
?>