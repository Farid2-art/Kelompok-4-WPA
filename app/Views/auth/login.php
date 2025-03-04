<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login | Groowy Clinic</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>
    <h2>Login ke Groowy Clinic</h2>
    <?= session()->getFlashdata('error'); ?>
    <form method="post" action="<?= base_url('/login'); ?>">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
