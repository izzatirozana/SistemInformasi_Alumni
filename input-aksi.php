<?php 

//koneksi db
include 'koneksi.php';

//menangkap data yang di kirim
$NISN = $_POST['NISN'];
$Thn_masuk = $_POST['Thn_masuk'];
$Universitas = $_POST['Universitas'];
$Fakultas = $_POST['Fakultas'];
$Jurusan = $_POST['Jurusan'];

//menginput ke db
mysqli_query($koneksi,"insert into alumni values('$NISN', '$Thn_masuk','$Universitas', '$Fakultas', '$Jurusan')");

//mengalihkan kembali ke index.php
header("location:alumni.php");

 ?>