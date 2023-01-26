<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <?php
      //menyertakan file program koneksi.php pada register
      require('koneksi.php');
      //inisialisasi session
      session_start();

      $error = '';
      $validate = '';
      // if( isset($_SESSION['user']) ) header('Location: index.php');
      //mengecek apakah data username yang diinputkan user kosong atau tidak
      if( isset($_SESSION['submit']) ){
        // menghilangkan backshlases
        $username = stripslashes($_POST['username']);
        //cara sederhana mengamankan sql injection
        $username = mysqli_real_escape_string($koneksi, $username);
        $name = stripslashes($_POST['name']);
        $name = mysqli_real_escape_string($koneksi, $name);
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($koneksi, $email);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($koneksi, $password);
        $repass = stripslashes($_POST['repassword']);
        $repass = mysqli_real_escape_string($koneksi, $username);
        //cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
        if (!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))) {
          // mengecek apakah password yang diinputkan sama dengan re-password yang diinputkan kembali
          if ($password == $repass) {
            // memanggil method cek nama untuk mengecek apakah user sudah terdaftar atau belom
            if ( cek_name($name, $koneksi) == 0) {
              // hashing password sebelum disimpan didatabase
              $pass = password_hash($password, PASSWORD_DEFAULT);
              //insert data ke database
              $query = "INSERT INTO users (username, name, email, password) values ('$username'. '$name', '$email', '$password') ";
              $result = mysqli_query($koneksi, $query);
              //jika insert data berhasil maka akan diredirect ke halaman index.php serta menyimpan data username ke session
              if ($result) {
                 $_SESSION['username'] = $username;
                 header('Location: index.php');

                 //jika gagal maka akan menampilkan pesan error
               } else {
                $error = 'Register User Gagal';
               }
            } else {
              $error = 'Username sudah terdaftar';
            }
          } else {
            $validate = 'password tidak sama';
          }
        } else {
          $error = 'Data tidak boleh kosong';
        }
      }

      //fungsi untuk mengecek username apakah sudah terdaftar atau belum
      function cek_nama($username, $koneksi){
        $nama = mysqli_real_escape_string($koneksi, $username);
        $query = "SELECT * from users where username = '$nama'";
        if ( $result = mysqli_query($koneksi, $query) ) return mysqli_num_rows($result);
      }
  ?>

<!--  <div class="container-sm ">
      <div class="card mt-5 " style="background-color: #508bfc;">
      <section class="container-fluid mt-5 mb-4" >
      <section class="row justify-content-center">
      <section class="col-12 col-sm-6 col-md-4"> -->
      <form class="form-container" action="register.php" method="POST">
      <section class="vh-100" style="background-color: #508bfc;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <h3 class="mb-5">SIGN UP</h3>
                <!-- <h4 class="text-center font-weight-bold">SIGN UP</h4> -->
                <?php if ($error != '') { ?>
                  <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                <?php 
                } ?>

                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="masukkan nama">
                </div>
                <div class="form-group">
                  <label for="InputEmail">Alamat Email</label>
                  <input type="email" class="form-control" id="InputEmail" name="email" placeholder="masukkan email">
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username">
                </div>
                <div class="form-group">
                  <label for="InputPassword">Password</label>
                  <input type="password" class="form-control" id="InputPassword" name="password" placeholder="masukkan Password">
                  <?php if ($validate != '') { ?>
                    <p class="text-danger"><?= $validate; ?></p>
                  <?php
                  } ?>
                </div>
                <div class="form-group">
                  <label for="InputPassword">Re-Password</label>
                  <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="masukkan Re-Password">
                  <?php if ($validate != '') { ?>
                    <p class="text-danger"><?= $validate; ?></p>
                    <?php
                  } ?>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                <div class="form-footer mt-2">
                  <p> sudah punya account? <a href="login.php">Login</a></p>
                </div>


                </div>
              </div>
            </div>
          </div>
        </div>
        </section>
        </form>
     <!-- </section>
          </section>
          </section>
          </div>
          </div> -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->

   
  </body>
</html>