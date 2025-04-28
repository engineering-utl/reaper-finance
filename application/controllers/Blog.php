<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/New_York');

class Blog extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('AuthMiddleware');
        $this->authmiddleware->check();
        $this->load->database();
        $this->load->model('Blog_model');
        $this->load->library('pagination'); // Load pagination library
    }

    // Display all blogs with pagination, search, and sorting
    public function index() {
        $data['title'] = 'Blogs';

        // Pagination configuration
        $config['base_url'] = base_url('Blog/index');
        $config['total_rows'] = $this->Blog_model->count_all($this->input->get('search'));
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['reuse_query_string'] = TRUE;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // Get blogs with pagination, search, and sorting
        $data['blogs'] = $this->Blog_model->get_all(
            $config['per_page'],
            $page,
            $this->input->get('search'),
            $this->input->get('sort_by') ?? 'id',
            $this->input->get('sort_order') ?? 'asc'
        );

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/blog_list', $data);
    }

    // Add a new blog
    public function add() {
        if ($_POST) {
            $config['upload_path'] = './uploads/blogs/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $this->load->library('upload', $config);

            // Upload blog image
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $_POST['image'] = $upload_data['file_name'];
            } else {
                $_POST['image'] = ''; // Handle error if needed
            }

            // Upload blogger image
            if ($this->upload->do_upload('blogger_image')) {
                $upload_data = $this->upload->data();
                $_POST['blogger_image'] = $upload_data['file_name'];
            } else {
                $_POST['blogger_image'] = ''; // Handle error if needed
            }

            $this->Blog_model->insert($_POST);
            redirect('Blog');
        }
    }

    // Edit a blog
    public function edit($id) {
        $blog = $this->Blog_model->get($id);
        echo json_encode($blog); // Returning JSON response
    }

    // Update a blog
    public function update($id) {
        if ($_POST) {
            $config['upload_path'] = './uploads/blogs/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB
            $this->load->library('upload', $config);

            // Update blog image if a new one is uploaded
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $_POST['image'] = $upload_data['file_name'];
            }

            // Update blogger image if a new one is uploaded
            if ($this->upload->do_upload('blogger_image')) {
                $upload_data = $this->upload->data();
                $_POST['blogger_image'] = $upload_data['file_name'];
            }

            $this->Blog_model->update($id, $_POST);
            redirect('Blog');
        }
    }

    // Delete a blog
    public function delete($id) {
        $this->Blog_model->delete($id);
        redirect('Blog');
    }
}
?>