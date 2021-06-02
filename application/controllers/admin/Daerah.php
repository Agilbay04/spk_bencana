<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daerah extends CI_Controller {

	public function kecamatan()
	{
        $data['title'] = 'SPK-BP | Kecamatan';
        $data['judul'] = 'Data Kecamatan';
        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
		$this->load->view('admin/v_kecamatan');
        $this->load->view('admin/template_adm/footer');
	}

	public function desa()
	{
        $data['title'] = 'SPK-BP | Desa';
        $data['judul'] = 'Data Desa';
        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
		$this->load->view('admin/v_desa');
        $this->load->view('admin/template_adm/footer');
	}
}
