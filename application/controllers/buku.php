<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class buku extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('buku_model');
        $this->load->model('kategori_model'); 
    }

    public function index()
    {
        $data['buku'] = $this->buku_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar', $data);
        $this->load->view('templates/top_bar', $data);
        $this->load->view('buku/index', $data);
        $this->load->view('templates/footer', $data);
    } 

    // TAMBAH DATA //
    public function tambah()
    {
        $data['kategori'] = $this->kategori_model->get_all();
        $data['buku'] = $this->buku_model->get_all();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar', $data);
        $this->load->view('templates/top_bar', $data);
        $this->load->view('buku/tambah');
        $this->load->view('templates/footer', $data);

    }

    // SIMPAN DATA //

    public function simpan()
    {
        $data = [
            'kode_buku' => $this->input->post('kode_buku'),
            'judul_buku' => $this->input->post('judul_buku'),
            'penulis' => $this->input->post('penulis'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun' => $this->input->post('tahun'),
            'kategori' => $this->input->post('kategori'),
            'stok' => $this->input->post('stok'),
            'lokasi_rak' => $this->input->post('lokasi_rak')
        ];

        $this->buku_model->insert($data);
        redirect('buku');
    }

    // HAPUS DATA //
    public function hapus($kode_buku)
    {
        $this->buku_model->delete($kode_buku);
        $this->session->set_flashdata('success', "Data Berhasil Dihapus");
        redirect('buku');
    }

    // EDIT DATA //
    public function edit($kode_buku)
    {
        $data['kategori'] = $this->kategori_model->get_all();
        $data['buku'] = $this->buku_model->get_by_id($kode_buku);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/side_bar', $data);
        $this->load->view('templates/top_bar', $data);
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    // Update Data
    public function update($kode_buku)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul_buku','Judul buku', 'required');
        if ($this->form_validation->run() == FALSE){
            redirect('buku/edit/'.$kode_buku);
        } else {
            $data = [
                'kode_buku'  => $this->input->post('kode_buku'),
                'judul_buku' => $this->input->post('judul_buku'),
                'penulis'    => $this->input->post('penulis'),
                'penerbit'   => $this->input->post('penerbit'),
                'tahun'      => $this->input->post('tahun'),
                'kategori'   => $this->input->post('kategori'),
                'stok'       => $this->input->post('stok'),
                'lokasi_rak' => $this->input->post('lokasi_rak')
            ];

            $this->buku_model->update($kode_buku, $data);

            $this->session->set_flashdata('success', 'Data berhasil di update');
            redirect('buku');
        }
    }


}

?>
