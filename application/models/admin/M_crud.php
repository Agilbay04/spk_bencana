<?php

class M_crud extends CI_Model
{
    public function edit($email)
    {
        return $this->db->get_where('user', [
            'email' => $email
        ]);
    }

    public function edit2($where, $table)
    {
        return $this->db->get_where($table, $where)->result_array();
    }

    public function getAll($table)
    {
        return $this->db->get($table);
    }

    public function getIds($table, $order)
    {
        return $this->db->query("SELECT * FROM $table ORDER BY $order DESC LIMIT 1");
    }

    public function insert($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function delete($where, $table)
    {
        $this->db->delete($table, $where);
    }
    
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // public function user($mail)
    // {
    //     $query= $this->db->query("SELECT * FROM user, hak_akses WHERE email = $mail AND hak_akses.id_akses = user.id_akses");
    //     return $query;
    // }
}