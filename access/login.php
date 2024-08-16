<?php
// Menghubungkan ke database menggunakan PDO
include_once "database/koneksi.php";
include_once "database/class/access.php";

$pdo = dataBase::connect();
$user = Access::getInstance($pdo);

// Memeriksa apakah form login telah disubmit
if (isset($_POST['login'])) {
    // Mengambil dan membersihkan input dari form
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Memeriksa apakah nama pengguna dan kata sandi benar
    if ($user->login($username, $password)) {
        header('Location: index.php');
        exit;
    } else {
        // login gagal
        $error = $user->getError();
    }
}
?>

<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <title>Login Account</title>
</head>

<body class="bg-primary">
    <div class="container mt-5">
        <section class="section">
            <div class="row ">
                <div class="col-sm-5 offset-sm-4 ">
                    <!-- <br /><br /> -->

                    <div id="logout">
                        <?php if (isset($_GET['signout'])) { ?>
                            <div class="alert alert-success">
                                <small>Anda Berhasil Logout</small>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="notifikasi">
                        <div class="alert alert-danger">
                            <small>Login Anda Gagal, Periksa Kembali Username dan Password</small>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-block">
                            <div class="login-brand m-0 p-1">
                                <img src="assets/img/avatar/avatar-3.png" alt="logo" width="100"
                                    class="shadow-light rounded-circle">
                            </div>
                            <h4 class="card-title text-center">Sign in</h4>
                        </div>
                        <div class="card-body">
                            <!-- form berfungsi mengirimkan data input 
                        dengan method post ke proses login dengan paramater get aksi login -->
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" class="form-control" placeholder="masukkan username"
                                        type="text" required="required" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" class="form-control" placeholder="******" type="password"
                                        required="required" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="login" class="btn btn-primary btn-block"> Login
                                    </button>
                                </div>
                            </form>
                            <div class="pt-2 text-center text-muted ">
                                <p>Belum Memiliki Akun?. <a href="index.php?access=register">Buat Akun</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <div class="col-sm-4 ">
                </div>
            </div>
        </section>
    </div>
</body>


<script src="assets/modules/jquery.min.js"></script>
<script src="assets/modules/popper.js"></script>
<script src="assets/modules/tooltip.js"></script>
<script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="assets/modules/moment.min.js"></script>
<script src="assets/js/stisla.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>

</html>