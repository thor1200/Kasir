<?php

namespace App\Models;

use CodeIgniter\Model;

class MPelanggan extends Model
{
    public function AllData()
    {
        return $this->db->table('pelanggan')->get()->getResultArray();
    }

    public function TambahData($data)
    {
        $this->db->table('pelanggan')->insert($data);
    }

    public function EditData($data)
    {
        $this->db->table('pelanggan')
            ->where('id_pelanggan', $data['id_pelanggan'])
            ->update($data);
    }

    public function HapusData($data)
    {
        $this->db->table('pelanggan')
            ->where('id_pelanggan', $data['id_pelanggan'])
            ->delete($data);
    }
}
