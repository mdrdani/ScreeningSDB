<?php

$server = "localhost";
$user = "dani";
$password = "secret";
$nama_database = "coronasdb";

$db = mysqli_connect($server, $user, $password, $nama_database);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

?>