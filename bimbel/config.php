<?php

$conn = mysqli_connect("localhost", "root", "", "bimbel");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };
    return $rows;
}

// function cari_user($keyword)
// {

//     global $conn;
//     $query = "SELECT * FROM user WHERE 
//     username LIKE '%$keyword%' OR
//     nama LIKE '%$keyword%' OR
//     alamat LIKE '%$keyword%' OR
//     notelp LIKE '%$keyword%' OR
//     status LIKE '%$keyword%'
//     ";

//     $result = mysqli_query($conn, $query);
//     return $result;
// }