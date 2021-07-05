<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{
    /** ================================ GLOBAL QUERY TABEL USER ================================ */
    /** Mengambil data user */
    public function getus()
    {
        return $this->db->query('SELECT * FROM user WHERE id_akses != 1');
    }

    public function getuser($id_akses)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('hak_akses', 'hak_akses.id_akses=user.id_akses');
        $this->db->where('user.id_akses', $id_akses);
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get();
    }

    /** Update data tabel user */
    public function updateuser($dt_user, $id_user)
    {
        $this->db->set($dt_user);
        $this->db->where('id_user', $id_user);
        $this->db->update('user');
    }

    /** Hapus data tabel user */
    public function deleteuser($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
    }

    /** Menonaktifkan akun user */
    public function disabled($id_user)
    {
        $this->db->set('status', 0);
        $this->db->where('id_user', $id_user);
        $this->db->update('user');
    }

    /** Mengaktifkan akun user */
    public function enabled($id_user)
    {
        $this->db->set('status', 1);
        $this->db->where('id_user', $id_user);
        $this->db->update('user');
    }

    /** ================================ HAK AKSES ================================ */
    /** Mengambil id hak akses */
    public function idacs()
    {
        $this->db->select('*');
        $this->db->from('hak_akses');
        $this->db->order_by('id_akses', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }

    /** Mengambil data dari tabel hak akses */
    public function getacs()
    {
        $this->db->order_by('id_akses', 'DESC');
        $sql = $this->db->get('hak_akses');
        return $sql;
    }

    /** Insert data ke tabel hak akses */
    public function insertacs($dt_acs)
    {
        $this->db->insert('hak_akses', $dt_acs);
    }

    /** Update data tabel hak akses */
    public function updateacs($dt_acs, $id_acs)
    {
        $this->db->set($dt_acs);
        $this->db->where('id_akses', $id_acs);
        $this->db->update('hak_akses');
    }

    /** Hapus data tabel hak akses */
    public function deleteacs($id_acs)
    {
        $this->db->where('id_akses', $id_acs);
        $this->db->delete('hak_akses');
    }

    /** Mengambil id user */
    public function idusr()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user', 'DESC');
        $this->db->limit(1);
        return $this->db->get();
    }


    /** ================================ PETUGAS DINAS ================================ */
    /** Insert data ke tabel user */
    public function insertptgs($dt_ptgs)
    {
        $this->db->insert('user', $dt_ptgs);
    }

    /** ================================ USER UMUM ================================ */

}
