<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Pokemon');
    }

    public function index()
    {
        $data['title'] = 'Admin';
        $data['bgcolor'] = '#F3F4F6';
        $data['p_categories'] = $this->Pokemon->getCategories();
        $data['p_abilities'] = $this->Pokemon->getAbilities();

        $this->form_validation->set_rules('name', 'Pokemon Name', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topmenu');
            $this->load->view('admin/index', $data);
            $this->load->view('templates/script');
        } else {
            $upload_image = $_FILES['image']['name'];
            $image = '';

            if ($upload_image) {
                $config['allowed_types'] = 'png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pokemon';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'name' => $this->input->post('name'),
                'category' => $this->input->post('category'),
                'ability' => $this->input->post('ability'),
                'description' => $this->input->post('description'),
                'image' => $image
            ];

            $this->Pokemon->insertPokemon($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Pokemon has been added!</div>');
            redirect('admin');
        }
    }
}
