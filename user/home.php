<div class="section-header">
    <h1>Hai!, <?= $siswa['nama'] ?></h1>
</div>
<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php 
$id = $_SESSION['id_siswa'];
$siswa = fetch($koneksi, 'daftar', ['id_daftar' => $id ]); 
?>

<?php 
    if($siswa['status'] == 1){
        ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            Silahkan melakukan cetak bukti pendaftaran <a class="btn btn-success" href="mod_formulir/print_daftar.php?id=<?= enkripsi($siswa['id_daftar']) ?>" target="_blank" role="button">Cetak Bukti Pendaftaran</a>
        </div>
        <?php
    }else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            Silahkan lengkapi data diri anda dan melakukan pembayaran formulir <a class="btn btn-success" href="?pg=formulir" role="button">Isi Formulir</a>
             <a class="btn btn-success" href="?pg=bayar" role="button">Pembayaran</a>
        </div>
        <?php
    }
 ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="activities">
                    <?php $query = mysqli_query($koneksi, "SELECT * FROM pengumuman where jenis='1'");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job text-primary"><?= $data['tgl'] ?></span>
                                    <span class="bullet"></span>
                                    <a class="text-job" href="#">View</a>

                                </div>
                                <h5><?= $data['judul'] ?></h5>
                                <p><?= $data['pengumuman'] ?></p>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

    </div>
</div>