<?php

session_start();
include '../config.php';

$pembayaran = mysqli_query($conn, "SELECT * FROM pembayaran");

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
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
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

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="pembayaran.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Pembayaran
                            </span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="../logout.php">
                            <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Logout</span>
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

                    <!-- DATA USER TUTOR MM -->
                    <div class="container-fluid p-0">

                        <div class="m-2 d-flex justify-content-between">
                            <h2>Data Pembayaran Siswa</h2>
                        </div>


                        <div class="table-responsive card p-3">
                            <table class="table table-stripped" style="text-align: center">
                                <tr class="bg-secondary text-light">
                                    <th class="col">No</th>
                                    <th class="col">Nama Siswa</th>
                                    <th class="col">Rekening</th>
                                    <th class="col">Total Pembayaran</th>
                                    <th class="col">Struk</th>
                                    <th class="col">Status</th>
                                </tr>
                                <?php $i = 1; ?>
                                <?php foreach ($pembayaran as $td) : ?>
                                    <tr>
                                        <td>
                                            <?php echo $i;
                                            $i++; ?>
                                        </td>
                                        <td>
                                           <?php 
                                        
                                            $id_sw = $td['id_user'];
                                            $sw = query("SELECT * FROM siswa WHERE id_user = '$id_sw'")[0];
                                            echo $sw['nama_lengkap'];
                                            
                                           ?>
                                        </td>
                                        <td><?= $td['info_biaya']; ?></td>
                                        <td>
                                            Rp <?= number_format($td['total_pembayaran'], 0); ?>
                                        </td>
                                        <td>
                                            <a target="_blank" href="../data/<?= $td['struk']; ?>" downdload=""> Download
                                                Struk </a>
                                        </td>
                                        <td>
                                            <?php if ($td['status'] === 'Disetujui') : ?>
                                                <span class="fw-bold text-success"><?= $td['status']; ?></span>
                                            <?php else : ?>
                                                <span class="fw-bold text-danger"><?= $td['status']; ?></span> <br>
                                                <a href="setujui.php?id_pembayaran=<?= $td['id_pembayaran']; ?>" class="btn btn-success">Setujui</a>
                                            <?php endif; ?>
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