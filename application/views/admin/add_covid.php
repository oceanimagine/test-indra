<?php
include "header.php";
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-leaf"></i> Data Tanaman</h1>

    <a href="<?php echo site_url('Admin/kelola_covid_filter') ?>" class="btn btn-secondary"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">
            <i class="fas fa-fw fa-plus"></i> Tambah Data Covid Tahun
            <?php echo $this->uri->segment(3) ?>
        </h6>
    </div>

    <?php echo form_open('Admin/add_covid/' . $this->uri->segment(3), array('class' => 'form-horizontal')); ?>

    <div class="card-body">
        <div class="row">


            <div class="form-group col-md-6">
                <label class="font-weight-bold">Kelurahan</label>

                <!-- <input autocomplete="off" type="text" name="kelurahan" required class="form-control" /> -->
                <select name="fk_kelurahan" id="inputFk_kelurahan" class="form-control">
                    <?php foreach ($kelurahan as $key) { ?>
                        <option value="<?php echo $key->id_kelurahan ?>">

                            <?php echo $key->nama_kelurahan ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label class="font-weight-bold">Positif</label>

                <input autocomplete="off" type="text" name="positif" required class="form-control" />
            </div>

            <div class="form-group col-md-6">
                <label class="font-weight-bold">Sembuh</label>

                <input autocomplete="off" type="text" name="sembuh" required class="form-control" />
            </div>
            <div class="form-group col-md-6">
                <label class="font-weight-bold">Meninggal</label>

                <input autocomplete="off" type="text" name="meninggal" required class="form-control" />
            </div>
            <!-- <div class="form-group col-md-6">
                <label class="font-weight-bold">Isolasi Mandiri</label>

                <input autocomplete="off" type="text" name="isoman" required class="form-control" />
            </div> -->

        </div>
    </div>

    <div class="card-footer text-right">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
    </div>
    <?php echo form_close(); ?>
</div>

<?php
include "footer.php";
?>