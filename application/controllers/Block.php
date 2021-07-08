<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Block extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_auth');
    }

    public function index()
    {
        $data['title'] = 'SPK-BP | 404';
        $data['judul'] = 'Eror 404';

        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('v_404', $data);
        $this->load->view('admin/template_adm/footer');
    }

}
