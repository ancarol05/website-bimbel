<?php

session_start();
include '../config.php';

$id_medc = $_GET['id_medc'];

mysqli_query($conn, "DELETE FROM medc WHERE id_medc = '$id_medc'");
echo "
        <script>
            alert('Data berhasil dihapus!');
            window.location.href='data_medc.php';
        </script>
    ";
