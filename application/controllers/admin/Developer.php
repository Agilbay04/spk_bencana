<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Developer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
    }

    public function index()
    {
        $data['title'] = "SPK-BP | Developer";
        $data['judul'] = "Developer";
        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_developer', $data);
        $this->load->view('admin/template_adm/footer');
    }
}
