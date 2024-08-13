<?php
// session start();
if (!empty($_SESSION)) {
} else {
    session_start();
}
?>
<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/components.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

    <title>Login Account</title>




</head>

<body class="bg-primary">
    <div class="container mt-5">
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
                            <img src="../assets/img/avatar/avatar-3.png" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>
                        <h4 class="card-title text-center">Sign in</h4>
                    </div>
                    <div class="card-body">
                        <!-- form berfungsi mengirimkan data input 
                        dengan method post ke proses login dengan paramater get aksi login -->
                        <form method="post" action="proses/crud.php?aksi=login" id="formlogin">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="username" class="form-control" placeholder="masukkan username" type="text"
                                    required="required" autocomplete="off">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" class="form-control" placeholder="******" type="password"
                                    required="required" autocomplete="off">
                            </div> <!-- form-group// -->
                            <div class="form-group">
                                <button type="submit" name="proses_login" class="btn btn-primary btn-block"> Login
                                </button>
                            </div> <!-- form-group// -->
                        </form>
                        <div class="form-group">
                            <a href="index.php"> Kembali ke Home </a>
                        </div> <!-- form-group//-->
                    </div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
            <div class="col-sm-4 ">
            </div>
        </div>
        <script>
            // notifikasi gagal di hide
            <?php if (empty($_GET['get'])) { ?>
                $("#notifikasi").hide();
            <?php } ?>
            var logingagal = function () {
                $("#logout").fadeOut('slow');
                $("#notifikasi").fadeOut('slow');
            };
            setTimeout(logingagal, 4000);
        </script>
</body>


<script src="../assets/modules/jquery.min.js"></script>
<script src="../assets/modules/popper.js"></script>
<script src="../assets/modules/tooltip.js"></script>
<script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="../assets/modules/moment.min.js"></script>
<script src="../assets/js/stisla.js"></script>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/custom.js"></script>

</html>