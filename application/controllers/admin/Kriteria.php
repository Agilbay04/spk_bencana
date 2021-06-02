<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function index()
	{
        $data['title'] = 'SPK-BP | Kriteria';
        $data['judul'] = 'Data Kriteria';
        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
		$this->load->view('admin/v_kriteria');
        $this->load->view('admin/template_adm/footer');
	}

}
