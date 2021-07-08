<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_kriteria');
        $this->load->model('admin/M_klasifikasi');
        $this->load->model('admin/M_kecamatan');
        $this->load->model('admin/M_desa');
        notLogin();
        cekakses();
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

        /** Mengambil data himpunan kriteria */
        $data['himpunan'] = $this->M_kriteria->gethimpunan()->result_array();

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

        $this->form_validation->set_rules('nm_ds', 'Nm_ds', 'trim|required|is_unique[klasifikasi.id_desa]', [
            'required' => 'Kolom ini wajib diisi',
            'is_unique' => 'Data ini sudah ada'
        ]);

        $this->form_validation->set_rules('r_ketersediaan', 'R_k', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('r_akses', 'R_a', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('r_pemanfaatan', 'R_p', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Klasifikasi';
            $data['judul'] = 'Data Klasifikasi';

            /** Mengambil data dari tabel klasifikasi */
            $data['klasifikasi'] = $this->M_klasifikasi->getkls()->result_array();

            /** Mengambil data kecamatan */
            $data['kec'] = $this->M_kecamatan->getkec()->result_array();

            /** Mengambil data dari tabel desa */
            $data['desa'] = $this->M_desa->getds()->result_array();

            /** Mengambil data himpunan kriteria */
            $data['himpunan'] = $this->M_kriteria->gethimpunan()->result_array();

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
            
            /** Alert validasi salah */
            $this->session->set_flashdata('message', 'warning');

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_klasifikasi', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel klasifikasi */
            $jml_ketersediaan = htmlspecialchars($this->input->post('r_ketersediaan'));
            $jml_akses = htmlspecialchars($this->input->post('r_akses'));
            $jml_pemanfaatan = htmlspecialchars($this->input->post('r_pemanfaatan'));
            
            //mengubah nilai ketersedian
            if ($jml_ketersediaan <= 3) {
                $nk_ketersediaan = 0.2;
            } else if ($jml_ketersediaan > 3 && $jml_ketersediaan <= 5) {
                $nk_ketersediaan = 0.4;
            } else if ($jml_ketersediaan > 5 && $jml_ketersediaan <= 10) {
                $nk_ketersediaan = 0.6;
            } else if ($jml_ketersediaan > 10 && $jml_ketersediaan <= 14) {
                $nk_ketersediaan = 0.8;
            } else if ($jml_ketersediaan >= 15) {
                $nk_ketersediaan = 1;
            }


            //mengubah nilai akses
            if ($jml_akses <= 25) {
                $na_akses = 0.2;
            } else if ($jml_akses > 25 && $jml_akses <= 30) {
                $na_akses = 0.4;
            } else if ($jml_akses > 30 && $jml_akses <= 35) {
                $na_akses = 0.6;
            } else if ($jml_akses > 35 && $jml_akses <= 43) {
                $na_akses = 0.8;
            } else if ($jml_akses >= 44) {
                $na_akses = 1;
            }


            //mengubah nilai pemanfaatan
            if ($jml_pemanfaatan <= 3) {
                $np_pemanfaatan = 0.2;
            } else if ($jml_pemanfaatan > 3 && $jml_pemanfaatan <= 6) {
                $np_pemanfaatan = 0.4;
            } else if ($jml_pemanfaatan > 6 && $jml_pemanfaatan <= 15) {
                $np_pemanfaatan = 0.6;
            } else if ($jml_pemanfaatan > 15 && $jml_pemanfaatan <= 18) {
                $np_pemanfaatan = 0.8;
            } else if ($jml_pemanfaatan >= 19) {
                $np_pemanfaatan = 1;
            }

            $dt_kls = [
                'id_klasifikasi' => htmlspecialchars($this->input->post('id_kls')),
                'id_desa' => htmlspecialchars($this->input->post('nm_ds')),
                'id_kecamatan' => htmlspecialchars($this->input->post('nm_kec')),
                'r_ketersediaan' => $jml_ketersediaan,
                'n_ketersediaan' => $nk_ketersediaan,
                'r_akses' =>$jml_akses,
                'n_akses' => $na_akses,
                'r_pemanfaatan' => $jml_pemanfaatan,
                'n_pemanfaatan' => $np_pemanfaatan
            ];

            $this->M_klasifikasi->insertkls($dt_kls);
            $this->session->set_flashdata('message', 'add');
            redirect('admin/klasifikasi');;
        }
    }

    public function edit_klasifikasi()
    {
        /** Validasi form */
        $this->form_validation->set_rules('r_ketersediaan1', 'R_k', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('r_akses1', 'R_a', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('r_pemanfaatan1', 'R_p', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Klasifikasi';
            $data['judul'] = 'Data Klasifikasi';

            /** Mengambil data dari tabel klasifikasi */
            $data['klasifikasi'] = $this->M_klasifikasi->getkls()->result_array();

            /** Mengambil data kecamatan */
            $data['kec'] = $this->M_kecamatan->getkec()->result_array();

            /** Mengambil data dari tabel desa */
            $data['desa'] = $this->M_desa->getds()->result_array();

            /** Mengambil data himpunan kriteria */
            $data['himpunan'] = $this->M_kriteria->gethimpunan()->result_array();

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

            /** Alert validasi salah */
            $this->session->set_flashdata('message', 'warning');
            
            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_klasifikasi', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel klasifikasi */
            $id = $this->input->post('id_kls1');
            $ketersediaan = htmlspecialchars($this->input->post('r_ketersediaan1'));
            $akses =  htmlspecialchars($this->input->post('r_akses1'));
            $pemanfaatan = htmlspecialchars($this->input->post('r_pemanfaatan1'));

            //mengubah nilai ketersedian
            if ($ketersediaan <= 3) {
                $n_ketersediaan = 0.2;
            } else if ($ketersediaan > 3 && $ketersediaan <= 5) {
                $n_ketersediaan = 0.4;
            } else if ($ketersediaan > 5 && $ketersediaan <= 10) {
                $n_ketersediaan = 0.6;
            } else if ($ketersediaan > 10 && $ketersediaan <= 14) {
                $n_ketersediaan = 0.8;
            } else if ($ketersediaan >= 15) {
                $n_ketersediaan = 1;
            }


            //mengubah nilai akses
            if ($akses <= 25) {
                $n_akses = 0.2;
            } else if ($akses > 25 && $akses <= 30) {
                $n_akses = 0.4;
            } else if ($akses > 30 && $akses <= 35) {
                $n_akses = 0.6;
            } else if ($akses > 35 && $akses <= 43) {
                $n_akses = 0.8;
            } else if ($akses >= 44) {
                $n_akses = 1;
            }


            //mengubah nilai pemanfaatan
            if ($pemanfaatan <= 3) {
                $n_pemanfaatan = 0.2;
            } else if ($pemanfaatan > 3 && $pemanfaatan <= 6) {
                $n_pemanfaatan = 0.4;
            } else if ($pemanfaatan > 6 && $pemanfaatan <= 15) {
                $n_pemanfaatan = 0.6;
            } else if ($pemanfaatan > 15 && $pemanfaatan <= 18) {
                $n_pemanfaatan = 0.8;
            } else if ($pemanfaatan >= 19) {
                $n_pemanfaatan = 1;
            }

            $dt_kls = [
                'id_klasifikasi' => $id,
                'r_ketersediaan' => $ketersediaan,
                'n_ketersediaan' => $n_ketersediaan,
                'r_akses' =>$akses,
                'n_akses' => $n_akses,
                'r_pemanfaatan' => $pemanfaatan,
                'n_pemanfaatan' => $n_pemanfaatan
            ];

            $this->M_klasifikasi->updatekls($dt_kls, $id);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/klasifikasi');;
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
