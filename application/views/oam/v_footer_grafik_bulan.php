
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