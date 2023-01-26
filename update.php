<?php
//koneksi ke database
include 'koneksi.php';

//menangkap data
$NISN = $_POST['NISN'];
$Nama = $_POST['Nama'];
$jk = $_POST['jk'];
$Angkatan = $_POST['Angkatan'];
$Alamat = $_POST['Alamat'];
$No_telp = $_POST['No_telp'];

//update data ke db
mysqli_query($koneksi, "update bio_siswa set Nama='$Nama', jk='$jk',  Angkatan='$Angkatan', Alamat='$Alamat', No_telp='$No_telp' where NISN='$NISN'");

header("location:index.php");

?>