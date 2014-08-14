<script type="text/javascript">

    $(function() {
        $('#grafik').highcharts({
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Grafik Mobil Tangki',
                x: -20 //center
            },
            subtitle: {
                text: '10 Januari 2014 (Kilometer)',
                x: -20
            },
            xAxis: {
                categories: ["D9870AF","D9004AD","D9870AD","D9576AF","D9000AU","D9750AD","D9100AF","D9055AF"]
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
                    name: 'Kiloliter',
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
                        <div id="grafik"></div> </div>
                </section>
                <section class="panel">
                     <header class="panel-heading">
                            Tabel Kinerja Mobil Tangki 10 Januari Tahun 2014
                        </header>
                    <div class="panel-body">
                       
                        <div class="adv-table editable-table " >
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>Nopol</th>
                                        <th>Transportir</th>
                                        <th>Produk</th>
                                        <th>Kapasitas</th>
                                        <th>Nomor Mesin</th>
                                        <th>Nomor Rangka</th>
                                        <th>Jumlah Kiloliter</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $premium = array(7.0, 6.9, 7.5, 4.5, 6.2, 8.5, 9.2, 11.5, 5.3, 4.3, 7.9, 9.6, 7.0, 6.9, 7.5, 4.5, 6.2, 8.5, 9.2, 11.5, 5.3, 4.3, 7.9, 9.6, 7.0, 6.9, 7.5, 4.5, 6.2, 8.5);
                                    $nopol = array("D9870AF", "D9004AD", "D9870AD", "D9576AF", "D9000AU", "D9750AD", "D9100AF", "D9055AF");
                                    $transportir = array("Masoem", "Masoem", "Masoem", "Patra", "Patra", "Patra", "Patra", "Patra");
                                    $produk = array("Premium", "Premium", "Premium", "Pertamax", "Pertamax", "Solar", "Solar", "Pertamax");
                                    $kapasitas = array(8, 16, 8, 24, 16, 8, 8, 16);
                                    $no_mesin = array("LN098242OP", "LN098242GT", "L098242MKN", "LN098242MKN", "LN098242MKN", "LN098242MKN", "LN098242MKN", "LN098242MKN", "LN098242MKN");
                                    $no_rangka = array("LN098242MKN", "PLN098242MKN", "LN098242MKN", "LN098242MKN", "LN098242MKN", "LN098242MKN", "LN098242MKN", "LN098242MKN");

                                    $alamat = array("Jl. Saturnus Selatan Bandung", "Jl. Cilawu, Garut", "Jl. Gegerkalong Girang, Bandung", "Jl. Buah Batu, Bandung", "Jl. Soekarno Hatta, Garut", "Jl. Saturnus Selatan Bandung", "Jl. Cilawu, Garut", "Jl. Gegerkalong Girang, Bandung");
                                    for ($i = 0; $i < 8; $i++) {
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><a href="<?php echo base_url() ?>mt/detail_mt" style ="text-decoration: underline"><?php echo $nopol[$i] ?></a></td>
                                            <td><?php echo $transportir[$i] ?></td>
                                            <td><?php echo $produk[$i] ?></td>
                                            <td><?php echo $kapasitas[$i] ?></td>
                                            <td><?php echo $no_mesin[$i] ?></td>
                                            <td><?php echo $no_rangka[$i] ?></td>
                                            <td><?php echo $premium[$i] ?></td>
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
		  	
</script><?php
                                    /*
                                     * To change this template, choose Tools | Templates
                                     * and open the template in the editor.
                                     */
                                    ?>
