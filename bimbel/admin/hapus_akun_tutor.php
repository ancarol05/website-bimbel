<?php

session_start();
include '../config.php';

$id_user = $_GET['id_user'];

mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id_user'");
echo "
        <script>
            alert('Data berhasil dihapus!');
            window.location.href='data_tutor.php';
        </script>
    ";