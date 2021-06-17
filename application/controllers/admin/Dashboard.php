<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_kecamatan');
        $this->load->model('admin/M_desa');
        $this->load->model('admin/M_kriteria');
    }

	public function index()
	{
        $data['title'] = 'SPK-BP | Dashboard';
        $data['judul'] = 'Dashboard';

        /** Menghitung jumlah kecamatan */
        $data['jml_kec'] = $this->M_kecamatan->getkec()->num_rows();

        /** Menghitung jumlah desa */
        $data['jml_ds'] = $this->M_desa->getds()->num_rows();

        /** Menghitung jumlah kriteria */
        $data['jml_kt'] = $this->M_kriteria->getkt()->num_rows();
        
        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
		$this->load->view('admin/index', $data);
        $this->load->view('admin/template_adm/footer');
	}

}
