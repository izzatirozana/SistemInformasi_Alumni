<?php 
//koneksi database
include 'koneksi.php';

//menangkap data id yang dikirim dari url
$NISN = $_GET['NISN'];

//menghapus data dari database
mysqli_query($koneksi, "delete from bio_siswa where NISN='$NISN'");

//mengalihkan halaman kembali ke index.php
header("location:index.php");

?>