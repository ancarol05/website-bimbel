<?php

session_start();
include '../config.php';

$id_pembayaran = $_GET['id_pembayaran'];

mysqli_query($conn, "UPDATE pembayaran SET 
status = 'Disetujui' 
WHERE id_pembayaran = '$id_pembayaran'
");


echo "
    <script>
        alert('Pembayaran Disetujui!');
        window.location.href='pembayaran.php';
    </script>
";
