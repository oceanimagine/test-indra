<?php
include "header.php";
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-leaf"></i> Data Covid-19</h1>

    <a href="<?php echo site_url('Admin/add_covid/' . $tgl) ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"style="color: #5f0a87;"><i class="fa fa-table"></i> Filter Berdasarkan Tahun</h6>
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

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data Covid-19 Tanggal <?php echo $tgl ?></h6>
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
                        <td class="text-center"><?php echo $key->positif ?></td>
                        <td class="text-center"><?php echo $key->sembuh ?></td>
                        <td class="text-center"><?php echo $key->meninggal ?></td>
                        <!-- <td class="text-center"><?php echo $key->isoman ?></td> -->
                        <td class="text-center"><?php echo $key->tanggal ?></td>
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
    </div>
</div>



<?php
include "footer.php";
?>