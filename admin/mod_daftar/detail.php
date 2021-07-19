<!-- <div class="section-header">
    <h3>Detail Pendaftar</h3>
</div> -->
<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php $siswa = fetch($koneksi, 'daftar', ['id_daftar' => dekripsi($_GET['id'])]); ?>
<div class="row">
    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>Data Pendaftar</h4>
                <div class="card-header-action">
                    <a target="_blank" href="mod_daftar/print_daftar.php?id=<?= $_GET['id'] ?>" type="button" class="btn btn-success"><i class="fas fa-print    "></i> Cetak Form</a>
                </div>
            </div>
            <div class="card-body">
                <div class="author-box-left">
                  
                    <?php if ($siswa['file_foto'] != '' ) { ?>
                         <img alt="image" src="../user/mod_formulir/images_siswa/<?php echo $siswa['file_foto'] ?>" class="rounded-circle author-box-picture">
                    <?php }else{
                        echo ' <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle author-box-picture">';
                    } ?>
                    <div class="clearfix"></div>
                    <br>
                    <div class="author-box-job">Status Pendaftaran</div>
                    <?php if ($siswa['status'] == 1) { ?>
                        <span class="badge badge-success">Diterima</span>
                    <?php } elseif ($siswa['status'] == 2) { ?>
                        <span class="badge badge-danger">ditolak</span>
                    <?php }  else {?>
					<span class="badge badge-danger">pending</span>
                    <?php } ?>
                </div>
                <div class="author-box-details">

                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user    "></i> Data Diri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-friends    "></i> Orang Tua</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="profilee-tab3" data-toggle="tab" href="#raport" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-history    "></i> Nilai Raport</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#dokumen" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-file"></i> Dokumen Pendukung</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-history    "></i> Histori</a>
                        </li>-->
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane" id="dokumen" role="tabpanel" aria-labelledby="home-tab3">
                           <!-- <?php if ($siswa['file_rar'] != null) { ?>
                                 <div class="table-responsiv">
								  <table class="table table-striped table-sm ">
                                    <tbody>
                                        <tr>
                                            <td align="center" colspan="2"><i class="far fa-file-archive"></i> <b>Data File</b></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>NIK Ayah</b></td>
                                            <td align="left"><i class="far fa-file-archive"></i> <a href="../user/mod_formulir/dukumen-pendukung/<?php echo $siswa['file_rar'] ?>" title="download"> <?php echo $siswa['file_rar'] ?></a></td>
                                        </tr>
										</tbody>
										</table>
                            
                                   
                                
                           
                            </div>
                            <?php }else{ ?>
                                <div class="alert alert-warning">
             Dokumen Pendukung Belum Di Upload
                    </div>       
                            <?php  } ?>
                           
                        
                        </div>-->
						<div class="table-responsive">
						<table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Dokumen</th>
                                            <th>File</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="dokokumen">
                                       <?php 
                                       $no=1;
                                       $data = mysqli_query($koneksi,"select * from dokumen inner join jenis_dokumen ON jenis_dokumen.id_jenis_dokumen = dokumen.id_jenis_dokumen where id_daftar ='".dekripsi($_GET['id'])."'");
                                       while($d = mysqli_fetch_array($data)){
                                        echo'
                                        <tr>
                                        <td>'.$no++.'</td>
                                        <td>'.$d['nama_dokumen'].'</td>
                                        <td><a href="../user/mod_formulir/dukumen-pendukung/'.$d['file'].'" target="_blink" class="btn btn-md btn-primary" title="download"><i class="fa fa-file-download"></i> Download</a></td>
                                       
                                        </tr>
                                        ';
                                    }

                                        ?>
                                       
                                    </tbody>
                                </table>
                           </div>
                        
                        </div>
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <div class="table-responsiv">
                                <table class="table table-striped table-sm ">
                                    <tbody>
                                        <tr>
                                            <td align="left" width="20%"><b>NO Daftar</b></td>
                                            <td align="left"><?= $siswa['no_daftar'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Minat Jurusan</b></td>
                                            <td align="left"><?= $siswa['jurusan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Jalur Daftar</b></td>
                                            <td align="left"><?= $siswa['jenis'] ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td align="left"><b>NISN</b></td>
                                            <td align="left"><?= $siswa['nisn'] ?></td>
                                        </tr> -->
                                        <tr>
                                            <td align="left"><b>No. NIK</b></td>
                                            <td align="left"><?= $siswa['nik'] ?></td>
                                        </tr>
										<tr>
                                            <td align="left"><b>No. KK</b></td>
                                            <td align="left"><?= $siswa['no_kk'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Nama Lengkap</b></td>
                                            <td align="left"><?= $siswa['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Tempat Tgl Lahir</b></td>
                                            <td align="left"><?= $siswa['tempat_lahir'] ?>, <?= $siswa['tgl_lahir'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Jenis Kelamin</b></td>
                                            <td align="left"><?= ($siswa['jenkel'] == 'L') ? "Laki-Laki" : "Perempuan"; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>No Handphone</b></td>
                                            <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp']  ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <td align="left"><b>Asal Sekolah</b></td>
                                            <td align="left"><?= $siswa['asal_sekolah']  ?></td>
                                        </tr>
										 <tr>
                                            <td align="left"><b>NPSN Asal Sekolah</b></td>
                                            <td align="left"><?= $siswa['npsn_asal']  ?></td>
                                        </tr>
										 <tr>
                                            <td align="left"><b>KOTA Asal Sekolah</b></td>
                                            <td align="left"><?= $siswa['kota_asal_sekolah']  ?></td>
                                        </tr> -->
                                        <tr>
                                            <td align="left"><b>Alamat Siswa</b></td>
                                            <td align="left"><?= $siswa['alamat']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>RT / RW</b></td>
                                            <td align="left"><?= $siswa['rt']  ?>, <?= $siswa['rw']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Desa</b></td>
                                            <td align="left"><?= $siswa['desa']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Kecamatan</b></td>
                                            <td align="left"><?= $siswa['kecamatan']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Kota / Kabupaten</b></td>
                                            <td align="left"><?= $siswa['kota']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Provinsi</b></td>
                                            <td align="left"><?= $siswa['provinsi']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Kode Pos</b></td>
                                            <td align="left"><?= $siswa['kode_pos']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Anak Ke</b></td>
                                            <td align="left"><?= $siswa['anak_ke']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Agama</b></td>
                                            <td align="left"><?= $siswa['agama']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Saudara</b></td>
                                            <td align="left"><?= $siswa['saudara']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Tinggi Badan (Cm)</b></td>
                                            <td align="left"><?= $siswa['tinggi']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Berat Badan (Kg)</b></td>
                                            <td align="left"><?= $siswa['berat']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>NO KIP</b></td>
                                            <td align="left"><?= $siswa['no_kip']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Status Dalam Keluarga</b></td>
                                            <td align="left"><?= $siswa['status_keluarga']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Tinggal Bersama</b></td>
                                            <td align="left"><?= $siswa['tinggal']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Jarak KeSekolah (Meter)</b></td>
                                            <td align="left"><?= $siswa['jarak']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Waktu Tempuh (Menit)</b></td>
                                            <td align="left"><?= $siswa['waktu']  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            <div class="table-responsiv">
                                <table class="table table-striped table-sm ">
                                    <tbody>
                                        <tr>
                                            <td align="left" colspan="2"><i class="fas fa-user-friends"></i> <b>Data Lengkap Ayah</b></td>
                                        </tr>
                                        <tr>
                                            <td align="left" width="20%"><b>NIK Ayah</b></td>
                                            <td align="left"><i class="fas fa-id-card text-success"></i> <?= $siswa['nik_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Nama Lengkap Ayah</b></td>
                                            <td align="left"><?= $siswa['nama_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Tempat Tgl Lahir</b></td>
                                            <td align="left"><?= $siswa['tempat_ayah'] ?>, <?= $siswa['tgl_lahir_ayah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Pendidikan Ayah</b></td>
                                            <td align="left"><?= $siswa['pendidikan_ayah']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Pekerjaan Ayah</b></td>
                                            <td align="left"> <?= $siswa['pekerjaan_ayah']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Penghasilan Ayah</b></td>
                                            <td align="left"><?= $siswa['penghasilan_ayah']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>No Hp Ayah</b></td>
                                            <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_ayah']  ?></td>
                                        </tr>
                                        <!-- DATA LENGKAP IBU -->
                                        <tr>
                                            <td align="left " colspan="2"><i class="fas fa-user-friends"></i> <b>Data Lengkap Ibu</b></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>NIK Ibu</b></td>
                                            <td align="left"><i class="fas fa-id-card text-success"></i> <?= $siswa['nik_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Nama Lengkap Ibu</b></td>
                                            <td align="left"><?= $siswa['nama_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Tempat Tgl Lahir</b></td>
                                            <td align="left"><?= $siswa['tempat_ibu'] ?>, <?= $siswa['tgl_lahir_ibu'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Pendidikan Ibu</b></td>
                                            <td align="left"><?= $siswa['pendidikan_ibu']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Pekerjaan Ibu</b></td>
                                            <td align="left"> <?= $siswa['pekerjaan_ibu']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Penghasilan Ibu</b></td>
                                            <td align="left"><?= $siswa['penghasilan_ibu']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>No Hp Ibu</b></td>
                                            <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_ibu']  ?></td>
                                        </tr>

                                        <!-- DATA LENGKAP WALI -->
                                        <tr>
                                            <td align="left" colspan="2"><i class="fas fa-user-friends"></i> <b>Data Lengkap Wali</b></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>NIK Wali</b></td>
                                            <td align="left"><i class="fas fa-id-card text-success"></i> <?= $siswa['nik_wali'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Nama Lengkap Wali</b></td>
                                            <td align="left"><?= $siswa['nama_wali'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Tempat Tgl Lahir</b></td>
                                            <td align="left"><?= $siswa['tempat_wali'] ?>, <?= $siswa['tgl_lahir_wali'] ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Pendidikan Wali</b></td>
                                            <td align="left"><?= $siswa['pendidikan_wali']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Pekerjaan Wali</b></td>
                                            <td align="left"> <?= $siswa['pekerjaan_wali']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>Penghasilan Wali</b></td>
                                            <td align="left"><?= $siswa['penghasilan_wali']  ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><b>No Hp Wali</b></td>
                                            <td align="left"><i class="fab fa-whatsapp text-success"></i> <?= $siswa['no_hp_wali']  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="raport" role="tabpanel" aria-labelledby="profilee-tab3">
                            <div class="table-responsiv">
                            
                                <table style="width:400px align:center" class="table table-striped table-sm ">
                                    
<thead>
								<tr>
<th style="width: 100px;">NILAI RATA RATA US</th>
<th style="width: 100px;">NILAI</th>
<!--<th style="width: 100px;">SEM 2</th>
<th style="width: 100px;">SEM 3</th>
<th style="width: 100px;">SEM 4</th>
<th style="width: 100px;">SEM 5</th>
<th style="width: 100px;">RTA2</th>-->
</tr>
</thead>
								<tbody>
								

<tr>
<td style="width: 82px;">NILAI US</td>
<td style="width: 200px;"><?= $siswa['nilaius'] ?></td>
</tr>

</tbody>
</table>
<br/>
<table style="width:400px align:center" class="table table-striped table-sm ">
                                    

								<tbody>
								

<tr>
                    <td align="center" colspan="2"><b>NILAI RATA RATA RAPORT SEM 1 - SEM 6</b></td>
                </tr>
<tr>
<th style="width: 50px;">NILAI RATA RATA RAPORT</th>
<th style="width: 50px;">ISI NILAI</th>
</tr>
<tr>
<td style="width: 50px;">Semester 1</td>
<td style="width: 60px;"><?= $siswa['agamasatu'] ?></td>
</tr>
<tr>
<td style="width: 82px;">Semester 2</td>
<td style="width: 38px;"><?= $siswa['agamadua'] ?></td>
</tr>
<tr>
<td style="width: 82px;">Semester 3</td>
<td style="width: 44px;"><?= $siswa['agamatiga'] ?></td>
</tr>
<tr>
<td style="width: 82px;">Semester 4</td>
<td style="width: 53px;"><?= $siswa['agamaempat'] ?></td>
</tr>
<tr>
<td style="width: 82px;">Semester 5</td>
<td style="width: 53px;"><?= $siswa['agamalima'] ?></td>
</tr>
<tr>
<td style="width: 82px;">Semester 6</td>
<td style="width: 60px;"><?= $siswa['ipasatu'] ?></td>
</tr>
</tbody>
</table>
								
								 </div>
                        </div>
                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                            Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor.
                        </div>
                    </div>

                    <div class="w-100 d-sm-none"></div>
                  <!--   <div class="float-right mt-sm-0 mt-3">
                        <a href="#" class="btn">View Posts <i class="fas fa-chevron-left"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>