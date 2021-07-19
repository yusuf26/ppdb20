<?php ob_start();
require "../../config/database.php";
require "../../config/function.php";
require "../../config/functions.crud.php";
include "../../assets/modules/phpqrcode/qrlib.php";
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => dekripsi($_GET['id'])]);
// $tempdir = "../../temp/"; //Nama folder tempat menyimpan file qrcode
// if (!file_exists($tempdir)) //Buat folder bername temp
//     mkdir($tempdir);

// //isi qrcode jika di scan
// $codeContents = $bayar['id_bayar'] . '-' . $siswa['nama'];

// //simpan file kedalam temp
// //nilai konfigurasi Frame di bawah 4 tidak direkomendasikan

// QRcode::png($codeContents, $tempdir . $id_bayar . '.png', QR_ECLEVEL_L, 3, 6);

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    

    <title>Formulir_<?= $siswa['nama'] ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="../../assets/modules/bootstrap/css/bootstrap.min.css">


</head>

<body>

    <img src="headerkopppdb.png" width="100%">
    <hr>
    <center>
        <h4><u>Formulir Pendaftaran</u></h4>
        <p>No. Pendaftaran : <?= $siswa['no_daftar'] ?> </p>
    </center>

    <div class="table-responsiv">

        <!-- Start Error  -->
        <table style="font-size: 12px" class="table table-striped table-bordered table-sm ">
            <tbody>
                <tr>
                    <th width="90">FOTO SISWA</th>
                    <td align="center" colspan="2"><b>DATA PRIBADI SISWA</b></td>
                </tr>
                <tr>
                    <?php if ($siswa['file_foto'] == '') { ?>
                    <td rowspan="3">
                        <!-- <img src="avatarr.png" height="130" width="115" /> -->
                        No Photo
                    </td>
				    <?php } else { ?>
                   <td rowspan="3"><img src="<?php echo 'images_siswa/'.$siswa['file_foto'].''?>" height="140" width="115" /></td>
                    <?php } ?>
                    <!-- <td><b>NISN</b></td>
                    <td><?= $siswa['nisn'] ?></td> -->
                    <td><b>Nama Lengkap</b></td>
                    <td align="left"><?= $siswa['nama'] ?></td>
                </tr>

                <!-- <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td align="left"><?= $siswa['nama'] ?></td>
                </tr> -->
				<tr>
                    <td><b>Jenis Kelamin</b></td>
                    <td align="left"><?= ($siswa['jenkel'] == 'L') ? "Laki-Laki" : "Perempuan"; ?></td>
                </tr>
                <tr>
                    <td><b>Tempat Tgl Lahir</b></td>
                    <td align="left"><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td>
                </tr>
				
				<!-- <tr>
                    <td><b>Nilai Rata-Rata US</b></td>
                    <td align="left"><?= $siswa['nilaius'] ?></td>
                </tr> -->

            </tbody>
        </table>

        <!-- Start Error  -->

        <table style="font-size: 12px" class="table table-striped table-bordered table-sm">
            <tbody>
                <!-- <tr>
                    <td style="width: 150px"><b>Asal Sekolah/Madrasah </b></td>
                    <td align="left"><?= $siswa['asal_sekolah']  ?></td>
                    <td><b>Kota </b></td>
                    <td align="left"><?= $siswa['kota_asal_sekolah']  ?></td>
                </tr> -->
                <tr>
                    <td style="width: 150px"><b>Alamat Rumah</b></td>
                    <td align="left"><?= $siswa['alamat']  ?></td>
                    <td><b>Kota </b></td>
                    <td align="left"><?= $siswa['kota']  ?></td>
                </tr>
                <tr>
                    <td><b>Jalur Daftar</b></td>
                    <td align="left"><?= $siswa['jenis'] ?></td>
                    <td><b>Pilihan Jurusan</b></td>
                    <td align="left"><?= $siswa['jurusan']  ?></td>
                </tr>
                <tr>
                    <td><b>No Handphone</b></td>
                    <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp']  ?></td>
                    <td><b>Nama Orang Tua</b></td>
                    <td align="left"><?= $siswa['nama_ayah']  ?></td>
                </tr>
				

            </tbody>
        </table>
		<br/>
			
			
         <table style="font-size: 12px" align="right">
            
               
                    <td align="right"><?= $setting['kota'] ?>,&nbsp;<?php echo date("d-m-Y");?> </td>
                

           
        </table>
        <br/>
         <table style="font-size: 12px">
		 <tr>
						<td width="200px" align="center">
						<p>Petugas Pendaftaran</p>
                    <br><br>
                    (..............................)
                   
						</td>
            <td width="250px" align="center">
			<p>Mengetahui Orang Tua/Wali Siswa</p>
                    <br><br>
                    <?= $siswa['nama_ayah'] ?>
                    
					</td>
              
                <td width="300px" align="center">
                    
                    <!--<p>Kepala  <?= $setting['nama_sekolah'] ?></p>-->
					<p>Siswa Pendaftar</p>
                    <br><br>
                    <?= $siswa['nama'] ?>
                    
                 
                </td>
				
            </tr>
        </table>

    </div>
</body>

</html>
<?php

$html = ob_get_clean();
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('legal', 'portrait');
$dompdf->render();
$dompdf->stream("formulir_" . $siswa['nama'] . ".pdf", array("Attachment" => false));
// exit(0);
?>