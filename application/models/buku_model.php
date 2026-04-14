<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buku_model extends CI_Model {
    private $table = 'buku';

    //Ambil Semua Data//
    function get_all()
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.kategori');
        return $this->db->get()->result();
    }

    // MENCARI DATA//
    public function get_by_id($kode_buku)
    {
        $this->db->where('kode_buku', $kode_buku);
        return $this->db->get('buku')->row();
    }
    //INSERT DATA//
    public function insert($data)
    {
        return $this->db->insert($this->table,$data);
    }
    //HAPUS DATA//
    public function delete($kode_buku)
    {
        return $this->db->delete($this->table,['kode_buku'=>$kode_buku]);
    }
    //UPDATE DATA//
   public function update($kode_buku, $data)
    {
        $this->db->where('kode_buku', $kode_buku);
        $this->db->update($this->table, $data);
    }

}
