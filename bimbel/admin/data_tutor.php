<?php

session_start();
include '../config.php';

$tutor = mysqli_query($conn, "SELECT * FROM tutor");
$akun_tutor = mysqli_query($conn, "SELECT * FROM user WHERE id_level = '2'");


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

                    <!-- DATA USER TUTOR -->
                    <div class="container-fluid p-0">

                        <h2 class="m-2">Data Lengkap Tutor</h2>

                        <div class="table-responsive card p-3">
                            <table class="table table-stripped" style="text-align: center">
                                <tr class="bg-secondary text-light">
                                    <th class="col">No</th>
                                    <th class="col" style="width:15%">Aksi</th>
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

                                <?php $i = 1; ?>
                                <?php foreach ($tutor as $td) : ?>
                                <tr>
                                    <td>
                                        <?php echo $i;
                                            $i++;
                                            ?>
                                    </td>
                                    <td>
                                        <a href="edit_data_lengkap.php?id_tutor=<?= $td['id_tutor']; ?>"
                                            class="btn w-100 btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <a href="data_lengkap_tutor.php?id_tutor=<?= $td['id_tutor']; ?>">
                                            <?= $td['nama']; ?>
                                        </a>
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

                    <!-- DATA TUTOR -->
                    <div class="container-fluid p-0">

                        <div class="m-2 d-flex justify-content-between">
                            <h2>Data Akun Tutor</h2>
                            <a href="tambah_akun_tutor.php" class="btn btn-facebook">Tambah</a>
                        </div>

                        <div class="table-responsive card p-3">
                            <table class="table table-stripped" style="text-align: center">
                                <tr class="bg-secondary text-light">
                                    <th class="col">No</th>
                                    <th class="col" style="width:15%">Aksi</th>
                                    <th class="col">username</th>
                                    <th class="col">Status</th>
                                </tr>

                                <?php $i = 1; ?>
                                <?php foreach ($akun_tutor as $td) : ?>
                                <tr>
                                    <td>
                                        <?php echo $i;
                                            $i++;
                                            ?>
                                    </td>
                                    <td>
                                        <a href="edit_akun_tutor.php?id_user=<?= $td['id_user']; ?>"
                                            class="btn w-100 btn-warning">Edit</a>
                                        <a href="hapus_akun_tutor.php?id_user=<?= $td['id_user']; ?>"
                                            class="btn w-100 btn-danger"
                                            onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                                    </td>
                                    <td>
                                        <?= $td['username']; ?>
                                    </td>
                                    <td>
                                        <?= $td['status']; ?>
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