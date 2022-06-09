<?php
include "header.php";
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Data Covid-19</h1>

    <a href="<?php echo site_url('Admin/kelola_covid') ?>" class="btn btn-secondary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Edit Data Covid-19</h6>
    </div>

    <?php echo form_open('Admin/edit_covid/' . $this->uri->segment(3), array('class' => 'form-horizontal')); ?>

    <div class="card-body">
        <?php echo validation_errors() ?>
        <?php foreach ($covid as $key) { ?>
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Pilih Kelurahan</label>
                <!-- <input autocomplete="off" type="text" name="kelurahan" value="<?php echo $key->kelurahan ?>" required class="form-control" /> -->
                <select name="fk_kelurahan" id="inputFk_kelurahan" class="form-control">
                    <option value="<?php echo $key->id_kelurahan ?>">

                        --<?php echo $key->nama_kelurahan ?>--
                    </option>
                    <?php foreach ($kelurahan as $val) { ?>
                        <option value="<?php echo $val->id_kelurahan ?>">

                            <?php echo $val->nama_kelurahan ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Positif</label>
                <input autocomplete="off" type="text" name="positif" value="<?php echo $key->positif ?>" required class="form-control" />
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Sembuh</label>
                <input autocomplete="off" type="text" name="sembuh" value="<?php echo $key->sembuh ?>" required class="form-control" />
            </div>
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Meninggal</label>
                <input autocomplete="off" type="text" name="meninggal" value="<?php echo $key->meninggal ?>" required class="form-control" />
            </div>
            <!-- <div class="form-group col-md-12">
                <label class="font-weight-bold">Isolasi Mandiri</label>
                <input autocomplete="off" type="text" name="isoman" value="<?php echo $key->isoman ?>" required class="form-control" />
            </div> -->
            <div class="form-group col-md-12">
                <label class="font-weight-bold">Tanggal</label>
                <input autocomplete="off" type="date" name="tanggal" value="<?php echo $key->tanggal ?>" required class="form-control" />
            </div>
        <?php } ?>
    </div>

    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
        <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
    </div>
    <?php echo form_close(); ?>
</div>

<?php
include "footer.php";
?>