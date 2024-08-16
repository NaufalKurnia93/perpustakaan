<?php

$pdo = dataBase::connect();
$user = Access::getInstance($pdo);


if ($user->cekLogin()) {
	header("Location: ../index.php");
}

if (isset($_POST["buat"])) {
	$nama = htmlspecialchars($_POST["nama"]);
	$username = htmlspecialchars($_POST["username"]);
	$email = htmlspecialchars($_POST["email"]);
	$no_telp = htmlspecialchars($_POST["no_telp"]);
	$password = htmlspecialchars($_POST["password"]);


	if ($user->new_user($nama, $username, $email, $no_telp, $password)) {
		$success = true;
	} else {
		$error = $user->getError();
	}
}

?>


<!DOCTYPE HTML>
<html>

<head>
	<title>akun baru</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background:#586df5;">
	<div class="container">

		<div class="row">
			<div class="col-sm-3"> 
				<span style="color:#fff" ;>Selamat Datang,<?php echo $sesi['nama']; ?></span> 
			</div>
			<div class="col-lg-6">
				<br />
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Buat Akun</h4>
					</div>
					<div class="card-body">
						<form action="" method="POST">
							<div class="form-group">
								<label>Nama </label>
								<input type="text" value="" class="form-control" name="nama" required>
							</div>

							<div class="form-group">
								<label>Email</label>
								<input type="harga" value="" class="form-control" name="email" required>
							</div>

							<div class="form-group">
								<label>Telepon</label>
								<input type="number" value="" class="form-control" name="no_telp" required>
							</div>

							<div class="form-group">
								<label>Username</label>
								<input type="text" value="" class="form-control" name="username" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" value="" class="form-control" name="password" required>
							</div>
							<button class="btn btn-primary btn-md" name="buat"><i class="fa fa-plus"> </i> Buat
								akun</button>
						</form>
					</div>
				</div>
				<div class="pt-3">
					<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span
							class="fa fa-home"></span> Kembali</a>
					<a href="index.php?access=forgout" class="btn btn-danger btn-md float-right"><span
							class="fa fa-sign-out"></span> Logout</a>
				</div>
			</div>
			<div class="col-sm-3">

			</div>
		</div>
	</div>
</body>

</html>