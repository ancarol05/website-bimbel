<?php

session_start();
include '../config.php';

$id_sertifikat = $_GET['id_sertifikat'];

mysqli_query($conn, "DELETE FROM sertifikat WHERE id_sertifikat = '$id_sertifikat'");
echo "
        <script>
            alert('Data berhasil dihapus!');
            window.location.href='data_tutor.php';
        </script>
    ";
