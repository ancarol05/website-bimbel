<?php

session_start();
include '../config.php';

$id_siswa = $_GET['id_siswa'];

$siswa = query("SELECT * FROM siswa WHERE id_siswa = '$id_siswa'")[0];

if (isset($_POST['edit'])) {

    // id_user
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $id_program_paket = $_POST['id_program_paket'];
    $nama_sekolah_asal = $_POST['nama_sekolah_asal'];
    $kota_sekolah_asal = $_POST['kota_sekolah_asal'];

    mysqli_query($conn, "UPDATE siswa SET
        
        nama_lengkap = '$nama_lengkap',
        tempat_lahir = '$tempat_lahir',
        tanggal_lahir = '$tanggal_lahir',
        jenis_kelamin = '$jenis_kelamin',
        agama = '$agama',
        kewarganegaraan = '$kewarganegaraan',
        nohp = '$nohp',
        email = '$email',
        id_program_paket = '$id_program_paket',
        nama_sekolah_asal = '$nama_sekolah_asal',
        kota_sekolah_asal = '$kota_sekolah_asal'

        WHERE id_siswa = '$id_siswa'
    
    ");

    echo "<script>
            alert('Berhasil edit data lengkap!');
            window.location.href='data_siswa.php';
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

                    <div class="d-flex justify-content-between mb-3">
                        <h2>Edit Data Lengkap Siswa</h2>
                        <a href="data_siswa.php" class="btn btn-outline-danger">Kembali</a>
                    </div>

                    <form action="" method="POST" class="p-2 mt-2">
                        <input type="text" value="<?= $siswa['nama_lengkap'] ?>" name="nama_lengkap" placeholder="Nama Lengkap" class="p-2 form-control mb-3" required>

                        <input type="text" value="<?= $siswa['tempat_lahir'] ?>" name="tempat_lahir" placeholder="Tempat Lahir" class="p-2 form-control mb-3" required>

                        <span class="text-dark">Tanggal Lahir</span><input type="date" value="<?= $siswa['tanggal_lahir'] ?>" name="tanggal_lahir" class="p-2 form-control mb-3" required>

                        <select name="jenis_kelamin" class="p-2 form-control mb-3">
                            <option value="<?= $siswa['jenis_kelamin']; ?>">
                                <?= $siswa['jenis_kelamin']; ?></option>
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>

                        <input type="text" name="agama" placeholder="Agama" value="<?= $siswa['agama']; ?>" class="p-2 form-control mb-3" required>

                        <input type="text" value="<?= $siswa['kewarganegaraan']; ?>" name="kewarganegaraan" placeholder="Kewarganegaraan" class="p-2 form-control mb-3" required>

                        <input type="text" value="<?= $siswa['nohp']; ?>" name="nohp" placeholder="No HP" class="p-2 form-control mb-3" required>

                        <input type="email" value="<?= $siswa['email']; ?>" name="email" placeholder="Email" class="p-2 form-control mb-3" required>

                        <select name="id_program_paket" class="form-control mb-3 p-2">
                            <?php $idpp = $siswa['id_program_paket']; ?>
                            <?php $detaiL_program_paket = query("SELECT * FROM program_paket WHERE id_program_paket = '$idpp'")[0]; ?>
                            <option value="<?= $detaiL_program_paket['id_program_paket']; ?>">
                                *<?= $detaiL_program_paket['nama_program_paket']; ?></option>
                            <?php $program_paket = mysqli_query($conn, "SELECT * FROM program_paket"); ?>
                            <?php foreach ($program_paket as $pp) : ?>
                                <option value="<?= $pp['id_program_paket']; ?>">
                                    <?= $pp['nama_program_paket']; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <input type="text" value="<?= $siswa['nama_sekolah_asal'] ?>" name="nama_sekolah_asal" placeholder="Nama Sekolah Asal" class="p-2 form-control mb-3" required>

                        <input type="text" value="<?= $siswa['kota_sekolah_asal'] ?>" name="kota_sekolah_asal" placeholder="Kota Sekolah Asal" class="p-2 form-control mb-3" required>

                        <button name="edit" type="submit" class="btn btn-facebook w-100">Edit</button>

                    </form>


                </div>
            </main>

        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>