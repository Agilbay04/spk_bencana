<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_hasildesa');
        $this->load->model('admin/M_kecamatan');
        notLogin();
    }

    public function index()
    {
        /** Mengambil data kecamatan */
        $id_kecamatan = $this->input->post('kec');

        // /** Mencari nilai seluruhnya */
        $data = $this->db->get_where('klasifikasi', [
            'id_kecamatan' => $id_kecamatan
        ])->result_array();

        if ($data == null) {
            $id_kec = null;
            $data['hasil_desa'] = $this->M_hasildesa->gethsd($id_kec)->result_array();
            $data['title'] = 'SPK-BP | Perangkingan';
            $data['judul'] = 'Perangkingan';

            $data['kec'] = $this->M_kecamatan->getkec()->result_array();

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_rating', $data);
            $this->load->view('admin/template_adm/footer');
        } else {

            /** Mencari vektor bobot */
            $this->db->select_sum('n_ketersediaan');
            $bobot_k = $this->db->get_where('klasifikasi', [
                'id_kecamatan' => $id_kecamatan
                ])->row_array();

            $this->db->select_sum('n_akses');
            $bobot_a = $this->db->get_where('klasifikasi', [
                'id_kecamatan' => $id_kecamatan
                ])->row_array();

            $this->db->select_sum('n_pemanfaatan');
            $bobot_p = $this->db->get_where('klasifikasi', [
                'id_kecamatan' => $id_kecamatan
                ])->row_array();


            /** Mencari nilai max ketersedian */
            $this->db->select_max('n_ketersediaan');
            $data_k = $this->db->get_where('klasifikasi', [
                'id_kecamatan' => $id_kecamatan
            ])->row_array();

            $this->db->select_max('n_akses');
            $data_a = $this->db->get_where('klasifikasi', [
                'id_kecamatan' => $id_kecamatan
            ])->row_array();

            $this->db->select_max('n_pemanfaatan');
            $data_p = $this->db->get_where('klasifikasi', [
                'id_kecamatan' => $id_kecamatan
            ])->row_array();


            foreach ($data as $dt_normal) {
                $nk = $dt_normal['n_ketersediaan'];
                $na = $dt_normal['n_akses'];
                $np = $dt_normal['n_pemanfaatan'];

                /** Normalisasi */
                $k_normal = $nk / $data_k['n_ketersediaan'];
                $a_normal = $na / $data_a['n_akses'];
                $p_normal = $np / $data_p['n_pemanfaatan'];
                
                // perkalian antara vektor bobot dan matriks normalisai
                $hasil = ($bobot_k['n_ketersediaan'] * $k_normal) + ($bobot_a['n_akses'] * $a_normal) + ($bobot_p['n_pemanfaatan'] * $p_normal);

                $d = [
                    'id_desa' => $dt_normal['id_desa'],
                    'id_kecamatan' => $dt_normal['id_kecamatan'],
                    'hasil_akhir' => $hasil
                ];

                $id_ds = $dt_normal['id_desa'];
                $id_kec = $dt_normal['id_kecamatan'];

                $cek_id_kec = $this->db->get_where('hasil_desa', [
                    'id_desa' => $id_ds
                ])->row_array();

                if ($cek_id_kec != null) {
                    $this->db->where('id_kecamatan', $id_kec);
                    $this->db->delete('hasil_desa');

                    $this->db->insert('hasil_desa', $d);
                } else {
                    $this->db->insert('hasil_desa', $d);
                }
            }

            $data['hasil_desa'] = $this->M_hasildesa->gethsd($id_kec)->result_array();
            $data['hasil'] = $this->M_hasildesa->gethsd($id_kec)->row_array();
            $data['title'] = 'SPK-BP | Perangkingan';
            $data['judul'] = 'Perangkingan';

            $data['kec'] = $this->M_kecamatan->getkec()->result_array();

            /** Alert */
            $this->session->set_flashdata('notif', 
            '<div class="alert bg-gradient-danger" role="alert">
                <h4 class="alert-heading">
                    Hasil Perangkingan Menunjukkan:
                    <span class="font-weight-bold">Desa ' . $data['hasil']['nm_desa'] . '</span> 
                    <span class="font-weight-bold">, Kecamatan ' . $data['hasil']['nm_kecamatan'] . '</span>
                    merupakan daerah yang rawan bencana pangan.
                </h4>
            </div>');

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_rating', $data);
            $this->load->view('admin/template_adm/footer');
        }
    }
}
