<?php

namespace App\Controllers;
use App\Models\KonsultasiModel;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use CodeIgniter\Controller;

class KonsumenController extends Controller
{
    public function index()
    {
        return view('konsumen/index');
    }

    public function konsultasi()
    {
        $model = new KonsultasiModel();
        $data['dokter'] = $model->getDokter();
        return view('konsumen/konsultasi', $data);
    }

    public function simpanKonsultasi()
    {
        $model = new KonsultasiModel();
        $model->save([
            'user_id' => session()->get('id'),
            'dokter_id' => $this->request->getPost('dokter_id'),
            'jadwal' => $this->request->getPost('jadwal'),
        ]);
        return redirect()->to('/konsumen/konsultasi');
    }

    public function layanan()
    {
        return view('konsumen/layanan');
    }

    public function produk()
    {
        $model = new ProdukModel();
        $data['produk'] = $model->findAll();
        return view('konsumen/produk', $data);
    }

    public function beliProduk()
    {
        $model = new TransaksiModel();
        $model->save([
            'user_id' => session()->get('id'),
            'produk_id' => $this->request->getPost('produk_id'),
            'jumlah' => $this->request->getPost('jumlah'),
        ]);
        return redirect()->to('/konsumen/transaksi');
    }

    public function transaksi()
    {
        $model = new TransaksiModel();
        $data['transaksi'] = $model->getTransaksiByUser(session()->get('id'));
        return view('konsumen/transaksi', $data);
    }
}

