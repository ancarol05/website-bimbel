<?php

session_start();
include '../config.php';

$id_siswa = $_GET['id_siswa'];
$siswa = query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa'")[0];
$id_user_siswa = $siswa['id_user'];


$alamat_asal = query("SELECT * FROM alamat_asal WHERE id_user = '$id_user_siswa'")[0];
$alamat_tinggal = query("SELECT * FROM alamat_tinggal WHERE id_user = '$id_user_siswa'")[0];
$pengampu_mapel = mysqli_query($conn, "SELECT * FROM pengampu_mapel WHERE id_user = '$id_user_siswa'");
$sertifikat = mysqli_query($conn, "SELECT * FROM sertifikat WHERE id_user = '$id_user_siswa'");

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

                    <li class="sidebar-item active">
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

                    <a href="data_siswa.php" class="btn btn-outline-danger mb-3">Kembali</a>

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
                                        <a href="edit_alamat_asal_user.php?id_alamat_asal=<?= $alamat_asal['id_alamat_asal']; ?>&id_user_siswa=<?= $id_user_siswa ?>" class="btn w-100 btn-warning">Edit</a>
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
                                        <a href="edit_alamat_tinggal_user.php?id_alamat_tinggal=<?= $alamat_tinggal['id_alamat_tinggal']; ?>&id_user_siswa=<?= $id_user_siswa ?>" class="btn w-100 btn-warning">Edit</a>
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

                </div>
            </main>

        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>