<?php

session_start();
include '../config.php';

$id_user = $_SESSION['id_user'];

if (isset($_POST['tambah'])) {

    // id_user
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $gelar = $_POST['gelar'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];

    mysqli_query($conn, "INSERT INTO tutor VALUES (
        NULL, '$id_user','$nama','$nik','$tempat_lahir', '$tanggal_lahir',
        '$jenis_kelamin','$agama','$kewarganegaraan','$nohp','$email','$gelar','$pendidikan_terakhir'
    )");

    echo "<script>
            alert('Berhasil isi data lengkap!');
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
                                    <h2>Isi Data Lengkap Tutor</h2>
                                    <a href="data_tutor.php" class="btn btn-outline-danger">Kembali</a>
                                </div>

                                <form action="" method="POST" class="p-2 mt-2">
                                    <input type="text" name="nama" placeholder="Nama" class="p-2 form-control mb-3"
                                        required>

                                    <input type="text" name="nik" placeholder="NIK" class="p-2 form-control mb-3"
                                        required>

                                    <input type="text" name="tempat_lahir" placeholder="Tempat Lahir"
                                        class="p-2 form-control mb-3" required>

                                    <span class="text-dark">Tanggal Lahir</span><input type="date" name="tanggal_lahir"
                                        class="p-2 form-control mb-3" required>

                                    <select name="jenis_kelamin" class="p-2 form-control mb-3">
                                        <option style="display:none"> * Jenis Kelamin</option>
                                        <option value="Laki Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>

                                    <input type="text" name="agama" placeholder="Agama" class="p-2 form-control mb-3"
                                        required>

                                    <input type="text" name="kewarganegaraan" placeholder="Kewarganegaraan"
                                        class="p-2 form-control mb-3" required>

                                    <input type="text" name="nohp" placeholder="No HP" class="p-2 form-control mb-3"
                                        required>

                                    <input type="email" name="email" placeholder="Email" class="p-2 form-control mb-3"
                                        required>

                                    <input type="text" name="gelar" placeholder="Gelar" class="p-2 form-control mb-3"
                                        required>

                                    <input type="text" name="pendidikan_terakhir" placeholder="Pendidikan Terakhir"
                                        class="p-2 form-control mb-3" required>

                                    <button name="tambah" type="submit" class="btn btn-facebook w-100">Isi</button>

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