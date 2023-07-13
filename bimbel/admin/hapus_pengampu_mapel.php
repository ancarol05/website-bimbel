<?php

session_start();
include '../config.php';

$id_pengampu_mapel = $_GET['id_pengampu_mapel'];

mysqli_query($conn, "DELETE FROM pengampu_mapel WHERE id_pengampu_mapel = '$id_pengampu_mapel'");
echo "
        <script>
            alert('Mapel berhasil dihapus!');
            window.location.href='data_tutor.php';
        </script>
    ";
