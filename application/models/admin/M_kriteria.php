<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Model
{
    /** Mengambil id kriteria */
    public function idkt()
    {
        $this->db->select('*');
        $this->db->from('kriteria');
        $this->db->order_by('id_kriteria', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    /** Mengambil data dari tabel kriteria */
    public function getkt()
    {
        $this->db->order_by('id_kriteria', 'DESC');
        $sql = $this->db->get('kriteria');
        return $sql;
    }

    /** Insert data ke tabel kriteria */
    public function insertkt($dt_kt)
    {
        $this->db->insert('kriteria', $dt_kt);
    }

    /** Update data tabel kriteria */
    public function updatekt($dt_kt, $id)
    {
        $this->db->set($dt_kt);
        $this->db->where('id_kriteria', $id);
        $this->db->update('kriteria');
    }

    /** Hapus data tabel kriteria */
    public function deletekt($id)
    {
        $this->db->where('id_kriteria', $id);
        $this->db->delete('kriteria');
    }

    /** Mengambil id himpunan */
    public function idhimpunan()
    {
        $this->db->select('*');
        $this->db->from('himpunan_kriteria');
        $this->db->order_by('no', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    /** Mengambil data himpunan kriteria */
    public function gethimpunan()
    {
        $this->db->select('*');
        $this->db->from('himpunan_kriteria');
        $this->db->join('kriteria', 'kriteria.id_kriteria=himpunan_kriteria.id_kriteria');
        $this->db->order_by('no', 'DESC');
        return $this->db->get();
    }

    /** Insert data ke tabel himpunan kriteria */
    public function inserthimpunan($dt_himpunan)
    {
        $this->db->insert('himpunan_kriteria', $dt_himpunan);
    }

    /** Update data tabel himpunan kriteria */
    public function updatehimpunan($dt_himpunan, $id_h)
    {
        $this->db->set($dt_himpunan);
        $this->db->where('no', $id_h);
        $this->db->update('himpunan_kriteria');
    }

    /** Hapus data tabel himpunan kriteria */
    public function deletehimpunan($id_h)
    {
        $this->db->where('no', $id_h);
        $this->db->delete('himpunan_kriteria');
    }
}
?>