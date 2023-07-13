<?php

session_start();
include '../config.php';
$user_siswa = mysqli_query($conn, "SELECT * FROM user WHERE id_level = '3' AND status = 'Aktif'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MEdC - Admin</title>
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
                    <h3 class="justify-content-start"> Master Education Center </h3>
                </div>

            </nav>

            <main class="content p-4">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-center">

                                    <h2>Selamat Datang, Admin!</h2>

                                    <br>
                                    <div class="card p-3 container-fluid text-start text-dark">

                                    <!-- COLUMN TUTOR AKTIF -->
                                    <div class="col-sm-6">
                                        <div class="cardd">
                                            <div class="cardd-body">
                                                <h2 class="cardd-title">TUTOR Aktif : </h2>
                                                <div class="text-end">
                                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i>
                                                        <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE id_level = '2' AND status = 'Aktif' ")) ?> 
                                                    </h2>
                                                    <span class="text-success">Orang</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    

                                    <!-- COLUMN SISWA Master Medical AKTIF -->
                                    <div class="col-sm-6">
                                        <div class="cardd">
                                            <div class="cardd-body">
                                                <h2 class="cardd-title">SISWA Aktif Master MEDICAL: </h2>
                                                <div class="text-end">
                                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i>
                                                        <?php $total_1 = 0; ?>
                                                        <?php foreach ($user_siswa as $us) : ?>
                                                        <?php $id_us = $us['id_user'];  ?>
                                                        <?php $data_mm = mysqli_query($conn, "SELECT * FROM siswa WHERE id_user = '$id_us' AND id_program_paket = '1'"); ?>
                                                        <?php if (mysqli_num_rows($data_mm) > 0) {
                                                                $total_1 += 1;
                                                            } ?>
                                                        <?php endforeach; ?>
                                                        <?= $total_1 ?>
                                                    </h2>
                                                    <span class="text-success">Orang</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                    <!-- COLUMN SISWA Master Intensif AKTIF -->

                                    <div class="col-sm-6">
                                        <div class="cardd">
                                            <div class="cardd-body">
                                                <h2 class="cardd-title">SISWA Aktif Master INTENSIF: </h2>
                                                <div class="text-end">
                                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i>
                                                        <?php $total_2 = 0; ?>
                                                        <?php foreach ($user_siswa as $us) : ?>
                                                        <?php $id_us = $us['id_user'];  ?>
                                                        <?php $data_mm = mysqli_query($conn, "SELECT * FROM siswa WHERE id_user = '$id_us' AND id_program_paket = '2'"); ?>
                                                        <?php if (mysqli_num_rows($data_mm) > 0) {
                                                                $total_2 += 1;
                                                            } ?>
                                                        <?php endforeach; ?>
                                                        <?= $total_2 ?>
                                                    </h2>
                                                    <span class="text-success">Orang</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- COLUMN SISWA Master Online -->

                                    <div class="col-sm-6">
                                        <div class="cardd">
                                            <div class="cardd-body">
                                                <h2 class="cardd-title">SISWA Aktif Master ONLINE: </h2>
                                                <div class="text-end">
                                                    <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i>
                                                        <?php $total_3 = 0; ?>
                                                        <?php foreach ($user_siswa as $us) : ?>
                                                        <?php $id_us = $us['id_user'];  ?>
                                                        <?php $data_mm = mysqli_query($conn, "SELECT * FROM siswa WHERE id_user = '$id_us' AND id_program_paket = '3'"); ?>
                                                        <?php if (mysqli_num_rows($data_mm) > 0) {
                                                                $total_3 += 1;
                                                            } ?>
                                                        <?php endforeach; ?>
                                                        <?= $total_3 ?>
                                                    </h2>
                                                    <span class="text-success">Orang</span>
                                                </div>
                                            </div>
                                        </div>
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