<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="cmxform form-horizontal tasi-form" id="mymodalform" method="post" action="<?php echo base_url() ?>apms/detail_apms/<?php echo $row->ID_APMS?>">
				<input type="hidden" name="id" value="<?php echo $row->ID_APMS?>">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Atur Kinerja</h4>
                    </div>
                    <div class="modal-body">
						<div class="row">
                            <div class="col-lg-12">
                                <section class="panel">

                                    <div class="panel-body">
										<div class="form-group ">
											<label for="NO_DELIVERY" class="control-label col-lg-2">No. Delivery</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="no_delivery" name="no_delivery" type="text" required />
												
											</div>

											<label for="tgl_delivery" class="control-label col-lg-2">Tanggal Delivery</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_delivery" name="tgl_delivery"  type="date" required/>
												<span class="help-block">Pilih Tanggal</span>
											</div>
										</div>
										<div class="form-group ">
											<label for="ps" class="control-label col-lg-2">Bahan Bakar</label>
											<div class="col-lg-4">
												<select class="form-control input-sm m-bot15" id="bh" name="bh">
													<option value="Premium">Premium
													</option>
													<option value="Solar">Solar</option>
												</select>
											</div>
											<label for="jml" class="control-label col-lg-2">Jumlah (KL)</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="jml" name="jml"  type="number" required />
											</div>
										</div>
										<div class="form-group ">
											<label for="tgl_plan_gi1" class="control-label col-lg-2">Tanggal Plan GI</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_plan_gi" name="tgl_plan_gi"  type="date" required />
												<span class="help-block">Pilih Tanggal</span>
											</div>
											 <label for="nomor_order" class="control-label col-lg-2">Nomor Order</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="nomor_order" name="nomor_order"  type="text" required />
											</div>
										</div>
										<div class="form-group ">
											<label for="tgl_order" class="control-label col-lg-2">Tanggal Order</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_order" name="tgl_order"  type="date" required />
												<span class="help-block">Pilih Tanggal</span>
											</div>
											<label for="tgl_kirim" class="control-label col-lg-2">Tanggal Pengiriman</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_kirim" name="tgl_kirim"  type="date" required />
												<span class="help-block">Pilih Tanggal</span>
											</div>
										</div>
										<div class="form-group ">
											<label for="tgl_kpl_dtg" class="control-label col-lg-2">Tanggal Kapal Datang</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_kpl_dtg" name="tgl_kpl_dtg"  type="date" required />
												<span class="help-block">Pilih Tanggal</span>
											</div>
											<label for="tgl_kpl_brkt" class="control-label col-lg-2">Tanggal Kapal Berangkat</label>
											<div class="col-lg-4">
												<input class=" form-control input-sm m-bot15" id="tgl_kpl_brkt" name="tgl_kpl_brkt"  type="date" required />
												<span class="help-block">Pilih Tanggal</span>
											</div>
										</div>
										<div class="form-group ">
											<label for="des" class="control-label col-lg-2">Description</label>
											<div class="col-lg-10">
												<textarea class=" form-control input-sm m-bot15" id="des" name="des" required ></textarea>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                        <input type="submit" class="btn btn-success" name="simpan1" id="simpan1" value="Simpan"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
	
	
	
	
	