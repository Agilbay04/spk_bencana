<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends CI_Controller {

	public function index()
	{
        $data['title'] = 'SPK-BP | Rating';
        $data['judul'] = 'Data Rating';
        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
		$this->load->view('admin/v_rating');
        $this->load->view('admin/template_adm/footer');
	}

}
