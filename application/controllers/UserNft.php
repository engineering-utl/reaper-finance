<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserNft extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Nft_model');
        $this->load->model('Menu_model');
    }

    // Display all enabled executives
    public function index() {
        $data['menu'] = 'UserNft';
        $data['nfts'] = $this->Nft_model->get_all(); // Fetch all NFTs 

        // For footer common
        $data['Ecosystem'] = $this->Menu_model->get_menu_items('Ecosystem');
        $data['SocialMedia'] = $this->Menu_model->get_menu_items('Social Media');
        $data['MainMenu'] = $this->Menu_model->get_menu_items('Main Menu');
        $data['ReaperFamily'] = $this->Menu_model->get_menu_items('QFS Family');
        $data['Legal'] = $this->Menu_model->get_menu_items('Legal');
        $this->load->view('user/usernft', $data);
    }
}
?>