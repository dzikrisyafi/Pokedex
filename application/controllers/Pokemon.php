<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pokemon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pokemon_model');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pokemon';
        $data['bgcolor'] = '';
        $data['pokemon'] = $this->Pokemon_model->getPokemonByID($id);
        $data['types'] = $this->Pokemon_model->getTypesByPokemonID($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topmenu');
        $this->load->view('pokemon/detail', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script');
    }
}
