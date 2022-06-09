<?php
include "header.php";
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-map-marker-alt"></i> Data Kelurahan</h1>

    <a href="<?php echo site_url('Admin/tambah_kelurahan') ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold"style="color: #5f0a87;"><i class="fa fa-table"> </i> Daftar Data Kelurahan</h6>
    </div>

    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-success text-white">
                <tr align="center">
                    <th width="5%">No</th>
                    <th>Id Kelurahan</th>
                    <th>Nama Kelurahan</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($kelurahan as $key) { ?>
                    <tr>
                        <td class="text-center"><?php echo $no ?></td>
                        <td><?php echo $key->id_kelurahan ?></td>
                        <td><?php echo $key->nama_kelurahan ?></td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="<?php echo site_url('Admin/edit_kelurahan/' . $key->id_kelurahan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="<?php echo site_url('Admin/delete_kelurahan/' . $key->id_kelurahan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                        <?php $no++ ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php if (!empty($kelurahan)) { ?>
                <a href="<?= site_url('Admin/delete_all_kelurahan') ?>" onclick="javascript: return confirm('Anda Yakin ingin menghapus semua data ?')" class="btn btn-danger">Delete All</a>
            <?php } ?>
    </div>
</div>

<?php
include "footer.php";
?>