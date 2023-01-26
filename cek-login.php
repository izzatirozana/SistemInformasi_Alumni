<?php 
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
 

$sql = "select * from user where username='$username' and password='$password'";
$result = $koneksi->query($sql);

if($result->num_rows > 0){
  session_start();
  $_SESSION['username'] = $username;
  $_SESSION['status'] = "login";
  header("location:index.php");
}else{
  header("location:login-salah.php"); 
}

?>