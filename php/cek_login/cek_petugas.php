<?php 

// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi/koneksi.php';

if (isset($_POST['masuk-petugas'])){
	// menangkap data yang dikirim dari form login
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if(!empty($username) || !empty($password)){

		// menyeleksi data user dengan username dan password yang sesuai
		$login = mysqli_query($koneksi,"select * from petugas where username='$username' and password='$password'");
		// menghitung jumlah data yang ditemukan
		$cek = mysqli_num_rows($login);

		// cek apakah username dan password di temukan pada database
		if($cek > 0){

			$data = mysqli_fetch_assoc($login);

			// cek jika user login sebagai admin
			if($data['level']=="admin"){

				// buat session login dan username
				$_SESSION['id_petugas'] = $id_petugas;
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['level'] = "admin";
				// alihkan ke halaman dashboard admin
				header("location:../../administator/beranda.html");

			// cek jika user login sebagai pegawai
			}else if($data['level']=="petugas"){
				// buat session login dan username
				$_SESSION['id_petugas'] = $id_petugas;
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['level'] = "petugas";
				// alihkan ke halaman dashboard pegawai
				header("location:../../petugas/beranda.html");

			}else{

				// alihkan ke halaman login kembali
				header("location:../../login-petugas.php?info=gagal");
			}	
		}else{
			header("location:../../login-petugas.php?info=gagal");
		}

	}
	
}



?>