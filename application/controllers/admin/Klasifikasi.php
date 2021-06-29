<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_klasifikasi');
        $this->load->model('admin/M_kecamatan');
        $this->load->model('admin/M_desa');
    }

    public function index()
    {
        $data['title'] = 'SPK-BP | Klasifikasi';
        $data['judul'] = 'Data Klasifikasi';

        /** Mengambil data dari tabel klasifikasi */
        $data['klasifikasi'] = $this->M_klasifikasi->getkls()->result_array();

        /** Mengambil data kecamatan */
        $data['kec'] = $this->M_kecamatan->getkec()->result_array();

        /** Mengambil data dari tabel desa */
        $data['desa'] = $this->M_desa->getds()->result_array();

        /** Perikasa apakah ada data di tabel */
        $countData = $this->M_klasifikasi->idkls()->num_rows();

        /** Ambil id terakhir */
        $getID = $this->M_klasifikasi->idkls()->row_array();

        /** Membuat uniq id */
        if ($countData > 0) {
            $id_kls = autonumber($getID['id_klasifikasi'], 3, 12);
        } else {
            $id_kls = "KLS000000000001";
        }

        /** Mengirim id ke view */
        $data['id_kls'] = $id_kls;
        
        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_klasifikasi', $data);
        $this->load->view('admin/template_adm/footer');
    }
    
    public function get_desa()
    {
        $id = $this->input->post('id');
        /** Mengambil data json desa */
        $data = $this->M_desa->get_dtjson($id)->result_array();
        echo json_encode($data);
    }

    public function tbh_klasifikasi()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_kec', 'Nm_kec', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('nm_ds', 'Nm_ds', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);
        
        $this->form_validation->set_rules('jml_ketersediaan', 'Jml_k', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('jml_akses', 'Jml_a', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);
        
        $this->form_validation->set_rules('jml_pemanfaatan', 'Jml_p', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Klasifikasi';
            $data['judul'] = 'Data Klasifikasi';
    
            /** Mengambil data dari tabel klasifikasi */
            $data['klasifikasi'] = $this->M_klasifikasi->getkls()->result_array();
    
            /** Mengambil data kecamatan */
            $data['kec'] = $this->M_kecamatan->getkec()->result_array();
    
            /** Perikasa apakah ada data di tabel */
            $countData = $this->M_klasifikasi->idkls()->num_rows();
    
            /** Ambil id terakhir */
            $getID = $this->M_klasifikasi->idkls()->row_array();
    
            /** Membuat uniq id */
            if ($countData > 0) {
                $id_kls = autonumber($getID['id_klasifikasi'], 3, 12);
            } else {
                $id_kls = "KLS000000000001";
            }
    
            /** Mengirim id ke view */
            $data['id_kls'] = $id_kls;
    
            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_klasifikasi', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel klasifikasi */
            $dt_kls = [
                'id_klasifikasi' => $this->input->post('id_kls'),
                'id_desa' => $this->input->post('nm_ds'),
                'id_kecamatan' => $this->input->post('nm_kec'),
                'jml_ketersediaan' => $this->input->post('jml_ketersediaan'),
                'jml_akses' => $this->input->post('jml_akses'),
                'jml_pemanfaatan' => $this->input->post('jml_pemanfaatan')
            ];

            $this->M_klasifikasi->insertkls($dt_kls);
            $this->session->set_flashdata('message', 'add');
            redirect('admin/klasifikasi');
            ;
        }
    }

    public function edit_klasifikasi()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_kec', 'Nm_kec', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('nm_ds', 'Nm_ds', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);
        
        $this->form_validation->set_rules('jml_ketersediaan', 'Jml_k', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('jml_akses', 'Jml_a', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);
        
        $this->form_validation->set_rules('jml_pemanfaatan', 'Jml_p', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Klasifikasi';
            $data['judul'] = 'Data Klasifikasi';
    
            /** Mengambil data dari tabel klasifikasi */
            $data['klasifikasi'] = $this->M_klasifikasi->getkls()->result_array();
    
            /** Mengambil data kecamatan */
            $data['kec'] = $this->M_kecamatan->getkec()->result_array();
    
            /** Perikasa apakah ada data di tabel */
            $countData = $this->M_klasifikasi->idkls()->num_rows();
    
            /** Ambil id terakhir */
            $getID = $this->M_klasifikasi->idkls()->row_array();
    
            /** Membuat uniq id */
            if ($countData > 0) {
                $id_kls = autonumber($getID['id_klasifikasi'], 3, 12);
            } else {
                $id_kls = "KLS000000000001";
            }
    
            /** Mengirim id ke view */
            $data['id_kls'] = $id_kls;
    
            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_klasifikasi', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel klasifikasi */
            $dt_kls = [
                'id_klasifikasi' => $this->input->post('id_kls'),
                'id_desa' => $this->input->post('nm_ds'),
                'id_kecamatan' => $this->input->post('nm_kec'),
                'jml_ketersediaan' => $this->input->post('jml_ketersediaan'),
                'jml_akses' => $this->input->post('jml_akses'),
                'jml_pemanfaatan' => $this->input->post('jml_pemanfaatan')
            ];

            $this->M_klasifikasi->insertkls($dt_kls);
            $this->session->set_flashdata('message', 'add');
            redirect('admin/klasifikasi');
            ;
        }
    }

    public function del_klasifikasi()
    {
        /** Menghapus data tabel klasifikasi */
        $id_kls = $this->input->post('id_kls');
        $this->M_klasifikasi->deletekls($id_kls);
        $this->session->set_flashdata('message', 'delete');
        redirect('admin/klasifikasi');
    }
}
