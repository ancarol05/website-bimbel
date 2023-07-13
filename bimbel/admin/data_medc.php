<?php

session_start();
include '../config.php';

$informasi_medc = mysqli_query($conn, "SELECT * FROM medc");

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

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="data_tutor.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data
                                Tutor</span>
                        </a>
                    </li>

                    <li class="sidebar-item active">
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


                    <div class="d-flex justify-content-between m-2">
                        <h2>Data Informasi MEDC</h2>
                        <a href="tambah_medc.php" class="btn btn-facebook">Tambah</a>
                    </div>

                    <div class="table-responsive card p-3">
                        <table class="table table-stripped" style="text-align: center">
                            <tr class="bg-secondary text-light">
                                <th class="col">No</th>
                                <th class="col">Aksi</th>
                                <th class="col">Hari, Tanggal</th>
                                <th class="col">Informasi</th>
                            </tr>
                            <?php $i = 1; ?>
                            <?php foreach ($informasi_medc as $td) : ?>
                            <tr>
                                <td>
                                    <?php echo $i;
                                        $i++; ?>
                                </td>
                                <td>
                                    <a href="edit_medc.php?id_medc=<?= $td['id_medc']; ?>"
                                        class="btn w-100 btn-warning">Edit</a>
                                    <a href="hapus_medc.php?id_medc=<?= $td['id_medc']; ?>" class="btn w-100 btn-danger"
                                        onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
                                </td>
                                <td>
                                    <?= $td['hari']; ?>,
                                    <?= date('d F Y', strtotime($td['tanggal'])); ?>
                                </td>
                                <td>
                                    <?= $td['informasi']; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </div>
            </main>

        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>