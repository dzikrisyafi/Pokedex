<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        if ($role_id != 1 && $menu == 'admin') {
            redirect('auth/blocked');
        }
    }
}

function is_login_redirect()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        if ($ci->session->userdata('role_id') != 1) {
            redirect('user');
        } else {
            redirect('admin');
        }
    }
}

function pagination_config()
{
    $ci = get_instance();
    // config
    $config['base_url'] = 'http://localhost/Pokedex/admin/index';
    $config['total_rows'] = $ci->Pokemon->countAllPokemon();
    $config['per_page'] = 4;
    // styling
    $config['full_tag_open'] = '<nav aria-label="Page navigation example" class="mt-4"><ul class="pagination justify-content-end">';
    $config['full_tag_close'] = '</ul></nav>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="page-item">';
    $config['first_tag_close'] = '</li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="page-item">';
    $config['last_tag_close'] = '</li>';

    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';

    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
    $config['cur_tag_close'] = '</a></li>';

    $config['num_tag_open'] = '<li class="page-item">';
    $config['num_tag_close'] = '</li>';

    $config['attributes'] = array('class' => 'page-link');
    $ci->pagination->initialize($config);
}
