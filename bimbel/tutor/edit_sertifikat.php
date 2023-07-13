<?php

session_start();
include '../config.php';

$id_user = $_SESSION['id_user'];
$id_sertifikat = $_GET['id_sertifikat'];
$sertifikat = query("SELECT * FROM sertifikat WHERE id_sertifikat = '$id_sertifikat'")[0];

if (isset($_POST['edit'])) {

    // id_user
    $no_sertifikat = $_POST['no_sertifikat'];
    $tanggal_sertifikat = $_POST['tanggal_sertifikat'];
    $nama_program = $_POST['nama_program'];
    $file_sertifikat = upload_sertif();

    mysqli_query($conn, "UPDATE sertifikat SET 
        no_sertifikat = '$no_sertifikat',
        tanggal_sertifikat = '$tanggal_sertifikat',
        nama_program = '$nama_program',
        file_sertifikat = '$file_sertifikat'
        WHERE id_sertifikat = '$id_sertifikat'
    ");

    echo "<script>
            alert('Berhasil edit data sertifikat!');
            window.location.href='data_tutor.php';
        </script>";
}


function upload_sertif()
{
    $namaFile = $_FILES['file_sertifikat']['name'];
    $ukuranFile = $_FILES['file_sertifikat']['size'];
    $error = $_FILES['file_sertifikat']['error'];
    $tmpName = $_FILES['file_sertifikat']['tmp_name'];

    // Jika file tidak diunggah, kembalikan nilai NULL
    if ($error === UPLOAD_ERR_NO_FILE) {
        return NULL;
    }

    // Batas ukuran file adalah 10 megabyte (MB)
    $maxSize = 5 * 1024 * 1024;

    // Jika ukuran file melebihi batas maksimum
    if ($ukuranFile > $maxSize) {
        echo "<script>alert('Modul melebihi 5MB!');</script>";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../data/' . $namaFileBaru);

    return $namaFileBaru;
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
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
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
                    <div class="row">
                        <div class="col-12">

                            <div class="container-fluid p-0">

                                <div class="d-flex justify-content-between mb-3">
                                    <h2>Edit Data Sertifikat</h2>
                                    <a href="data_tutor.php" class="btn btn-outline-danger">Kembali</a>
                                </div>

                                <form action="" method="POST" enctype="multipart/form-data" class="p-2 mt-2">
                                    <input type="text" value="<?= $sertifikat['no_sertifikat']; ?>" name="no_sertifikat" placeholder="no_sertifikat" class="p-2 form-control mb-3" required>
                                    <input type="date" value="<?= $sertifikat['tanggal_sertifikat']; ?>" name="tanggal_sertifikat" placeholder="Tanggal Sertifikat" class="p-2 form-control mb-3" required>
                                    <input type="text" value="<?= $sertifikat['nama_program']; ?>" name="nama_program" placeholder="Nama Program" class="p-2 form-control mb-3" required>
                                    <input type="file" value="<?= $sertifikat['file_sertifikat']; ?>" name="file_sertifikat" class="p-2 form-control mb-3" required>
                                    <button name="edit" type="submit" class="btn btn-facebook w-100">Edit</button>
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