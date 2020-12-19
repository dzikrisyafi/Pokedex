<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        redirect('auth/login');
    }

    public function login()
    {
        $data['title'] = 'Login Page';
        $this->load->view('templates/header', $data);
        $this->load->view('auth/index');
        $this->load->view('templates/footer', $data);
    }

    public function register()
    {
        $data['title'] = 'Register Page';
        $this->load->view('templates/header', $data);
        $this->load->view('auth/register');
        $this->load->view('templates/footer', $data);
    }
}
