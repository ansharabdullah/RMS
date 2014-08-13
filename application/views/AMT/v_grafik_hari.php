<script type="text/javascript">

    $(function() {
        $('#grafik').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Grafik Awak Mobil Tangki',
                x: -20 //center
            },
            subtitle: {
                text: '10 Januari 2014 (Kilometer)',
                x: -20
            },
            xAxis: {
                categories: ["Firman","Anshar","Chepy","Dadang","Rasim","Enjang","Budi","Anto"]
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
                    data: [7.0, 6.9, 7.5, 4.5, 6.2, 8.5, 9.2, 11.5]
                }]
        });
    });

    
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <header class="panel-heading">
                            Tabel Kinerja Awak Mobil Tangki Tanggal 10 Januari 2014
                        </header>
                        <div class="adv-table editable-table ">
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
                                        <th>Kilometer (KM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $km = array(7.0, 6.9, 7.5, 4.5, 6.2, 8.5, 9.2, 11.5, 5.3, 4.3, 7.9, 9.6, 7.0, 6.9, 7.5, 4.5, 6.2, 8.5, 9.2, 11.5, 5.3, 4.3, 7.9, 9.6, 7.0, 6.9, 7.5, 4.5, 6.2, 8.5);
                                    $nama = array("Firman", "Anshar", "Chepy", "Dadang", "Rasim", "Enjang", "Budi", "Anto");
                                    $jabatan = array("Supir", "Kernet", "Supir", "Supir", "Kernet", "Kernet", "Supir", "Kernet");
                                    $klasifikasi = array(8,16,8,24,16,8,8,16);
                                    $masuk = array("20 Mei 2010","12 Agustus 2012","13 Januari 2011","10 Oktober 2010","14 Februari 2010","20 Mei 2010","12 Agustus 2012","13 Januari 2011","10 Oktober 2010");
                                    $asal = array("PT.Incot","PT.Patra Niaga","PT.Ma'soem","PT.Incot","PT.Patra Niaga","PT.Ma'soem","PT.Patra Niaga","PT.Patra Niaga");
                                   
                                    $alamat = array("Jl. Saturnus Selatan Bandung","Jl. Cilawu, Garut","Jl. Gegerkalong Girang, Bandung","Jl. Buah Batu, Bandung","Jl. Soekarno Hatta, Garut","Jl. Saturnus Selatan Bandung","Jl. Cilawu, Garut","Jl. Gegerkalong Girang, Bandung");
                                    for ($i = 0; $i < 8; $i++) {
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><a href="<?php echo base_url() ?>amt/detail" style ="text-decoration: underline">320519000<?php echo ($i + 1) ?></a></td>
                                            <td><?php echo $nama[$i] ?></td>
                                            <td><?php echo $jabatan[$i] ?></td>
                                            <td><?php echo $klasifikasi[$i] ?></td>
                                            <td><?php echo $masuk[$i] ?></td>
                                            <td><?php echo $asal[$i] ?></td>
                                            <td><?php echo $alamat[$i] ?></td>
                                            <td>08579335982<?php echo $i ?></td>
                                            <td><?php echo $km[$i] ?></td>
                                        </tr>
                                        <?php
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