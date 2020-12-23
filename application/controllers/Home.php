<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
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
}
