<?php

session_start();
include '../config.php';

$id_user = $_SESSION['id_user'];

$user = query("SELECT * FROM user WHERE id_user = '$id_user'")[0];
$status_user = $user['status'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student-MEdC</title>
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
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="index.php">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
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
                            <div class="card">
                                <div class="card-body text-center">

                                    <h2>Selamat Datang, <?= $_SESSION['username'] ?>!</h2> <br>

                                    <ol>
                                        <li>
                                            <?php if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa WHERE id_user = '$id_user'")) < 1) : ?>
                                            <p class="text-danger fw-bold">Anda belum mengisi data siswa, Program Paket
                                                belum
                                                diketahui.</p>
                                            <?php else : ?>
                                            <?php
                                                $data_siswa = query("SELECT * FROM siswa WHERE id_user = '$id_user'")[0];
                                                $id_program_paket_siswa = $data_siswa['id_program_paket'];
                                                $pembelajaran = mysqli_query($conn, "SELECT * FROM pembelajaran WHERE id_program_paket = '$id_program_paket_siswa'");

                                                $siswa = query("SELECT * FROM siswa WHERE id_user = '$id_user'")[0];
                                                $id_program_paket = $siswa['id_program_paket'];
                                                $program_paket = query("SELECT * FROM program_paket WHERE id_program_paket = '$id_program_paket'")[0];
                                                $nama_program_paket = $program_paket['nama_program_paket'];
                                                ?>
                                            <p class="text-success fw-bold">
                                                Program Paket Anda :
                                                <?= $nama_program_paket ?>
                                            </p>
                                            <?php endif; ?>
                                        </li>

                                        <li>
                                            <?php if ($status_user == 'Aktif') : ?>
                                            <p class="fw-bold text-success">Status Belajar anda Aktif</p>
                                            <?php else : ?>
                                            <p class="fw-bold text-danger">Status Belajar anda Tidak Aktif!
                                                <a href="pembayaran.php" class="btn btn-facebook">Menu
                                                    Pembayaran</a>
                                            </p>
                                            <?php endif; ?>

                                        </li>
                                    </ol>


                                    <!-- Jadwal Belajar, sesuai program paket untuk ambil data nya -->
                                    <h2 class="m-2">Jadwal Belajar</h2>

                                    <div class="table-responsive card p-3">
                                        <table class="table table-stripped" style="text-align: center">
                                            <tr class="bg-secondary text-light">
                                                <th class="col">No</th>
                                                <th class="col">Hari, Tanggal</th>
                                                <th class="col">Jam</th>
                                                <th class="col">Program Paket</th>
                                                <th class="col">Tutor</th>
                                                <th class="col">Kelas</th>
                                                <th class="col">Mata Pelajaran</th>
                                                <th class="col">Modul</th>
                                            </tr>
                                            <?php $i = 1; ?>
                                            <?php if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa WHERE id_user = '$id_user'")) > 0) : ?>
                                            <?php foreach ($pembelajaran as $td) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i;
                                                            $i++; ?>
                                                </td>
                                                <td>
                                                    <?= $td['hari']; ?>,
                                                    <?= date('d F Y', strtotime($td['tanggal'])); ?>
                                                </td>
                                                <td>
                                                    <?= $td['jam']; ?>
                                                </td>
                                                <td>
                                                    <?= $td['id_program_paket']; ?>
                                                </td>
                                                <td>
                                                    <!-- ID _ TUTOR  -->
                                                    <?= $td['id_user']; ?>
                                                </td>
                                                <td>
                                                    <?= $td['kelas']; ?>
                                                </td>
                                                <td>
                                                    <?= $td['id_mapel']; ?>
                                                </td>
                                                <td>
                                                    <a href="../data/<?= $td['file_modul']; ?>" download=""
                                                        class="btn btn-facebook">Download</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </table>
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