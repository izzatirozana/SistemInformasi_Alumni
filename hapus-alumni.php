<?php 
//koneksi database
include 'koneksi.php';

//menangkap data id yang dikirim dari url
$NISN = $_GET['NISN'];

//menghapus data dari database
mysqli_query($koneksi, "delete from alumni where NISN='$NISN'");

//mengalihkan halaman kembali ke index.php
header("location:alumni.php");

?>