
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li class="active">KPI APMS</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <?php if ($pesan==2) {  ?>
							<div class="alert alert-block alert-danger fade in">
							<button data-dismiss="alert" class="close close-sm" type="button">
											<i class="icon-remove"></i>
										</button>
								<strong>Error! </strong><?php echo $pesan_text;?>
							</div>
						<?php } ?>
        <section class="panel">
            <header class="panel-heading">
                KPI APMS Depot
                <a style="float:right;" data-placement="left" href="#ModalTambah" data-toggle="modal" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah"> Tambah Data <i class="icon-plus"></i></a>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url(); ?>apms/kpi_apms">
                    <div class="form-group">
                        <label for="bln_kpi" class="col-lg-2 col-sm-2 control-label">Bulan</label>
                        <div class="col-lg-10">
                            <input type="month" required="required" id="bln_kpi" name="bln_kpi" class="form-control"  placeholder="Tanggal">
                            <span class="help-block">Pilih bulan</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" style="float: right;" class="btn btn-warning" name="cek" value="Cek">
                        </div>
                    </div>
                </form>
            </div>
        </section>
		<?php
		$status=0;
		foreach($status_kpi as $z){
			$status = $z->STATUS_KPI_APMS;
		}
		if($status!=0){
		
		?>
		                <section class="panel">
                    <header class="panel-heading">
                        Tabel KPI APMS <strong><?php echo $nama_bulan." ".$tahun ?></strong>
                        <a style="float:right;" data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i> Edit KPI</a>
                    </header>
                    <div class="panel-body" style="overflow-x: scroll">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="230">Parameter KPI</th>
                                    <th>Aspek</th>
                                    <th>Satuan</th>
                                    <th>Frekuensi</th>
                                    <th>Target</th>
                                    <th>Bobot</th>
                                    <th>Realisasi</th>
                                    <th>Realisasi VS Target</th>
                                    <th>Score</th>
                                    <th>Normal Score</th>
                                    <th>Hasil Nilai</th>
                                    <th width="230">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
								$i=1;
								$bobot=0;
								$jumlah_nilai=0;
									foreach($kpi_apms as $row)
									{
										
								?>
								<tr>
										<td>
										<?php echo $i; ?>
										</td>
										<td>
										<?php echo $row->JENIS_KPI_APMS; ?>
										</td>
										<td>
										<?php  echo $row->ASPEK  ?>
										</td>
										<td>
										<?php   echo $row->SATUAN?>
										</td>
										<td>
										<?php   echo $row->FREKUENSI?>
										</td>
										<td>
										<?php echo $row->TARGET; ?>
										</td>
										<td>
										<?php echo $row->BOBOT;
												$bobot = $bobot + $row->BOBOT;?>
										</td>
										<td>
										<?php echo $row->REALISASI; ?>
										</td>
										<td>
										<?php
										if($row->ID_JENIS_KPI_APMS<5)
										{
											echo $row->REALISASI-$row->TARGET; 
										}else
										{
											echo $row->TARGET-$row->REALISASI; 
										}
										
										?>
										</td>
										<td>
										<?php echo $row->SCORE; ?>
										</td>
										
										<td>
										<?php echo $row->NORMAL_SCORE; ?>
										</td>
										
										<td>
										<?php echo $row->FINAL_SCORE; 
										$jumlah_nilai = $jumlah_nilai + $row->FINAL_SCORE;?>
										</td>
										<td>
										<?php echo $row->KETERANGAN; ?>
										</td>
								
								</tr>
								<?php
								$i++;
									}
								?>
                                <tr>
                                    <td colspan="6"><strong>Jumlah</strong></td>
                                    <td><strong><?php echo $bobot; ?>%</td></strong>
                                    <td colspan="4"><strong></strong></td>
                                    
                                    <td><strong>
                                            <?php echo $jumlah_nilai; ?>%
                                            
                                        </strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
	</section>
</section>
		<?php
		}
		else
		{
			?>
			
			<div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Data KPI APMS tidak ditemukan.
                </div>
			
			
			<?php
		}
		?>

<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url(); ?>apms/kpi_apms">

                <div class="modal-body">
                    <div class="form-group ">                                            
                        <label for="bln_kpi" class="control-label col-lg-4">Bulan</label>
                        <div class="col-lg-8">
                            <input class=" form-control input-sm m-bot15" name="bln_kpi" type="month" required/>
                            <span class="help-block">Pilih bulan</span>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Parameter KPI</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Laporan progres pembayaran ongkos angkut
									</td>
                                <td>
                                    <input type="number" required="required" id="kpitarget1" name="kpitarget1" class="form-control">
                                </td>
								<td>
                                    <input type="number" required="required" id="kpirealisasi1" name="kpirealisasi1" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Laporan realisasi penyaluran VS LO Planing 
								</td>
                                <td><input type="number" required="required" id="kpitarget2" name="kpitarget2" class="form-control"></td>
								<td><input type="number" required="required" id="kpirealisasi2" name="kpirealisasi2" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Laporan Kehandalan dan Ketersediaan Alat angkut</td>
                                <td><input type="number" required="required" id="kpitarget3" name="kpitarget3" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi3" name="kpirealisasi3" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Realisasi penyaluran VS Alokasi</td>
                                <td>X</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Progress Pembayaran Ongkos Angkut Transportir
</td>
                                <td><input type="number" required="required" id="kpitarget4" name="kpitarget4" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi4" name="kpirealisasi4" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Customer Transportir APMS</td>
                                <td><input type="number" required="required" id="kpitarget5" name="kpitarget5" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi5" name="kpirealisasi5" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Customer APMS</td>
                                <td><input type="number" required="required" id="kpitarget6" name="kpitarget6" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi6" name="kpirealisasi6" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Pelanggaran atas Integritas Kinerja:
</td>
                                <td><input type="number" required="required" id="kpitarget7" name="kpitarget7" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi7" name="kpirealisasi7" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Number of Accident</td>
                                <td><input type="number" required="required" id="kpitarget8" name="kpitarget8" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi8" name="kpirealisasi8" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" type="submit" name="tambah" value="Simpan"/>
                </div>
            </form>
        </div>
    </div>
</div>		


<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url(); ?>apms/kpi_apms">

                <div class="modal-body">
                    <div class="form-group ">                                            
                        <label for="bln_kpi" class="control-label col-lg-4">Bulan</label>
                        <div class="col-lg-8">
                            <input class=" form-control input-sm m-bot15" name="bln_kpi1" type="month" value="<?php  echo $nama_bulan.' '.$tahun;?>" readonly/>
                            <input type="hidden" name="bln_kpi" type="month" value="<?php  echo $tahun.'-'.$bulan;?>"/>
                            <span class="help-block">Pilih bulan</span>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Parameter KPI</th>
                                <th>Target</th>
                                <th>Realisasi</th>
                            </tr>
                        </thead>
                        <tbody>
					<?php
						foreach($kpi_apms as $row)
						{
					
					?>
							<?php
								if($row->ID_JENIS_KPI_APMS == 1)
								{
							?>
                            <tr>
                                <td>1</td>
                                <td>Laporan progres pembayaran ongkos angkut
									</td>
                                <td>
                                    <input type="number" required="required" id="kpitarget1" name="kpitarget1" class="form-control" value="<?php echo $row->TARGET ?>">
                                    <input type="hidden" required="required" id="idkpi1" name="idkpi1" class="form-control" value="<?php echo $row->ID_KPI_APMS ?>">
                                </td>
								<td>
                                    <input type="number" required="required" id="kpirealisasi1" name="kpirealisasi1" class="form-control" value="<?php echo $row->REALISASI ?>">
                                </td>
                            </tr>
							<?php
								}
							?>
							<?php
								if($row->ID_JENIS_KPI_APMS == 2)
								{
							?>
                            <tr>
                                <td>2</td>
                                <td>Laporan realisasi penyaluran VS LO Planing 
								</td>
                                <td><input type="number" required="required" id="kpitarget2" name="kpitarget2" class="form-control"value="<?php echo $row->TARGET ?>"></td>
								<td><input type="number" required="required" id="kpirealisasi2" name="kpirealisasi2" class="form-control" value="<?php echo $row->REALISASI ?>"></td>
								
                                    <input type="hidden" required="required" id="idkpi2" name="idkpi2" class="form-control" value="<?php echo $row->ID_KPI_APMS ?>">
                            </tr>
							<?php
								}
							?>
							<?php
								if($row->ID_JENIS_KPI_APMS == 3)
								{
							?>
                            <tr>
                                <td>3</td>
                                <td>Laporan Kehandalan dan Ketersediaan Alat angkut</td>
                                <td><input type="number" required="required" id="kpitarget3" name="kpitarget3" class="form-control"value="<?php echo $row->TARGET ?>"></td>
                                <td><input type="number" required="required" id="kpirealisasi3" name="kpirealisasi3" class="form-control" value="<?php echo $row->REALISASI ?>"></td>
								
                                    <input type="hidden" required="required" id="idkpi3" name="idkpi3" class="form-control" value="<?php echo $row->ID_KPI_APMS ?>">
                            </tr>
							<?php
								}
							?>
							<?php
								if($row->ID_JENIS_KPI_APMS == 4)
								{
							?>
                            <tr>
                                <td>4</td>
                                <td>Realisasi penyaluran VS Alokasi</td>
                                <td>X</td>
                                <td>X</td>
                            </tr>
							<?php
								}
							?>
							<?php
								if($row->ID_JENIS_KPI_APMS == 5)
								{
							?>
                            <tr>
                                <td>5</td>
                                <td>Progress Pembayaran Ongkos Angkut Transportir
</td>
                                <td><input type="number" required="required" id="kpitarget4" name="kpitarget4" class="form-control"value="<?php echo $row->TARGET ?>"></td>
                                <td><input type="number" required="required" id="kpirealisasi4" name="kpirealisasi4" class="form-control" value="<?php echo $row->REALISASI ?>"></td>
								
                                    <input type="hidden" required="required" id="idkpi4" name="idkpi4" class="form-control" value="<?php echo $row->ID_KPI_APMS ?>">
                            </tr>
							<?php
								}
							?>
							<?php
								if($row->ID_JENIS_KPI_APMS == 6)
								{
							?>
                            <tr>
                                <td>6</td>
                                <td>Customer Transportir APMS</td>
                                <td><input type="number" required="required" id="kpitarget5" name="kpitarget5" class="form-control"value="<?php echo $row->TARGET ?>"></td>
                                <td><input type="number" required="required" id="kpirealisasi5" name="kpirealisasi5" class="form-control" value="<?php echo $row->REALISASI ?>"></td>
								
                                    <input type="hidden" required="required" id="idkpi5" name="idkpi5" class="form-control" value="<?php echo $row->ID_KPI_APMS ?>">
                            </tr>
							<?php
								}
							?>
							<?php
								if($row->ID_JENIS_KPI_APMS == 7)
								{
							?>
                            <tr>
                                <td>7</td>
                                <td>Customer APMS</td>
                                <td><input type="number" required="required" id="kpitarget6" name="kpitarget6" class="form-control"value="<?php echo $row->TARGET ?>"></td>
                                <td><input type="number" required="required" id="kpirealisasi6" name="kpirealisasi6" class="form-control" value="<?php echo $row->REALISASI ?>"></td>
								
                                    <input type="hidden" required="required" id="idkpi6" name="idkpi6" class="form-control" value="<?php echo $row->ID_KPI_APMS ?>">
                            </tr>
							<?php
								}
							?>
							<?php
								if($row->ID_JENIS_KPI_APMS == 8)
								{
							?>
                            <tr>
                                <td>8</td>
                                <td>Pelanggaran atas Integritas Kinerja:
</td>
                                <td><input type="number" required="required" id="kpitarget7" name="kpitarget7" class="form-control"value="<?php echo $row->TARGET ?>"></td>
                                <td><input type="number" required="required" id="kpirealisasi7" name="kpirealisasi7" class="form-control" value="<?php echo $row->REALISASI ?>"></td>
								
                                    <input type="hidden" required="required" id="idkpi7" name="idkpi7" class="form-control" value="<?php echo $row->ID_KPI_APMS ?>">
                            </tr>
							<?php
								}
							?>
							<?php
								if($row->ID_JENIS_KPI_APMS == 9)
								{
							?>
                            <tr>
                                <td>9</td>
                                <td>Number of Accident</td>
                                <td><input type="number" required="required" id="kpitarget8" name="kpitarget8" class="form-control"value="<?php echo $row->TARGET ?>"></td>
                                <td><input type="number" required="required" id="kpirealisasi8" name="kpirealisasi8" class="form-control" value="<?php echo $row->REALISASI ?>"></td>
								
                                    <input type="hidden" required="required" id="idkpi8" name="idkpi8" class="form-control" value="<?php echo $row->ID_KPI_APMS ?>">
                            </tr>
							<?php
								}
							?>
						<?php
						}
						?>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" type="submit" name="edit" value="Simpan"/>
                </div>
            </form>
        </div>
    </div>
</div>		
		