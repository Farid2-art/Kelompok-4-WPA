<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class AdminController extends Controller {
    public function index() {
        return view('admin/index');
    }

    public function users() {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('admin/users', $data);
    }

    public function laporan() {
        return view('admin/laporan');
    }
}
