<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hasildesa extends CI_Model
{
    /** Mengambil id klasifikasi */
    public function idhsd()
    {
        $this->db->select('*');
        $this->db->from('hasil_desa');
        $this->db->order_by('id_hasil', 'ASC');
        $this->db->limit(1);
        return $this->db->get();
    }

    /** Mengambil data dari tabel kriteria */
    public function gethsd($id_kec)
    {
        $this->db->select('*');
        $this->db->from('hasil_desa');
        $this->db->join('klasifikasi', 'klasifikasi.id_desa=hasil_desa.id_desa');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan=hasil_desa.id_kecamatan');
        $this->db->join('desa', 'desa.id_desa=hasil_desa.id_desa');
        $this->db->order_by('hasil_akhir', 'ASC');
        $this->db->where('klasifikasi.id_kecamatan', $id_kec);
        return $this->db->get();
    }
}
?>  