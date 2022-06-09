<?php $this->db->query('truncate table centroid_temp'); ?>
<?php $this->db->query('truncate table hasil_iterasi'); ?>
<?php $this->db->query('truncate table hasil_klaster1'); ?>

<?php
include "header.php";
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cubes"></i> Data Pengelompokan Tanggal <?php echo $tgl ?> Iterasi Ke-1</h1>

	<a href="<?php echo site_url('Klaster/iterasi_lanjut/' . $tgl . '/' . $jml . '/1') ?>" class="btn btn-success"><i class="fa fa-share"></i> Lanjutkan Iterasi</a>
</div>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Centroid Medoids</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-secondary text-white">
					<tr align="center">
						<th>Centroid ke-</th>
						<th>Kelurahan</th>
						<th>Positif</th>
						<th>Sembuh</th>
						<th>Meninggal</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1 ?>
					<?php foreach ($covid_rand as $m1) { ?>
						<tr align="center">
							<td><?php echo $no ?></td>
							<td class="text-left"><?php echo $m1->nama_kelurahan ?></td>
							<td><?php echo $m1->positif ?></td>
							<td><?php echo $m1->sembuh ?></td>
							<td><?php echo $m1->meninggal ?></td>
							<td><?php echo $m1->tanggal ?></td>
							<?php $no++ ?>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold" style="color: black;"><i class="fa fa-table"></i> Iterasi Medoids</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
                            <?php 
                                            
                            $_SESSION['kelurahan_name'] = array();
                            $_SESSION['tanggal'] = "";

                            ?>
				<thead class="bg-secondary text-white">
					<tr align="center">
						<th rowspan="2">No</th>
						<th rowspan="2">Kelurahan</th>
						<th rowspan="2">Positif</th>
						<th rowspan="2">Sembuh</th>
						<th rowspan="2">Meninggal</th>
						<th rowspan="2">Tanggal</th>
						<?php $c = 1 ?>
						<?php foreach ($covid_rand as $m) { ?>
							<th colspan="3">Centroid <?php echo $c;
														$c++ ?></th>
						<?php } ?>
						<?php $d = 1 ?>
						<?php foreach ($covid_rand as $m) { ?>
							<th rowspan="2">C<?php echo $d;
												$d++ ?></th>
						<?php } ?>
					</tr>
					<tr align="center">
						<?php foreach ($covid_rand as $m1) { ?>
							<th><?php $c_prod[] = $m1->positif;
								echo $m1->positif ?></th>
							<th><?php $c_prodt[] = $m1->sembuh;
								echo $m1->sembuh ?></th>
							<th><?php $c_lp[] = $m1->meninggal;
								echo $m1->meninggal ?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					$tc0 = 0;
					$tc = 0 ?>
					<?php foreach ($covid as $key) { ?>
                                    <?php $_SESSION['kelurahan_name'][$key->nama_kelurahan] = ""; ?>
						<tr align="center">
							<td class="align-middle"><?php echo $no ?></td>
							<td class="text-left align-middle"><?php echo $key->nama_kelurahan ?></td>
							<td class="align-middle"><?php echo $key->positif ?></td>
							<td class="align-middle"><?php echo $key->sembuh ?></td>
							<td class="align-middle"><?php echo $key->meninggal ?></td>
							<td class="align-middle"><?php echo $key->tanggal ?></td>
                                                        <?php $_SESSION['tanggal'] = $key->tanggal; ?>
							<?php $no++ ?>
							<!-- <td><?php $hm1 = sqrt(pow(($key->produksi - $c_prod[0]), 2) + pow(($key->produktivitas - $c_prodt[0]), 2) + pow(($key->luas_panen - $c_lp[0]), 2));
										echo $hm1; ?>
									</td>
									<td>
										<?php $hm2 = sqrt(pow(($key->produksi - $c_prod[0]), 2) + pow(($key->produktivitas - $c_prodt[0]), 2) + pow(($key->luas_panen - $c_lp[0]), 2));
										echo $hm2; ?>
									</td>
									<td>
										<?php $hm3 = sqrt(pow(($key->produksi - $c_prod[0]), 2) + pow(($key->produktivitas - $c_prodt[0]), 2) + pow(($key->luas_panen - $c_lp[0]), 2));
										echo $hm3; ?>
									</td>
									<td><?php echo $c_prod[1]; ?></td>
									<td><?php echo $c_prodt[1]; ?></td>
									<td><?php echo $c_lp[1]; ?></td> -->
							<?php $e = 0;
							$tc = array(); ?>
							<?php foreach ($covid_rand as $k) { ?>
								<td class="align-middle" colspan="3"><?php $hm[$e] = sqrt(pow(($key->positif - $c_prod[$e]), 2) + pow(($key->sembuh - $c_prodt[$e]), 2) + pow(($key->meninggal - $c_lp[$e]), 2));
																		echo $hm[$e];
																		$hc[$e] = $hm[$e];
																		?>
								</td>
								<?php $e++ ?>
							<?php } ?>
							<?php for ($i = 0; $i < COUNT($hc); $i++) { ?>
								<?php if ($hc[$i] == MIN($hc)) { ?>
                                                                    <?php $_SESSION['kelurahan_name'][$key->nama_kelurahan] = "C" . ($i + 1); 
									echo "<td class='align-middle bg-success text-white font-weight-bold'>1</td>";
									$cm = $i + 1;
									$q = "insert into centroid_temp(jenis,iterasi,c) values('M',1,'c" . $cm . "')";
									$this->db->query($q);
								} else {
									echo "<td class='align-middle'>0</td>";
								}
								?>
							<?php } ?>
							<?php
							for ($j = 0; $j < COUNT($hc); $j++) {
								$tc0 = $tc0 + $hc[$j];
								$ttc[] = $tc0;
							}
							?>
						</tr>
					<?php } ?>
					<tr align="center">
						<td class="align-middle" colspan="6"><b>TOTAL</b></td>
						<td class="align-middle" colspan="12"><b><?php echo $tc0 ?></b></td>
					</tr>
				</tbody>
			</table>
                    
                        <?php 
                        
                        $keys = array_keys($_SESSION['kelurahan_name']);
                        $this->db->query("delete from tbl_klaster_color where tanggal = '".$_SESSION['tanggal']."'");
                        for($i = 0; $i < sizeof($keys); $i++){
                            $query_fk_kelurahan = $this->db->query("
                                select id_kelurahan from kelurahan where nama_kelurahan = '".$keys[$i]."'
                            ");
                            $hasil_fk_kelurahan = $query_fk_kelurahan->result_array();
                            if(sizeof($hasil_fk_kelurahan) > 0){
                                $this->db->query("
                                    insert into tbl_klaster_color set 
                                    fk_kelurahan = '".$hasil_fk_kelurahan[0]['id_kelurahan']."',
                                    tanggal = '".$_SESSION['tanggal']."',
                                    warna_cluster = '".$_SESSION['kelurahan_name'][$keys[$i]]."'
                                ");
                            }
                        }
                        
                        ?>
                    
		</div>
	</div>
</div>




<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Centroid Non Medoids</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-secondary text-white">
					<tr align="center">
						<th>Centroid ke-</th>
						<th>Kelurahan</th>
						<th>Positif</th>
						<th>Sembuh</th>
						<th>Meninggal</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php $nom = 1 ?>
					<?php foreach ($covid_rand2 as $nm1) { ?>
						<tr align="center">
							<td><?php echo $nom ?></td>
							<td class="text-left"><?php echo $nm1->nama_kelurahan ?></td>
							<td><?php echo $nm1->positif ?></td>
							<td><?php echo $nm1->sembuh ?></td>
							<td><?php echo $nm1->meninggal ?></td>
							<td><?php echo $nm1->tanggal ?></td>
							<?php $nom++ ?>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Iterasi Non Medoids</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-secondary text-white">
					<tr align="center">
						<th rowspan="2">No</th>
						<th rowspan="2">Kelurahan</th>
						<th rowspan="2">Positif</th>
						<th rowspan="2">Sembuh</th>
						<th rowspan="2">Meninggal</th>
						<th rowspan="2">Tanggal</th>
						<?php $f = 1 ?>
						<?php foreach ($covid_rand2 as $m) { ?>
							<th colspan="3">Centroid <?php echo $f;
														$f++ ?></th>
						<?php } ?>
						<?php $g = 1 ?>
						<?php foreach ($covid_rand2 as $m) { ?>
							<th rowspan="2">C<?php echo $g;
												$g++ ?></th>
						<?php } ?>
					</tr>
					<tr align="center">
						<?php foreach ($covid_rand2 as $nm1) { ?>
							<th><?php $cn_prod[] = $nm1->positif;
								echo $nm1->positif ?></th>
							<th><?php $cn_prodt[] = $nm1->sembuh;
								echo $nm1->sembuh ?></th>
							<th><?php $cn_lp[] = $nm1->meninggal;
								echo $nm1->meninggal ?></th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					$tcnm0 = 0;
					$tcnm = 0 ?>
					<?php foreach ($covid as $key) { ?>
						<tr align="center">
							<td class="align-middle"><?php echo $no ?></td>
							<td class="text-left align-middle"><?php echo $key->nama_kelurahan ?></td>
							<td class="align-middle"><?php echo $key->positif ?></td>
							<td class="align-middle"><?php echo $key->sembuh ?></td>
							<td class="align-middle"><?php echo $key->meninggal ?></td>
							<td class="align-middle"><?php echo $key->tanggal ?></td>
							<?php $no++ ?>
							<!-- <td><?php $hm1 = sqrt(pow(($key->positif - $c_prod[0]), 2) + pow(($key->sembuh - $c_prodt[0]), 2) + pow(($key->meninggal - $c_lp[0]), 2));
										echo $hm1; ?>
									</td>
									<td>
										<?php $hm2 = sqrt(pow(($key->produksi - $c_prod[0]), 2) + pow(($key->produktivitas - $c_prodt[0]), 2) + pow(($key->luas_panen - $c_lp[0]), 2));
										echo $hm2; ?>
									</td>
									<td>
										<?php $hm3 = sqrt(pow(($key->produksi - $c_prod[0]), 2) + pow(($key->produktivitas - $c_prodt[0]), 2) + pow(($key->luas_panen - $c_lp[0]), 2));
										echo $hm3; ?>
									</td>
									<td><?php echo $c_prod[1]; ?></td>
									<td><?php echo $c_prodt[1]; ?></td>
									<td><?php echo $c_lp[1]; ?></td> -->
							<?php $l = 0;
							$tcnm = array(); ?>
							<?php foreach ($covid_rand2 as $k) { ?>
								<td class="align-middle" colspan="3"><?php $hnm[$l] = sqrt(pow(($key->positif - $cn_prod[$l]), 2) + pow(($key->sembuh - $cn_prodt[$l]), 2) + pow(($key->meninggal - $cn_lp[$l]), 2));
																		echo $hnm[$l];
																		$hcnm[$l] = $hnm[$l];

																		?>
								</td>
								<?php $l++ ?>
							<?php } ?>
							<?php for ($i = 0; $i < COUNT($hcnm); $i++) { ?>
								<?php if ($hcnm[$i] == MIN($hcnm)) {
									echo "<td class='align-middle bg-success text-white font-weight-bold'>1</td>";
									$cnm = $i + 1;
									$q = "insert into centroid_temp(jenis,iterasi,c) values('NM',1,'c" . $cnm . "')";
									$this->db->query($q);
								} else {
									echo "<td class='align-middle'>0</td>";
								}
								?>
							<?php } ?>
							<?php
							for ($j = 0; $j < COUNT($hcnm); $j++) {
								// if ($j == 0) {
								$tcnm0 = $tcnm0 + $hcnm[$j];
								$ttcnm[] = $tcnm0;
								// }
								// else{

								// }
							}
							// echo "<td>".$tc0."</td>";
							?>
						</tr>
					<?php } ?>
					<tr align="center">
						<td class="align-middle" colspan="6"><b>TOTAL</b></td>
						<td class="align-middle" colspan="12"><b><?php echo $tcnm0 ?></b></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Selisih antara Non-Medoids dengan Medoids</h6>
	</div>

	<div class="card-body">
		<table class="table table-bordered">
			<tr>
				<th width="30%">Total Medoids</th>
				<td><?php echo $tc0 ?></td>
			</tr>

			<tr>
				<th>Total Non Medoids</th>
				<td><?php echo $tcnm0 ?></td>
			</tr>

			<tr>
				<th>Selisih</th>
				<td><?php echo $selisih = $tcnm0 - $tc0 ?></td>
			</tr>

		</table>

		<?php $n = "insert into hasil_iterasi(iterasi,total_medoids,total_non_medoids,selisih) values('1','" . $tc0 . "','" . $tcnm0 . "','" . $selisih . "')";
		$this->db->query($n); ?>

	</div>
</div>

<?php
include "footer.php";
?>