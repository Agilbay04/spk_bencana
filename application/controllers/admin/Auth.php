<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $data['title'] = 'SPK-BP | Login';
        $this->load->view('admin/template_adm/auth_header', $data);
		$this->load->view('admin/auth/v_login');
        $this->load->view('admin/template_adm/auth_footer');
	}

	public function register()
	{
        $data['title'] = 'SPK-BP | Register';
        $this->load->view('admin/template_adm/auth_header', $data);
		$this->load->view('admin/auth/v_register');
        $this->load->view('admin/template_adm/auth_footer');
	}

    public function forget()
	{
        $data['title'] = 'SPK-BP | Forget';
        $this->load->view('admin/template_adm/auth_header', $data);
		$this->load->view('admin/auth/v_forget');
        $this->load->view('admin/template_adm/auth_footer');
	}

    public function recover()
	{
        $data['title'] = 'SPK-BP | Recover';
        $this->load->view('admin/template_adm/auth_header', $data);
		$this->load->view('admin/auth/v_recover');
        $this->load->view('admin/template_adm/auth_footer');
	}
}
