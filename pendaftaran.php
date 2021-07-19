<?php
require "config/database.php";
require "config/function.php";
require "config/functions.crud.php";
?>
<link rel="stylesheet" type="text/css" href="assets/front/vendor/countdowntime/flipclock.css">
<style type="text/css" media="screen">
    .select2-container--default .select2-results__option[aria-disabled="true"]{
        color: red !important;
    }
</style>
<?php
	$akhir  = new DateTime($setting['tgl_pembukaan']); //Waktu awal
	$awal = new DateTime(); // Waktu sekarang atau akhir
	$diff  = $awal->diff($akhir);
	?>
<?php if ($akhir <= $awal) { ?>
<div class="row">
    <div class="col-md-8 animated bounceInLeft">
        <div class="card">
            <div class="card-header">
                <h4>Form Pendaftaran (ISI DENGAN BENAR)</h4>
            </div>
            <form id="form-daftar">
                <div class="card-body">
                    <div class="form-group">
                        <label for="jenis">JALUR PENDAFTARAN</label>
                            <select class="form-control select2" name="jenis" id="jenis" required>
                           <option value="">PILIH</option>
                            <?php $jnz = mysqli_query($koneksi, "select * from jenis where status='1' ORDER BY nama_jenis DESC");
                            while ($jnzz = mysqli_fetch_array($jnz)) {
                            ?>
                                <option value="<?= $jnzz['id_jenis'] ?>"> <?= $jnzz['nama_jenis'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
					<div class="form-group">
                        <label for="asal">TINGKATAN</label>
                        <select class="form-control select2 jurusan_" style="width: 100%" name="jurusan" id="jurusan" required>
                            <option value="">PILIH TINGKATAN</option>
                            <?php $qu = mysqli_query($koneksi, "select * from jurusan where status='1'");
                            while ($jur = mysqli_fetch_array($qu)) {
                             if ($jur['sisa_kuota'] == '0') {
                            ?>
                                 <option value="<?= $jur['id_jurusan'] ?>" disabled> <?= $jur['nama_jurusan'] ?> [Kuota Sudah Penuh]</option>
                            <?php }else{ ?>     
                                <option value="<?= $jur['id_jurusan'] ?>" > <?= $jur['nama_jurusan'] ?></option>
                            

                            <?php }} ?>

                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="nisn">NISN* (Klik disini untuk <a target="_blank" href="#">Cek NISN </a>)</label>
                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" class="form-control" name="nisn" placeholder="NISN" autocomplete="off" required>
                    </div> -->
                    <div class="form-group">
                        <label for="nama">NAMA LENGKAP*</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
                    </div>
					
                    
					 <!-- <div class="form-group">
                        <label for="asal">ASAL SEKOLAH SMP/MTS*</label>
                        <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" name="asal" placeholder="nama sekolah" autocomplete="off" required>
                    </div>
					<div class="form-group">
                        <label for="asal">NPSN ASAL SEKOLAH*</label>
                        <input type="number" class="form-control" name="npsn_asal" placeholder="npsn sekolah asal" autocomplete="off" required>
                    </div> -->
                    <!--<div class="form-group">
                        <label for="asal">ASAL SEKOLAH SMP/MTS</label>
                        <select class="form-control select2" style="width: 100%" name="asal" id="asal" onchange='EnableDisableTextBox(this)' required>
						<option value="">PILIH</option>
                            <?php $qu = mysqli_query($koneksi, "select * from sekolah where status='1'");
                            while ($data = mysqli_fetch_array($qu)) {
                            ?>
                                <option value="<?= $data['npsn'] ?>"> <?= $data['nama_sekolah'] ?></option>
                            <?php } ?>
                            <option value="0">LAINNYA</option>
                        </select>
						<input type="text" class='form-control' id="txtOther" name="txtOther" disabled="disabled" required="true"/>
                    </div>-->
                    <div class="form-group">
                        <label for="nohp">NO HANDPHONE (diisi untuk info dan konfirmasi)</label>
                        <input type="number" class="form-control" name="nohp" placeholder="No HP Whatsapp" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tempat">TEMPAT LAHIR</label>
                            <input type="text" class="form-control" name="tempat" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tgllahir">TANGGAL LAHIR ( Thn-Bln-Tgl)</label>
                            <input type="text" class="form-control datepicker" name="tgllahir" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="inputPassword4">PASSWORD (Mohon Diingat!)</label>
                        <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password" required>
                    </div>

                    <div class="form-group mb-0">
                        <p>* HARAP ISIKAN DATA DENGAN BENAR</p>
                        <p>* PASSWORD PIN AKAN DIGUNAKAN UNTUK LOGIN</p>

                    </div>
                </div>
                <div class="card-footer">
                    <button id='btnsimpan' type="submit" class="btn btn-lg btn-primary">SIMPAN DATA</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4 animated bounceInRight">
        <div class="card">
            <div class="card-header">
                <h4>Info Lebih Lanjut</h4>
            </div>
            <div class="card-body">
                <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                    <?php $query = mysqli_query($koneksi, "select * from kontak where status='1'");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <li class="media">
                            <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/avatar/avatar-1.png">
                            <div class="media-body">
                                <div class="media-title"><?= $data['nama_kontak'] ?></div>
                                <div class="text-job text-muted"><a href="https://api.whatsapp.com/send?phone=+62<?= $data['no_kontak'] ?>&text=<?= $setting['livechat'] ?>"> <?= $data['no_kontak'] ?></a></div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
				<div class="animated bounceInLeft p-t-34 p-b-60 respon3">
						<h3 class="l1-txt2 p-b-45 respon2 respon4" align="center">
							Pendaftaran DiBuka Dalam
						</h3></br>

						<div class="cd100 section-header"></div>
					<?php } ?>
					</div>
<script src="assets/front/vendor/countdowntime/flipclock.min.js"></script>
	<script src="assets/front/vendor/countdowntime/moment.min.js"></script>
	<script src="assets/front/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="assets/front/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="assets/front/vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeMonth: <?= $diff->m ?>,
			endtimeDate: <?= $diff->d ?>,
			endtimeHours: <?= $diff->h ?>,
			endtimeMinutes: <?= $diff->i ?>,
			endtimeSeconds: <?= $diff->s ?>,
			timeZone: ""
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<script>
    $('#form-daftar').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'crud_web.php?pg=simpan',
            data: $(this).serialize(),
            beforeSend: function() {
                $('#btnsimpan').prop('disabled', true);
            },
            success: function(data) {
                var json = $.parseJSON(data);
                $('#btnsimpan').prop('disabled', false);
                if (json.pesan == 'ok') {
                    iziToast.success({
                        title: 'Terima Kasih!',
                        message: 'Data berhasil disimpan',
                        position: 'topRight'
                    });
                    setTimeout(function() {
					document.documentElement.scrollTop = 0;
                        $('#isi_load').load('konfirmasi.php?id=' + json.id + '&pass=' + json.pass + '&nama=' + json.nama);
                    }, 2000);

                } else {
                    iziToast.error({
                        title: 'Maaf!',
                        message: json.pesan,
                        position: 'topCenter'
                    });
                }
                //$('#bodyreset').load(location.href + ' #bodyreset');
            }
        });
        return false;
    });
    if (jQuery().daterangepicker) {
        if ($(".datepicker").length) {
            $('.datepicker').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                },
                singleDatePicker: true,
            });
        }
        if ($(".datetimepicker").length) {
            $('.datetimepicker').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD hh:mm'
                },
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
            });
        }
        if ($(".daterange").length) {
            $('.daterange').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                },
                drops: 'down',
                opens: 'right'
            });
        }
    }
    if (jQuery().select2) {
        $(".select2").select2();
    }
</script>
<!--<script>
    function EnableDisableTextBox(asal) {
        var selectedValue = asal.options[asal.selectedIndex].value;
        var txtOther = document.getElementById("txtOther");
        txtOther.disabled = selectedValue == 0 ? false : true;
        if (!txtOther.disabled) {
            txtOther.focus();
        }
    }
</script>-->