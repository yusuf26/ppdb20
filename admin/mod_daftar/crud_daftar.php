<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
if ($pg == 'ubah') {
    $status = (isset($_POST['status'])) ? 1 : 0;
    $nama = str_replace("'", "`", $_POST['nama']);
    $data = [
        'nisn' => $_POST['nisn'],
        'nama' => ucwords(strtolower($nama)),
        'asal_sekolah' => $_POST['asal'],
        'no_hp' => str_replace(" ", "", $_POST['nohp']),
        'status' => $status
    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, ['id_daftar' => $id_daftar]);
}
if ($pg == 'tambah') {
    $nama = str_replace("'", "`", $_POST['nama']);
    //$sekolah = fetch($koneksi, 'sekolah', ['npsn' => $_POST['asal']]);
    $data = [
        'nisn' => $_POST['nisn'],
        'nama' => ucwords(strtolower($nama)),
        'asal_sekolah' => $_POST['asal'],
        'jurusan' => $_POST['jurusan'],
        'no_hp' => str_replace(" ", "", $_POST['nohp']),
        'foto' => 'default.png'

    ];
    $exec = insert($koneksi, 'daftar', $data);
    echo mysqli_error($koneksi);
}
if ($pg == 'hapus') {
    $id_daftar = $_POST['id_daftar'];

    $cekJurusan = fetch($koneksi, 'daftar', ['id_daftar' => $_POST['id_daftar'] ]);
    $cariJurusan = fetch($koneksi, 'jurusan', ['id_jurusan' => $cekJurusan['jurusan']]);
    $kuota = array('sisa_kuota' => $cariJurusan['sisa_kuota'] + 1 );
    update($koneksi, 'jurusan', $kuota, ['id_jurusan' => $cekJurusan['jurusan']] );

   
    if($cekJurusan['file_foto'] !=""){
        unlink('../../user/mod_formulir/images_siswa/'.$cekJurusan['file_foto']);
    }
     if($cekJurusan['file_rar'] !=""){
        unlink('../../user/mod_formulir/dukumen-pendukung/'.$cekJurusan['file_rar']);
    }

    delete($koneksi, 'daftar', ['id_daftar' => $id_daftar]);
}
//membatalkan proses daftar ulang
if ($pg == 'batal') {

    $data = [
        'status' => 0
    ];
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];

    update($koneksi, 'daftar', $data, $where);
    delete($koneksi, 'bayar', $where);

}
if ($pg == 'status') {
    $status = (isset($_POST['status'])) ? $_POST['status'] : 0;
    $data = [
        'status' => $status
    ];
    $where = [
        'id_daftar' => $_POST['id_daftar']
    ];
    $id_daftar = $_POST['id_daftar'];
    update($koneksi, 'daftar', $data, $where);
}

if ($pg == 'statusPembayaran') {
    $status = (isset($_POST['status'])) ? $_POST['status'] : 0;
    $data = [
        'verifikasi' => $status
    ];
    $where = [
        'id_bayar' => $_POST['id_bayar']
    ];
    $id_bayar = $_POST['id_bayar'];
    update($koneksi, 'bayar', $data, $where);
}
