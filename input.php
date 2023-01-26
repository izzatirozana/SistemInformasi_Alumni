<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

      <!-- BUKA HEADER -->
      <div class="container">
      <div class="card mt-5"></div>
      <div class="card text-center">
        <div class="card-header bg-primary text-white">
          <h2>PENDATAAN ALUMNI SMA BAYANGAN BOGOR</h2>
        </div>
      </div>
      </div>
      <!-- TUTUP HEADER -->

      <!-- Awal navbar -->
      <div class="container mt-3">
      <div class="card ">
        <div class="card-header text-center">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link text-secondary" >Biodata Siswa</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Biodata </a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link active" href="#">Pendataan Alumni</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-secondary" href="#">Logout</a>
            </li>
          </ul>
        </div>
        <!-- tutup navbar-->

        <div class="card-body" >
          <div class="d-flex justify-content-end">
            <a type="button" class="btn btn-outline-warning disabled" style="margin-right: 5px;">Input Data Alumni</a>
            <a class="btn btn-warning text-white" href="alumni.php" role="button">Kembali</a>
          </div>

          <div class="card mt-3" >
            <div class="card-body" >
              <!-- AWAL FORM -->
              <form method="post" action="input-aksi.php">
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <!-- <input type="number" class="form-control" name="NISN"> -->
                    <select class="form-control" name="NISN" onfocus="this.size=5" onblur='this.size=1;' onchange='this.size=1; this.blur()';>
                      <option disabled selected value="">Pilih</option>
                      <?php
                      include "koneksi.php";

                      $sql = mysqli_query($koneksi, "select * from bio_siswa");
                      while ($hasil=mysqli_fetch_array($sql)) :
                        ?>

                        <option value ="<?php echo $hasil['NISN'] ?>"><?php echo $hasil['Nama'] ?></option>

                      <?php endwhile; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Tahun Masuk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Thn_masuk" >
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Nama Universitas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Universitas" >
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Fakultas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Fakultas" >
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Jurusan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Jurusan" >
                  </div>
                </div>
                <div class=" d-flex justify-content-end">
                    <button type="submit" class="btn btn-success ">SIMPAN</button>
                </div>
              </form>
              <!-- AKHIR FORM -->
            </div>
          </div>

        </div>

        <div class="card-footer text-muted font-weight-lighter text-center">
          Dibuat untuk tugas Project UTS dengan penuh perjuangan dan jerih payah.
        </div>
      </div>
      </div>


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