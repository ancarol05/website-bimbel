<?php

session_start();
include '../config.php';

$id_user = $_SESSION['id_user'];

if (isset($_POST['tambah'])) {

    // id_user
    $rekening = $_POST['rekening'];
    $total_pembayaran = $_POST['total_pembayaran'];
    $struk = upload_struk();

    mysqli_query($conn, "INSERT INTO pembayaran VALUES (
        NULL, '$id_user','$rekening','$total_pembayaran','$struk', 'Belum Disetujui'
    )");

    echo "<script>
            alert('Berhasil tambah data pembayaran!');
            window.location.href='pembayaran.php';
        </script>";
}

function upload_struk()
{
    $namaFile = $_FILES['struk']['name'];
    $ukuranFile = $_FILES['struk']['size'];
    $error = $_FILES['struk']['error'];
    $tmpName = $_FILES['struk']['tmp_name'];

    // Jika file tidak diunggah, kembalikan nilai NULL
    if ($error === UPLOAD_ERR_NO_FILE) {
        return NULL;
    }

    // Batas ukuran file adalah 5 megabyte (MB)
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
                        <a class="sidebar-link" href="data_siswa.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data
                                Siswa</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="informasi_medc.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Informasi
                                MEDC</span>
                        </a>
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="pembayaran.php">
                            <i class="align-middle" data-feather="user"></i> <span
                                class="align-middle">Pembayaran</span>
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
                            <div class="card">
                                <div class="card-body">

                                    <div class="d-flex justify-content-between mb-3">
                                        <h2>Tambah Data Pembayaran</h2>
                                        <a href="pembayaran.php" class="btn btn-outline-danger">Kembali</a>
                                    </div>

                                    <form action="" method="POST" enctype="multipart/form-data" class="p-2 mt-2">
                                        
                                        <select name="rekening" class="form-control">
                                            <option style="display:none">Pilih Rekening</option>
                                            <option value="DANA: 085396380597">DANA: 085396380597</option>
                                            <option value="BNI: 0851705489 a.n: Syarifuddin">BNI: 0851705489 a.n: Syarifuddin</option>
                                            <option value="BRI: 1845 0100 3468 507 a.n: Syarifuddin">BRI: 1845 0100 3468 507 a.n: Syarifuddin</option>
                                        </select> <br>

                                        <input type="number" name="total_pembayaran" placeholder="Total Pembayaran"
                                            class="p-2 form-control mb-3" required>
                                        <input type="file" name="struk" placeholder="Struk Pembayaran"
                                            class="p-2 form-control mb-3" required>
                                        <button name="tambah" type="submit"
                                            class="btn btn-facebook w-100">Tambah</button>
                                    </form>

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