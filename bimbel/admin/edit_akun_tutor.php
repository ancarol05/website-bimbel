<?php

session_start();
include '../config.php';

$id_user = $_GET['id_user'];
$user = query("SELECT * FROM user WHERE id_user = '$id_user'")[0];

if (isset($_POST['daftar'])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    $password_sebelum = mysqli_real_escape_string($conn, $_POST["password"]);

    // cek username karyawan sudah ada atau belum
    $prosescek = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($prosescek) > 1) {
        echo "<script>alert('Username Sudah Digunakan!');history.go(-1) </script>";
        exit;
    }
    // enkripsi password
    $password = password_hash($password_sebelum, PASSWORD_DEFAULT);

    $res = mysqli_query($conn, "UPDATE user 
        SET 
        username = '$username',
        password = '$password',
        status = '$status'
        WHERE id_user = '$id_user'
    ");

    if (mysqli_affected_rows($conn) > 0) {
        echo "
            <script>
                alert('Berhasil Edit Akun!');
                window.location.href='data_tutor.php'
            </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
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
                        <h2>Edit Akun Tutor</h2>
                        <a href="data_tutor.php" class="btn btn-outline-danger">Kembali</a>
                    </div>

                    <form action="" method="POST">
                        <span class="text-dark">Username :</span><input name="username"
                            value="<?= $user['username']; ?>" type="text" placeholder="Username"
                            class="form-control mb-4">
                        <span class="text-dark">Password :</span><input name="password"
                            value="<?= $user['username']; ?>" type="text" placeholder="Password"
                            class="form-control mb-4">
                        <select name="status" class="form-control mb-3">
                            <option value="<?= $user['status']; ?>"><?= $user['status']; ?></option>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <center>
                            <button name="daftar" type="submit" class="btn btn-success w-50">Edit</button>
                    </form>

                </div>
            </main>

        </div>
    </div>

    <script src="js/app.js"></script>

</body>

</html>