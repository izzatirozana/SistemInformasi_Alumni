<?php
$koneksi = mysqli_connect("localhost","root","","uts");

//check connection
if (mysqli_connect_errno()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
// } else{
// 		echo "Terkoneksi ke MySQL! <br>";
	}
?>