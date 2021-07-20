

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Data Kuisioner</h4>
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
                                <th>Hafal Surat Al-fatihah ?</th>
                                <th>Hafal Nama-nama warna pelangi ?</th>
                                <th>Hafal Nama ayah dan bunda ?</th>
                                <th>Hafal syahadat ?</th>
                                <th>Hafal No HP ayah bunda ?</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $query = mysqli_query($koneksi, "select * from kuisioner ORDER BY dt DESC");
                            $no = 0;
                            while ($daftar = mysqli_fetch_array($query)) {
                                $no++;
                                $user = mysqli_fetch_array(mysqli_query($koneksi, "select no_daftar,nama from daftar where id_daftar='$daftar[id_daftar]' "));
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $user['no_daftar'] ?></td>
                                    <td><?= $user['nama'] ?></td>
                                    <td><?= $daftar['kuis_1'] ?></td>
                                    <td><?= $daftar['kuis_2'] ?></td>
                                    <td><?= $daftar['kuis_3'] ?></td>
                                    <td><?= $daftar['kuis_4'] ?></td>
                                    <td><?= $daftar['kuis_5'] ?></td>
                                </tr>
                            <?php }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>