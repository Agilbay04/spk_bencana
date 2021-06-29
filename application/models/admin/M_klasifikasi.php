<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_klasifikasi extends CI_Model
{
    /** Mengambil id klasifikasi */
    public function idkls()
    {
        $this->db->select('*');
        $this->db->from('klasifikasi');
        $this->db->order_by('id_klasifikasi', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    /** Mengambil data dari tabel kriteria */
    public function getkls()
    {
        $this->db->select('*');
        $this->db->from('klasifikasi');
        $this->db->join('desa', 'desa.id_desa=klasifikasi.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan=klasifikasi.id_kecamatan');
        return $this->db->get();
    }

    /** Insert data ke tabel klasifikasi */
    public function insertkls($dt_kls)
    {
        $this->db->insert('klasifikasi', $dt_kls);
    }
}
?>