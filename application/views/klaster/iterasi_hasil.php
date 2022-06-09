<?php
include "header.php";
$array_color = array(
    "C1" => "red",
    "C2" => "orange",
    "C3" => "yellow"
);
$array_resiko = array(
    "C1" => "Risiko Tinggi",
    "C2" => "Risiko Sedang",
    "C3" => "Risiko Rendah"
);
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cubes"></i> Hasil Pengelompokan Tanggal <?php echo $tgl ?></h1>
</div>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Centroid Non-Medoids</h6>
	</div>

	<div class="card-body">


		<?php foreach ($centroid_temp_by_c as $val) { ?>
			<?php $c[] = $val->c; ?>
		<?php } ?>
		<?php foreach ($centroid_temp_by_iterasi as $key) { ?>
			<?php $q = $this->db->query('select * from centroid_temp where iterasi=\'' . $key->iterasi . '\''); ?>
			<?php $no = 1; ?>

			<h5>Iterasi ke-<?php echo $key->iterasi ?></h5>
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="text-white"  style="background-color: #5f0a87;">
						<tr align="center">
							<th width="5%">No</th>
							<th>Jenis</th>
							<?php for ($i = 0; $i < count($c); $i++) { ?>
								<th width="5%"><?php echo strtoupper($c[$i]); ?></th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($q->result() as $tq) { ?>
							<tr align="center">
								<td class="align-middle"><?php echo $no ?></td>
								<td class="align-middle text-left"><?php if ($tq->jenis == "M") {
																		echo "Medoids";
																	} else {
																		echo "Non-Medoids";
																	} ?></td>
								<?php for ($j = 0; $j < COUNT($c); $j++) {
									if ($tq->c == $c[$j]) { ?>
										<td class='align-middle bg-success text-white font-weight-bold'>1</td>
								<?php } else {
										echo "<td>0</td>";
									}
								} ?>
							</tr>
							<?php $no++ ?>
						<?php } ?>
					</tbody>
				</table>
			</div>

		<?php } ?>
	</div>
</div>


<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Hasil Pengelompokan</h6>
	</div>

	<div class="card-body">


		<?php foreach ($centroid_temp_by_iterasi as $key) {
			if ($key->iterasi == 1) {
				$it = $key->iterasi;
			} else {
				$it = $key->iterasi - 1;
			}
		} ?>
		<?php $q2 = $this->db->query('select * from centroid_temp where iterasi=\'' . $it . '\''); ?>
		<?php foreach ($q2->result() as $vil) {
			$hc[] = $vil->c;
		} ?>
		<?php $no = 0 ?>
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary  text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kelurahan</th>
						<?php for ($i = 0; $i < count($c); $i++) { ?>
							<th width="5%"><?php echo strtoupper($c[$i]); ?></th>
						<?php } ?>
                                                <th width="15%">Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($covid as $key) { ?>
						<tr align="center">
							<td class="align-middle"><?php echo $no + 1 ?></td>
							<td class="align-middle text-left"><?php echo $key->nama_kelurahan ?></td>
                                                        <?php $cluster_active = ""; ?>
							<?php for ($k = 0; $k < count($c); $k++) { ?>
								<?php if ($hc[$no] == $c[$k]) { ?>
                                                                <?php 
                                                                $cluster_active = 'C' . ($k + 1);
                                                                $style = " style='background-color: ".$array_color['C' . ($k + 1)]." !important;'";
                                                                
                                                                ?>
									<td class='align-middle bg-success text-white font-weight-bold'<?php echo $style; ?>>1</td>
									<?php $kk = $k + 1; ?>
									<?php $q3 = "insert into hasil_klaster1(fk_covid,c) values('" . $key->id_covid . "','c" . $kk . "')";
									$this->db->query($q3); ?>
								<?php } else {
									echo "<td>0</td>";
								} ?>
							<?php } ?>
                                                        <td class="align-middle text-left"><?php echo $array_resiko[$cluster_active]; ?></td>
						</tr>
						<?php $no++ ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
include "footer.php";
?>