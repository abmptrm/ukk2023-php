<?php
    $koneksi = mysqli_connect("localhost", "root", "", "ukk-pengaduan");
    if (mysqli_connect_errno()){
        echo "Error connecting : " . mysqli_connect_error();
    }
?>