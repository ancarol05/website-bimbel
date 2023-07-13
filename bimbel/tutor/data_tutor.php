<?php

session_start();
include '../config.php';

$id_user = $_SESSION['id_user'];
$status_user = query("SELECT status FROM user WHERE id_user = '$id_user'")[0];

$tutor = mysqli_query($conn, "SELECT * FROM tutor WHERE id_user = '$id_user'");
$alamat_asal = mysqli_query($conn, "SELECT * FROM alamat_asal WHERE id_user = '$id_user'");
$alamat_tinggal = mysqli_query($conn, "SELECT * FROM alamat_tinggal WHERE id_user = '$id_user'");
$pengampu_mapel = mysqli_query($conn, "SELECT * FROM pengampu_mapel WHERE id_user = '$id_user'");
$sertifikat = mysqli_query($conn, "SELECT * FROM sertifikat WHERE id_user = '$id_user'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BIMBEL.ID</title>
    <link href="../css/app.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="">
                    <img src="../img/logo-kua.jpeg" alt="" style="width:50px">
                    <span class="align-middle">BIMBEL.ID</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="data_tutor.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data
                                Tutor</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="informasi_medc.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Informasi
                                MEDC</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="../logout.php">
                            <i class="align-middle" data-feather="user-plus"></i> <span
                                class="align-middle">Logout</span>
                        </a>
                    </li>


                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <div>
                    <h3 class="justify-content-start"> BIMBEL.ID </h3>
                </div>

            </nav>

            <main class="content p-4">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">

                            <!-- DATA TUTOR -->
                            <div class="container-fluid p-0">

                                <h2 class="m-2">Data Lengkap Tutor</h2>

                                <div class="table-responsive card p-3">
                                    <table class="table table-stripped" style="text-align: center">
                                        <tr class="bg-secondary text-light">
                                            <th class="col">No</th>
                                            <th class="col">Aksi</th>
                                            <th class="col">Nama</th>
                                            <th class="col">NIK</th>
                                            <th class="col">Tempat Lahir</th>
                                            <th class="col">Tanggal Lahir</th>
                                            <th class="col">Jenis Kelamin</th>
                                            <th class="col">Agama</th>
                                            <th class="col">Kewarganegaraan</th>
                                            <th class="col">No. HP</th>
                                            <th class="col">Email</th>
                                            <th class="col">Gelar Akademi</th>
                                            <th class="col">Institusi Pendidikan Terakhir</th>
                                        </tr>
                                        <?php if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tutor WHERE id_user = '$id_user'")) < 1) : ?>
                                        <tr>
                                            <td colspan="15">Anda belum mengisi data. <br>
                                                <a href="tambah_tutor.php" class="btn btn-facebook">Isi Data</a>
                                            </td>
                                        </tr>
                                        <?php endif; ?>


                                        <?php $i = 1; ?>
                                        <?php foreach ($tutor as $td) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                    $i++; ?>
                                            </td>
                                            <td>
                                                <a href="edit_tutor.php?id_tutor=<?= $td['id_tutor']; ?>"
                                                    class="btn w-100 btn-warning">Edit</a>
                                            </td>
                                            <td>
                                                <?= $td['nama']; ?>
                                            </td>
                                            <td>
                                                <?= $td['nik']; ?>
                                            </td>
                                            <td>
                                                <?= $td['tempat_lahir']; ?>
                                            </td>
                                            <td>
                                                <?= date('d F Y', strtotime($td['tanggal_lahir'])); ?>
                                            </td>
                                            <td>
                                                <?= $td['jenis_kelamin']; ?>
                                            </td>
                                            <td>
                                                <?= $td['agama']; ?>
                                            </td>
                                            <td>
                                                <?= $td['kewarganegaraan']; ?>
                                            </td>
                                            <td>
                                                <?= $td['nohp']; ?>
                                            </td>
                                            <td>
                                                <?= $td['email']; ?>
                                            </td>



                                            <td>
                                                <?= $td['gelar']; ?>
                                            </td>
                                            <td>
                                                <?= $td['pendidikan_terakhir']; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>


                            <!-- DATA MAPEL YANG DIAMPU -->
                            <div class="container-fluid p-0">

                                <div class="d-flex justify-content-between m-2">
                                    <h2>Data Mapel yang diampu</h2>
                                    <a href="tambah_pengampu_mapel.php" class="btn btn-facebook">Tambah</a>
                                </div>

                                <div class="table-responsive card p-3">
                                    <table class="table table-stripped" style="text-align: center">
                                        <tr class="bg-secondary text-light">
                                            <th class="col">No</th>
                                            <th class="col">Aksi</th>
                                            <th class="col">Mata Pelajaran</th>
                                        </tr>

                                        <?php if (mysqli_num_rows($pengampu_mapel) < 1) : ?>
                                        <tr>
                                            <td colspan="3">Belum ada data
                                            </td>
                                        </tr>
                                        <?php endif; ?>

                                        <?php $i = 1; ?>
                                        <?php foreach ($pengampu_mapel as $td) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                    $i++; ?>
                                            </td>
                                            <td>
                                                <a href="hapus_pengampu_mapel.php?id_pengampu_mapel=<?= $td['id_pengampu_mapel']; ?>"
                                                    class="btn w-100 btn-danger">Hapus</a>
                                            </td>
                                            <td>
                                                <?php
                                                    $id_mapel = $td['id_mapel'];
                                                    $mapel = query("SELECT * FROM mapel WHERE id_mapel = '$id_mapel'")[0];
                                                    echo $mapel['nama_mapel'];
                                                    ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>


                            <!-- DATA ALAMAT ASAL -->
                            <div class="container-fluid p-0">

                                <h2 class="m-2">Data Alamat Asal</h2>

                                <div class="table-responsive card p-3">
                                    <table class="table table-stripped" style="text-align: center">
                                        <tr class="bg-secondary text-light">
                                            <th class="col">No</th>
                                            <th class="col">Aksi</th>
                                            <th class="col">Alamat</th>
                                            <th class="col">Prov/Kab/Kec</th>
                                            <th class="col">Kode Pos</th>
                                        </tr>
                                        <?php if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM alamat_asal WHERE id_user = '$id_user'")) < 1) : ?>
                                        <tr>
                                            <td colspan="5">Anda belum mengisi data. <br>
                                                <a href="tambah_alamat_asal.php" class="btn btn-facebook">Isi Data</a>
                                            </td>
                                        </tr>
                                        <?php endif; ?>


                                        <?php $i = 1; ?>
                                        <?php foreach ($alamat_asal as $td) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                    $i++; ?>
                                            </td>
                                            <td>
                                                <a href="edit_alamat_asal.php?id_alamat_asal=<?= $td['id_alamat_asal']; ?>"
                                                    class="btn w-100 btn-warning">Edit</a>
                                            </td>
                                            <td>
                                                <?= $td['alamat']; ?>
                                            </td>
                                            <td>
                                                <?= $td['prov_kab_kec']; ?>
                                            </td>
                                            <td>
                                                <?= $td['kode_pos']; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>

                            </div>

                            <!-- DATA ALAMAT TINGGAL -->
                            <div class="container-fluid p-0">

                                <h2 class="m-2">Data Alamat Tinggal</h2>

                                <div class="table-responsive card p-3">
                                    <table class="table table-stripped" style="text-align: center">
                                        <tr class="bg-secondary text-light">
                                            <th class="col">No</th>
                                            <th class="col">Aksi</th>
                                            <th class="col">Alamat</th>
                                            <th class="col">Prov/Kab/Kec</th>
                                            <th class="col">Kode Pos</th>
                                        </tr>
                                        <?php if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM alamat_tinggal WHERE id_user = '$id_user'")) < 1) : ?>
                                        <tr>
                                            <td colspan="5">Anda belum mengisi data. <br>
                                                <a href="tambah_alamat_tinggal.php" class="btn btn-facebook">Isi
                                                    Data</a>
                                            </td>
                                        </tr>
                                        <?php endif; ?>


                                        <?php $i = 1; ?>
                                        <?php foreach ($alamat_tinggal as $td) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                    $i++; ?>
                                            </td>
                                            <td>
                                                <a href="edit_alamat_tinggal.php?id_alamat_tinggal=<?= $td['id_alamat_tinggal']; ?>"
                                                    class="btn w-100 btn-warning">Edit</a>
                                            </td>
                                            <td>
                                                <?= $td['alamat']; ?>
                                            </td>
                                            <td>
                                                <?= $td['prov_kab_kec']; ?>
                                            </td>
                                            <td>
                                                <?= $td['kode_pos']; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>

                            </div>

                            <!-- DATA SERTIFIKAT -->
                            <div class="container-fluid p-0">

                                <div class="m-2 d-flex justify-content-between">
                                    <h2>Data Sertifikat</h2>
                                    <a href="tambah_sertifikat.php" class="btn btn-facebook">Tambah</a>
                                </div>

                                <div class="table-responsive card p-3">
                                    <table class="table table-stripped" style="text-align: center">
                                        <tr class="bg-secondary text-light">
                                            <th class="col">No</th>
                                            <th class="col">Aksi</th>
                                            <th class="col">No Sertifikat</th>
                                            <th class="col">Tanggal Sertifikat</th>
                                            <th class="col">Nama Program</th>
                                            <th class="col">File</th>
                                        </tr>
                                        <?php if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sertifikat WHERE id_user = '$id_user'")) < 1) : ?>
                                        <tr>
                                            <td colspan="5">Anda belum mengisi data. <br>
                                                <a href="tambah_sertifikat.php" class="btn btn-facebook">Isi
                                                    Data</a>
                                            </td>
                                        </tr>
                                        <?php endif; ?>


                                        <?php $i = 1; ?>
                                        <?php foreach ($sertifikat as $td) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                    $i++; ?>
                                            </td>
                                            <td>
                                                <a href="edit_sertifikat.php?id_sertifikat=<?= $td['id_sertifikat']; ?>"
                                                    class="btn w-100 btn-warning">Edit</a>
                                                <a href="hapus_sertifikat.php?id_sertifikat=<?= $td['id_sertifikat']; ?>"
                                                    class="btn w-100 btn-danger"
                                                    onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                                            </td>
                                            <td>
                                                <?= $td['no_sertifikat']; ?>
                                            </td>
                                            <td>
                                                <?= $td['tanggal_sertifikat']; ?>
                                            </td>
                                            <td>
                                                <?= $td['nama_program']; ?>
                                            </td>
                                            <td>
                                                <a href="../data/<?= $td['file_sertifikat']; ?>"
                                                    download="">Download</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </main>

        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>