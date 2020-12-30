<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pokemon_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['bgcolor'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topmenu');
        $this->load->view('home/index');
        $this->load->view('templates/footer');
        $this->load->view('templates/script');
    }

    public function getPokemon()
    {
        $pokemons = [];

        // cek jika variable page sudah tersedia
        if (isset($_GET['page'])) {
            $page =  $_GET['page'];
            $pokemons = $this->Pokemon_model->getAllPokemon($page);
        }

        $numofCols = 5;
        $rowCount = 0;
        foreach ($pokemons as $pokemon) {
            if ($rowCount % $numofCols == 0) {
                echo '<div class="row row-cols-md-5">';
            }
            $rowCount++;
            echo '
                <div class="col-md">
                    <a href="' . base_url('pokemon/detail/') . $pokemon['pokemon_id'] . '">
                        <figure class="figure rounded" style="background-color:' . $pokemon["bgcolor"] . '; padding: 5px;">
                            <div class="text-center">
                                <img src="' . base_url("assets/") . 'img/' . $pokemon["image"] . '" class="figure-img rounded" style="width:70%;">
                            </div> 
                            <figcaption class="figure-caption font-weight-bold text-center pb-2" style="font-size: 16px;">' . $pokemon["name"] . '</figcaption>
                        </figure>
                    </a>
                </div>
                ';
            if ($rowCount % $numofCols == 0) {
                echo '</div>';
            }
        }
        exit;
    }
}
