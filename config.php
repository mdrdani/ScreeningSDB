<?php

$server = "localhost";
$user = "root";
$password = "mypassword";
$nama_database = "k1286260_covid19";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>