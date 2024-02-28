<div class="col-md-12">
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
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr class="text-center">
                        <th width="50px">No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($produk as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['kode_produk'] ?></td>
                            <td><?= $value['nama_produk'] ?></td>
                            <td class="text-right">Rp. <?= number_format($value['harga_beli'], 0) ?></td>
                            <td class="text-right">Rp. <?= number_format($value['harga_jual'], 0) ?></td>
                            <td class="text-center"><?= $value['satuan'] ?></td>
                            <td class="text-center"><?= $value['nama_kategori'] ?></td>
                            <td class="text-center"><?= $value['stok'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit-data<?= $value['id_produk'] ?>"><i class=" fas fa-pencil-alt"></i></button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-data<?= $value['id_produk'] ?>"><i class="fas fa-trash"></i></button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>


<!-- Tambah Produk -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo  form_open('Produk/TambahData') ?>

            <div class="card-body">
                <div class="form-group">
                    <label for="">Kode Produk</label>
                    <input name="kode_produk" type="text"  class="form-control" placeholder="Masukan Kode Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input name="nama_produk" type="text" class="form-control" placeholder="Masukan Nama Produk" required></input>
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <input name="harga_beli" type="text" class="form-control" placeholder="Masukan Harga Beli" required></input>
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <input name="harga_jual" type="text" class="form-control" placeholder="Masukan Harga Jual" required>
                </div>
                <div class="form-group">
                    <label for="">Stok</label>
                    <input name="stok" type="text"  class="form-control" placeholder="Masukan Stok" required>
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
<?php foreach ($produk as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo  form_open('Produk/EditData/' . $value['id_produk']) ?>
                <div class="modal-body">

                <div class="form-grup">
                    <label for="">Kode Produk</label>
                    <input name="kode_produk"  value="<?= $value['kode_produk'] ?>" class="form-control"  readonly>
                </div>

                <div class="form-grup">
                    <label for="">Nama Produk</label>
                    <input name="nama_produk" value="<?= $value['nama_produk'] ?>" class="form-control"  required>
                </div>

                <div class="form-grup">
                    <label for="">Harga Jual</label>
                    <input name="harga_jual" value="<?= $value['harga_jual'] ?>" class="form-control"  >
                </div>

                <div class="form-grup">
                    <label for="">Harga Beli</label>
                    <input name="harga_beli" value="<?= $value['harga_beli'] ?>" class="form-control"  >
                </div>

                <div class="form-group">
                    <label for="">Satuan</label>
                    <select name="satuan" value="<?= $value['satuan'] ?>" class="form-control custom-select">
                        <option>Volume</option>
                        <option>Bundle</option>
                    </select>
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
<?php foreach ($produk as $key => $value) { ?>
    
    <div class="modal fade" id="hapus-data<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <p>Apkah Anda yakin ingin menghapus <?= $value['nama_produk'] ?></p>

                </div>
                <div class="modal-footer justify-content-between">
                    <a href="<?= base_url('Produk/HapusData/' . $value['id_produk']) ?>" class="btn btn-danger ">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


