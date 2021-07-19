<?php
require("../../config/database.php");
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=datasemua_pendaftar.xls");
session_start();
if (!isset($_SESSION['id_user'])) {
    die('Anda tidak diijinkan mengakses langsung');
}
?>
<style>
    .str {
        mso-number-format: \@;
    }
</style>
<table style="font-size: 12px" class="table table-striped table-sm" id="table-1">
    <thead>
        <tr>
            <th class="text-center">
                #
            </th>
			<th>NO Pendaftar</th>
            <th>NISN</th>
            <th>Nama Pendaftar</th>
            <th>Asal Sekolah</th>
			<th>NPSN Sekolah</th>
			<th>kota Sekolah</th>
            <th>No Hp</th>
            <th>Status</th>
			<th>Nilai rata US</th>
			<th>Nilai Raport SEM 1</th>
			<th>Nilai Raport SEM 2</th>
			<th>Nilai Raport SEM 3</th>
			<th>Nilai Raport SEM 4</th>
			<th>Nilai Raport SEM 5</th>
			<th>Nilai Raport SEM 6</th>
			<th>Jurusan</th>
			<th>JALUR DAFTAR</th>
			<th>NIK</th>
			<th>No KK</th>
			<th>Tempat Lahir</th>
			<th>Tgl Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Agama</th>
			<th>Anak Ke</th>
			<th>Jumlah Saudara</th>
			<th>Tinggi Badan (Cm)</th>
			<th>Berat Badan (Kg)</th>
			<th>Status Dalam Keluarga</th>
			<th>No KIP</th>
			<th>Alamat</th>
			<th>RT</th>
			<th>RW</th>
			<th>Desa</th>
			<th>Kecamatan</th>
			<th>Kabupaten / Kota</th>
			<th>Provinsi</th>
			<th>Kode Pos</th>
			<th>Tinggal Bersama</th>
			<th>Jarak Ke Sekolah (Meter)</th>
			<th>Berapa Menit Kesekolah</th>
			<th>Transportasi</th>
			<th>NIK Ayah</th>
			<th>Nama Ayah</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Pendidikan</th>
			<th>Pekerjaan</th>
			<th>Penghasilan</th>
			<th>No HP Ayah</th>
			<th>NIK ibu</th>
			<th>Nama ibu</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Pendidikan</th>
			<th>Pekerjaan</th>
			<th>Penghasilan</th>
			<th>No Hp Ibu</th>
			<th>NIK wali</th>
			<th>Nama wali</th>
			<th>Tempat Lahir</th>
			<th>Tanggal Lahir</th>
			<th>Pendidikan</th>
			<th>Pekerjaan</th>
			<th>Penghasilan</th>
			<th>No HP wali</th>
			

        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($koneksi, "select * from daftar");
        $no = 0;
        while ($daftar = mysqli_fetch_array($query)) {
            $no++;
        ?>
            <tr>
                <td><?= $no; ?></td>
				<td><?= $daftar['no_daftar'] ?></td>
                <td class="str"><?= $daftar['nisn'] ?></td>
                <td><?= $daftar['nama'] ?></td>
                <td><?= $daftar['asal_sekolah'] ?></td>
				<td><?= $daftar['npsn_asal'] ?></td>
				<td><?= $daftar['kota_asal_sekolah'] ?></td>
                <td class="str">
                    <i class="fab fa-whatsapp text-success   "></i>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>"><?= $daftar['no_hp'] ?></a>
                </td>
                <td>
                    <?php if ($daftar['status'] == 1) { ?>
                        <span class="badge badge-success">diterima</span>
                    <?php } elseif ($daftar['status'] == 2) { ?>
                        <span class="badge badge-danger">ditolak </span>
                    <?php } else { ?>
                        <span class="badge badge-warning">pending</span>
                    <?php } ?>
                </td>
				 <td><?= $daftar['nilaius'] ?></td>
				 <td><?= $daftar['agamasatu'] ?></td>
				 <td><?= $daftar['agamadua'] ?></td>
				 <td><?= $daftar['agamatiga'] ?></td>
				 <td><?= $daftar['agamaempat'] ?></td>
				 <td><?= $daftar['agamalima'] ?></td>
				 <td><?= $daftar['ipasatu'] ?></td>
				 <td><?= $daftar['jurusan'] ?></td>
				 <td><?= $daftar['jenis'] ?></td>
				 <td><?= $daftar['nik'] ?></td>
				 <td><?= $daftar['no_kk'] ?></td>
				 <td><?= $daftar['tempat_lahir'] ?></td>
				 <td><?= $daftar['tgl_lahir'] ?></td>
				 <td><?= $daftar['jenkel'] ?></td>
				 <td><?= $daftar['agama'] ?></td>
				 <td><?= $daftar['anak_ke'] ?></td>
				 <td><?= $daftar['saudara'] ?></td>
				 <td><?= $daftar['tinggi'] ?></td>
				 <td><?= $daftar['berat'] ?></td>
				 <td><?= $daftar['status_keluarga'] ?></td>
				 <td><?= $daftar['no_kip'] ?></td>
				 <td><?= $daftar['alamat'] ?></td>
				 <td><?= $daftar['rt'] ?></td>
				  <td><?= $daftar['rw'] ?></td>
				 <td><?= $daftar['desa'] ?></td>
				 <td><?= $daftar['kecamatan'] ?></td>
				 <td><?= $daftar['kota'] ?></td>
				 <td><?= $daftar['provinsi'] ?></td>
				 <td><?= $daftar['kode_pos'] ?></td>
				 <td><?= $daftar['tinggal'] ?></td>
				 <td><?= $daftar['jarak'] ?></td>
				 <td><?= $daftar['waktu'] ?></td>
				 <td><?= $daftar['transportasi'] ?></td>
				 <td><?= $daftar['nik_ayah'] ?></td>
				 <td><?= $daftar['nama_ayah'] ?></td>
				 <td><?= $daftar['tempat_ayah'] ?></td>
				 <td><?= $daftar['tgl_lahir_ayah'] ?></td>
				 <td><?= $daftar['pendidikan_ayah'] ?></td>
				 <td><?= $daftar['pekerjaan_ayah'] ?></td>
				 <td><?= $daftar['penghasilan_ayah'] ?></td>
				 <td><?= $daftar['no_hp_ayah'] ?></td>
				 <td><?= $daftar['nik_ibu'] ?></td>
				 <td><?= $daftar['nama_ibu'] ?></td>
				 <td><?= $daftar['tempat_ibu'] ?></td>
				 <td><?= $daftar['tgl_lahir_ibu'] ?></td>
				 <td><?= $daftar['pendidikan_ibu'] ?></td>
				 <td><?= $daftar['pekerjaan_ibu'] ?></td>
				 <td><?= $daftar['penghasilan_ibu'] ?></td>
				 <td><?= $daftar['no_hp_ibu'] ?></td>
				 <td><?= $daftar['nik_wali'] ?></td>
				 <td><?= $daftar['nama_wali'] ?></td>
				 <td><?= $daftar['tempat_wali'] ?></td>
				 <td><?= $daftar['tgl_lahir_wali'] ?></td>
				 <td><?= $daftar['pendidikan_wali'] ?></td>
				 <td><?= $daftar['pekerjaan_wali'] ?></td>
				 <td><?= $daftar['penghasilan_wali'] ?></td>
				 <td><?= $daftar['no_hp_wali'] ?></td>

            </tr>

        <?php }
        ?>


    </tbody>
</table>