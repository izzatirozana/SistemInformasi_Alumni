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
	<div class="card text-center">
	  <div class="card-header">
	    <ul class="nav nav-tabs card-header-tabs">
	      <li class="nav-item">
	        <a class="nav-link text-secondary" href="index.php">Biodata Siswa</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link active" href="alumni.php">Pendataan Alumni</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link text-secondary" href="cek-logout.php">Logout</a>
	      </li>
	    </ul>

		</div>
		<!-- tutup navbar-->


	  <div class="card-body">
	  	<!-- <a href="tambah.php" type="button" class="btn btn-outline-secondary btn-lg btn-block" >Input Data Baru</a>
	  	<br> -->
	  	<!--Awal pencarian-->
	    <form >
			  <div class="row">
			    <div class="col">
			      <!-- <input type="text" class="form-control" placeholder="First name"> -->
			      <select class="form-control" id="Kolom" name="Kolom" required="">
								<?php
									$kolom=(isset($_GET['Kolom']))? $_GET['Kolom'] :"";
								?>
								<!-- <option value="NISN" <?php if ($kolom=="NISN") echo "selected"; ?>>NISN</option> -->
								<option value="Nama" <?php if ($kolom=="Nama") echo "selected"; ?>>Nama Lengkap</option>
								<option value="Thn_masuk" <?php if ($kolom=="Thn_masuk") echo "selected"; ?>>Tahun Masuk</option>
								<option value="Universitas" <?php if ($kolom=="Universitas") echo "selected"; ?>>Nama Universitas</option>
								<option value="Fakultas" <?php if ($kolom=="Fakultas") echo "selected"; ?>>Nama Fakultas</option>
								<option value="Jurusan" <?php if ($kolom=="Jurusan") echo "selected"; ?>>Nama Jurusan</option>
							</select>
			    </div>
			    <div class="col">
			      <input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Kata kunci.." required="" autocomplete="off" value="<?php if (isset($_GET['KataKunci'])) echo $_GET['KataKunci']; ?>">
			    </div>
			  </div>
			  <div class="mt-3 d-flex bd-highlight">
				  <div class="mt-3 flex-grow-1 bd-highlight" style="display: flex;">
				  	<button type="submit" class="btn btn-success mr-3">Cari</button>
						<a href="alumni.php" class="btn btn-danger">Reset</a>
				  </div>
				  <div class="mt-3 bd-highlight">
				  	<a class="btn btn-warning text-white" href="input.php" role="button">[-] TAMBAH DATA BARU</a>
					</div>
				</div>
			</form>
			<!--tutup pencarian-->


			<br/>
			<table class="table table-stripped table-bordered table-hover">
				<thead>
				<tr>
					<th>No</th>
					<!-- <th>NISN</th> -->
					<th>Nama Lengkap</th>
					<th>Tahun Masuk</th>
					<th>Nama Universitas</th>
					<th>Fakultas</th>
					<th>Jurusan</th>
					<th>Opsi</th>
				</tr>
				</thead>
			<tbody>
				<?php
				include "koneksi.php";
				$page = (isset($_GET['page']))? (int) $_GET['page'] :1;

				$kolomCari=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";

				$kolomKataKunci=(isset($_GET['KataKunci']))? $_GET['KataKunci'] : "";

				$limit = 2;
				$limitStart = ($page - 1) * $limit;

				//kondisi jika parameter kosong
				if($kolomCari=="" && $kolomKataKunci==""){
					$SqlQuery = mysqli_query($koneksi, "select * from alumni INNER JOIN bio_siswa ON alumni.NISN=bio_siswa.NISN limit $limitStart, $limit");
				}else{
					//kondisi terisi
					$SqlQuery = mysqli_query($koneksi, "select * from alumni INNER JOIN bio_siswa ON alumni.NISN=bio_siswa.NISN where $kolomCari like '%$kolomKataKunci%' limit $limitStart, $limit");
				}

				$no = $limitStart + 1;
				while($row = mysqli_fetch_array($SqlQuery)){
					?>
			<tr>
				<td><?php echo $no++; ?></td>
				<!-- <td><?php echo $row['NISN']; ?></td> -->
				<td><?php echo $row['Nama']; ?></td>
				<td><?php echo $row['Thn_masuk']; ?></td>
				<td><?php echo $row['Universitas']; ?></td>
				<td><?php echo $row['Fakultas']; ?></td>
				<td><?php echo $row['Jurusan']; ?></td>
				<td>		
					<a class="btn btn-warning btn-sm" href="edit-alumni.php?NISN=<?php echo $row['NISN']; ?>">Edit</a>
					<a class="btn btn-danger btn-sm" href="hapus-alumni.php?NISN=<?php echo $row['NISN']; ?>"
						onclick="return confirm('apakah anda yakin akan menghapus data ini?')">Hapus</a>
				</td>
			</tr>
					<?php
				}
				?>
			</tbody>
			</table>
			
			<nav aria-label="Page navigation example">
			  <ul class="pagination justify-content-end">
			  	<?php
						if($page ==1){
					?>
			    <li class="page-item disabled">
			      <a class="page-link" href="#">Previous</a>
			    </li>
			    <?php
						}
						else{
							$LinkPrev = ($page > 1)? $page -1 : 1;
							if($kolomCari=="" && $kolomKataKunci==""){
								?>
								<li class="page-item"><a class="page-link" href="alumni.php?page=<?php echo $LinkPrev ?>">Previous</a></li>
								<?php
							}else{
								?>
								<li class="page-item" ><a class="page-link" href="alumni.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo  $LinkPrev ?>">Previous</a></li>
								<?php
							}
						}
						?>

						<!-- kondisi jika parameter pencarian kosong -->
						<?php
						if($kolomCari=="" && $kolomKataKunci==""){
							$SqlQuery = mysqli_query($koneksi, "select * from alumni INNER JOIN bio_siswa ON alumni.NISN=bio_siswa.NISN");
						}else{
							//kondisi jika parameter kolom pencarian diisi
							$SqlQuery = mysqli_query($koneksi, "select * from alumni INNER JOIN bio_siswa ON alumni.NISN=bio_siswa.NISN where $kolomCari like '%$kolomKataKunci%' limit $limitStart, $limit");
						}

						$jumlahData = mysqli_num_rows($SqlQuery);
						$jumlahPage = ceil($jumlahData / $limit);
						$jumlahNumber = 1;
						$startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1;
						$endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage;

						for($i = $startNumber; $i <= $endNumber; $i++){
							$linkActive = ($page == $i)? ' class="page-item active"' : '';
							if($kolomCari=="" && $kolomKataKunci==""){
								?>
								<li<?php echo $linkActive; ?>><a class="page-link" href="alumni.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>

							<?php
							}else{
								?>
								<li <?php echo $linkActive; ?>><a class="page-link" href="alumni.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
								<?php
							}
						}
						?>

						<!-- Link next page -->
						<?php
						if($page == $jumlahPage){
							?>
							<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
							<?php
						}
						else{
							$linkNext = ($page < $jumlahPage)? $page +1 : $jumlahPage;
							if($kolomCari=="" && $kolomKataKunci==""){
								?>
								<li class="page-item"><a class="page-link" href="alumni.php?page=<?php echo $linkNext; ?>">Next</a></li>
								<?php
							}else{
								?>
								<li class="page-item"><a class="page-link" href="alumni.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $linkNext; ?>">Next</a></li>
								<?php
							}
						}
						?>
			  </ul>
			</nav>

	  </div>
	  <div class="card-footer text-muted font-weight-lighter">
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

