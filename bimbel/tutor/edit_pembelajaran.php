<?php

session_start();
include '../config.php';

$id_pembelajaran = $_GET['id_pembelajaran'];
$id_user = $_SESSION['id_user'];
$pembelajaran = query("SELECT * FROM pembelajaran WHERE id_user = '$id_user' AND id_pembelajaran = '$id_pembelajaran'")[0];
$mapel = mysqli_query($conn, "SELECT * FROM mapel");
$program_paket = mysqli_query($conn, "SELECT * FROM program_paket");


if (isset($_POST['edit'])) {

    $judul_materi = $_POST['judul_materi'];
    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $id_mapel = $_POST['id_mapel'];
    $id_program_paket = $_POST['id_program_paket'];
    $kelas = $_POST['kelas'];
    $file_modul = upload_file_modul();

    mysqli_query($conn, "UPDATE pembelajaran SET 
       
        judul_materi = '$judul_materi',
        hari = '$hari',
        tanggal = '$tanggal',
        jam = '$jam',
        id_mapel = '$id_mapel',
        id_program_paket = '$id_program_paket',
        kelas = '$kelas',
        file_modul = '$file_modul'
        WHERE id_pembelajaran = '$id_pembelajaran'

    ");

    echo "<script>
            alert('Berhasil edit jadwal!');
            window.location.href='index.php';
        </script>";
}

function upload_file_modul()
{
    $namaFile = $_FILES['file_modul']['name'];
    $ukuranFile = $_FILES['file_modul']['size'];
    $error = $_FILES['file_modul']['error'];
    $tmpName = $_FILES['file_modul']['tmp_name'];

    // Jika file tidak diunggah, kembalikan nilai NULL
    if ($error === UPLOAD_ERR_NO_FILE) {
        return NULL;
    }

    // Batas ukuran file adalah 10 megabyte (MB)
    $maxSize = 15 * 1024 * 1024;

    // Jika ukuran file melebihi batas maksimum
    if ($ukuranFile > $maxSize) {
        echo "<script>alert('Modul melebihi 15MB!');</script>";
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
                                    <h2>Edit Jadwal</h2>
                                    <a href="index.php" class="btn btn-outline-danger">Kembali</a>
                                </div>

                                <form action="" method="POST" enctype="multipart/form-data" class="p-2 mt-2">
                                    <input value="<?= $pembelajaran['judul_materi']; ?>" type="text" name="judul_materi"
                                        placeholder="Judul Materi" class="p-2 form-control mb-3" required>
                                    <select name="hari" class="p-2 form-control mb-3">
                                        <option value="<?= $pembelajaran['hari']; ?>"><?= $pembelajaran['hari']; ?>
                                        </option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                    <input value="<?= $pembelajaran['tanggal']; ?>" type="date" name="tanggal"
                                        placeholder="Tanggal" class="p-2 form-control mb-3" required>
                                    <input value="<?= $pembelajaran['jam']; ?>" type="time" name="jam"
                                        placeholder="Time" class="p-2 form-control mb-3" required>

                                    <select name="id_mapel" class="p-2 form-control mb-3" required>
                                        <?php
                                        $id_mapel = $pembelajaran['id_mapel'];
                                        $detail_mapel = query("SELECT * FROM mapel WHERE id_mapel = '$id_mapel'")[0];
                                        ?>

                                        <option value="<?= $id_mapel; ?>"><?= $detail_mapel['nama_mapel']; ?></option>

                                        <?php foreach ($mapel as $mp) : ?>
                                        <option value="<?= $mp['id_mapel']; ?>"><?= $mp['nama_mapel'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <select name="id_program_paket" class="p-2 form-control mb-3" required>

                                        <?php
                                        $id_program_paket = $pembelajaran['id_program_paket'];
                                        $detail_program_paket = query("SELECT * FROM program_paket WHERE id_program_paket = '$id_program_paket'")[0];
                                        ?>

                                        <option value="<?= $id_program_paket; ?>">
                                            <?= $detail_program_paket['nama_program_paket']; ?></option>

                                        <?php foreach ($program_paket as $mp) : ?>
                                        <option value="<?= $mp['id_program_paket']; ?>"><?= $mp['nama_program_paket'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>

                                    <input value="<?= $pembelajaran['kelas']; ?>" type="text" name="kelas"
                                        placeholder="Kelas" class="p-2 form-control mb-3" required>

                                    <span class="text-dark">File Modul <i>*Upload ulang file sebelumnya, jika tidak
                                            ingin melakukan perubahan</i> </span><input
                                        value="<?= $pembelajaran['file_modul']; ?>" type="file" name="file_modul"
                                        class="p-2 form-control mb-3" required>

                                    <button name="edit" type="submit" class="btn btn-facebook w-100">Tambah</button>

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