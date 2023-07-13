<?php

session_start();
include '../config.php';

$id_tutor = $_GET['id_tutor'];
$tutor = query("SELECT * FROM tutor WHERE id_tutor = '$id_tutor'")[0];
$id_user_tutor = $tutor['id_user'];


$alamat_asal = query("SELECT * FROM alamat_asal WHERE id_user = '$id_user_tutor'")[0];
$alamat_tinggal = query("SELECT * FROM alamat_tinggal WHERE id_user = '$id_user_tutor'")[0];
$pengampu_mapel = mysqli_query($conn, "SELECT * FROM pengampu_mapel WHERE id_user = '$id_user_tutor'");
$sertifikat = mysqli_query($conn, "SELECT * FROM sertifikat WHERE id_user = '$id_user_tutor'");

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
                        <a class="sidebar-link" href="data_medc.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data MEDC</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="data_siswa.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data
                                Siswa</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pembayaran.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Pembayaran
                            </span>
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

                    <a href="data_tutor.php" class="btn btn-outline-danger mb-3">Kembali</a>

                    <!-- DATA MAPEL YANG DIAMPU -->
                    <div class="container-fluid p-0">

                        <div class="d-flex justify-content-between m-2">
                            <h2>Data Mapel yang diampu</h2>
                            <a href="tambah_pengampu_mapel.php?id_user_tutor=<?= $id_user_tutor; ?>"
                                class="btn btn-facebook">Tambah</a>
                        </div>

                        <div class="table-responsive card p-3">
                            <table class="table table-stripped" style="text-align: center">
                                <tr class="bg-secondary text-light">
                                    <th class="col">No</th>
                                    <th class="col" style="width: 15%">Aksi</th>
                                    <th class="col">Mata Pelajaran</th>
                                </tr>

                                <?php $i = 1; ?>
                                <?php foreach ($pengampu_mapel as $td) : ?>
                                <tr>
                                    <td>
                                        <?php echo $i;
                                            $i++; ?>
                                    </td>
                                    <td>
                                        <a href="edit_pengampu_mapel.php?id_pengampu_mapel=<?= $td['id_pengampu_mapel']; ?>&id_user_tutor=<?= $id_user_tutor ?>"
                                            class="btn w-100 btn-warning">Edit</a>
                                        <a onclick="return confirm('Yakin ingin hapus ?')"
                                            href="hapus_pengampu_mapel.php?id_pengampu_mapel=<?= $td['id_pengampu_mapel']; ?>"
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
                    <br>
                    <div class="container-fluid p-0">

                        <div class="d-flex justify-content-between m-2">
                            <h2>Data Alamat Asal</h2>
                        </div>

                        <div class="table-responsive card p-3">
                            <table class="table table-stripped" style="text-align: center">
                                <tr class="bg-secondary text-light">
                                    <th class="col">No</th>
                                    <th class="col" style="width: 15%">Aksi</th>
                                    <th class="col">Alamat</th>
                                    <th class="col">Prov/Kab/Kec</th>
                                    <th class="col">Kode Pos</th>
                                </tr>

                                <?php $i = 1; ?>
                                <tr>
                                    <td>
                                        <?php echo $i;
                                        $i++; ?>
                                    </td>
                                    <td>
                                        <a href="edit_alamat_asal.php?id_alamat_asal=<?= $alamat_asal['id_alamat_asal']; ?>&id_user_tutor=<?= $id_user_tutor ?>"
                                            class="btn w-100 btn-warning">Edit</a>
                                        <!-- <a onclick="return confirm('Yakin ingin hapus ?')"
                                            href="hapus_alamat_asal.php?id_alamat_asal=<?= $alamat_asal['id_alamat_asal']; ?>"
                                            class="btn w-100 btn-danger">Hapus</a> -->

                                    </td>
                                    <td>
                                        <?= $alamat_asal['alamat']; ?>
                                    </td>
                                    <td>
                                        <?= $alamat_asal['prov_kab_kec']; ?>
                                    </td>
                                    <td>
                                        <?= $alamat_asal['kode_pos']; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <!-- DATA ALAMAT TINGGAL -->
                    <br>
                    <div class="container-fluid p-0">

                        <div class="d-flex justify-content-between m-2">
                            <h2>Data Alamat Tinggal</h2>
                        </div>

                        <div class="table-responsive card p-3">
                            <table class="table table-stripped" style="text-align: center">
                                <tr class="bg-secondary text-light">
                                    <th class="col">No</th>
                                    <th class="col" style="width: 15%">Aksi</th>
                                    <th class="col">Alamat</th>
                                    <th class="col">Prov/Kab/Kec</th>
                                    <th class="col">Kode Pos</th>
                                </tr>
                                <?php $i = 1; ?>
                                <tr>
                                    <td>
                                        <?php echo $i;
                                        $i++; ?>
                                    </td>
                                    <td>
                                        <a href="edit_alamat_tinggal.php?id_alamat_tinggal=<?= $alamat_tinggal['id_alamat_tinggal']; ?>&id_user_tutor=<?= $id_user_tutor ?>"
                                            class="btn w-100 btn-warning">Edit</a>
                                        <!-- <a onclick="return confirm('Yakin ingin hapus ?')"
                                            href="hapus_alamat_tinggal.php?id_alamat_tinggal=<?= $alamat_tinggal['id_alamat_tinggal']; ?>"
                                            class="btn w-100 btn-danger">Hapus</a> -->
                                    </td>
                                    <td>
                                        <?= $alamat_tinggal['alamat']; ?>
                                    </td>
                                    <td>
                                        <?= $alamat_tinggal['prov_kab_kec']; ?>
                                    </td>
                                    <td>
                                        <?= $alamat_tinggal['kode_pos']; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>

                    <!-- DATA SERTIFIKAT -->
                    <br>
                    <div class="container-fluid p-0">

                        <div class="d-flex justify-content-between m-2">
                            <h2>Data Sertifikat</h2>
                            <a href="tambah_sertifikat.php?id_user_tutor=<?= $id_user_tutor ?>"
                                class="btn btn-facebook">Tambah</a>
                        </div>

                        <div class="table-responsive card p-3">
                            <table class="table table-stripped" style="text-align: center">
                                <tr class="bg-secondary text-light">
                                    <th class="col">No</th>
                                    <th class="col" style="width:15%">Aksi</th>
                                    <th class="col">No Sertifikat</th>
                                    <th class="col">Tanggal Sertifikat</th>
                                    <th class="col">Nama Program</th>
                                    <th class="col">File</th>
                                </tr>

                                <?php $i = 1; ?>
                                <?php foreach ($sertifikat as $td) : ?>
                                <tr>
                                    <td>
                                        <?php echo $i;
                                            $i++;
                                            ?>
                                    </td>
                                    <td>
                                        <a href="edit_sertifikat.php?id_sertifikat=<?= $td['id_sertifikat']; ?>"
                                            class="btn w-100 btn-warning">Edit</a>
                                        <a onclick="return confirm('Yakin ingin hapus ?')"
                                            href="hapus_sertifikat.php?id_sertifikat=<?= $td['id_sertifikat']; ?>"
                                            class="btn w-100 btn-danger">Hapus</a>

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
                                        <a href="../data/<?= $td['file_sertifikat']; ?>" download="">Download</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>

                    </div>


                </div>
            </main>

        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>