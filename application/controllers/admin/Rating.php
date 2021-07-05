<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rating extends CI_Controller
{

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

    public function rangking()
    {
        /** Mencari range max */
        $this->db->select_max('r_ketersediaan');
        $ketersediaan = $this->db->get_where('klasifikasi', [
            'id_kecamatan' => "KEC000000000002"
        ])->result_array();

        $this->db->select_max('r_akses');
        $akses = $this->db->get_where('klasifikasi', [
            'id_kecamatan' => "KEC000000000002"
        ])->result_array();

        $this->db->select_max('r_pemanfaatan');
        $pemanfaatan = $this->db->get_where('klasifikasi', [
            'id_kecamatan' => "KEC000000000002"
        ])->result_array();

        /** Mencari nilai range max */
        if ($ketersediaan <= 3) {
            $data['max_k'] = 0.2;
        } else if ($ketersediaan > 3 && $ketersediaan <= 5) {
            $data['max_k'] = 0.4;
        } else if ($ketersediaan > 5 && $ketersediaan <= 10) {
            $data['max_k'] = 0.6;
        } else if ($ketersediaan > 10 && $ketersediaan <= 14) {
            $data['max_k'] = 0.8;
        } else if ($ketersediaan >= 15) {
            $data['max_k'] = 1;
        }

        if ($akses <= 25) {
            $data['max_a'] = 0.2;
        } else if ($akses > 25 && $akses <= 30) {
            $data['max_a'] = 0.4;
        } else if ($akses > 30 && $akses <= 35) {
            $data['max_a'] = 0.6;
        } else if ($akses > 35 && $akses <= 43) {
            $data['max_a'] = 0.8;
        } else if ($akses >= 44) {
            $data['max_a'] = 1;
        }

        if ($pemanfaatan <= 3) {
            $data['max_p'] = 0.2;
        } else if ($pemanfaatan > 3 && $pemanfaatan <= 6) {
            $data['max_p'] = 0.4;
        } else if ($pemanfaatan > 6 && $pemanfaatan <= 15) {
            $data['max_p'] = 0.6;
        } else if ($pemanfaatan > 15 && $pemanfaatan <= 18) {
            $data['max_p'] = 0.8;
        } else if ($pemanfaatan >= 19) {
            $data['max_p'] = 1;
        }

        /** Mengambil semua range ketersediaan */
        $this->db->select('*');
        $this->db->from('klasifikasi');
        $this->db->join('desa', 'desa.id_desa = klasifikasi.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = klasifikasi.id_kecamatan');
        $this->db->where('klasifikasi.id_kecamatan', 'KEC000000000002');
        $data['dt_ket'] = $this->db->get()->result_array();

        // $data['title'] = 'SPK-BP | Rating';
        // $data['judul'] = 'Data Rating';
        // $this->load->view('admin/template_adm/header', $data);
        // $this->load->view('admin/template_adm/navbar');
        // $this->load->view('admin/template_adm/sidebar');
        // $this->load->view('admin/v_rating', $data);
        // $this->load->view('admin/template_adm/footer');

        foreach ($data['dt_ket'] as $ket) {
            $nilai_k = $ket['r_ketersediaan'];
            $nilai_a = $ket['r_akses'];
            $nilai_p = $ket['r_pemanfaatan'];

            if ($nilai_k < 3) {
                $r_nilai_k = 0.2;
            } else if ($nilai_k > 3 && $nilai_k <= 5) {
                $r_nilai_k = 0.4;
            } else if ($nilai_k > 5 && $nilai_k <= 10) {
                $r_nilai_k = 0.6;
            } else if ($nilai_k > 10 && $nilai_k <= 14) {
                $r_nilai_k = 0.8;
            } else if ($nilai_k >= 15) {
                $r_nilai_k = 1;
            }

            if ($nilai_a <= 25) {
                $r_nilai_a = 0.2;
            } else if ($nilai_a > 25 && $nilai_a <= 30) {
                $r_nilai_a = 0.4;
            } else if ($nilai_a > 30 && $nilai_a <= 35) {
                $r_nilai_a = 0.6;
            } else if ($nilai_a > 35 && $nilai_a <= 43) {
                $r_nilai_a = 0.8;
            } else if ($nilai_a >= 44) {
                $r_nilai_a = 1;
            }

            if ($nilai_p <= 3) {
                $r_nilai_p = 0.2;
            } else if ($nilai_p > 3 && $nilai_p <= 6) {
                $r_nilai_p = 0.4;
            } else if ($nilai_p > 6 && $nilai_p <= 15) {
                $r_nilai_p = 0.6;
            } else if ($nilai_p > 15 && $nilai_p <= 18) {
                $r_nilai_p = 0.8;
            } else if ($nilai_p >= 19) {
                $r_nilai_p = 1;
            }

            $matrix1 = $r_nilai_k / $data['max_k'];
            $matrix2 = $r_nilai_a / $data['max_a'];
            $matrix3 = $r_nilai_p / $data['max_p'];

            // var_dump($matrix1)."<br/>";
            // var_dump($matrix2)."<br/>";
            // var_dump($matrix3)."<br/>";

            $b1 = 3.2;
            $b2 = 6.6;
            $b3 = 6;
            $hasil = ($matrix1 * $b1) + ($matrix2 * $b2) + ($matrix3 * $b3);

            // redirect('guru/index');
            $d = array();
    
            foreach ($ket[array('id_desa')] as $key => $value) {
                $d[]  = array(
                    'id_desa' => $value,
                    'hasil' => $hasil[$key]
                );
            }
    
            $this->db->insert_batch('hasil_desa', $d);

            var_dump($hasil);
        }

    }
}
