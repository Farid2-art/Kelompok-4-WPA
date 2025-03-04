<?php

namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $allowedFields = ['user_id', 'produk_id', 'jumlah'];

    public function getTransaksiByUser($user_id)
    {
        return $this->db->table('transaksi')
            ->join('produk', 'produk.id = transaksi.produk_id')
            ->where('user_id', $user_id)
            ->get()
            ->getResultArray();
    }
}
