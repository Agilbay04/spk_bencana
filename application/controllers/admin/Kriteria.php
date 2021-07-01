<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_kriteria');
    }

    public function index()
    {
        $data['title'] = 'SPK-BP | Kriteria';
        $data['judul'] = 'Data Kriteria';

        /** Menampilkan data kriteria */
        $data['kriteria'] = $this->M_kriteria->getkt()->result_array();

        /** Perikasa apakah ada data di tabel */
        $countData = $this->M_kriteria->idkt()->num_rows();

        /** Ambil id terakhir */
        $getID = $this->M_kriteria->idkt()->row_array();

        /** Membuat uniq id */
        if ($countData > 0) {
            $id_kt = autonumber($getID['id_kriteria'], 2, 13);
        } else {
            $id_kt = "KT0000000000001";
        }

        /** Mengirim id ke view */
        $data['id'] = $id_kt;

        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_kriteria', $data);
        $this->load->view('admin/template_adm/footer');
    }

    public function tbh_kriteria()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_kt', 'Nm_kt', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Kriteria';
            $data['judul'] = 'Data Kriteria';

            /** Menampilkan data kriteria */
            $data['kriteria'] = $this->M_kriteria->getkt()->result_array();

            /** Perikasa apakah ada data di tabel */
            $countData = $this->M_kriteria->idkt()->num_rows();

            /** Ambil id terakhir */
            $getID = $this->M_kriteria->idkt()->row_array();

            /** Membuat uniq id */
            if ($countData > 0) {
                $id_kt = autonumber($getID['id_kriteria'], 2, 13);
            } else {
                $id_kt = "KT0000000000001";
            }

            /** Mengirim id ke view */
            $data['id'] = $id_kt;

            /** Alert validasi salah */
            $this->session->set_flashdata('messages', 'warning');

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_kriteria', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel kriteria */
            $dt_kt = [
                'id_kriteria' => $this->input->post('id_kt'),
                'nm_kriteria' => htmlspecialchars($this->input->post('nm_kt'))
            ];

            $this->M_kriteria->insertkt($dt_kt);
            $this->session->set_flashdata('message', 'add');
            redirect('admin/kriteria');
        }
    }

    public function edit_kriteria()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_kt', 'Nm_kt', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Kriteria';
            $data['judul'] = 'Data Kriteria';

            /** Menampilkan data kriteria */
            $data['kriteria'] = $this->M_kriteria->getkt()->result_array();

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_kriteria', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            $id = $this->input->post('id_kt');

            /** Edit data tabel kriteria */
            $dt_kt = [
                'id_kriteria' => $id,
                'nm_kriteria' => htmlspecialchars($this->input->post('nm_kt'))
            ];

            $this->M_kriteria->updatekt($dt_kt, $id);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/kriteria');
        }
    }

    public function del_kriteria()
    {
        /** Menghapus data tabel kecamatan */
        $id = $this->input->post('id');
        $this->M_kriteria->deletekt($id);
        $this->session->set_flashdata('message', 'delete');
        redirect('admin/kriteria');
    }

    /** Range kriteria */
    public function himpunan()
    {
        $data['title'] = 'SPK-BP | Himpunan Kriteria';
        $data['judul'] = 'Himpunan Kriteria';

        /** Mengambil data kriteria */
        $data['kriteria'] = $this->M_kriteria->getkt()->result_array();

        /** Menampilkan data himpunan kriteria */
        $data['himpunan'] = $this->M_kriteria->gethimpunan()->result_array();

        /** Perikasa apakah ada data di tabel */
        $countData = $this->M_kriteria->idhimpunan()->num_rows();

        /** Ambil id terakhir */
        $getID = $this->M_kriteria->idhimpunan()->row_array();

        /** Membuat uniq id */
        if ($countData > 0) {
            $id_himpunan = autonumber($getID['no'], 3, 12);
        } else {
            $id_himpunan = "HIM000000000001";
        }

        /** Mengirim id ke view */
        $data['id_h'] = $id_himpunan;

        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_himpunan', $data);
        $this->load->view('admin/template_adm/footer');
    }

    public function tbh_himpunan()
    {
        /** Validasi form */
        $this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('range', 'Range', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Himpunan Kriteria';
            $data['judul'] = 'Himpunan Kriteria';

            /** Mengambil data kriteria */
            $data['kriteria'] = $this->M_kriteria->getkt()->result_array();

            /** Menampilkan data himpunan kriteria */
            $data['himpunan'] = $this->M_kriteria->gethimpunan()->result_array();

            /** Perikasa apakah ada data di tabel */
            $countData = $this->M_kriteria->idhimpunan()->num_rows();

            /** Ambil id terakhir */
            $getID = $this->M_kriteria->idhimpunan()->row_array();

            /** Membuat uniq id */
            if ($countData > 0) {
                $id_himpunan = autonumber($getID['no'], 3, 12);
            } else {
                $id_himpunan = "HIM000000000001";
            }

            /** Mengirim id ke view */
            $data['id_h'] = $id_himpunan;

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_himpunan', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel himpunan kriteria */
            $dt_himpunan = [
                'no' => $this->input->post('id_h'),
                'id_kriteria' => htmlspecialchars($this->input->post('kriteria')),
                'range' => htmlspecialchars($this->input->post('range')),
                'nilai' => htmlspecialchars($this->input->post('nilai'))
            ];

            $this->M_kriteria->inserthimpunan($dt_himpunan);
            $this->session->set_flashdata('message', 'add');
            redirect('admin/kriteria/himpunan');
        }
    }

    public function edit_himpunan()
    {
        /** Validasi form */
        $this->form_validation->set_rules('kriteria', 'Kriteria', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('range', 'Range', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('nilai', 'Nilai', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Himpunan Kriteria';
            $data['judul'] = 'Himpunan Kriteria';

            /** Mengambil data kriteria */
            $data['kriteria'] = $this->M_kriteria->getkt()->result_array();

            /** Menampilkan data himpunan kriteria */
            $data['himpunan'] = $this->M_kriteria->gethimpunan()->result_array();

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_himpunan', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Edit data tabel himpunan kriteria */
            $id_h = $this->input->post('id_h');

            $dt_himpunan = [
                'id_kriteria' => htmlspecialchars($this->input->post('kriteria')),
                'range' => htmlspecialchars($this->input->post('range')),
                'nilai' => htmlspecialchars($this->input->post('nilai'))
            ];

            $this->M_kriteria->updatehimpunan($dt_himpunan, $id_h);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/kriteria/himpunan');
        }
    }

    public function del_himpunan()
    {
        /** Menghapus data tabel kecamatan */
        $id_h = $this->input->post('id_h');
        $this->M_kriteria->deletehimpunan($id_h);
        $this->session->set_flashdata('message', 'delete');
        redirect('admin/kriteria/himpunan');
    }
}
