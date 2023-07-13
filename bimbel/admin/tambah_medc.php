<?php

session_start();
include '../config.php';

$id_user = $_SESSION['id_user'];

if (isset($_POST['tambah'])) {

    // id_user
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $informasi = $_POST['informasi'];

    mysqli_query($conn, "INSERT INTO medc VALUES (
        NULL,'$hari','$tanggal','$informasi'
    )");

    echo "<script>
            alert('Berhasil tambah data informasi medc!');
            window.location.href='data_medc.php';
        </script>";
}

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

                    <div class="d-flex justify-content-between mb-3">
                        <h2>Isi Data Informasi MEDC</h2>
                        <a href="data_medc.php" class="btn btn-outline-danger">Kembali</a>
                    </div>

                    <form action="" method="POST" enctype="multipart/form-data" class="p-2 mt-2">
                        <input type="text" name="hari" placeholder="Hari" class="p-2 form-control mb-3" required>
                        <input type="date" name="tanggal" placeholder="Tanggal" class="p-2 form-control mb-3" required>
                        <input type="text" name="informasi" placeholder="Informasi" class="p-2 form-control mb-3"
                            required>

                        <button name="tambah" type="submit" class="btn btn-facebook w-100">Tambah</button>

                    </form>

                </div>
            </main>

        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>