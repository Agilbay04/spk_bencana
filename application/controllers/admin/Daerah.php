<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daerah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_kecamatan');
        $this->load->model('admin/M_desa');
    }

    public function kecamatan()
    {
        $data['title'] = 'SPK-BP | Kecamatan';
        $data['judul'] = 'Data Kecamatan';

        /** Menampilkan data kecamatan */
        $data['kec'] = $this->M_kecamatan->getkec()->result_array();

        /** Perikasa apakah ada data di tabel */
        $countData = $this->M_kecamatan->idkec()->num_rows();

        /** Ambil id terakhir */
        $getID = $this->M_kecamatan->idkec()->row_array();

        /** Membuat uniq id */
        if ($countData > 0) {
            $id_kec = autonumber($getID['id_kecamatan'], 3, 12);
        } else {
            $id_kec = "KEC000000000001";
        }

        /** Mengirim id ke view */
        $data['id'] = $id_kec;

        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_kecamatan', $data);
        $this->load->view('admin/template_adm/footer');
    }

    public function tbh_kecamatan()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_kec', 'Nm_kec', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Kecamatan';
            $data['judul'] = 'Data Kecamatan';

            /** Menampilkan data kecamatan */
            $data['kec'] = $this->M_kecamatan->getkec()->result_array();

            /** Perikasa apakah ada data di tabel */
            $countData = $this->M_kecamatan->idkec()->num_rows();

            /** Ambil id terakhir */
            $getID = $this->M_kecamatan->idkec()->row_array();

            /** Membuat uniq id */
            if ($countData > 0) {
                $id_kec = autonumber($getID['id_kecamatan'], 3, 12);
            } else {
                $id_kec = "KEC000000000001";
            }

            /** Mengirim id ke view */
            $data['id'] = $id_kec;

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_kecamatan', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel kecamatan */
            $dt_kec = [
                'id_kecamatan' => $this->input->post('id_kec'),
                'nm_kecamatan' => htmlspecialchars($this->input->post('nm_kec'))
            ];

            $this->M_kecamatan->insertkec($dt_kec);
            $this->session->set_flashdata('message', 'add');
            redirect('admin/daerah/kecamatan');
        }
    }

    public function edit_kecamatan()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_kec', 'Nm_kec', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Kecamatan';
            $data['judul'] = 'Data Kecamatan';

            /** Menampilkan data kecamatan */
            $data['kec'] = $this->M_kecamatan->getkec()->result_array();

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_kecamatan', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            $id = $this->input->post('id_kec');

            /** Menambahkan data ke tabel kecamatan */
            $dt_kec = [
                'id_kecamatan' => $id,
                'nm_kecamatan' => htmlspecialchars($this->input->post('nm_kec'))
            ];

            $this->M_kecamatan->updatekec($dt_kec, $id);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/daerah/kecamatan');
        }
    }

    public function del_kecamatan()
    {
        /** Menghapus data tabel kecamatan */
        $id = $this->input->post('id');
        $this->M_kecamatan->deletekec($id);
        $this->session->set_flashdata('message', 'delete');
        redirect('admin/daerah/kecamatan');
    }

    public function desa()
    {
        $data['title'] = 'SPK-BP | Desa';
        $data['judul'] = 'Data Desa';

        /** Menampilkan data desa */
        $data['desa'] = $this->M_desa->getds()->result_array();

        /** Menampilkan data kecamatan */
        $data['kec'] = $this->M_kecamatan->getkec()->result_array();

        /** Perikasa apakah ada data di tabel */
        $countData = $this->M_desa->idds()->num_rows();

        /** Ambil id terakhir */
        $getID = $this->M_desa->idds()->row_array();

        /** Membuat uniq id */
        if ($countData > 0) {
            $id_ds = autonumber($getID['id_desa'], 2, 13);
        } else {
            $id_ds = "DS0000000000001";
        }

        /** Mengirim id ke view */
        $data['id'] = $id_ds;

        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_desa', $data);
        $this->load->view('admin/template_adm/footer');
    }

    public function tbh_desa()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_ds', 'Nm_ds', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('kec', 'Kec', 'required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('kd_pos', 'Kd_pos', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('prd_padi', 'Prd_padi', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('prd_jagung', 'Prd_jagung', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('prd_ubi', 'Prd_ubi', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('populasi', 'Populasi', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Desa';
            $data['judul'] = 'Data Desa';

            /** Menampilkan data desa */
            $data['desa'] = $this->M_desa->getds()->result_array();

            /** Menampilkan data kecamatan */
            $data['kec'] = $this->M_kecamatan->getkec()->result_array();

            /** Perikasa apakah ada data di tabel */
            $countData = $this->M_desa->idds()->num_rows();

            /** Ambil id terakhir */
            $getID = $this->M_desa->idds()->row_array();

            /** Membuat uniq id */
            if ($countData > 0) {
                $id_ds = autonumber($getID['id_desa'], 2, 13);
            } else {
                $id_ds = "DS0000000000001";
            }

            /** Mengirim id ke view */
            $data['id'] = $id_ds;

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_desa', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel desa */
            $dt_ds = [
                'id_desa' => $this->input->post('id_ds'),
                'nm_desa' => htmlspecialchars($this->input->post('nm_ds')),
                'id_kecamatan' => htmlspecialchars($this->input->post('kec')),
                'kd_pos' => htmlspecialchars($this->input->post('kd_pos')),
                'padi' => htmlspecialchars($this->input->post('prd_padi')),
                'jagung' => htmlspecialchars($this->input->post('prd_jagung')),
                'ubi_kayu' => htmlspecialchars($this->input->post('prd_ubi')),
                'populasi' => htmlspecialchars($this->input->post('populasi'))
            ];

            $this->M_desa->insertds($dt_ds);
            $this->session->set_flashdata('message', 'add');
            redirect('admin/daerah/desa');
        }
    }

    public function edit_desa()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_ds', 'Nm_ds', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('kec', 'Kec', 'required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('kd_pos', 'Kd_pos', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('prd_padi', 'Prd_padi', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('prd_jagung', 'Prd_jagung', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('prd_ubi', 'Prd_ubi', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('populasi', 'Populasi', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Desa';
            $data['judul'] = 'Data Desa';

            /** Menampilkan data desa */
            $data['desa'] = $this->M_desa->getds()->result_array();

            /** Menampilkan data kecamatan */
            $data['kec'] = $this->M_kecamatan->getkec()->result_array();

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_desa', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel desa */
            $id = $this->input->post('id_ds');

            $dt_ds = [
                'id_desa' => $id,
                'nm_desa' => htmlspecialchars($this->input->post('nm_ds')),
                'id_kecamatan' => htmlspecialchars($this->input->post('kec')),
                'kd_pos' => htmlspecialchars($this->input->post('kd_pos')),
                'padi' => htmlspecialchars($this->input->post('prd_padi')),
                'jagung' => htmlspecialchars($this->input->post('prd_jagung')),
                'ubi_kayu' => htmlspecialchars($this->input->post('prd_ubi')),
                'populasi' => htmlspecialchars($this->input->post('populasi'))
            ];

            $this->M_desa->updateds($dt_ds, $id);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/daerah/desa');
        }
    }

    public function del_desa()
    {
        /** Menghapus data tabel desa */
        $id = $this->input->post('id');
        $this->M_desa->deleteds($id);
        $this->session->set_flashdata('message', 'delete');
        redirect('admin/daerah/desa');
    }
}
