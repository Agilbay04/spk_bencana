<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
    /** Mengambil id user */
    public function iduser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    /** insert ke tabel user */
    public function insertuser($dt_user)
    {  
        $this->db->insert('user', $dt_user);   
    }

    // /** Mengambil data json desa */
    // public function get_dtjson($id)
    // {
    //     $sql = $this->db->get_where('desa', [
    //         'id_kecamatan' => $id
    //     ]);
    //     return $sql;
    // }

    // /** Mengambil data desa */
    // public function getds()
    // {
    //     $this->db->select('*');
    //     $this->db->from('desa');
    //     $this->db->join('kecamatan', 'kecamatan.id_kecamatan=desa.id_kecamatan');
    //     $this->db->order_by('id_desa', 'DESC');
    //     $sql = $this->db->get();
    //     return $sql;
    // }

    // /** Insert data ke tabel desa */
    // public function insertds($dt_ds)
    // {
    //     $this->db->insert('desa', $dt_ds);
    // }

    // /** Update data di tabel desa */
    // public function updateds($dt_ds, $id)
    // {
    //     $this->db->set($dt_ds);
    //     $this->db->where('id_desa', $id);
    //     $this->db->update('desa');
    // }

    // /** Hapus data di tabel desa */
    // public function deleteds($id)
    // {
    //     $this->db->where('id_desa', $id);
    //     $this->db->delete('desa');
    // }
}
?>
