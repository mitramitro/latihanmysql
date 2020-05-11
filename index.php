<?php 
  $conn = mysqli_connect('localhost','root','','latihanweb');
  if(!$conn){
	    echo "koneksi host berhasil.";
    };
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Group By dan Count</title>
  </head>
  <body>
  <div class="container">
  <!-- --------------------------All Data-------------------------------------- -->
    <h2>Penggunaan groupby dan count </h2>
    <h3>Seluruh data siswa yang melakukan absen</h3>
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal Masuk</th>
    </tr>
  </thead>

  <tbody>
    <?php 
      $data = mysqli_query($conn,'SELECT * FROM siswa');
      $no=1;
      while($row = mysqli_fetch_array($data)){    
    ?>
    <tr>
      <td><?= $no ?> </td>
      <td><?= $row["nama_siswa"] ?></td>
      <td><?= $row["tanggal_masuk"] ?></td>
      
    </tr>

      <?php
      $no++;
      } ?>
  </tbody>
</table>

  <!-- --------------------------Menghitung total kehadiran tiap siswa-------------------------------------- -->
<h3>Menghitung total kehadiran tiap siswa</h3>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Total Kehadiran</th>
    </tr>
  </thead>

  <tbody>
    <?php 
      $data = mysqli_query($conn,'SELECT nama_siswa, count(nama_siswa) as total_kehadiran FROM siswa GROUP BY nama_siswa');
      $no=1;
      while($row = mysqli_fetch_array($data)){
    ?>
    <tr>
      <td><?= $no ?> </td>
      <td><?= $row["nama_siswa"] ?></td>
      <td><?= $row["total_kehadiran"].' kali Hadir' ?></td>
    </tr>

    <?php
      $no++;
      } ?>
  </tbody>
</table>


<!-- --------------------------Menghitung total kehadiran tiap siswa-------------------------------------- -->

<h3>Menghitung Jumlah Siswa yang hadir </h3>
<table class="table table-bordered" >
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Jumlah Siswa yang hadir </th>
    </tr>
  </thead>

  <tbody>
    <?php 
      $data = mysqli_query($conn,'SELECT tanggal_masuk, count(nama_siswa) as total_kehadiran FROM siswa GROUP BY tanggal_masuk');
      $no=1;
      while($row = mysqli_fetch_array($data)){
    ?>
    <tr>
      <td><?= $no ?> </td>
      <td><?= $row["tanggal_masuk"] ?></td>
      <td><?= $row["total_kehadiran"].' Siswa yang hadir' ?></td>
    </tr>

    <?php
      $no++;
      } ?>
  </tbody>
</table>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>