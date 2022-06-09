<?php
include "header.php";
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cubes"></i> Data Pengelompokan</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"style="color: #5f0a87;"><i class="fa fa-table"></i> Masukkan Data Pengelompokan</h6>
    </div>
    <?php echo form_open('Klaster/iterasi_klaster', array(
        'class' => 'form-horizontal'
    )); ?>
    <div class="card-body">

        <div class="row">
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Pilih Tanggal</label>

                <select name="tanggal" id="inputTanggal" class="form-control" required>
                    <?php foreach ($tanggal as $key) { ?>
                        <?php if ($key->tanggal == $key->tanggal) : ?>
                            <option value="<?php echo $key->tanggal ?>"><?php echo $key->tanggal ?></option>
                        <?php endif ?>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label class="font-weight-bold">Jumlah Klaster</label>

                <input type="text" name="jumlah" autocomplete="off" id="inputJumlah" class="form-control" required="required" placeholder="Jumlah Klaster Harus > 1">
                <input type="hidden" name="hidden" class="form-control" value="Tahun">
            </div>
        </div>
    </div>

    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Kelompokan</button>
        <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
    </div>

    <?php echo form_close(); ?>
</div>




<?php
include "footer.php";
?>