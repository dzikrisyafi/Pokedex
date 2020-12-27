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
        $data['pokemons'] = $this->Pokemon->getPokemons();
        $data['p_categories'] = $this->Pokemon->getCategories();
        $data['p_abilities'] = $this->Pokemon->getAbilities();
        $data['types'] = $this->Pokemon->getTypes();

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
                'category_id' => $this->input->post('category'),
                'ability_id' => $this->input->post('ability'),
                'description' => $this->input->post('description'),
                'bgcolor' => $this->input->post('bgcolor'),
                'image' => $image
            ];

            $type = $this->input->post('type');

            $this->Pokemon->insertPokemon($data, $type);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Pokemon has been added!</div>');
            redirect('admin');
        }
    }

    public function getPokemonJSON()
    {
        echo json_encode($this->db->get_where('pokemon', ['pokemon_id' => $_POST['id']])->row_array());
    }

    public function getPokemonTypeJSON()
    {
        $data = $this->Pokemon->getTypesByPokemonID($_POST['id']);
        foreach ($data as $result) {
            $value[] = (float) $result['id'];
        }
        echo json_encode($value);
    }

    public function edit()
    {
        $this->form_validation->set_rules('name', 'Pokemon Name', 'required|trim');
        if ($this->form_validation->run() == true) {
            $upload_image = $_FILES['image']['name'];
            $new_image = '';
            $id = $this->input->post('pokemon_id');

            if ($upload_image) {
                $config['allowed_types'] = 'png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/pokemon';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $this->Pokemon->getPokemonImage($id);
                    unlink(FCPATH . 'assets/img/pokemon/' . $old_image['image']);
                    $new_image = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'name' => $this->input->post('name'),
                'category_id' => $this->input->post('category'),
                'ability_id' => $this->input->post('ability'),
                'description' => $this->input->post('description'),
                'bgcolor' => $this->input->post('bgcolor'),
                'image' => $new_image
            ];

            $type = $this->input->post('type');

            $this->Pokemon->editPokemon($data, $type, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pokemon has been edited!</div>');
            redirect('admin');
        }
    }

    public function delete($id)
    {
        $data = $this->Pokemon->getPokemonImage($id);
        unlink(FCPATH . 'assets/img/pokemon/' . $data['image']);
        $this->Pokemon->deletePokemon($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pokemon has been deleted!</div>');
        redirect('admin');
    }
}
