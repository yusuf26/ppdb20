<?php
if ($_GET['id'] <> '5448dfhcr27467576c78a50vi98j0ruv0w') {
    die('Ip anda sudah tercatat disistem ini');
}
session_start();
require "../config/database.php";
require("../config/functions.crud.php");
//require "../config/function.php";


$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
$query = mysqli_query($koneksi, "select * from user where username='$username'");
$ceklogin = mysqli_num_rows($query);
$user = mysqli_fetch_array($query);
if ($ceklogin == 1) {
    if (!password_verify($password, $user['password'])) {
        echo "salah";
    } else {
        $_SESSION['id_user'] = $user['id_user'];
        $data = array('online' => 1, );
		update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
        echo "ok";
    }
} else {
    echo "oo";
}
