<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MPelanggan;

class Pelanggan extends BaseController
{
    public function __construct()
    {
        $this->MPelanggan = new MPelanggan();
    }

    public function index()
    {
        $data = [
        
            'judul' => 'Master Data',
            'subjudul' => 'Pelanggan',
            'menu' => 'masterdata',
            'submenu' => 'pelanggan',
            'page' => 'pelanggan',
            'pelanggan' => $this->MPelanggan->AllData(),

        ];
        return view('template', $data);
    }

    public function TambahData()
    {
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_telpon'=> $this->request->getPost('nomor_telpon'),
        ];
        $this->MPelanggan->TambahData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambah!');
        return redirect()->to(base_url('pelanggan'));
    }

    public function EditData($id_pelanggan)
    {
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_telpon' => $this->request->getPost('nomor_telpon'),
        ];
        $this->MPelanggan->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to(base_url('pelanggan'));
    }

    public function HapusData($id_pealanggan)
    {
        $data = [
            'id_pelanggan' => $id_pelanggan,
        ];
        $this->MPelanggan->HapusData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('pelanggan'));
    }
}
