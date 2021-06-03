<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
        $data['title'] = 'SPK-BP | Dashboard';
        $data['judul'] = 'Dashboard';

        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
		$this->load->view('admin/index');
        $this->load->view('admin/template_adm/footer');
	}

}
