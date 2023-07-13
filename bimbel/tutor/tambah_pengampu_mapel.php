<?php

session_start();
include '../config.php';

$id_user = $_SESSION['id_user'];
$mapel = mysqli_query($conn, "SELECT * FROM mapel");


if (isset($_POST['tambah'])) {

    // id_user
    $id_mapel = $_POST['id_mapel'];

    $cek_mapel_user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pengampu_mapel WHERE id_user = '$id_user' AND id_mapel = '$id_mapel'"));
    if ($cek_mapel_user > 0) {
        echo "<script>
            alert('Anda sudah mengampu mapel ini!');
            history.go(-1);
        </script>";
        exit;
    }

    mysqli_query($conn, "INSERT INTO pengampu_mapel VALUES (NULL, '$id_user','$id_mapel')");

    echo "<script>
            alert('Berhasil tambah pengampu mapel!');
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
                    <img src="../img/logo-kua.jpeg" alt="" style="width:50px">
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
                        <a class="sidebar-link" href="informasi_medc.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Informasi
                                MEDC</span>
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
                    <div class="row">
                        <div class="col-12">

                            <div class="container-fluid p-0">

                                <div class="d-flex justify-content-between mb-3">
                                    <h2>Tambah Pengampu Mapel</h2>
                                    <a href="data_tutor.php" class="btn btn-outline-danger">Kembali</a>
                                </div>

                                <form action="" method="POST" enctype="multipart/form-data" class="p-2 mt-2">

                                    <select name="id_mapel" class="p-2 form-control mb-3" required>
                                        <option style="display:none"> * Pilih Mapel </option>
                                        <?php foreach ($mapel as $mp) : ?>
                                        <option value="<?= $mp['id_mapel']; ?>"><?= $mp['nama_mapel'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <button name="tambah" type="submit" class="btn btn-facebook w-100">Tambah</button>

                                </form>

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