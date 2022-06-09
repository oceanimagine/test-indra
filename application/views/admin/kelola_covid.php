<?php
include "header.php";
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Data Covid-19</h1>

    <!-- <a href="<?php echo site_url('Admin/import_covid') ?>" class="btn btn-primary"> <i class="fa fa-print"></i> Import Data </a> -->
    <!-- <a href="<?php echo site_url('Admin/tambah_covid') ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a> -->
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-plus"></i> Tambah Data
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#" data-target="#import" data-toggle="modal"><i class="far fa-file-excel"></i> Import Excel</a>
            <a class="dropdown-item" href="<?php echo site_url('Admin/tambah_covid') ?>"><i class="fa fa-plus"></i> Add Data</a>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"style="color: #5f0a87;"><i class="fa fa-table"></i> Daftar Data Covid-19</h6>
    </div>
    
    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-success text-white">
                <tr align="center">
                    <th width="5%">No</th>
                    <th>Kelurahan</th>
                    <th>Positif</th>
                    <th>Sembuh</th>
                    <th>Meninggal</th>
                    <!-- <th>Isolasi Mandiri</th> -->
                    <th>Tanggal</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($covid as $key) { ?>
                    <tr>
                        <td class="text-center"><?php echo $no ?></td>
                        <td><?php echo $key->nama_kelurahan ?></td>
                        <td><?php echo $key->positif ?></td>
                        <td><?php echo $key->sembuh ?></td>
                        <td><?php echo $key->meninggal ?></td>
                        <!-- <td><?php echo $key->isoman ?></td> -->
                        <td><?php echo $key->tanggal ?></td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="<?php echo site_url('Admin/edit_covid/' . $key->id_covid) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo site_url('Admin/delete_covid/' . $key->id_covid) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                        <?php $no++ ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- <button onclick="window.print()">Print this page</button> -->
    </div>
</div>

<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form method="POST" action="<?= base_url('Admin/import_excel') ?>"> -->
                <?= form_open_multipart('Admin/import_excel') ?>
                <div class="form-group">
                    <label for="">Silahkan Import File Excel</label>
                    <input type="file" id="uploadexcel" class="form-control" name="importexcel" accept=".xlsx,.xls">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>