<?php

session_start();
include '../config.php';

$id_user = $_SESSION['id_user'];
$status_user = query("SELECT status FROM user WHERE id_user = '$id_user'")[0];

$pembelajaran = mysqli_query($conn, "SELECT * FROM pembelajaran WHERE id_user = '$id_user'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teacher-MEdC</title>
    <link href="../css/app.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="">
                    <img src="../img/logo-kua.jpeg" alt="" style="width:50px">
                    <span class="align-middle">Master Education Center</span>
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
                            <div class="card">
                                <div class="card-body text-center">
                                    <h2>Selamat Datang, <?= $_SESSION['username'] ?>!</h2>
                                    <h2>Status Mengajar : <?= $status_user['status'] ?></h2>
                                </div>
                            </div>

                            <div class="container-fluid p-0">

                                <div class="d-flex justify-content-between mb-3">
                                    <h2>Jadwal Mengajar</h2>
                                    <a href="tambah_pembelajaran.php" class="btn btn-facebook">Tambah Jadwal</a>
                                </div>

                                <div class="table-responsive card p-3">
                                    <table class="table table-stripped" style="text-align: center">
                                        <tr class="bg-secondary text-light">
                                            <th class="col">No</th>
                                            <th class="col">Aksi</th>
                                            <th class="col">Judul Materi</th>
                                            <th class="col">Hari, Tanggal</th>
                                            <th class="col">Jam</th>
                                            <th class="col">Program Paket</th>
                                            <th class="col">Kelas</th>
                                            <th class="col">Mata Pelajaran</th>
                                            <th class="col">File Modul</th>
                                        </tr>
                                        <?php $i = 1; ?>
                                        <?php foreach ($pembelajaran as $td) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                    $i++; ?>
                                            </td>
                                            <td>
                                                <a href="edit_pembelajaran.php?id_pembelajaran=<?= $td['id_pembelajaran']; ?>"
                                                    class="btn w-100 btn-warning">Edit</a>
                                                <a href="hapus_pembelajaran.php?id_pembelajaran=<?= $td['id_pembelajaran']; ?>"
                                                    class="btn w-100 btn-danger"
                                                    onclick="return confirm('Yakin ingin hapus ?');">Hapus</a>
                                            </td>
                                            <td>
                                                <?= $td['judul_materi']; ?>
                                            </td>
                                            <td>
                                                <?= $td['hari']; ?>,
                                                <?= date('d F Y', strtotime($td['tanggal'])); ?>
                                            </td>
                                            <td>
                                                <?= $td['jam']; ?>
                                            </td>
                                            <td>
                                                <?= $td['id_program_paket']; ?>
                                            </td>
                                            <td>
                                                <?= $td['kelas']; ?>
                                            </td>
                                            <td>
                                                <?= $td['id_mapel']; ?>
                                            </td>
                                            <td>
                                                <a href="../data/<?= $td['file_modul']; ?>" download=""
                                                    class="btn btn-facebook">Download</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
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