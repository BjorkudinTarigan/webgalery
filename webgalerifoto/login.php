<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Masuk | Galeri Foto</title>
	<link rel="stylesheet" href="css/style.css">
	<style>
		body {
			background-color: #f0f0f0;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
		}

		#bg-login {
			width: 100%;
			height: 100%;
			object-fit: cover;
			position: absolute;
			z-index: -1;
		}

		.box-login {
			background-color: rgba(255, 255, 255, 0.8);
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			text-align: center;
			max-width: 400px;
			width: 100%;
			box-sizing: border-box;
		}

		.box-login h2 {
			color: #333;
			margin-bottom: 20px;
		}

		.input-control {
			width: 100%;
			padding: 10px;
			margin-bottom: 15px;
			box-sizing: border-box;
			border: 1px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
		}

		.btn {
			width: 100%;
			padding: 10px;
			background-color: #fd7e00;
			color: #fff;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			font-size: 16px;
		}

		.btn:hover {
			background-color: #fd7e00;
		}

		.links {
			margin-top: 15px;
		}

		.links a {
			color: #3498db;
			text-decoration: none;
			margin-right: 10px;
		}
	</style>
</head>

<body>
	<img id="bg-login" src="thejack.avif" alt="background">

	<div class="box-login">
		<h2>Masuk</h2>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input-control">
			<input type="password" name="pass" placeholder="Password" class="input-control">
			<input type="submit" name="submit" value="Login" class="btn">
		</form>
		<?php
		if (isset($_POST['submit'])) {
			session_start();
			include 'db.php';

			$user = mysqli_real_escape_string($conn, $_POST['user']);
			$pass = mysqli_real_escape_string($conn, $_POST['pass']);

			$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . $user . "'AND password = '" . $pass . "'");
			if (mysqli_num_rows($cek) > 0) {
				$d = mysqli_fetch_object($cek);
				$_SESSION['status_login'] = true;
				$_SESSION['a_global'] = $d;
				$_SESSION['id'] = $d->admin_id;
				echo '<script>window.location="dashboard.php"</script>';
			} else {
				echo '<p style="color: red; margin-top: 10px;">Username atau password anda salah</p>';
			}
		}
		?>
		<div class="links">
			<p>Belum punya akun? Daftar <a href="registrasi.php">DISINI</a></p>
			<p>Atau kembali ke <a href="index.php">Beranda</a></p>
		</div>
	</div>
</body>

</html>