<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\KonsultasiModel;

class DokterController extends Controller {
    public function index() {
        return view('dokter/index');
    }

    public function konsultasi() {
        $model = new KonsultasiModel();
        $data['konsultasi'] = $model->findAll();
        return view('dokter/konsultasi', $data);
    }

    public function kirimResep() {
        $resep = $this->request->getPost('resep');
        return view('dokter/resep', ['resep' => $resep]);
    }
}
