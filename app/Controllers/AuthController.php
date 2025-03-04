<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller {
    public function login() {
        return view('auth/login');
    }

    public function attemptLogin() {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
    
        $user = $model->where('email', $email)->first();
    
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Email tidak ditemukan');
        }
    
        if (!password_verify($password, $user['password'])) {
            return redirect()->to('/login')->with('error', 'Password salah');
        }
    
        // Jika berhasil login
        $session->set([
            'id' => $user['id'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ]);
    
        return redirect()->to('/' . $user['role']);
    }    
}
