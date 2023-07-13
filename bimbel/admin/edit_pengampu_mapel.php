<?php

session_start();
include '../config.php';

$mapel = mysqli_query($conn, "SELECT * FROM mapel");

$id_user_tutor = $_GET['id_user_tutor'];

$id_user = $_SESSION['id_user'];
$id_pengampu_mapel = $_GET['id_pengampu_mapel'];
$pengampu_mapel = query("SELECT * FROM pengampu_mapel WHERE id_pengampu_mapel = '$id_pengampu_mapel'")[0];


if (isset($_POST['edit'])) {

    // id_user
    $id_mapel = $_POST['id_mapel'];

    $cek_mapel_user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pengampu_mapel WHERE id_user = '$id_user_tutor' AND id_mapel = '$id_mapel'"));
    if ($cek_mapel_user > 0) {
        echo "<script>
            alert('Tutor sudah mengampu mapel ini!');
            history.go(-1);
        </script>";
        exit;
    }

    mysqli_query($conn, "UPDATE pengampu_mapel
        SET
        id_mapel = '$id_mapel'
        WHERE id_pengampu_mapel = '$id_pengampu_mapel'
        ");

    echo "<script>
            alert('Berhasil edit pengampu mapel!');
            window.location.href='data_tutor.php';
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

                    <div class="d-flex justify-content-between mb-3">
                        <h2>Edit Data Pengampu Mapel</h2>
                        <a href="data_tutor.php" class="btn btn-outline-danger">Kembali</a>
                    </div>

                    <form action="" method="POST" enctype="multipart/form-data" class="p-2 mt-2">

                        <select name="id_mapel" class="p-2 form-control mb-3" required>
                            <?php
                            $id_mapel_pengampu = $pengampu_mapel['id_mapel'];
                            $mapel_detail = query("SELECT * FROM mapel WHERE id_mapel = '$id_mapel_pengampu'")[0];
                            ?>
                            <option value="<?= $mapel_detail['id_mapel']; ?>"><?= $mapel_detail['nama_mapel']; ?>
                            </option>
                            <?php foreach ($mapel as $mp) : ?>
                            <option value="<?= $mp['id_mapel']; ?>"><?= $mp['nama_mapel'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <button name="edit" type="submit" class="btn btn-facebook w-100">Edit</button>

                    </form>

                </div>
            </main>

        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>