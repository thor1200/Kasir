<div class="col-md-24">
    <div class="card card-primary ">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"> Tambah</i>
                    </btton>
            </div>

        </div>

        <div class="card-body">
            <?php
            if (session()->getFlashData('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashData('pesan');
                echo '</h5></div>';
            }
            ?>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Nomor Telpon</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pelanggan as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['alamat'] ?></td>
                            <td class="text-center"><?= $value['nomor_telpon'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm " data-toggle="modal" data-target="#edit-data<?= $value['id_pelanggan'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm " data-toggle="modal" data-target="#hapus-data<?= $value['id_pelanggan'] ?>"><i class="fas fa-trash"></i></button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>


<!--Modal Tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo  form_open('Pelanggan/TambahData') ?>
            <div class="modal-body">

                <div class="form-grup">
                    <label for="">Nama Pelangganr</label>
                    <input name="nama" class="form-control" placeholder="Nama Pelanggan" required>
                </div>

                <div class="form-grup">
                    <label for="">Alamat</label>
                    <input name="alamat" class="form-control" placeholder="Alamat" required>
                </div>

                <div class="form-grup">
                    <label for="">No Telpon</label>
                    <input name="nomor_telpon" class="form-control" placeholder="Nomor Telpon" required>
                </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" class="btn btn-primary ">Simpan</button>
            </div>
            <?php echo  form_close() ?>
        </div>

    </div>

</div>


<!--Modal Edit -->
<?php foreach ($pelanggan as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_pelanggan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo  form_open('Pelanggan/EditData/' . $value['id_pelanggan']) ?>
                <div class="modal-body">

                <div class="form-grup">
                    <label for="">Nama Pelanggan</label>
                    <input name="nama"  value="<?= $value['nama'] ?>" class="form-control" placeholder="Nama Pelanggan" required>
                </div>

                <div class="form-grup">
                    <label for="">Alamat</label>
                    <input name="alamat" value="<?= $value['alamat'] ?>" class="form-control" placeholder="Alamat" required>
                </div>

                <div class="form-grup">
                    <label for="">nomor_telpon</label>
                    <input name="nomor_telpon" value="<?= $value['nomor_telpon'] ?>" class="form-control" placeholder="nomor_telpon" readonly>
                </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-warning ">Simpan</button>
                </div>
                <?php echo  form_close() ?>
            </div>

        </div>

    </div>
<?php } ?>


<!--Modal Hapus -->
<?php foreach ($pelanggan as $key => $value) { ?>
    <div class="modal fade" id="hapus-data<?= $value['id_pelanggan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p>Apkah Anda yakin ingin menghapus <?= $value['nama'] ?></p>

                </div>
                <div class="modal-footer justify-content-between">
                    <a href="<?= base_url('Pelanggan/HapusData/' . $value['id_pelanggan']) ?>" class="btn btn-danger ">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>