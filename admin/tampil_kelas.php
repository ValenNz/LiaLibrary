<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
    <!-- CSS ONLY -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha38+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
</head>
<body>
<?php
include"header_admin.php";
?>
<br><br>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>DATA KELAS</h1>
            <form method="POST" action="tampil_kelas.php" class="d-flex">
                <input class="form-control me-2" type="search" name="cari" placeholder="Search"
                       aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">
                    Search
                </button>
            </form>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID KELAS</th>
                    <th scope="col">NAMA KELAS</th>
                    <th scope="col">KELOMPOK</th>
                    <th scope="col">AKSI</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include "koneksi.php";
                global $conn;
            if (isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $query_kelas = mysqli_query($conn,"select * from kelas where id_kelas = '$cari' or nama_kelas like '%$cari%' or kelompok like '%$cari%'");
            }
            else{
                $query_kelas = mysqli_query($conn, "select * from kelas");
            }
            while($data_kelas = mysqli_fetch_array($query_kelas)){
                ?>
                <tr>
                    <td><?=$data_kelas['id_kelas']?></td>
                    <td><?=$data_kelas['nama_kelas']?></td>
                    <td><?=$data_kelas['kelompok']?></td>
                    <td>
                        <a href="ubah_kelas.php?id_kelas=
                <?=$data_kelas['id_kelas']?>" class="btn btn-success">Edit</a>
                        <a href="hapus_kelas.php?id_kelas=
                <?=$data_kelas['id_kelas']?>"
                           class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus data ini?'")>Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
                </tbody>
            </table>
            <a href="tambah_kelas.php" type="button" class="btn btn-primary">+ Tambah
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"></script>
</body>
</html>