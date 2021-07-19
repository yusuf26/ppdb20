<?php
require("../config/database.php");
require("../config/function.php");
require("../config/functions.crud.php");
session_start();
$id = $_SESSION['id_siswa'];

$data = array('online' => 0, );
update($koneksi, 'daftar', $data, ['id_daftar' => $id]);

session_destroy();

header("Location: ../");
exit();
?>