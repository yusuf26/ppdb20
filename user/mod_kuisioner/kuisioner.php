<?php 
$id = $_SESSION['id_siswa'];
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id ]); 
$kuis = fetch($koneksi, 'kuisioner', ['id_daftar' => $id ]);
$disabled = false;
if(!empty($kuis)){
	$disabled = 'disabled';
} 
?>

<div class="section-header">
    <h1>Kuisioner</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form id="form-kuisioner">
                	<input type="hidden" name="id_daftar" value="<?= $id;?>" />
                    <h5><i class="fas fa-file"></i> Form Kuisioner</h5>
                    <div class="form-group row mb-2">
                        <label class="col-form-label text-md-left col-12 col-md-3">1. Apakah <?= $siswa['nama'];?> hafal surat al fatihah ?</label>
                        <div class="col-sm-12 col-md-6">
                            <select class="form-control" name="kuis_1" <?= $disabled;?>>
                            	<option value="">.. Pilih Jawaban ..</option>
                            	<option value="Sudah" <?= (isset($kuis) && $kuis['kuis_1'] ==  'Sudah') ? ' selected="selected"' : '';?> >Sudah</option>
                            	<option value="Belum" <?= (isset($kuis) && $kuis['kuis_1'] ==  'Belum') ? ' selected="selected"' : '';?> >Belum</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-form-label text-md-left col-12 col-md-3">2. Apakah <?= $siswa['nama'];?> hafal nama-nama warna pelangi ?</label>
                        <div class="col-sm-12 col-md-6">
                            <select class="form-control" name="kuis_2" <?= $disabled;?>>
                                <option value="">.. Pilih Jawaban ..</option>
                                <option value="Sudah" <?= (isset($kuis) && $kuis['kuis_1'] ==  'Sudah') ? ' selected="selected"' : '';?> >Sudah</option>
                                <option value="Belum" <?= (isset($kuis) && $kuis['kuis_1'] ==  'Belum') ? ' selected="selected"' : '';?> >Belum</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-form-label text-md-left col-12 col-md-3">3. Apakah <?= $siswa['nama'];?> hafal nama ayah dan bunda ?</label>
                        <div class="col-sm-12 col-md-6">
                            <select class="form-control" name="kuis_3" <?= $disabled;?>>
                                <option value="">.. Pilih Jawaban ..</option>
                                <option value="Sudah" <?= (isset($kuis) && $kuis['kuis_1'] ==  'Sudah') ? ' selected="selected"' : '';?> >Sudah</option>
                                <option value="Belum" <?= (isset($kuis) && $kuis['kuis_1'] ==  'Belum') ? ' selected="selected"' : '';?> >Belum</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-form-label text-md-left col-12 col-md-3">4. Apakah <?= $siswa['nama'];?> hafal syahadat ?</label>
                        <div class="col-sm-12 col-md-6">
                            <textarea class="form-control" rows="3" name="kuis_4" <?= $disabled;?>><?= (isset($kuis)) ? $kuis['kuis_4'] : '';?></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-form-label text-md-left col-12 col-md-3">5. Apakah <?= $siswa['nama'];?> hafal no HP ayah bunda ?</label>
                        <div class="col-sm-12 col-md-6">
                            <textarea class="form-control" rows="3" name="kuis_5" <?= $disabled;?>><?= (isset($kuis)) ? $kuis['kuis_5'] : '';?></textarea>
                        </div>
                    </div>
                    <?php
                    if(empty($kuis)){
						?>
						<div class="form-group">
	                        <small><p>*Harap isi data kuisioner dengan sebenar-benarnya</p></small>
	                        <button id="btnsimpan" type="submit" class="btn btn-primary">Simpan Data Kuisioner</button>
	                    </div>
						<?php	
					}
                    ?>
                    
                </form>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
	$('#form-kuisioner').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'mod_formulir/crud_formulir.php?pg=simpanKuisioner',
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
</script>