<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/M_crud');
	}

	/** Menampilkan Form Login */
	public function index()
	{
		$email = $this->session->userdata('email');
		$data['user'] = $this->M_crud->edit($email)->result_array();
		$data['title'] = "SPK-BP | Tentang SPK";
		$data['judul'] = "Tentang SPK-BP Kab. Jember";

		$this->load->view('admin/template_adm/header', $data);
		$this->load->view('admin/template_adm/navbar');
		$this->load->view('admin/template_adm/sidebar');
		$this->load->view('admin/v_about', $data);
		$this->load->view('admin/template_adm/footer');
	}
}
