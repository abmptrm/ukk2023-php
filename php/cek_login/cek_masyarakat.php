<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi/koneksi.php';

if (isset($_POST['masuk-masyarakat'])) {

	// menangkap data yang dikirim dari form login
	$username = $_POST['username'];
	$password = md5($_POST['password']);


	// menyeleksi data user dengan username dan password yang sesuai
	$login = mysqli_query($koneksi,"select * from masyarakat where username='$username' and password='$password'");
	// menghitung jumlah data yang ditemukan
	$cek = mysqli_num_rows($login);

	// cek apakah username dan password di temukan pada database
	if($cek > 0){

		$_SESSION['username'] = $username;
		$_SESSION['nik'] = $nik;
		$_SESSION['nama'] = $nama;
		$_SESSION['status'] = "login";

		header("location: ../../index.html");

		
	}else{
		header("location: ../../login.html?info=gagal");
	}

}




?>