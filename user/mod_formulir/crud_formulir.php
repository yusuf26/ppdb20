<?php
require("../../config/database.php");
require("../../config/function.php");
require("../../config/functions.crud.php");
session_start();
$id = $_SESSION['id_siswa'];
if($pg == 'tampil'){
   $table = ''; 
   $no=1; 
    $data = mysqli_query($koneksi,"select * from dokumen inner join jenis_dokumen ON jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen where id_daftar = $id");
        while($d = mysqli_fetch_array($data)){
    $table .='
    <tr>
    <td>'.$no++.'</td>
    <td>'.$d['nama_dokumen'].'</td>
    <td><a href="mod_formulir/dukumen-pendukung/'.$d['file'].'" target="_blink" class="btn btn-md btn-primary" title=""><i class="fa fa-file"></i></a></td>
    <td><a href="#" title="" class="btn btn-sm btn-danger hapus" data="'.$d['id_dokumen'].'" ><i class="fa fa-times"></i></a></td>
    </tr>
    ';
}
    echo $table;
}

if($pg == 'tampilPembayaran'){
   $table = ''; 
   $no=1; 
    $data = mysqli_query($koneksi,"select * from bayar  where id_daftar = $id");
    while($d = mysqli_fetch_array($data)){
        $status = 'Diproses';
        if($d['verifikasi'] == 1){
            $status = 'Diterima';
        }
        $table .='
        <tr>
        <td>'.$no++.'</td>
        <td>'.date('d F Y',strtotime($d['tgl_bayar'])).'</td>
        <td>'.number_format($d['jumlah'],0,',','.').'</td>
        <td><a href="mod_formulir/dukumen-pembayaran/'.$d['bukti'].'" target="_blink" class="btn btn-md btn-primary" title=""><i class="fa fa-file"></i></a></td>
        <td>'.$d['keterangan'].'</td>
        <td>'.$status.'</td>
        </tr>
        ';
    }
    echo $table;
}

if ($pg == 'hapus') {

    $id_dok = $_POST['id'];

  
    $cek = fetch($koneksi, 'dokumen', ['id_daftar' => $_SESSION['id_siswa'],'id_dokumen' => $id_dok ]);

    if($cek['file'] !=""){
        unlink('dukumen-pendukung/'.$cek['file']);
    }

    $exec = mysqli_query($koneksi,"delete from dokumen where id_dokumen='$id_dok' and id_daftar='$id'");
    
    if ($exec) {
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}

if ($pg == 'simpandatadiri') {
   // $sekolah = fetch($koneksi, 'sekolah', ['npsn' => $_POST['asal']]);
    $status = (isset($_POST['status'])) ? 1 : 0;

    if (!empty($_FILES['foto']['name'])) {
       
    $ukuran     = $_FILES['foto']['size'];
    $file       = $_FILES['foto']['name'];
    $sourcePath = $_FILES['foto']['tmp_name'];
    $targetPath = "images_siswa/".time()."-".$_FILES['foto']['name'];
    $format     = pathinfo($file, PATHINFO_EXTENSION);

  

    if ($format === 'jpg' && $ukuran < 1000000 || $format === 'png' && $ukuran < 1000000) {
        
    $cek = fetch($koneksi, 'daftar', ['id_daftar' => $_SESSION['id_siswa']]);

   
    if($cek['file_foto'] !=""){
        unlink('images_siswa/'.$cek['file_foto']);
    }

    $upload = move_uploaded_file($sourcePath,$targetPath);
 
    $data = [
        // 'nisn'              => $_POST['nisn'],
        'nik'               => $_POST['nik'],
        'no_kk'             => $_POST['nokk'],
        'nama'              => mysqli_escape_string($koneksi, $_POST['nama']),
        'tempat_lahir'      => mysqli_escape_string($koneksi, $_POST['tempat']),
        'tgl_lahir'         => $_POST['tgllahir'],
        'jenkel'            => $_POST['jenkel'],
        'no_hp'             => $_POST['nohp'],
  //       'asal_sekolah' => $_POST['asal'],
  //       'npsn_asal' => $_POST['npsn_asal'],
		// 'kota_asal_sekolah' => $_POST['kota_asal_sekolah'],
        'anak_ke'           => $_POST['anakke'],
        'saudara'           => $_POST['saudara'],
        'tinggi'            => $_POST['tinggi'],
        'berat'             => $_POST['berat'],
        'status_keluarga'   => $_POST['statuskeluarga'],
        'agama'             => $_POST['agama'],
        'no_kip'            => $_POST['kip'],
        'file_foto'         => time()."-".$_FILES['foto']['name']
    ];

    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);


    if ($exec) {
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }

    }else{
        
        echo 'gagal';
    }

    }else{

        $ukuran     = $_FILES['foto']['size'];
        $file       = $_FILES['foto']['name'];
        $sourcePath = $_FILES['foto']['tmp_name'];
        $targetPath = "images_siswa/".$_FILES['foto']['name'];
        $format     = pathinfo($file, PATHINFO_EXTENSION);


        $data = [
            // 'nisn'              => $_POST['nisn'],
            'nik'               => $_POST['nik'],
            'no_kk'             => $_POST['nokk'],
            'nama'              => mysqli_escape_string($koneksi, $_POST['nama']),
            'tempat_lahir'      => mysqli_escape_string($koneksi, $_POST['tempat']),
            'tgl_lahir'         => $_POST['tgllahir'],
            'jenkel'            => $_POST['jenkel'],
            'no_hp'             => $_POST['nohp'],
  //            'asal_sekolah' => $_POST['asal'],
  //       'npsn_asal' => $_POST['npsn_asal'],
		// 'kota_asal_sekolah' => $_POST['kota_asal_sekolah'],
            'anak_ke'           => $_POST['anakke'],
            'saudara'           => $_POST['saudara'],
            'tinggi'            => $_POST['tinggi'],
            'berat'             => $_POST['berat'],
            'status_keluarga'   => $_POST['statuskeluarga'],
            'agama'             => $_POST['agama'],
            'no_kip'            => $_POST['kip']
            

        ];

        $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);

        if ($exec) {
            $pesan = [
                'pesan' => 'ok'
            ];
            echo 'ok';
        } else {
            $pesan = [
                'pesan' => mysqli_error($koneksi)
            ];
            echo mysqli_error($koneksi);
        }
    }
}

if ($pg == 'simpanDukumen') {
    

    if (!empty($_FILES['file_dukung']['name'])) {
       
    $ukuran     = $_FILES['file_dukung']['size'];
    $file       = str_replace(' ','_',$_FILES['file_dukung']['name']);
    $sourcePath = $_FILES['file_dukung']['tmp_name'];
    $targetPath = "dukumen-pendukung/".time()."-".$file;
    $format     = pathinfo($file, PATHINFO_EXTENSION);

    if ($format === 'pdf' || $format === 'jpeg' || $format === 'jpg' || $format === 'JPG' || $format === 'png' || $format === 'PNG' && $ukuran < 2000000) {
        
    $cek = fetch($koneksi, 'daftar', ['id_daftar' => $_SESSION['id_siswa']]);

   
    // if($cek['file_dukung'] !=""){
    //     unlink('dukumen-pendukung/'.$cek['file_dukung']);
    // }

    $upload = move_uploaded_file($sourcePath,$targetPath);
 
    $data = [
        'id_daftar'         => $id,
        'id_jenis_dokumen'  => $_POST['jenis'],
        'file'               => time()."-".$file
    ];

    $exec = insert($koneksi, 'dokumen', $data);


    if ($exec) {
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }

    }else{
        
        echo 'gagal';
    }

    }else{
        echo 'kosong';
    }
        
}

if ($pg == 'simpanPembayaran') {
    

    if (!empty($_FILES['bukti']['name'])) {
        

        if (!file_exists('dukumen-pembayaran')) {
            mkdir('dukumen-pembayaran', 0777, true);
        }

        $ukuran     = $_FILES['bukti']['size'];
        $file       = str_replace(' ','_',$_FILES['bukti']['name']);
        $sourcePath = $_FILES['bukti']['tmp_name'];
        $targetPath = "dukumen-pembayaran/".time()."-".$file;
        $format     = pathinfo($file, PATHINFO_EXTENSION);

        if ($format === 'pdf' || $format === 'jpeg' || $format === 'jpg' || $format === 'JPG' || $format === 'png' || $format === 'PNG' && $ukuran < 2000000) {
            
            // $cek = fetch($koneksi, 'daftar', ['id_daftar' => $_SESSION['id_siswa']]);

           
            // if($cek['file_dukung'] !=""){
            //     unlink('dukumen-pendukung/'.$cek['file_dukung']);
            // }

            $upload = move_uploaded_file($sourcePath,$targetPath);
            
            $data = [
                'id_daftar'         => $id,
                'id_user'           => 0,
                'jumlah'  => $_POST['jumlah'],
                'tgl_bayar' => date('Y-m-d',strtotime($_POST['tgl_bayar'])),
                'keterangan'  => $_POST['keterangan'],
                'bukti'               => time()."-".$file,
            ];

            $exec = insert($koneksi, 'bayar', $data);
            if ($exec) {
                echo 'ok';
            } else {
                $pesan = [
                    'pesan' => mysqli_error($koneksi)
                ];
                echo mysqli_error($koneksi);
            }

        }else{
            
            echo 'gagal';
        }

    }else{
        echo 'kosong';
    }
        
}


if ($pg == 'simpanalamat') {

    $data = [
        'alamat'            => mysqli_escape_string($koneksi, $_POST['alamat']),
        'rt'                => $_POST['rt'],
        'rw'                => $_POST['rw'],
        'desa'              => mysqli_escape_string($koneksi, $_POST['desa']),
        'kecamatan'         => mysqli_escape_string($koneksi, $_POST['kecamatan']),
        'kota'              => mysqli_escape_string($koneksi, $_POST['kota']),
        'provinsi'          => mysqli_escape_string($koneksi, $_POST['provinsi']),
        'kode_pos'          => $_POST['kodepos'],
        'tinggal'           => $_POST['tinggal'],
        'jarak'             => $_POST['jarak'],
        'waktu'             => $_POST['waktu'],
        'transportasi'      => $_POST['transportasi']

    ];

    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpanraport') {

    $data = [
		'nilaius'  => $_POST['nilaius'],
        'agamasatu'  => $_POST['agamasatu'],
        'agamadua'   => $_POST['agamadua'],
        'agamatiga'  => $_POST['agamatiga'],
        'agamaempat' => $_POST['agamaempat'],
        'agamalima'  => $_POST['agamalima'],
		'ipasatu'    => $_POST['ipasatu']
        /**'pknsatu'    => $_POST['pknsatu'],
        'pkndua'     => $_POST['pkndua'],
        'pkntiga'    => $_POST['pkntiga'],
        'pknempat'   => $_POST['pknempat'],
        'pknlima'    => $_POST['pknlima'],
        'indsatu'    => $_POST['indsatu'],
        'inddua'     => $_POST['inddua'],
		'indtiga'    => $_POST['indtiga'],
		'indempat'   => $_POST['indempat'],
		'indlima'    => $_POST['indlima'],
		'ingsatu'    => $_POST['ingsatu'],
		'ingdua'     => $_POST['ingdua'],
		'ingtiga'    => $_POST['ingtiga'],
		'ingempat'   => $_POST['ingempat'],
		'inglima'    => $_POST['inglima'],
		'mtksatu'    => $_POST['mtksatu'],
        'mtkdua'     => $_POST['mtkdua'],
		'mtktiga'    => $_POST['mtktiga'],
		'mtkempat'   => $_POST['mtkempat'],
		'mtklima'    => $_POST['mtklima'],
		
		'ipadua'     => $_POST['ipadua'],
		'ipatiga'    => $_POST['ipatiga'],
		'ipaempat'   => $_POST['ipaempat'],
		'ipalima'    => $_POST['ipalima'],
		'ipssatu'    => $_POST['ipssatu'],
		'ipsdua'     => $_POST['ipsdua'],
		'ipstiga'    => $_POST['ipstiga'],
		'ipsempat'   => $_POST['ipsempat'],
		'ipslima'    => $_POST['ipslima']*/

    ];

    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}
if ($pg == 'simpanortu') {

    $data = [
        'nik_ayah'            => $_POST['nikayah'],
        'nama_ayah'           => mysqli_escape_string($koneksi, $_POST['namaayah']),
        'tempat_ayah'         => mysqli_escape_string($koneksi, $_POST['tempatayah']),
        'tgl_lahir_ayah'      => $_POST['tglayah'],
        'pendidikan_ayah'     => $_POST['pendidikan_ayah'],
        'pekerjaan_ayah'      => $_POST['pekerjaan_ayah'],
        'penghasilan_ayah'    => $_POST['penghasilan_ayah'],
        'no_hp_ayah'          => $_POST['nohpayah'],
        'nik_ibu'             => $_POST['nikibu'],
        'nama_ibu'            => mysqli_escape_string($koneksi, $_POST['namaibu']),
        'tempat_ibu'          => mysqli_escape_string($koneksi, $_POST['tempatibu']),
        'tgl_lahir_ibu'       => $_POST['tglibu'],
        'pendidikan_ibu'      => $_POST['pendidikan_ibu'],
        'pekerjaan_ibu'       => $_POST['pekerjaan_ibu'],
        'penghasilan_ibu'     => $_POST['penghasilan_ibu'],
        'no_hp_ibu'           => $_POST['nohpibu'],
        'nik_wali'            => $_POST['nikwali'],
        'nama_wali'           => mysqli_escape_string($koneksi, $_POST['namawali']),
        'tempat_wali'         => mysqli_escape_string($koneksi, $_POST['tempatwali']),
        'tgl_lahir_wali'      => $_POST['tglwali'],
        'pendidikan_wali'     => $_POST['pendidikan_wali'],
        'pekerjaan_wali'      => $_POST['pekerjaan_wali'],
        'penghasilan_wali'    => $_POST['penghasilan_wali'],
        'no_hp_wali'          => $_POST['nohpwali'],
    ];

    $exec = update($koneksi, 'daftar', $data, ['id_daftar' => $id]);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}

if ($pg == 'simpanKuisioner') {

    $data = [
        'id_daftar' => $_POST['id_daftar'],
        'kuis_1'            => $_POST['kuis_1'],
        'kuis_2'           => mysqli_escape_string($koneksi, $_POST['kuis_2']),
        'kuis_3'         => mysqli_escape_string($koneksi, $_POST['kuis_3']),
        'kuis_4'         => mysqli_escape_string($koneksi, $_POST['kuis_4']),
        'kuis_5'         => mysqli_escape_string($koneksi, $_POST['kuis_5']),
    ];

    $exec = insert($koneksi, 'kuisioner', $data);
    print_r($exec);
    if ($exec) {
        $pesan = [
            'pesan' => 'ok'
        ];
        echo 'ok';
    } else {
        $pesan = [
            'pesan' => mysqli_error($koneksi)
        ];
        echo mysqli_error($koneksi);
    }
}