<?php

session_start();
include '../config.php';

$id_user = $_SESSION['id_user'];

$siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE id_user = '$id_user'");
$alamat_asal = mysqli_query($conn, "SELECT * FROM alamat_asal WHERE id_user = '$id_user'");
$alamat_tinggal = mysqli_query($conn, "SELECT * FROM alamat_tinggal WHERE id_user = '$id_user'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MEdC - Data Siswa</title>
    <link href="../css/app.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="">
                    <span class="align-middle">MEdC</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="data_siswa.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data
                                Siswa</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="informasi_medc.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Informasi
                                MEDC</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="pembayaran.php">
                            <i class="align-middle" data-feather="user"></i> <span
                                class="align-middle">Pembayaran</span>
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
                    <h3 class="justify-content-start"> Master Education Center </h3>
                </div>

            </nav>

            <main class="content p-4">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="m-2 mb-4">Data Siswa</h2>
                            <div class="card">
                                <div class="card-body">



                                    <!-- DATA TUTOR -->
                                    <div class="container-fluid p-0">

                                        <h2 class="m-2">Data Lengkap Siswa</h2>

                                        <div class="table-responsive card p-3">
                                            <table class="table table-stripped" style="text-align: center">
                                                <tr class="bg-secondary text-light">
                                                    <th class="col">No</th>
                                                    <th class="col">Aksi</th>
                                                    <th class="col">Nama</th>
                                                    <th class="col">Tempat Lahir</th>
                                                    <th class="col">Tanggal Lahir</th>
                                                    <th class="col">Jenis Kelamin</th>
                                                    <th class="col">Agama</th>
                                                    <th class="col">Kewarganegaraan</th>
                                                    <th class="col">No. HP</th>
                                                    <th class="col">Email</th>
                                                    <th class="col">Program Paket</th>
                                                    <th class="col">Nama Sekolah Asal</th>
                                                    <th class="col">Kota Sekolah Asal</th>
                                                </tr>
                                                <?php if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa WHERE id_user = '$id_user'")) < 1) : ?>
                                                <tr>
                                                    <td colspan="15">Anda belum mengisi data. <br>
                                                        <a href="tambah_siswa.php" class="btn btn-facebook">Isi Data</a>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>


                                                <?php $i = 1; ?>
                                                <?php foreach ($siswa as $td) : ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i;
                                                            $i++; ?>
                                                    </td>
                                                    <td>
                                                        <a href="edit_siswa.php?id_siswa=<?= $td['id_siswa']; ?>"
                                                            class="btn w-100 btn-warning">Edit</a>
                                                    </td>
                                                    <td>
                                                        <?= $td['nama_lengkap']; ?>
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
                                                        <?php
                                                            $idpp = $td['id_program_paket'];
                                                            $programpaket = query("SELECT * FROM program_paket WHERE id_program_paket = '$idpp'")[0];
                                                            echo $programpaket['nama_program_paket'];
                                                            ?>
                                                    </td>
                                                    <td>
                                                        <?= $td['nama_sekolah_asal']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $td['kota_sekolah_asal']; ?>
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
                                                        <a href="tambah_alamat_asal.php" class="btn btn-facebook">Isi
                                                            Data</a>
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