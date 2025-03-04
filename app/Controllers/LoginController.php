if (password_verify($password, $user['password'])) {
    session()->set('id', $user['id']);
    return redirect()->to('/konsumen');
} else {
    return redirect()->back()->with('error', 'Email atau password salah');
}
