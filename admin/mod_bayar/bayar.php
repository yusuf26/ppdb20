

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Pembayaran</h4>
                <div class="card-header-action">
                    <!-- <a class="btn btn-primary" href="mod_daftar/export_excel.php" role="button"> Download Excel</a> -->
                   <!-- <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambahdata">
                        <i class="far fa-edit"></i> Tambah Data
                    </button>-->
                </div>
            </div>
            <?php 
                   // $cekJurusan = fetch($koneksi, 'daftar', ['id_daftar' => 357 ]);

                // print_r($cekJurusan);
                    // $cariJurusan = fetch($koneksi, 'jurusan', ['id_jurusan' => $cekJurusan['jurusan']]);
                    // echo $cariJurusan['sisa_kuota'];

             ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table style="font-size: 12px" class="table table-striped table-sm" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>No Daftar</th>
                                <th>Nama Pendaftar</th>
                                <th>Tgl Bayar</th>
                                <th>Jumlah</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            if(isset($_GET['id'])){
                            	$id = dekripsi($_GET['id']);
                            	$query = mysqli_query($koneksi, "select * from bayar WHERE id_daftar = '$id' ORDER BY tgl_bayar DESC");
                            }else {
                            	$query = mysqli_query($koneksi, "select * from bayar ORDER BY tgl_bayar DESC");	
                            }
                            
                            $no = 0;
                            while ($daftar = mysqli_fetch_array($query)) {
                                $no++;
                                $user = mysqli_fetch_array(mysqli_query($koneksi, "select no_daftar,nama from daftar where id_daftar='$daftar[id_daftar]' "));
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $user['no_daftar'] ?></td>
                                    <td><?= $user['nama'] ?></td>
                                    <td><?= date('d F Y',strtotime($daftar['tgl_bayar']));?></td>
							        <td><?= number_format($daftar['jumlah'],0,',','.') ;?></td>
							        <td><a href="<?= '../user/mod_formulir/dukumen-pembayaran/'.$daftar['bukti'];?>" target="_blink" class="btn btn-md btn-primary" title=""><i class="fa fa-file"></i></a></td>
                                    <td>
                                        <?php if ($daftar['verifikasi'] == 1) { ?>
                                            <span class="badge badge-success">diterima</span>
                                        <?php } elseif ($daftar['verifikasi'] == 2) { ?>
                                            <span class="badge badge-danger">ditolak </span>
                                        <?php } else { ?>
                                            <span class="badge badge-warning">pending</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-edit<?= $no ?>">
                                            <i class="fas fa-edit    "></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="modal-edit<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form id="form-edit<?= $no ?>">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" value="<?= $daftar['id_bayar'] ?>" name="id_bayar" class="form-control" required="">

                                                            <div class="form-group">
                                                                <div class="control-label">Pilih Status</div>
                                                                <div class="custom-switches-stacked mt-2">
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="0" class="custom-switch-input" checked>
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Dipending</span>
                                                                    </label>
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="1" class="custom-switch-input">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">Diterima</span>
                                                                    </label>
                                                                    <label class="custom-switch">
                                                                        <input type="radio" name="status" value="2" class="custom-switch-input">
                                                                        <span class="custom-switch-indicator"></span>
                                                                        <span class="custom-switch-description">ditolak</span>
                                                                    </label>


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <script>
                                    $('#form-edit<?= $no ?>').submit(function(e) {
                                        e.preventDefault();
                                        $.ajax({
                                            type: 'POST',
                                            url: 'mod_daftar/crud_daftar.php?pg=statusPembayaran',
                                            data: $(this).serialize(),
                                            success: function(data) {

                                                iziToast.success({
                                                    title: 'OKee!',
                                                    message: 'Status Berhasil diubah',
                                                    position: 'topRight'
                                                });
                                                setTimeout(function() {
                                                    window.location.reload();
                                                }, 2000);
                                                $('#modal-edit<?= $no ?>').modal('hide');
                                                //$('#bodyreset').load(location.href + ' #bodyreset');
                                            }
                                        });
                                        return false;
                                    });
                                </script>
                            <?php }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $('#table-1').on('click', '.hapus', function() {
        var id = $(this).data('id');
        console.log(id);
        swal({
            title: 'Are you sure?',
            text: 'Akan menghapus data ini!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: 'mod_daftar/crud_daftar.php?pg=hapus',
                    method: "POST",
                    data: 'id_daftar=' + id,
                    success: function(data) {
                        iziToast.error({
                            title: 'Horee!',
                            message: 'Data Berhasil dihapus',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    }
                });
            }
        })

    });
</script>