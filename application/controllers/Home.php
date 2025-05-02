<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Roadmap_model');
        $this->load->model('Customer_reviews_model');
        $this->load->model('Nft_model'); // Load the NFT model
        $this->load->model('Blog_model'); // Load the Blog model
        $this->load->model('Faq_model'); // Load the FAQ model
        $this->load->model('Menu_model');
    }

    // Display all active subscriptions, reviews, NFTs, blogs, and FAQs
    public function index() {
        $data['menu'] = 'Information';
        $data['roadmaps'] = $this->Roadmap_model->get_enabled();
        $data['reviews'] = $this->Customer_reviews_model->get_all();
        $data['nfts'] = $this->Nft_model->get_all_active(); // Fetch all NFTs
        $data['blogs'] = $this->Blog_model->get_all_active(); // Fetch all blogs
        $data['faqs'] = $this->Faq_model->get_all_active(); // Fetch all FAQs

        // For footer common
        $data['Ecosystem'] = $this->Menu_model->get_menu_items('Ecosystem');
        $data['SocialMedia'] = $this->Menu_model->get_menu_items('Social Media');
        $data['MainMenu'] = $this->Menu_model->get_menu_items('Main Menu');
        $data['ReaperFamily'] = $this->Menu_model->get_menu_items('QFS Family');
        $data['Legal'] = $this->Menu_model->get_menu_items('Legal');
        
        $this->load->view('user/home', $data);
    }
}
?>