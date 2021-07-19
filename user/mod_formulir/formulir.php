<?php require "fungsi.php"; ?>
<div class="section-header">
    <h1>Formulir</h1>
</div>
<div class="row">
    <div class="col-12 col-sm-8 col-lg-8">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>Data Pendaftar</h4>
                <div class="card-header-action">
                    <a target="_blank" href="mod_formulir/print_daftar.php?id=<?= enkripsi($siswa['id_daftar']) ?>" type="button" class="btn btn-warning animated infinite pulse delay-2s"><i class="fas fa-print    "></i> Cetak Formulir</a>
                </div>
            </div>
            <?php $img = '<img alt="image" src="mod_formulir/images_siswa/'.$siswa['file_foto'].'" class="rounded-circle author-box-picture">'; ?>
            <div class="card-body">
                <div class="author-box-left">
                    <?php if ($siswa['file_foto'] != '' ) { ?>
                        <div class="img-fomulir">
                            <?php echo $img ?>
                        </div>
                    <?php }else{
                        echo ' <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle author-box-picture">';
                    } ?>

                    <div class="clearfix"></div>
                    <br>
                    <div class="author-box-job">Status Pendaftaran</div>
                    <?php if ($siswa['status'] == 1) { ?>
                        <span class="badge badge-success">Diterima</span>
                    <?php } elseif ($siswa['status'] == 2){ ?>
                        <span class="badge badge-danger">DiTolak</span>
                    <?php } else{?>
					<span class="badge badge-warning">pending</span>
                    <?php } ?>
                </div>
                <div class="author-box-details">

                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-user    "></i> Data Diri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-home    "></i> Data Alamat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user-friends    "></i> Orang Tua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link show_data" id="profile-tab3" data-toggle="tab" href="#dokumen" role="tab" aria-controls="dokumen" aria-selected="false"><i class="fas fa-file"></i> Dokumen</a>
                        </li>
						 <!-- <li class="nav-item">
                            <a class="nav-link" id="nilairaport-tab3" data-toggle="tab" href="#nilairaport" role="tab" aria-controls="nilairaport" aria-selected="false"><i class="fas fa-file"></i> Nilai Raport</a>
                        </li> -->

                    </ul>
                    <div class="tab-content" id="myTabContent2">

                        <div class="tab-pane fade" id="dokumen" role="tabpanel" aria-labelledby="profile-tab3">
                            <form id="dukumen-pendukung">
                                <h5><i class="fas fa-file"></i> Dokumen Pendukung</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label col-12 col-md-3 col-lg-3">Jenis Dokumen</label>
                                    <div class="col-sm-12 col-md-12">
                                       <select class="form-control" name="jenis" required="">
                                           <option value="">Pilih Dokumen</option>
                                           <?php 
                                            $data = mysqli_query($koneksi,"select * from jenis_dokumen");
                                                while($d = mysqli_fetch_array($data)){ 
                                           ?>
                                           <option value="<?php echo $d['id_jenis_dokumen'] ?>"><?php echo $d['nama_dokumen'] ?></option>
                                            <?php } ?>
                                       </select>
                                        
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label col-12 col-md-3 col-lg-3">File Dokumen</label>
                                    <div class="col-sm-12 col-md-12">
                                        <input type="file" name="file_dukung" accept=".pdf,.png,.jpg" class="form-control" required>
                                        <code>harus pdf max ipload 2mb/file</code>
                                    </div>
                                </div>
                                <div class="progress" style="display:none">
                					<div id="progressBar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                						<span class="sr-only">0%</span>
                					</div>
                				</div>
                                <div class="form-group">
                                    <p>*Harap isi data Dokumen Pendukung dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Dokumen Pendukung</button></center>
                            </div>
                        </form>
					    <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Dokumen</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="dokokumen">

                                   
                                </tbody>
                            </table>
						</div>
                     </div> 



					 <div class="tab-pane fade" id="nilairaport" role="tabpanel" aria-labelledby="nilairaport-tab3">
                        
						 <form id="nilai-raport">
						 <div class="form-group row mb-2">
						 
								 <h5><i class="fas fa-home    "></i> ISI Nilai Rata Rata RAPORT</h5>
                                    <div class="col-sm-12">
									
                                   	<table class="table table-striped table-sm">
<tbody>
<tr>
<th style="width: 50px;">NILAI RATA RATA RAPORT</th>
<th style="width: 50px;">ISI NILAI</th>
</tr>
<tr>
<td style="width: 50px;">Semester 1</td>
<td style="width: 60px;"><input size="4" type="text" name="agamasatu" value="<?= $siswa['agamasatu'] ?>"/></td>
</tr>
<tr>
<td style="width: 82px;">Semester 2</td>
<td style="width: 38px;"><input size="4" type="text" name="agamadua" value="<?= $siswa['agamadua'] ?>" /></td>
</tr>
<tr>
<td style="width: 82px;">Semester 3</td>
<td style="width: 44px;"><input size="4" type="text" name="agamatiga" value="<?= $siswa['agamatiga'] ?>" /></td>
</tr>
<tr>
<td style="width: 82px;">Semester 4</td>
<td style="width: 53px;"><input size="4" type="text" name="agamaempat" value="<?= $siswa['agamaempat'] ?>" /></td>
</tr>
<tr>
<td style="width: 82px;">Semester 5</td>
<td style="width: 53px;"><input size="4" type="text" name="agamalima" value="<?= $siswa['agamalima'] ?>" /></td>
</tr>
<tr>
<td style="width: 82px;">Semester 6</td>
<td style="width: 60px;"><input size="4" type="text" name="ipasatu" value="<?= $siswa['ipasatu'] ?>" /></td>
</tr>

</tbody>
</table>

								
								</div>
                                </div>
								
<h5><i class="fas fa-home    "></i> Nilai Rata Rata Ujian Sekolah</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nilau Rata rata US</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nilaius" class="form-control" value="<?= $siswa['nilaius'] ?>" placeholder="isi disini" required>
                                    </div>
                                </div>						 
						
								
                                  <div class="form-group">
                                    
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Nilai</button></center>
                                </div>
								
					</form>
					</div>
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                            <form id="form-datadiri">
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Pendaftaran</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="no" class="form-control" value="<?= $siswa['no_daftar'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jurusan</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" name="jurusan" class="form-control" value="<?= $siswa['jurusan'] ?>" disabled>
                                    </div>
                                </div>
								<div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">JALUR DAFTAR</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" name="prioritas" class="form-control" value="<?= $siswa['jenis'] ?>" disabled>
                                    </div>
                                </div>
								<!-- <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="asal" class="form-control"  value="<?= $siswa['asal_sekolah'] ?>">
                                    </div>
                                </div>
								<div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NPSN Asal Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="npsn_asal" class="form-control"  value="<?= $siswa['npsn_asal'] ?>" >
                                    </div>
                                </div>
								<div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">KOTA Asal Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="kota_asal_sekolah" class="form-control"  value="<?= $siswa['kota_asal_sekolah'] ?>" required>
                                    </div>
                                </div> -->
                               
                                <h5><i class="fas fa-home    "></i> Data Diri Siswa</h5>
                                <!-- <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="nisn" class="form-control" value="<?= $siswa['nisn'] ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required>
                                    </div>
                                </div> -->
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nik" class="form-control" value="<?= $siswa['nik'] ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KK</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nokk" class="form-control" value="<?= $siswa['no_kk'] ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nama" class="form-control" value="<?= $siswa['nama'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempat" class="form-control" value="<?= $siswa['tempat_lahir'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tgl Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tgllahir" class="form-control datepicker" value="<?= $siswa['tgl_lahir'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-4">
                                        <select class='form-control' name='jenkel' required>
                                            <option value=''>Pilih Jenis Kelamin</option>";
                                            <?php foreach ($jeniskelamin as $val => $key) { ?>
                                                <?php if ($siswa['jenkel'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $key ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $key ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='agama' required>
                                            <option value=''>Pilih Agama</option>";
                                            <?php foreach ($agama as $val) { ?>
                                                <?php if ($siswa['agama'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Handphone</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nohp" class="form-control" value="<?= $siswa['no_hp'] ?>" required>
                                    </div>
                                </div>
                              <!-- <?php if ($siswa['asal_sekolah_lain'] == '') { ?>
								 <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal Sekolah</label>
                                    <div class="col-sm-12 col-md-7">
									 <select class="form-control select2" style="width: 100%" name="asal" id="asal" required>
						<option value="">PILIH</option>
                            <?php $qu = mysqli_query($koneksi, "select * from sekolah where status='1'");
                            while ($data = mysqli_fetch_array($qu)) {
                            ?>
							<?php if ($siswa['asal_sekolah'] == $data['nama_sekolah']) { ?>
                                                    <option value="<?= $siswa['asal_sekolah'] ?>" selected><?= $data['nama_sekolah']?> </option>
                                                <?php  } else { ?>
                                <option value="<?= $data['npsn'] ?>"> <?= $data['nama_sekolah'] ?></option>
                            <?php } ?>
							<?php } ?>
                            
                        </select>
                          
                                    </div>
                                </div>
				
				<?php } else { ?>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal Sekolah lain</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="sekolahlain" class="form-control"  value="<?= $siswa['asal_sekolah_lain'] ?>">
                                    </div>
                                </div>
								 <?php } ?>-->
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Anak Ke</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="anakke" class="form-control" value="<?= $siswa['anak_ke'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Saudara</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="saudara" class="form-control" value="<?= $siswa['saudara'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tinggi Badan (Cm)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="tinggi" class="form-control" value="<?= $siswa['tinggi'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berat Badan (Kg)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="berat" class="form-control" value="<?= $siswa['berat'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Dalam Keluarga</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="statuskeluarga" class="form-control" value="<?= $siswa['status_keluarga'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No KIP<br/><sub> ( Kartu Indonesia Pintar)</sub></label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="kip" class="form-control" value="<?= $siswa['no_kip'] ?>" placeholder="kosongkan jika tidak punya KIP">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto<br/><sub> Max Foto 800kb, Foto harus JPG dan PNG</sub></label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="file" name="foto" class="form-control" >
                                    </div>
                                </div>
								<div class="form-group row align-items-center">
                <label class="form-control-label col-sm-3 text-md-right">Preview</label>
                <div class="col-sm-6 col-md-6">
                    <img src="<?php echo 'mod_formulir/images_siswa/'.$siswa['file_foto'].''?>" class="img-thumbnail" width="100">
                </div>
				</div>
                                <div class="form-group">
                                    <p>*Harap isi data alamat dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Diri</button></center>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                            <form id="form-alamat">
                                <h5><i class="fas fa-home    "></i> Data Alamat</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="alamat" class="form-control" value="<?= $siswa['alamat'] ?>" placeholder="nama jalan / kampung" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">RT / RW</label>
                                    <div class="col-sm-6 col-md-3">
                                        <input type="number" name="rt" class="form-control" value="<?= $siswa['rt'] ?>" required>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 col-md-3">
                                        <input type="number" name="rw" class="form-control" value="<?= $siswa['rw'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desa</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="desa" class="form-control" value="<?= $siswa['desa'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="kecamatan" class="form-control" value="<?= $siswa['kecamatan'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kabupaten / Kota</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="kota" class="form-control" value="<?= $siswa['kota'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="provinsi" class="form-control" value="<?= $siswa['provinsi'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode Pos</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="number" name="kodepos" class="form-control" value="<?= $siswa['kode_pos'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tinggal Bersama</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='tinggal' required>
                                            <option value=''>Pilih Tinggal</option>";
                                            <?php foreach ($jenistinggal as $val) { ?>
                                                <?php if ($siswa['tinggal'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jarak Ke Sekolah (Meter)</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="jarak" class="form-control" value="<?= $siswa['jarak'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berapa Menit Kesekolah</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="number" name="waktu" class="form-control" value="<?= $siswa['waktu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transportasi</label>
                                    <div class="col-sm-12 col-md-5">
                                        <select class='form-control' name='transportasi' required>
                                            <option value=''>Pilih Transportasi</option>";
                                            <?php foreach ($transport as $val) { ?>
                                                <?php if ($siswa['transportasi'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data alamat dengan sebenar-benarnya</p>
                                    <center><button type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Alamat</button></center>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                            <form id="form-orangtua">
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap Ayah</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK Ayah</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nikayah" class="form-control" value="<?= $siswa['nik_ayah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaayah" class="form-control" value="<?= $siswa['nama_ayah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempatayah" class="form-control" value="<?= $siswa['tempat_ayah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tglayah" class="datepicker form-control" value="<?= $siswa['tgl_lahir_ayah'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_ayah' required>
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_ayah' required>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_ayah' required>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_ayah'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP Ayah</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nohpayah" class="form-control" value="<?= $siswa['no_hp_ayah'] ?>">
                                    </div>
                                </div>
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap ibu</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK ibu</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nikibu" class="form-control" value="<?= $siswa['nik_ibu'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama ibu</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namaibu" class="form-control" value="<?= $siswa['nama_ibu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempatibu" class="form-control" value="<?= $siswa['tempat_ibu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tglibu" value="" class="datepicker form-control" value="<?= $siswa['tgl_lahir_ibu'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_ibu' required>
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_ibu' required>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_ibu' required>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_ibu'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Hp Ibu</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nohpibu" class="form-control" value="<?= $siswa['no_hp_ibu'] ?>">
                                    </div>
                                </div>
                                <h5><i class="fas fa-user-check    "></i> Data Lengkap wali</h5>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK wali</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nikwali" class="form-control" value="<?= $siswa['nik_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama wali</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="namawali" class="form-control" value="<?= $siswa['nama_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="text" name="tempatwali" class="form-control" value="<?= $siswa['tempat_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-4">
                                        <input type="text" name="tglwali" class="datepicker form-control" value="<?= $siswa['tgl_lahir_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pendidikan_wali'>
                                            <option value=''>Pilih Pendidikan</option>";
                                            <?php foreach ($pendidikan as $val) { ?>
                                                <?php if ($siswa['pendidikan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='pekerjaan_wali'>
                                            <option value=''>Pilih Pekerjaan</option>";
                                            <?php foreach ($pekerjaan as $val) { ?>
                                                <?php if ($siswa['pekerjaan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penghasilan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class='form-control' name='penghasilan_wali'>
                                            <option value=''>Pilih Penghasilan</option>";
                                            <?php foreach ($penghasilan as $val) { ?>
                                                <?php if ($siswa['penghasilan_wali'] == $val) { ?>
                                                    <option value='<?= $val ?>' selected><?= $val ?> </option>
                                                <?php  } else { ?>
                                                    <option value='<?= $val ?>'><?= $val ?> </option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No HP wali</label>
                                    <div class="col-sm-12 col-md-5">
                                        <input type="number" name="nohpwali" class="form-control" value="<?= $siswa['no_hp_wali'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <p>*Harap isi data orang tua dengan sebenar-benarnya</p>
                                    <center><button id="btnsimpan" type="submit" class="btn btn-primary btn-lg mt-2">Simpan Data Orang Tua</button></center>
                                </div>
                            </form>
                        </div>

                    </div>
                             


                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-lg-4">
        <div class="card author-box card-primary">
            <div class="card-header">
                <h4>Progres Pengisian Formulir</h4>
                <div class="card-header-action">

                </div>
            </div>
            <div class="card-body">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            1
                        </div>
                        <div class="activity-detail">
                            <h5>Data Diri Siswa</h5>
                            <?php
                            $cek = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             nik                is  null and
                             no_kk              is  null and 
                             jenkel             is  null and
                             anak_ke            is  null and
                             saudara            is  null and
                             tinggi             is  null and
                             berat              is  null and
                             status_keluarga    is  null and
                             baju               is  null and
                             agama              is  null
                            "));
                            if ($cek <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            2
                        </div>
                        <div class="activity-detail">
                            <h5>Data Alamat Siswa</h5>
                            <?php
                            $cek = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             alamat                 is  null and
                             rt                     is  null and 
                             rw                     is  null and
                             desa                   is  null and
                             kecamatan              is  null and
                             kota                   is  null and
                             provinsi               is  null and
                             kode_pos               is  null and
                             tinggal                is  null and
                             jarak                  is  null and
                             waktu                  is  null and
                             transportasi           is  null
                            "));
                            if ($cek <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            3
                        </div>
                        <div class="activity-detail">
                            <h5>Data Orang Tua</h5>
                            <?php
                            $cek = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             nik_ayah                 is  null and
                             nama_ayah                     is  null and 
                             tempat_ayah                    is  null and
                             tgl_lahir_ayah                   is  null and
                             pendidikan_ayah              is  null and
                             pekerjaan_ayah                  is  null and
                             penghasilan_ayah              is  null and
                             nik_ibu                 is  null and
                             nama_ibu                     is  null and 
                             tempat_ibu                    is  null and
                             tgl_lahir_ibu                   is  null and
                             pendidikan_ibu              is  null and
                             pekerjaan_ibu                 is  null and
                             penghasilan_ibu              is  null 
                             
                            "));
                            if ($cek <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--<div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            4
                        </div>
                        <div class="activity-detail">
                            <h5>Dokumen Pendukung</h5>
                            <?php
                            $cek = mysqli_num_rows(mysqli_query($koneksi, "select * from daftar where
                             id_daftar         = '$siswa[id_daftar]' and
                             file_rar                 is  null 
                            
                             
                            "));
                            if ($cek <> 0) { ?>
                                <p><span class="badge badge-danger"><i class="fas fa-times-circle"></i> Belum Lengkap</span></p>
                            <?php } else { ?>
                                <p><span class="badge badge-success"><i class="fas fa-check-circle"></i> Lengkap</span></p>
                            <?php } ?>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>
<script>
    $('.form-control').keyup(function(event) {

        $(this).val($(this).val().toUpperCase());
    });
    $(document).ready(function() {

        $('#dukumen-pendukung').submit(function(e) {
            e.preventDefault();
			$('.progress').show();
            $.ajax({
			xhr : function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener('progress', function(e){
					if(e.lengthComputable){
						console.log('Bytes Loaded : ' + e.loaded);
						console.log('Total Size : ' + e.total);
						console.log('Persen : ' + (e.loaded / e.total));
						
						var percent = Math.round((e.loaded / e.total) * 100);
						
						$('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%').text(percent + '%');
					}
				});
				return xhr;
			},
                type: 'POST',
                url: 'mod_formulir/crud_formulir.php?pg=simpanDukumen',
                //data: $(this).serialize(),
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    $('[name="file_dukung"]').val(); 
                    load_data();
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter',
                            // timeout: 1000,
                        });
                       setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }else if(json == 'gagal'){
                         iziToast.error({
                            title: 'Maaf!',
                            message: 'Format File yang anda Masukan salah',
                            position: 'topCenter'
                        });
                        load_data();
                    }else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                        load_data();
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });

        function load_data() {
            //var id = $(this).attr("id");
          $.ajax({
            url: 'mod_formulir/crud_formulir.php?pg=tampil',  
            method: 'post',  
            data: false,  
            success:function(data){   
              $('#dokokumen').html(data);             
            }
          });
        }


        $('#form-pembayaran').submit(function(e) {
            e.preventDefault();
            // $('.progress').show();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_formulir.php?pg=simpanPembayaran',
                //data: $(this).serialize(),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(data) {
                    $('[name="bukti"]').val(); 
                    load_data_pembayaran();
                    var json = data;
                    // $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter',
                            // timeout: 1000,
                        });
                       setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }else if(json == 'gagal'){
                         iziToast.error({
                            title: 'Maaf!',
                            message: 'Format File yang anda Masukan salah',
                            position: 'topCenter'
                        });
                        load_data_pembayaran();
                    }else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                        load_data_pembayaran();
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });

        function load_data_pembayaran() {
            //var id = $(this).attr("id");
          $.ajax({
            url: 'mod_formulir/crud_formulir.php?pg=tampilPembayaran',  
            method: 'post',  
            data: false,  
            success:function(data){   
              $('#table-pembayaran').html(data);             
            }
          });
        }
         load_data_pembayaran();
         load_data();
        $(document).on('click','.show_data',function(){
            //$('[name="kode"]').val(id);
            load_data();
        });
        $(document).on('click', '.hapus', function(){
          var id = $(this).attr("data");
          // memulai ajax
          $.ajax({
            url: 'mod_formulir/crud_formulir.php?pg=hapus',  
            method: 'post',  
            data: {id:id},  
            success:function(data){ 
            $('[name="file_dukung"]').val();  
               load_data();
               if(data == 'ok'){
                         iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil Hapus',
                            position: 'topCenter',
                        });
                    }else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
            }
          });
        });
		 $('#nilai-raport').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_formulir.php?pg=simpanraport',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });
						 setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-datadiri').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_formulir.php?pg=simpandatadiri',
                //data: $(this).serialize(),
                data: new FormData(this),
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter',
                            // timeout: 1000,
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }else if(json == 'gagal'){
                         iziToast.error({
                            title: 'Maaf!',
                            message: 'Format File Foto yang anda Masukan salah',
                            position: 'topCenter'
                        });
                    }else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-alamat').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_formulir.php?pg=simpanalamat',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });
						 setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        $('#form-orangtua').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'mod_formulir/crud_formulir.php?pg=simpanortu',
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#btnsimpan').prop('disabled', true);
                },
                success: function(data) {
                    var json = data;
                    $('#btnsimpan').prop('disabled', false);
                    if (json == 'ok') {
                        iziToast.success({
                            title: 'Terima Kasih!',
                            message: 'Data berhasil disimpan',
                            position: 'topCenter'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        iziToast.error({
                            title: 'Maaf!',
                            message: json,
                            position: 'topCenter'
                        });
                    }
                    //$('#bodyreset').load(location.href + ' #bodyreset');
                }
            });
            return false;
        });
        // $("#form-datadiri").validate({
        //     rules: {
        //         "b[firstname]": {
        //             required: true
        //         },
        //         "b[email]": {
        //             required: true,
        //             email: true
        //         },
        //         "book[contact]": {
        //             required: true
        //         }
        //     },
        //     submitHandler: function(form) {
        //         var formData = $(form).serialize();
        //         alert(formData); // for demo
        //         // comment out ajax for demo
        //         /*
        //         $.ajax({
        //             url: "bs_client_function.php?action=new_b",
        //             type: "post",
        //             data: formData,
        //             beforeSend: function () {

        //             },
        //             success: function (data) {

        //             }
        //         });
        //         */
        //     }
        // });

    });

</script>
<style type="text/css">
table {
    border-collapse: collapse;
}
table, th, td {
    border: 1px solid black;
    padding: 2px;
}

table, th, td {
    text-align: center;
}
</style>