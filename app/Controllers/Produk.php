<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MProduk;
use App\Models\MKategori;

class Produk extends BaseController
{

    public function __construct()
    {
        $this->MProduk = new MProduk();
       // $this->MKategori = new MKategori();
    }


    public function index()
    {
        $data = [

            'judul' => 'Master Data',
            'subjudul' => 'Produk',
            'menu' => 'masterdata',
            'submenu' => 'produk',
            'page' => 'produk',
            'produk' => $this->MProduk->AllData(),
            //'kategori' => $this->MKategori->AllData(),

        ];
        return view('template', $data);
    }

    public function TambahData()
    {
        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
           // 'id_kategori' => $this->request->getPost('id_kategori'),
            'stok' => $this->request->getPost('stok'),
        ];
        $this->MProduk->TambahData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambah!');
        return redirect()->to(base_url('produk'));
    }


    public function EditData($id_produk)
    {
        $data = [
            'id_produk' => $id_produk,
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
          //  'id_kategori' => $this->request->getPost('id_kategori'),
            'stok' => $this->request->getPost('stok'),
        ];
        $this->MProduk->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to(base_url('produk'));
    }

    public function HapusData($id_produk)
    {
        $data = [
            'id_produk' => $id_produk,
        ];
        $this->MProduk->HapusData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('produk'));
    }
   
}
