<?php
//koneksi ke database
include 'koneksi.php';

//menangkap data
$NISN = $_POST['NISN'];
$Thn_masuk = $_POST['Thn_masuk'];
$Universitas = $_POST['Universitas'];
$Fakultas = $_POST['Fakultas'];
$Jurusan = $_POST['Jurusan'];

//update data ke db
mysqli_query($koneksi, "update alumni set Thn_masuk='$Thn_masuk', Universitas='$Universitas',  Fakultas='$Fakultas', Jurusan='$Jurusan' where NISN='$NISN'");

header("location:index.php");

?>