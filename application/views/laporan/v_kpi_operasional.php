
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url();?>laporan/bulanan">Laporan Bulanan</a></li>
                    <li class="active">KPI Operasional</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <section class="panel">
            <header class="panel-heading">
                KPI Operasional Depot
                <a style="float:right;" data-placement="left" href="#ModalTambah" data-toggle="modal" class="btn btn-primary btn-xs tooltips" data-original-title="Tambah"> Tambah Data <i class="icon-plus"></i></a>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url(); ?>laporan/kpi_operasional">
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

        <?php if ($klik_tambah == true) { ?>
            <?php if ($kpi['error'] == true) { ?> 
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Data KPI Operasional <strong><?php echo $kpi['nama_bulan'] ?></strong> sudah ada.
                </div>
            <?php } else { ?>
                <?php if ($kpi['error_ms2'] == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error MS2!</strong> Data MS2 Compliance <strong><?php echo $kpi['nama_bulan'] ?></strong> tidak ditemukan.
                    </div>
                <?php } ?>
                <?php if ($kpi['error_rencana'] == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error Rencana!</strong> Data Rencana <strong><?php echo $kpi['nama_bulan'] ?></strong> tidak ditemukan.
                    </div>
                <?php } ?>
                <?php if ($kpi['error_kinerja'] == true) { ?>
                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Error Kinerja!</strong> Data Kinerja <strong><?php echo $kpi['nama_bulan'] ?></strong> belum lengkap.
                    </div>
                <?php } ?>
                <?php if ($kpi['error_ms2'] == false && $kpi['error_rencana'] == false && $kpi['error_kinerja'] == false) { ?>
                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="icon-remove"></i>
                        </button>
                        <strong>Sukses!</strong> Berhasil tambah data KPI Operasional <strong><?php echo $kpi['nama_bulan'] ?></strong>.
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>

        <?php if ($klik_edit == true) { ?>
            <div class="alert alert-success fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                    <i class="icon-remove"></i>
                </button>
                <strong>Sukses!</strong> Berhasil edit data KPI Operasional <strong><?php echo $kpi['nama_bulan'] ?></strong>.
            </div>
        <?php } ?>

        <?php if ($klik_cek == true) { ?>
            <?php if ($kpi['error'] == true) { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> Data KPI Operasional tidak ditemukan.
                </div>
            <?php } else { ?>
                <section class="panel">
                    <header class="panel-heading">
                        Tabel KPI Operasional <strong><?php echo $kpi['nama_bulan'] ?></strong>
                        <a style="float:right;" data-placement="top" data-toggle="modal" href="#ModalEdit" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i> Edit KPI</a>
                    </header>
                    <div class="panel-body" style="overflow-x: scroll">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2" width="230">Parameter KPI</th>
                                    <th rowspan="2">Aspek</th>
                                    <th rowspan="2">Satuan</th>
                                    <th rowspan="2">Frekuensi</th>
                                    <th rowspan="2">Target</th>
                                    <th rowspan="2">Bobot</th>
                                    <th colspan="5">Realisasi</th>
                                </tr>
                                <tr>
                                    <td>Realisasi</td>
                                    <td>Deviasi</td>
                                    <td>Performance Score</td>
                                    <td>Normal Score</td>
                                    <td>Weighted Score</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="12"><font size="1"><strong>OPERATIONAL TARGET</strong></font></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><?php echo $kpi['data'][0]->JENIS_KPI_OPERASIONAL; ?></td>
                                    <td>Min</td>
                                    <td>%</td>
                                    <td>Harian</td>
                                    <td><?php echo $kpi['data'][0]->TARGET; ?></td>
                                    <td><?php echo $kpi['data'][0]->BOBOT; ?>%</td>
                                    <td><?php echo $kpi['data'][0]->REALISASI; ?></td>
                                    <td><?php echo $kpi['data'][0]->DEVIASI; ?></td>
                                    <td>
                                        <?php if ($kpi['data'][0]->PERFORMANCE_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][0]->PERFORMANCE_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][0]->PERFORMANCE_SCORE; ?>%
                                    </td>
                                    <td> 
                                        <?php if ($kpi['data'][0]->NORMAL_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][0]->NORMAL_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][0]->NORMAL_SCORE; ?>%</td>
                                    <td>
                                        <?php if ($kpi['data'][0]->WEIGHTED_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][0]->WEIGHTED_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][0]->WEIGHTED_SCORE; ?>%
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><?php echo $kpi['data'][1]->JENIS_KPI_OPERASIONAL; ?></td>
                                    <td>Min</td>
                                    <td>%</td>
                                    <td>Harian</td>
                                    <td><?php echo $kpi['data'][1]->TARGET; ?></td>
                                    <td><?php echo $kpi['data'][1]->BOBOT; ?>%</td>
                                    <td><?php echo $kpi['data'][1]->REALISASI; ?></td>
                                    <td><?php echo $kpi['data'][1]->DEVIASI; ?></td>
                                    <td>
                                        <?php if ($kpi['data'][1]->PERFORMANCE_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][1]->PERFORMANCE_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][1]->PERFORMANCE_SCORE; ?>%
                                    </td>
                                    <td> 
                                        <?php if ($kpi['data'][1]->NORMAL_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][1]->NORMAL_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][1]->NORMAL_SCORE; ?>%</td>
                                    <td>
                                        <?php if ($kpi['data'][1]->WEIGHTED_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][1]->WEIGHTED_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][1]->WEIGHTED_SCORE; ?>%
                                    </td>                             

                                </tr>                            
                                <tr>
                                    <td colspan="12"><font size="1"><strong>TIMELY REPORTING PERFORMANCE</strong></font></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><?php echo $kpi['data'][2]->JENIS_KPI_OPERASIONAL; ?></td>
                                    <td>Max</td>
                                    <td>Tanggal</td>
                                    <td>Bulanan</td>
                                    <td><?php echo $kpi['data'][2]->TARGET; ?></td>
                                    <td><?php echo $kpi['data'][2]->BOBOT; ?>%</td>
                                    <td><?php echo $kpi['data'][2]->REALISASI; ?></td>
                                    <td><?php echo $kpi['data'][2]->DEVIASI; ?></td>
                                    <td>
                                        <?php if ($kpi['data'][2]->PERFORMANCE_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][2]->PERFORMANCE_SCORE >= 70) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][2]->PERFORMANCE_SCORE; ?>%
                                    </td>
                                    <td> 
                                        <?php if ($kpi['data'][2]->NORMAL_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][2]->NORMAL_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][2]->NORMAL_SCORE; ?>%</td>
                                    <td>
                                        <?php if ($kpi['data'][2]->WEIGHTED_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][2]->WEIGHTED_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][2]->WEIGHTED_SCORE; ?>%
                                    </td>   
                                </tr>

                                <tr>
                                    <td colspan="12"><font size="1"><strong>SATISFACTION PERFORMANCE</strong></font></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><?php echo $kpi['data'][3]->JENIS_KPI_OPERASIONAL; ?></td>
                                    <td>Min</td>
                                    <td>Likert (1-5)</td>
                                    <td>Caturwulan</td>
                                    <td><?php echo $kpi['data'][3]->TARGET; ?></td>
                                    <td><?php echo $kpi['data'][3]->BOBOT; ?>%</td>
                                    <td><?php echo $kpi['data'][3]->REALISASI; ?></td>
                                    <td><?php echo $kpi['data'][3]->DEVIASI; ?></td>
                                    <td>
                                        <?php if ($kpi['data'][3]->PERFORMANCE_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][3]->PERFORMANCE_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][3]->PERFORMANCE_SCORE; ?>%
                                    </td>
                                    <td> 
                                        <?php if ($kpi['data'][3]->NORMAL_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][3]->NORMAL_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][3]->NORMAL_SCORE; ?>%</td>
                                    <td>
                                        <?php if ($kpi['data'][3]->WEIGHTED_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][3]->WEIGHTED_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][3]->WEIGHTED_SCORE; ?>%
                                    </td>   
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><?php echo $kpi['data'][4]->JENIS_KPI_OPERASIONAL; ?></td>
                                    <td>Max</td>
                                    <td>Kasus</td>
                                    <td>Bulaan</td>
                                    <td><?php echo $kpi['data'][4]->TARGET; ?></td>
                                    <td><?php echo $kpi['data'][4]->BOBOT; ?>%</td>
                                    <td><?php echo $kpi['data'][4]->REALISASI; ?></td>
                                    <td><?php echo $kpi['data'][4]->DEVIASI; ?></td>
                                    <td>
                                        <?php if ($kpi['data'][4]->PERFORMANCE_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][4]->PERFORMANCE_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][4]->PERFORMANCE_SCORE; ?>%
                                    </td>
                                    <td> 
                                        <?php if ($kpi['data'][4]->NORMAL_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][4]->NORMAL_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][4]->NORMAL_SCORE; ?>%</td>
                                    <td>
                                        <?php if ($kpi['data'][4]->WEIGHTED_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][4]->WEIGHTED_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][4]->WEIGHTED_SCORE; ?>%
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><?php echo $kpi['data'][5]->JENIS_KPI_OPERASIONAL; ?></td>
                                    <td>Min</td>
                                    <td>%</td>
                                    <td>Bulanan</td>
                                    <td><?php echo $kpi['data'][5]->TARGET; ?></td>
                                    <td><?php echo $kpi['data'][5]->BOBOT; ?>%</td>
                                    <td><?php echo $kpi['data'][5]->REALISASI; ?></td>
                                    <td><?php echo $kpi['data'][5]->DEVIASI; ?></td>
                                    <td>
                                        <?php if ($kpi['data'][5]->PERFORMANCE_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][5]->PERFORMANCE_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][5]->PERFORMANCE_SCORE; ?>%
                                    </td>
                                    <td> 
                                        <?php if ($kpi['data'][5]->NORMAL_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][5]->NORMAL_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][5]->NORMAL_SCORE; ?>%</td>
                                    <td>
                                        <?php if ($kpi['data'][5]->WEIGHTED_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][5]->WEIGHTED_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][5]->WEIGHTED_SCORE; ?>%
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><?php echo $kpi['data'][6]->JENIS_KPI_OPERASIONAL; ?></td>
                                    <td>Min</td>
                                    <td>%</td>
                                    <td>Tahunan</td>
                                    <td><?php echo $kpi['data'][6]->TARGET; ?></td>
                                    <td><?php echo $kpi['data'][6]->BOBOT; ?>%</td>
                                    <td><?php echo $kpi['data'][6]->REALISASI; ?></td>
                                    <td><?php echo $kpi['data'][6]->DEVIASI; ?></td>
                                    <td>
                                        <?php if ($kpi['data'][6]->PERFORMANCE_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][6]->PERFORMANCE_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][6]->PERFORMANCE_SCORE; ?>%
                                    </td>
                                    <td> 
                                        <?php if ($kpi['data'][6]->NORMAL_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][6]->NORMAL_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][6]->NORMAL_SCORE; ?>%</td>
                                    <td>
                                        <?php if ($kpi['data'][6]->WEIGHTED_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][6]->WEIGHTED_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][6]->WEIGHTED_SCORE; ?>%
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="12"><font size="1"><strong>HSSE PERFORMANCE</strong></font></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td><?php echo $kpi['data'][7]->JENIS_KPI_OPERASIONAL; ?></td>
                                    <td>Max</td>
                                    <td>Kasus</td>
                                    <td>Bulanan</td>
                                    <td><?php echo $kpi['data'][7]->TARGET; ?></td>
                                    <td><?php echo $kpi['data'][7]->BOBOT; ?>%</td>
                                    <td><?php echo $kpi['data'][7]->REALISASI; ?></td>
                                    <td><?php echo $kpi['data'][7]->DEVIASI; ?></td>
                                    <td>
                                        <?php if ($kpi['data'][7]->PERFORMANCE_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][7]->PERFORMANCE_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][7]->PERFORMANCE_SCORE; ?>%
                                    </td>
                                    <td> 
                                        <?php if ($kpi['data'][7]->NORMAL_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][7]->NORMAL_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][7]->NORMAL_SCORE; ?>%</td>
                                    <td>
                                        <?php if ($kpi['data'][7]->WEIGHTED_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][7]->WEIGHTED_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][7]->WEIGHTED_SCORE; ?>%
                                    </td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td><?php echo $kpi['data'][8]->JENIS_KPI_OPERASIONAL; ?></td>
                                    <td>Max</td>
                                    <td>Hari</td>
                                    <td>Kasus</td>
                                    <td><?php echo $kpi['data'][8]->TARGET; ?></td>
                                    <td><?php echo $kpi['data'][8]->BOBOT; ?>%</td>
                                    <td><?php echo $kpi['data'][8]->REALISASI; ?></td>
                                    <td><?php echo $kpi['data'][8]->DEVIASI; ?></td>
                                    <td>
                                        <?php if ($kpi['data'][8]->PERFORMANCE_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][8]->PERFORMANCE_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][8]->PERFORMANCE_SCORE; ?>%
                                    </td>
                                    <td> 
                                        <?php if ($kpi['data'][8]->NORMAL_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][8]->NORMAL_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][8]->NORMAL_SCORE; ?>%</td>
                                    <td>
                                        <?php if ($kpi['data'][8]->WEIGHTED_SCORE >= 100) { ?>
                                            <i class="btn-xs btn-success icon-ok-circle"></i>
                                        <?php } else if ($kpi['data'][8]->WEIGHTED_SCORE >= 95) { ?>
                                            <i class="btn-xs btn-warning icon-warning-sign"></i>
                                        <?php } else { ?>
                                            <i class="btn-xs btn-danger icon-remove-sign"></i>
                                        <?php } ?>
                                        <?php echo $kpi['data'][8]->WEIGHTED_SCORE; ?>%
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="12"><font size="1"><strong>BOUNDARY KPI</strong></font></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td><?php echo $kpi['data'][9]->JENIS_KPI_OPERASIONAL; ?></td>
                                    <td>Nil</td>
                                    <td>Kasus</td>
                                    <td></td>
                                    <td><?php echo $kpi['data'][9]->TARGET; ?></td>
                                    <td></td>
                                    <td><?php echo $kpi['data'][9]->REALISASI; ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="12"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Jumlah Total Nilai KPI</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong>
                                            <?php
                                            $jumlah = $kpi['data'][0]->WEIGHTED_SCORE + $kpi['data'][1]->WEIGHTED_SCORE + $kpi['data'][2]->WEIGHTED_SCORE + $kpi['data'][3]->WEIGHTED_SCORE + $kpi['data'][4]->WEIGHTED_SCORE + $kpi['data'][5]->WEIGHTED_SCORE + $kpi['data'][6]->WEIGHTED_SCORE + $kpi['data'][7]->WEIGHTED_SCORE + $kpi['data'][8]->WEIGHTED_SCORE;
                                            echo $jumlah;
                                            ?>
                                            %
                                        </strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            <?php } ?>

        <?php } ?>
    </section>
</section>
<!--main content end-->



<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Data</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url(); ?>laporan/kpi_operasional">

                <div class="modal-body">
                    <div class="form-group ">                                            
                        <label for="bln_kpi" class="control-label col-lg-4">Bulan</label>
                        <div class="col-lg-8">
                            <input class=" form-control input-sm m-bot15" name="bln_kpi" type="month" value="<?php echo $kpi['bln_kpi']; ?>" required readonly/>
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
                                <td>Rencana pengiriman vs realisasi (MS2 Compliance)*</td>
                                <td>
                                    <input type="hidden" name="id_kpi1" value="<?php echo $kpi['data'][0]->ID_KPI_OPERASIONAL; ?>">
                                    <input type="number" required="required" name="kpitarget1" class="form-control" value="<?php echo $kpi['data'][0]->TARGET; ?>" >
                                </td>
                                <td><input type="number" required="required" name="kpirealisasi1" class="form-control" value="<?php echo $kpi['data'][0]->REALISASI; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Rencana volume angkutan vs realisasi</td>
                                <td>
                                    <input type="hidden" name="id_kpi2" value="<?php echo $kpi['data'][1]->ID_KPI_OPERASIONAL; ?>">
                                    <input type="number" required="required" name="kpitarget2" class="form-control" value="<?php echo $kpi['data'][1]->TARGET; ?>">
                                </td>
                                <td><input type="number" required="required" name="kpirealisasi2" class="form-control" value="<?php echo $kpi['data'][1]->REALISASI; ?>" readonly></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Laporan tagihan ongkos angkut (dokumen lengkap dan benar)</td>
                                <td>
                                    <input type="hidden" name="id_kpi3" value="<?php echo $kpi['data'][2]->ID_KPI_OPERASIONAL; ?>">
                                    <input type="number" required="required" name="kpitarget3" class="form-control" value="<?php echo $kpi['data'][2]->TARGET; ?>">
                                </td>
                                <td><input type="number" required="required" name="kpirealisasi3" class="form-control" value="<?php echo $kpi['data'][2]->REALISASI; ?>"></td>

                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Customer  Satisfaction (Lembaga Penyalur)</td>
                                <td>
                                    <input type="hidden" name="id_kpi4" value="<?php echo $kpi['data'][3]->ID_KPI_OPERASIONAL; ?>">
                                    <input type="number" required="required" name="kpitarget4" class="form-control" value="<?php echo $kpi['data'][3]->TARGET; ?>">
                                </td>
                                <td><input type="number" required="required" name="kpirealisasi4" class="form-control" value="<?php echo $kpi['data'][3]->REALISASI; ?>"></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</td>
                                <td>
                                    <input type="hidden" name="id_kpi5" value="<?php echo $kpi['data'][4]->ID_KPI_OPERASIONAL; ?>">
                                    <input type="number" required="required" name="kpitarget5" class="form-control" value="<?php echo $kpi['data'][4]->TARGET; ?>">
                                </td>
                                <td><input type="number" required="required" name="kpirealisasi5" class="form-control" value="<?php echo $kpi['data'][4]->REALISASI; ?>"></td>

                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Tindak lanjut penyelesaian keluhan atau komplain yang diterima</td>
                                <td>
                                    <input type="hidden" name="id_kpi6" value="<?php echo $kpi['data'][5]->ID_KPI_OPERASIONAL; ?>">
                                    <input type="number" required="required" name="kpitarget6" class="form-control" value="<?php echo $kpi['data'][5]->TARGET; ?>">
                                </td>
                                <td><input type="number" required="required" name="kpirealisasi6" class="form-control" value="<?php echo $kpi['data'][5]->REALISASI; ?>"></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Jumlah pekerja pengelola MT  yang mengikuti pelatihan</td>
                                <td>
                                    <input type="hidden" name="id_kpi7" value="<?php echo $kpi['data'][6]->ID_KPI_OPERASIONAL; ?>">
                                    <input type="number" required="required" name="kpitarget7" class="form-control" value="<?php echo $kpi['data'][6]->TARGET; ?>">
                                </td>
                                <td><input type="number" required="required" name="kpirealisasi7" class="form-control" value="<?php echo $kpi['data'][6]->REALISASI; ?>"></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Number of Incidents</td>
                                <td>
                                    <input type="hidden" name="id_kpi8" value="<?php echo $kpi['data'][7]->ID_KPI_OPERASIONAL; ?>">
                                    <input type="number" required="required" name="kpitarget8" class="form-control" value="<?php echo $kpi['data'][7]->TARGET; ?>">
                                </td>
                                <td><input type="number" required="required" name="kpirealisasi8" class="form-control" value="<?php echo $kpi['data'][7]->REALISASI; ?>"></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Waktu penyelesaian Incidents</td>
                                <td>
                                    <input type="hidden" name="id_kpi9" value="<?php echo $kpi['data'][8]->ID_KPI_OPERASIONAL; ?>">
                                    <input type="number" required="required" name="kpitarget9" class="form-control" value="<?php echo $kpi['data'][8]->TARGET; ?>">
                                </td>
                                <td><input type="number" required="required" name="kpirealisasi9" class="form-control" value="<?php echo $kpi['data'][8]->REALISASI; ?>"></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Number of Accident</td>
                                <td>
                                    <input type="hidden" name="id_kpi10" value="<?php echo $kpi['data'][9]->ID_KPI_OPERASIONAL; ?>">
                                    <input type="number" required="required" name="kpitarget10" class="form-control" value="<?php echo $kpi['data'][9]->TARGET; ?>">
                                </td>
                                <td><input type="number" required="required" name="kpirealisasi10" class="form-control" value="<?php echo $kpi['data'][9]->REALISASI; ?>"></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                    <input class="btn btn-success" type="submit" value="Simpan" name="edit"/>
                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url(); ?>laporan/kpi_operasional">

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
                                <td>Rencana pengiriman vs realisasi (MS2 Compliance)*</td>
                                <td>
                                    <input type="number" required="required" id="kpitarget1" name="kpitarget1" class="form-control">
                                </td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Rencana volume angkutan vs realisasi</td>
                                <td><input type="number" required="required" id="kpitarget2" name="kpitarget2" class="form-control"></td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Laporan tagihan ongkos angkut (dokumen lengkap dan benar)</td>
                                <td><input type="number" required="required" id="kpitarget3" name="kpitarget3" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi3" name="kpirealisasi3" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Customer  Satisfaction (Lembaga Penyalur)</td>
                                <td><input type="number" required="required" id="kpitarget4" name="kpitarget4" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi4" name="kpirealisasi4" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</td>
                                <td><input type="number" required="required" id="kpitarget5" name="kpitarget5" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi5" name="kpirealisasi5" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Tindak lanjut penyelesaian keluhan atau komplain yang diterima</td>
                                <td><input type="number" required="required" id="kpitarget6" name="kpitarget6" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi6" name="kpirealisasi6" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Jumlah pekerja pengelola MT  yang mengikuti pelatihan</td>
                                <td><input type="number" required="required" id="kpitarget7" name="kpitarget7" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi7" name="kpirealisasi7" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Number of Incidents</td>
                                <td><input type="number" required="required" id="kpitarget8" name="kpitarget8" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi8" name="kpirealisasi8" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Waktu penyelesaian Incidents</td>
                                <td><input type="number" required="required" id="kpitarget9" name="kpitarget9" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi9" name="kpirealisasi9" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Number of Accident</td>
                                <td><input type="number" required="required" id="kpitarget0" name="kpitarget10" class="form-control"></td>
                                <td><input type="number" required="required" id="kpirealisasi10" name="kpirealisasi10" class="form-control"></td>
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

