<?php
include "header.php";
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cubes"></i> Data Pengelompokan Tanggal <?php echo $tgl ?> Iterasi Ke-<?php echo $this->uri->segment(5) + 1 ?></h1>
	<?php $it = $iterasi + 1 ?>
	<a href="<?php echo site_url('Klaster/iterasi_lanjut/' . $tgl . '/' . $jml . '/' . $it) ?>" class="btn btn-success"><i class="fa fa-share"></i> Lanjutkan Iterasi</a>
</div>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Hasil Medoids</h6>
	</div>

	<div class="card-body">
		<div class="alert alert-info">Dikarenakan hasil selisih antara Medoids dengan Non-Medoids di bawah 0, maka hasil dari Non-Medoids dijadikan sebagai Medoids dan dibentuk perhitungan untuk Non-Medoids baru.</div>
		<div class="alert alert-danger font-weight-bold">
			Hasil Medoids : <?php foreach ($hasil_iterasi as $key) {
								echo $medoids = $key->total_non_medoids;
							} ?>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Centroid Non-Medoids</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-primary text-white">
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
							<td class="align-middle"><?php echo $no ?></td>
							<td class="align-middle text-left"><?php echo $m1->nama_kelurahan ?></td>
							<td class="align-middle"><?php echo $m1->positif ?></td>
							<td class="align-middle"><?php echo $m1->sembuh ?></td>
							<td class="align-middle"><?php echo $m1->meninggal ?></td>
							<td class="align-middle"><?php echo $m1->tanggal ?></td>
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
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Iterasi Non-Medoids</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
                                            <?php 
                                            
                                            $_SESSION['kelurahan_name'] = array();
                                            $_SESSION['tanggal'] = "";
                                            
                                            ?>
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
							<td class="align-middle text-left"><?php echo $key->nama_kelurahan ?></td>
							<td class="align-middle"><?php echo $key->positif ?></td>
							<td class="align-middle"><?php echo $key->sembuh ?></td>
							<td class="align-middle"><?php echo $key->meninggal ?></td>
							<td class="align-middle"><?php echo $key->tanggal ?></td>
							<?php $_SESSION['tanggal'] = $key->tanggal; ?>
                                                        <?php  ?>
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
																		// $tc[$e] = array_sum($hc[$e]);
																		?>
								</td>
								<?php $e++ ?>
							<?php } ?>
							<?php for ($i = 0; $i < COUNT($hc); $i++) { ?>
								<?php if ($hc[$i] == MIN($hc)) { ?>
                                                                <?php $_SESSION['kelurahan_name'][$key->nama_kelurahan] = "C" . ($i + 1); ?>
									<td class='align-middle bg-success text-white font-weight-bold'>1</td>
								<?php
									$cm = $i + 1;
									$q = "insert into centroid_temp(jenis,iterasi,c) values('NM','" . $it . "','c" . $cm . "')";
									$this->db->query($q);
								} else {
									echo "<td>0</td>";
								}
								?>
							<?php } ?>
							<?php
							for ($j = 0; $j < COUNT($hc); $j++) {
								// if ($j == 0) {
								$tc0 = $tc0 + $hc[$j];
								$ttc[] = $tc0;
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
						<td class="align-middle" colspan="12"><b><?php echo $ttc[37] . '/' . end($ttc) ?></b></td>
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
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Selisih antara Non-Medoids dengan Medoids</h6>
	</div>

	<div class="card-body">
		<table class="table table-bordered">
			<tr>
				<th width="30%">Total Medoids</th>
				<td><?php echo $medoids ?></td>
			</tr>

			<tr>
				<th>Total Non Medoids</th>
				<td><?php echo $ttc[37] ?></td>
			</tr>

			<tr>
				<th>Selisih</th>
				<td><?php echo $selisih = $ttc[37] - $medoids ?></td>
			</tr>

		</table>

		<?php $n = "insert into hasil_iterasi(iterasi,total_medoids,total_non_medoids,selisih) values('" . $it . "','" . $medoids . "','" . $ttc[37] . "','" . $selisih . "')";
		$this->db->query($n); ?>

	</div>
</div>

<?php
include "footer.php";
?>