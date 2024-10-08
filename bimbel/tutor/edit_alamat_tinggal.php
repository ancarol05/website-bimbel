<?php

session_start();
include '../config.php';

$id_user = $_SESSION['id_user'];
$id_alamat_tinggal = $_GET['id_alamat_tinggal'];
$alamat_tinggal = query("SELECT * FROM alamat_tinggal WHERE id_alamat_tinggal = '$id_alamat_tinggal'")[0];

if (isset($_POST['edit'])) {

    // id_user
    $alamat = $_POST['alamat'];
    $prov_kab_kec = $_POST['prov_kab_kec'];
    $kode_pos = $_POST['kode_pos'];

    mysqli_query($conn, "UPDATE alamat_tinggal SET 
        alamat = '$alamat',
        prov_kab_kec = '$prov_kab_kec',
        kode_pos = '$kode_pos'
        WHERE id_alamat_tinggal = '$id_alamat_tinggal'
    ");

    echo "<script>
            alert('Berhasil edit alamat asal!');
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
                                    <h2>Edit Data Alamat Asal</h2>
                                    <a href="data_tutor.php" class="btn btn-outline-danger">Kembali</a>
                                </div>

                                <form action="" method="POST" class="p-2 mt-2">
                                    <input type="text" value="<?= $alamat_tinggal['alamat']; ?>" name="alamat" placeholder="alamat" class="p-2 form-control mb-3" required>
                                    <input type="text" value="<?= $alamat_tinggal['prov_kab_kec']; ?>" name="prov_kab_kec" placeholder="Prov/Kab/Kac" class="p-2 form-control mb-3" required>
                                    <input type="text" value="<?= $alamat_tinggal['kode_pos']; ?>" name="kode_pos" placeholder="Kode Pos" class="p-2 form-control mb-3" required>
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