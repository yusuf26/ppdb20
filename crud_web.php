<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
session_start();
if ($pg == 'simpan') {
   // $sekolah = fetch($koneksi, 'sekolah', ['npsn' => $_POST['asal']]);
    $jnz = fetch($koneksi, 'jenis', ['id_jenis' => $_POST['jenis']]);
    $query = "SELECT max(no_daftar) as maxKode FROM daftar";
    $hasil = mysqli_query($koneksi, $query);
    $data  = mysqli_fetch_array($hasil);
    $kodedaftar = $data['maxKode'];


    $noUrut = (int) substr($kodedaftar, 8, 3);
    $noUrut++;
    $char = "PPDB" . date('Y');
    $newID = $char . sprintf("%03s", $noUrut);
    $nama = mysqli_escape_string($koneksi, ucwords(strtolower($_POST['nama'])));
    $data = [
        'no_daftar' => $newID,
        'jenis' => $jnz['nama_jenis'],
        'jurusan' => $_POST['jurusan'],
        // 'nisn' => $_POST['nisn'],
        'nama' => $nama,
        // 'asal_sekolah' => $_POST['asal'],
        // 'npsn_asal' => $_POST['npsn_asal'],
        'no_hp' => $_POST['nohp'],
        'tempat_lahir' => ucwords($_POST['tempat']),
        'tgl_lahir' => $_POST['tgllahir'],
        'password' => $_POST['password'],
        'foto' => 'default.png',
    ];

    // Fungsi Update Jurusan
    
    $cekJurusan = fetch($koneksi, 'jurusan', ['id_jurusan' => $_POST['jurusan']]);
    
    $hitung = array('sisa_kuota' =>  $cekJurusan ['sisa_kuota'] - 1 );

   
    

    // $cek = rowcount($koneksi, 'daftar', ['nisn' => $_POST['nisn']]);
    // if ($cek == 0) {
        $exec = insert($koneksi, 'daftar', $data);
        update($koneksi, 'jurusan', $hitung, ['id_jurusan' => $_POST['jurusan']]);
        $namapendek = explode(" ", $nama);
        $pesan = [
            'pesan' => 'ok',
            'id' => $newID,
            'pass' => $_POST['password'],
            'nama' => $namapendek[0]
        ];
        echo json_encode($pesan);
    // } else {
    //     $pesan = [
    //         'pesan' => 'Nisn sudah ada'
    //     ];
    //     echo json_encode($pesan);
    // }
}
if ($pg == 'login') {

    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $_POST['password']);
    $siswaQ = mysqli_query($koneksi, "SELECT * FROM daftar WHERE username='$username'");
    if ($username <> "" and $password <> "") {
        if (mysqli_num_rows($siswaQ) == 0) {
            $data = [
                'pesan' => 'Anda belum terdaftar silahkan melakukan pendaftaran!'
            ];
            echo json_encode($data);
        } else {
            $siswa = mysqli_fetch_array($siswaQ);
            //$ceklogin=mysqli_num_rows(mysqli_query($koneksi, "select * from login where id_siswa='$siswa[id_siswa]'"));

            if ($password <> $siswa['password']) {
                $data = [
                    'pesan' => 'Password Salah !'
                ];
                echo json_encode($data);
            } else {
                //if($ceklogin==0){
                $_SESSION['id_siswa'] = $siswa['id_daftar'];
                mysqli_query($koneksi, "UPDATE daftar set online='1' where id_daftar='$siswa[id_daftar]'");
                $data = [
                    'pesan' => 'ok'
                ];
                echo json_encode($data);
            }
        }
    }
}
