<?php 

//koneksi db
include 'koneksi.php';

//menangkap data yang di kirim
$NISN = $_POST['NISN'];
$Nama = $_POST['Nama'];
$jk = $_POST['jk'];
$Angkatan = $_POST['Angkatan'];
$Alamat = $_POST['Alamat'];
$No_telp = $_POST['No_telp'];

//menginput ke db
mysqli_query($koneksi,"insert into bio_siswa values('$NISN', '$Nama','$jk', '$Angkatan', '$Alamat','$No_telp')");

//mengalihkan kembali ke index.php
header("location:index.php");

 ?>