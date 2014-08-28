
                    </div>
                </section>
<!--                <section class="panel">
                    <div class="panel-body">
                        <div id="grafik"></div>
                    </div>
                </section>-->
                <section class="panel">
                    <div class="panel-body">
                        <header class="panel-heading">
                            Key Performance Indicator (KPI) Depot 1 (Tahun 2014)
                        </header>
                        <div class="adv-table editable-table " style="overflow: scroll;">
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                    <tr>
                                        <th style="display:none;"></th>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th style="white-space: nowrap">Rencana pengiriman vs realisasi (MS2 Compliance)</th>
                                        <th style="white-space: nowrap">Rencana volume angkutan vs realisasi</th>
                                        <th style="white-space: nowrap">Laporan tagihan ongkos angkut </th>
                                        <th style="white-space: nowrap">Customer  Satisfaction (Lembaga Penyalur)</th>
                                        <th style="white-space: nowrap">Jumlah temuan, keluhan atau komplain terkait pengelolaan MT</th>
                                        <th style="white-space: nowrap">Tindak lanjut penyelesaian keluhan atau komplain yang diterima</th>
                                        <th style="white-space: nowrap">Jumlah pekerja pengelola MT  yang mengikuti pelatihan</th>
                                        <th style="white-space: nowrap">Number of Incidents</th>
                                        <th style="white-space: nowrap">Waktu penyelesaian Incidents</th>
                                        <th style="white-space: nowrap">Number of Accident</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                    $km = array(7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6);
                                    $kl = array(0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5);
                                    $rit = array(1, 0.8, 2, 11.3, 7, 12, 26, 24.1, 22, 10, 8, 2);
                                    $premium = array(0.1, 0.5, 2.5, 6.4, 10.5, 12.0, 18.6, 17.2, 14.3, 11.0, 3.9, 2.0);
                                    $pertamax = array(0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0);
                                    $pertamaxplus = array(3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8);
                                    $pertamaxdex = array(2.8, 3.9, 4.7, 7.5, 9.9, 13.2, 15.0, 12.6, 10.2, 11.3, 4.6, 2.8);
                                    $solar = array(3.1, 3.0, 2.3, 4.5, 12.2, 14.2, 17.3, 18.6, 20.2, 17.3, 12.6, 6.8);
                                    $biosolar = array(1.9, 2.2, 3.7, 5.5, 3.9, 10.2, 12.0, 18.6, 15.2, 12.3, 9.6, 10.8);

                                    for ($i = 0; $i < 8; $i++) {
                                        ?>
                                        <tr class="">
                                            <td style="display:none;"></td>
                                            <td><?php echo ($i + 1) ?></td>
                                            <td><?php echo $bulan[$i] ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
                                            <td><?php echo "Target : <br/>Realisasi : <br/>Performansi : <br/>" ?></td>
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