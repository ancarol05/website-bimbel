<?php

session_start();
include '../config.php';

$id_pembelajaran = $_GET['id_pembelajaran'];

mysqli_query($conn, "DELETE FROM pembelajaran WHERE id_pembelajaran = '$id_pembelajaran'");
echo "
        <script>
            alert('Jadwal berhasil dihapus!');
            window.location.href='index.php';
        </script>
    ";