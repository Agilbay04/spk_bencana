<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_desa extends CI_Model
{
    /** Mengambil id desa */
    public function idds()
    {
        $this->db->select('*');
        $this->db->from('desa');
        $this->db->order_by('id_desa', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    /** Mengambil data json desa */
    public function get_dtjson($id)
    {
        $sql = $this->db->get_where('desa', [
            'id_kecamatan' => $id
        ]);
        return $sql;
    }

    /** Mengambil data desa */
    public function getds()
    {
        $this->db->select('*');
        $this->db->from('desa');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan=desa.id_kecamatan');
        $this->db->order_by('id_desa', 'DESC');
        $sql = $this->db->get();
        return $sql;
    }

    /** Insert data ke tabel desa */
    public function insertds($dt_ds)
    {
        $this->db->insert('desa', $dt_ds);
    }

    /** Update data di tabel desa */
    public function updateds($dt_ds, $id)
    {
        $this->db->set($dt_ds);
        $this->db->where('id_desa', $id);
        $this->db->update('desa');
    }

    /** Hapus data di tabel desa */
    public function deleteds($id)
    {
        $this->db->where('id_desa', $id);
        $this->db->delete('desa');
    }
}
?>
