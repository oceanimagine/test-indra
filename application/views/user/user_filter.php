<?php
foreach ($covid as $data) {
    $tanggal[] = $data->tanggal;
    $positif[] = (float) $data->positif;
    $sembuh[] = (float) $data->sembuh;
    $meninggal[] = (float) $data->meninggal;
    $nama_kelurahan = $data->nama_kelurahan;
}
?>


<?php
include "header.php";
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Grafik</h1>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Filter Berdasarkan Kelurahan</h6>
    </div>

    <div class="card-body">
        <?php echo form_open('User/filter_grafik', array(
            'class' =>
            'form-horizontal'
        )); ?>
        <div class="row">
            <div class="input-group mb-3 col-10">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Pilih Kelurahan</label>
                </div>
                <select name="kelurahan" id="inputTahun" class="custom-select" required=>

                    <?php foreach ($kelurahan as $key) { ?>
                        <option value="<?php echo $key->id_kelurahan ?>"><?php echo $key->nama_kelurahan ?></option>
                    <?php } ?>
                </select>
                <input type="hidden" name="hidden" class="form-control" value="Tahun" />
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-success w-100"><i class="fa fa-search"></i> Filter</button>
            </div>
        </div>
        <?php echo form_close(); ?>

    </div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-chart-area"></i> Data Grafik</h6>
    </div>

    <div class="card-body">
        <h5>
            Grafik Data Sembuh di
            <?php echo $nama_kelurahan ?>
        </h5>
        <div class="chart-area mb-5">
            <canvas id="canvas1"></canvas>
        </div>

        <h5>
            Grafik Data Positif di
            <?php echo $nama_kelurahan ?>
        </h5>
        <div class="chart-area mb-5">
            <canvas id="canvas2"></canvas>
        </div>

        <h5>
            Grafik Data Meninggal di
            <?php echo $nama_kelurahan ?>
        </h5>
        <div class="chart-area">
            <canvas id="canvas3"></canvas>
        </div>
    </div>
</div>



<?php
include "footer.php";
?>