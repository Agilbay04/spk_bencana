<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    function notLogin()
    {
        $var_ci = get_instance();
        if (!$var_ci->session->userdata('email')) {
            redirect('admin/auth');
        }
    }

    function cekadm()
    {
        $var_ci = get_instance();
        if($var_ci->session->userdata('id_akses') != 1) {
            redirect('block');
            die;
        }
    }

    function cekakses()
    {
        $var_ci = get_instance();
        if($var_ci->session->userdata('id_akses') != 1 && $var_ci->session->userdata('id_akses') != 2) {
            redirect('block');
            die;
        }
    }
