<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kecamatan extends CI_Model
{
    /** Mengambil id kecamatan */
    public function idkec()
    {
        $this->db->select('*');
        $this->db->from('kecamatan');
        $this->db->order_by('id_kecamatan', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    /** Mengambil data dari tabel kecamatan */
    public function getkec()
    {
        $sql = $this->db->get('kecamatan');
        return $sql;
    }

    /** Insert data ke tabel kecamatan */
    public function insertkec($dt_kec)
    {
        $this->db->insert('kecamatan', $dt_kec);
    }

    /** Update data tabel kecamtan */
    public function updatekec($dt_kec, $id)
    {
        $this->db->set($dt_kec);
        $this->db->where('id_kecamatan', $id);
        $this->db->update('kecamatan');
    }

    /** Hapus data tabel kecamatan */
    public function deletekec($id)
    {
        $this->db->where('id_kecamatan', $id);
        $this->db->delete('kecamatan');
    }
}
?>