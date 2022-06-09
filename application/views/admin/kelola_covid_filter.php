<?php
include "header.php";
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-leaf"></i> Data Covid-19</h1>

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
        <h6 class="m-0 font-weight-bold"style="color: #5f0a87;"><i class="fa fa-table"></i> Filter Berdasarkan Tanggal</h6>
    </div>

    <div class="card-body">
        <?php echo form_open('Admin/filter_covid', array('class' =>
        'form-horizontal')); ?>
        <div class="row">
            <div class="input-group mb-3 col-10">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Pilih Tanggal</label>
                </div>
                <select name="tanggal" id="inputTanggal" class="custom-select" required>
                    <?php foreach ($tanggal as $key) { ?>
                        <?php if ($key->tanggal == $key->tanggal) : ?>
                            <option value="<?php echo $key->tanggal ?>"><?php echo $key->tanggal ?></option>
                        <?php endif ?>
                    <?php } ?>
                </select>
                <input type="hidden" name="hidden" class="form-control" value="Tanggal" />
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-success w-100"><i class="fa fa-search"></i> Filter</button>
            </div>
        </div>
        <?php echo form_close(); ?>
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