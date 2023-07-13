<?php

session_start();
include '../config.php';

$id_alamat_asal = $_GET['id_alamat_asal'];

mysqli_query($conn, "DELETE FROM alamat_asal WHERE id_alamat_asal = '$id_alamat_asal'");
echo "
        <script>
            alert('Data berhasil dihapus!');
            window.location.href='data_tutor.php';
        </script>
    ";
