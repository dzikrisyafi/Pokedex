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
