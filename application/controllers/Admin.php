<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Admin';
        $data['bgcolor'] = '#F3F4F6';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topmenu');
        $this->load->view('admin/index');
        $this->load->view('templates/script');
    }
}
