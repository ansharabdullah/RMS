<script type="text/javascript">
    var amt;
    var start = 0;
    var limit = 5;
    var pegawai = new Array();
    var km = new Array();
    var kl = new Array();
    var ritase = new Array();
    var pendapatan = new Array();
    var spbu = new Array();
    <?php
    foreach($amt as $a)
    {
        $status = 0;
        foreach($kinerja as $k)
        { 
            if($k->ID_PEGAWAI == $a->ID_PEGAWAI)
            {
                $status = 1;
        ?>
            pegawai.push("<?php echo $a->NAMA_PEGAWAI?>");    
            km.push(<?php echo $k->TOTAL_KM?>);       
            kl.push(<?php echo $k->TOTAL_KL?>);       
            ritase.push(<?php echo $k->RITASE_AMT?>);       
            pendapatan.push(<?php echo $k->PENDAPATAN?>);       
            spbu.push(<?php echo $k->SPBU?>);    
        <?php 
                break;
            }
           
        }
        if($status == 0)
        {
            ?>
            pegawai.push("<?php echo $a->NAMA_PEGAWAI?>");    
            km.push(0);       
            kl.push(0);       
            ritase.push(0);       
            pendapatan.push(0);       
            spbu.push(0);  
            <?php
            
        }
    }
        
    ?>
    $(function() {
        amt = new Highcharts.Chart({ 
            chart: {
                renderTo:'grafik',
                type:'bar'
            },
            title: {
                text: 'Grafik Awak Mobil Tangki',
                x: -20 //center
            },
            subtitle: {
                text: '<?php echo date('d F Y',strtotime($tanggal))?>',
                x: -20
            },
            xAxis: {
                categories: pegawai.slice(start,start + limit)
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                },
                plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                borderWidth: 1
            },
            series: [{
                    name: 'KM',
                    data: km.slice(start,start + limit),
                    visible : false
                    },{
                    name: 'KL',
                    data: kl.slice(start,start + limit),
                    visible : false
                    },{
                    name: 'RITASE',
                    data: ritase.slice(start,start + limit),
                    visible : false
                    },{
                    name: 'PENDAPATAN',
                    data: pendapatan.slice(start,start + limit),
                    visible : false
                    },{
                    name: 'SPBU',
                    data: spbu.slice(start,start + limit),
                    visible : false
                }]
        });
    });
    $(document).ready(function(){
        amt.series[0].setVisible(true);
        $("#sebelum").hide();
        if(pegawai.length < limit)
        {
            $("#selanjutnya").hide();
        }
       
    });
    
    
    function sebelumOnClick()
    {
        $("#sebelum").show();
        start -=limit;
        if(start - limit < 0)
        {
            start = 0;
            $("#sebelum").hide();
        }
        else
        {
            start = start - limit;
        }
        $("#selanjutnya").show();
        setData();
    }
    
    function selanjutnyaOnClick()
    {
        $("#selanjutnya").show();
        start += limit;
        if(start + limit >= pegawai.length)
        {
            $("#selanjutnya").hide();
        }
        $("#sebelum").show();
        setData();
    }
    
    function setData()
    {
       
        amt.xAxis[0].setCategories(pegawai.slice(start,start + limit));
        amt.series[0].setData(km.slice(start,start + limit));
        amt.series[1].setData(kl.slice(start,start + limit));
        amt.series[2].setData(ritase.slice(start,start + limit));
        amt.series[3].setData(pendapatan.slice(start,start + limit));
        amt.series[4].setData(spbu.slice(start,start + limit));
    }
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>amt/grafik/<?php echo date('Y')?>"> Grafik Bulanan AMT</a></li>
                    <li><a href="<?php echo base_url(); ?>amt/grafik_harian/<?php echo date('m')?>/<?php echo date('Y')?>"> Grafik Harian AMT</a></li>
                    <li class="active">Grafik Detail Harian AMT</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    
                    <header class="panel-heading">
                        Grafik Detail Harian AMT
                    </header>
                  <div class="panel-body" >
                        <?php
                        $attr = array("class" => "cmxform form-horizontal tasi-form");
                        echo form_open("amt/ganti_detail_amt/", $attr);
                        ?>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <input type="date" name="tanggal"  required="required" id="tahunLaporan"  class="form-control"/>
                            </div>

                            <div class=" col-lg-2">
                                <input type="submit" class="btn btn-danger" value="Submit">
                            </div>

                        </div>
                        <?php echo form_close() ?>
                        <br/><br/>
                        <div id="grafik"></div><br/><br/>
                        <button class='btn btn-danger' id="sebelum" onclick="sebelumOnClick()"><i class='icon-long-arrow-left'></i> sebelumnya</button>
                        <button class='btn btn-danger' style='float:right;' id="selanjutnya" onclick="selanjutnyaOnClick()">selanjutnya <i class='icon-long-arrow-right'></i></button>
                    </div>
                </section>
                <section class="panel">
                     <header class="panel-heading">
                            Tabel Kinerja Mobil Tangki 24 Agustus Tahun 2014
                        </header>
                    <div class="panel-body">
                       
                        <div class="adv-table editable-table " style="overflow-x:scroll" >
                             <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Klasifikasi</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Transportir Asal</th>
                                        <th>Alamat</th>
                                        <th>No Telp</th>
                                        <th>KM</th>
                                        <th>KL</th>
                                        <th>RITASE</th>
                                        <th>PENDAPATAN</th>
                                        <th>SPBU</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    foreach($amt as $a)
                                    {
                                        $status = 0;
                                        foreach ($kinerja as $k) {
                                            if($a->ID_PEGAWAI == $k->ID_PEGAWAI)
                                            {
                                                $status = 1;
                                            ?>
                                            <tr class="">
                                                <td style="display:none;"></td>
                                                <td><?php echo ($i + 1) ?></td>
                                                <td style="white-space: nowrap"><?php echo $a->NIP?></td>
                                                <td><?php echo $a->NO_PEKERJA ?></td>
                                                <td><?php echo $a->NAMA_PEGAWAI ?></td>
                                                <td><?php echo $k->STATUS_TUGAS ?></td>
                                                <td><?php echo $a->KLASIFIKASI ?></td>
                                                <td><?php echo $a->TANGGAL_MASUK ?></td>
                                                <td><?php echo $a->TRANSPORTIR_ASAL ?></td>
                                                <td><?php echo $a->ALAMAT ?></td>
                                                <td><?php echo $a->NO_TELEPON ?></td>
                                                <td><?php echo $k->TOTAL_KM?></td>
                                                <td><?php echo $k->TOTAL_KL?></td>
                                                <td><?php echo $k->RITASE_AMT?></td>
                                                <td><?php echo $k->PENDAPATAN?></td>
                                                <td><?php echo $k->SPBU?></td>
                                            </tr>
                                            <?php
                                                break;
                                            }
                                        }
                                        if($status == 0)
                                        {
                                            ?>
                                                <tr class="">
                                                <td style="display:none;"></td>
                                                <td><?php echo ($i + 1) ?></td>
                                                <td><?php echo $a->NIP?></td>
                                                <td  style="white-space: nowrap"><?php echo $a->NO_PEKERJA ?></td>
                                                <td><?php echo $a->NAMA_PEGAWAI ?></td>
                                                <td>-</td>
                                                <td><?php echo $a->KLASIFIKASI ?></td>
                                                <td><?php echo $a->TANGGAL_MASUK ?></td>
                                                <td><?php echo $a->TRANSPORTIR_ASAL ?></td>
                                                <td><?php echo $a->ALAMAT ?></td>
                                                <td><?php echo $a->NO_TELEPON ?></td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                            <?php
                                            
                                        }
                                            $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>            
        </div>        
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
		  	
</script>