<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_model extends CI_Model {
    private $table = 'kategori';

    //Ambil Semua Data//
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }
    // MENCARI DATA//
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('kategori')->row();
    }
    //INSERT DATA//
    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }
    //HAPUS DATA//
    public function delete($id)
    {
        return $this->db->delete($this->table,['id'=>$id]);
    }
    //UPDATE DATA//
   public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

}
