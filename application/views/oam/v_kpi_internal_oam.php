
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel"> 
            <header class="panel-heading">
                KPI Internal OAM
                <a href="<?php echo base_url()?>kpi/internal_input" type="button" style="float: right;" class="btn btn-xs btn-success" ><i class="icon-plus"></i> Tambah KPI Internal</a>
            </header>
            <div class="panel-body">
                <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="<?php echo base_url()?>kpi/gantiTahunKpi/">
                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tahun</label>
                        <div class="col-lg-10 col-sm-6">
                            <input type="number" required="required" name="tahun" class="form-control" maxlength="4" min="2010" placeholder="Tahun">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" name="cek" style="float: right;" class="btn btn-warning" value="Cek">
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="panel"> 
            <header class="panel-heading">
                KPI Internal OAM Tahun <?php echo $tahun?>
              
            </header>
            <div class="panel-body">
               <center>
               <?php
               if(sizeof($kpi) > 0)
               {
                   ?>
               <b>KPI TRIWULAN I</b><br/><br/> 
               <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2">Indikator Kinerja</td>
                                <td rowspan="2">Satuan</td>
                                <td rowspan="2">Frekuensi Monitoring</td>
                                <td rowspan="2">Bobot %</td>
                                <td colspan="2"><span id="triwulan">Triwulan I</span></td>
                                <td colspan="3">Realisasi</td>
                                <td rowspan="2">RKAP OAM</td>
                            </tr>
                            <tr>
                                <td>Base</td>
                                <td>Stretch</td>
                                <td><span id="bulan_1">Januari</span></td>
                                <td><span id="bulan_2">Februari</span></td>
                                <td><span id="bulan_3">Maret</span></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9"><b>1. Revenue</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 4]->RKAP_OAM_TW1?></td>
                            </tr>
                            <tr>
                                <td>Revenue Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[0]->BOBOT ?></td>
                                <td><?php echo $kpi[0]->TW1_BASE ?></td>
                                <td><?php echo $kpi[0]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[1]->BOBOT ?></td>
                                <td><?php echo $kpi[1]->TW1_BASE ?></td>
                                <td><?php echo $kpi[1]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="9"><b>2. Laba Usaha</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 3]->RKAP_OAM_TW1?></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[2]->BOBOT ?></td>
                                <td><?php echo $kpi[2]->TW1_BASE ?></td>
                                <td><?php echo $kpi[2]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Terminal Storage</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[3]->BOBOT ?></td>
                                <td><?php echo $kpi[3]->TW1_BASE ?></td>
                                <td><?php echo $kpi[3]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="9"><b>3. Cost Effectiveness</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 2]->RKAP_OAM_TW1?></td>
                            </tr>
                            <tr>
                                <td>Cost/liter Fleet Management</td> 
                                <td>USD/KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[4]->BOBOT ?></td>
                                <td><?php echo $kpi[4]->TW1_BASE ?></td>
                                <td><?php echo $kpi[4]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Cost/liter Terminal Storage</td> 
                                <td>USD/KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[5]->BOBOT ?></td>
                                <td><?php echo $kpi[5]->TW1_BASE ?></td>
                                <td><?php echo $kpi[5]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>4. Collection Period</b></td> 
                                <td>by date</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[6]->BOBOT ?></td>
                                <td><?php echo $kpi[6]->TW1_BASE ?></td>
                                <td><?php echo $kpi[6]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>5. Terminal Losses</b></td>
                            </tr>
                            <tr>
                                <td>Total Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[7]->BOBOT ?></td>
                                <td><?php echo $kpi[7]->TW1_BASE ?></td>
                                <td><?php echo $kpi[7]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Discharge Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[8]->BOBOT ?></td>
                                <td><?php echo $kpi[8]->TW1_BASE ?></td>
                                <td><?php echo $kpi[8]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Working Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[9]->BOBOT ?></td>
                                <td><?php echo $kpi[9]->TW1_BASE ?></td>
                                <td><?php echo $kpi[9]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr> <tr>
                                <td colspan="9"><b>6. Volume Thruput BBM</b></td>
                                <td><?php echo $kpi[sizeof($kpi)-1]->RKAP_OAM_TW1?></td>
                            </tr>
                            <tr>
                                <td>Fleet Management (BBM/BBK)</td> 
                                <td>KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[10]->BOBOT ?></td>
                                <td><?php echo $kpi[10]->TW1_BASE ?></td>
                                <td><?php echo $kpi[10]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage</td> 
                                <td>KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[11]->BOBOT ?></td>
                                <td><?php echo $kpi[11]->TW1_BASE ?></td>
                                <td><?php echo $kpi[11]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td colspan="10"><b>7. Service Level Agreement</b></td>
                            </tr>
                            <tr>
                                <td>Fuel Retail Fleet Management (BBM/BBK)</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[12]->BOBOT ?></td>
                                <td><?php echo $kpi[12]->TW1_BASE ?></td>
                                <td><?php echo $kpi[12]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Fuel Retail Fleet Management (APMS)</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[13]->BOBOT ?></td>
                                <td><?php echo $kpi[13]->TW1_BASE ?></td>
                                <td><?php echo $kpi[13]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Gas & Aviation</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[14]->BOBOT ?></td>
                                <td><?php echo $kpi[14]->TW1_BASE ?></td>
                                <td><?php echo $kpi[14]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>8. Kegagalan Operasi (Avaibility & Reliability)</b></td>
                            </tr>
                            <tr>
                                <td colspan="10">a. Breakdown Occurences</td>
                            </tr>
                            <tr>
                                <td>- Mobil Tangki Kelola</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[15]->BOBOT ?></td>
                                <td><?php echo $kpi[15]->TW1_BASE ?></td>
                                <td><?php echo $kpi[15]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- Mobil Tangki Milik</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[16]->BOBOT ?></td>
                                <td><?php echo $kpi[16]->TW1_BASE ?></td>
                                <td><?php echo $kpi[16]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>b. Terminal Storage (BBM/Depot)</td> 
                                <td>kasus</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[17]->BOBOT ?></td>
                                <td><?php echo $kpi[17]->TW1_BASE ?></td>
                                <td><?php echo $kpi[17]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>9. Progress Pelaksaan Pekerjaan (BD/Non BD)<b/></td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[18]->BOBOT ?></td>
                                <td><?php echo $kpi[18]->TW1_BASE ?></td>
                                <td><?php echo $kpi[18]->TW1_STRETCH ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW1_BULAN1 ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW1_BULAN2 ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW1_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>Boundary KPIs</b></td>
                            </tr>
                            <tr>
                                <td>1. TRIR Patra Niaga</td>
                                <td>Ratio</td>
                                <td><?php echo $kpi[19]->BOBOT ?></td>
                                <td><?php echo $kpi[19]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. NOA Patra Niaga</td>
                                <td>Cases</td>
                                <td><?php echo $kpi[20]->BOBOT ?></td>
                                <td><?php echo $kpi[20]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. GCG compliance</td>
                                <td>%</td>
                                <td><?php echo $kpi[21]->BOBOT ?></td>
                                <td><?php echo $kpi[21]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. External Audit Option</td>
                                <td>%</td>
                                <td><?php echo $kpi[22]->BOBOT ?></td>
                                <td><?php echo $kpi[22]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>Other Operational Metrics</b></td>
                            </tr>
                            <tr>
                                <td>1. Proper PPN</td>
                                <td>%</td>
                                <td><?php echo $kpi[23]->BOBOT ?></td>
                                <td><?php echo $kpi[23]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. Learning Index</td>
                                <td>%</td>
                                <td><?php echo $kpi[24]->BOBOT ?></td>
                                <td><?php echo $kpi[24]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. Follow up audit findings</td>
                                <td>%</td>
                                <td><?php echo $kpi[25]->BOBOT ?></td>
                                <td><?php echo $kpi[25]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. Akurasi dan kelengkapan Laporan Keuangan</td>
                                <td>%</td>
                                <td><?php echo $kpi[26]->BOBOT ?></td>
                                <td><?php echo $kpi[26]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5. Utilisasi ERP (MySAP)</td>
                                <td>%</td>
                                <td><?php echo $kpi[27]->BOBOT ?></td>
                                <td><?php echo $kpi[27]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6. Knowledge & Innovation Program</td>
                                <td>%</td>
                                <td><?php echo $kpi[28]->BOBOT ?></td>
                                <td><?php echo $kpi[28]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>7. Penyelesaian OFI to AFIPQA</td>
                                <td>%</td>
                                <td><?php echo $kpi[29]->BOBOT ?></td>
                                <td><?php echo $kpi[29]->TW1_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
               KPI TRIWULAN II<br/><br/>
                
               <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2">Indikator Kinerja</td>
                                <td rowspan="2">Satuan</td>
                                <td rowspan="2">Frekuensi Monitoring</td>
                                <td rowspan="2">Bobot %</td>
                                <td colspan="2"><span id="triwulan">Triwulan II</span></td>
                                <td colspan="3">Realisasi</td>
                                <td rowspan="2">RKAP OAM</td>
                            </tr>
                            <tr>
                                <td>Base</td>
                                <td>Stretch</td>
                                <td><span id="bulan_1">Januari</span></td>
                                <td><span id="bulan_2">Februari</span></td>
                                <td><span id="bulan_3">Maret</span></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9"><b>1. Revenue</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 4]->RKAP_OAM_TW2?></td>
                            </tr>
                            <tr>
                                <td>Revenue Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[0]->BOBOT ?></td>
                                <td><?php echo $kpi[0]->TW2_BASE ?></td>
                                <td><?php echo $kpi[0]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[1]->BOBOT ?></td>
                                <td><?php echo $kpi[1]->TW2_BASE ?></td>
                                <td><?php echo $kpi[1]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="9"><b>2. Laba Usaha</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 3]->RKAP_OAM_TW2?></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[2]->BOBOT ?></td>
                                <td><?php echo $kpi[2]->TW2_BASE ?></td>
                                <td><?php echo $kpi[2]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Terminal Storage</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[3]->BOBOT ?></td>
                                <td><?php echo $kpi[3]->TW2_BASE ?></td>
                                <td><?php echo $kpi[3]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="9"><b>3. Cost Effectiveness</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 2]->RKAP_OAM_TW2?></td>
                            </tr>
                            <tr>
                                <td>Cost/liter Fleet Management</td> 
                                <td>USD/KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[4]->BOBOT ?></td>
                                <td><?php echo $kpi[4]->TW2_BASE ?></td>
                                <td><?php echo $kpi[4]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Cost/liter Terminal Storage</td> 
                                <td>USD/KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[5]->BOBOT ?></td>
                                <td><?php echo $kpi[5]->TW2_BASE ?></td>
                                <td><?php echo $kpi[5]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>4. Collection Period</b></td> 
                                <td>by date</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[6]->BOBOT ?></td>
                                <td><?php echo $kpi[6]->TW2_BASE ?></td>
                                <td><?php echo $kpi[6]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>5. Terminal Losses</b></td>
                            </tr>
                            <tr>
                                <td>Total Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[7]->BOBOT ?></td>
                                <td><?php echo $kpi[7]->TW2_BASE ?></td>
                                <td><?php echo $kpi[7]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Discharge Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[8]->BOBOT ?></td>
                                <td><?php echo $kpi[8]->TW2_BASE ?></td>
                                <td><?php echo $kpi[8]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Working Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[9]->BOBOT ?></td>
                                <td><?php echo $kpi[9]->TW2_BASE ?></td>
                                <td><?php echo $kpi[9]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr> <tr>
                                <td colspan="9"><b>6. Volume Thruput BBM</b></td>
                                <td><?php echo $kpi[sizeof($kpi)-1]->RKAP_OAM_TW2?></td>
                            </tr>
                            <tr>
                                <td>Fleet Management (BBM/BBK)</td> 
                                <td>KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[10]->BOBOT ?></td>
                                <td><?php echo $kpi[10]->TW2_BASE ?></td>
                                <td><?php echo $kpi[10]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage</td> 
                                <td>KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[11]->BOBOT ?></td>
                                <td><?php echo $kpi[11]->TW2_BASE ?></td>
                                <td><?php echo $kpi[11]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td colspan="10"><b>7. Service Level Agreement</b></td>
                            </tr>
                            <tr>
                                <td>Fuel Retail Fleet Management (BBM/BBK)</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[12]->BOBOT ?></td>
                                <td><?php echo $kpi[12]->TW2_BASE ?></td>
                                <td><?php echo $kpi[12]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Fuel Retail Fleet Management (APMS)</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[13]->BOBOT ?></td>
                                <td><?php echo $kpi[13]->TW2_BASE ?></td>
                                <td><?php echo $kpi[13]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Gas & Aviation</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[14]->BOBOT ?></td>
                                <td><?php echo $kpi[14]->TW2_BASE ?></td>
                                <td><?php echo $kpi[14]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>8. Kegagalan Operasi (Avaibility & Reliability)</b></td>
                            </tr>
                            <tr>
                                <td colspan="10">a. Breakdown Occurences</td>
                            </tr>
                            <tr>
                                <td>- Mobil Tangki Kelola</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[15]->BOBOT ?></td>
                                <td><?php echo $kpi[15]->TW2_BASE ?></td>
                                <td><?php echo $kpi[15]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- Mobil Tangki Milik</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[16]->BOBOT ?></td>
                                <td><?php echo $kpi[16]->TW2_BASE ?></td>
                                <td><?php echo $kpi[16]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>b. Terminal Storage (BBM/Depot)</td> 
                                <td>kasus</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[17]->BOBOT ?></td>
                                <td><?php echo $kpi[17]->TW2_BASE ?></td>
                                <td><?php echo $kpi[17]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>9. Progress Pelaksaan Pekerjaan (BD/Non BD)<b/></td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[18]->BOBOT ?></td>
                                <td><?php echo $kpi[18]->TW2_BASE ?></td>
                                <td><?php echo $kpi[18]->TW2_STRETCH ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW2_BULAN1 ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW2_BULAN2 ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW2_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>Boundary KPIs</b></td>
                            </tr>
                            <tr>
                                <td>1. TRIR Patra Niaga</td>
                                <td>Ratio</td>
                                <td><?php echo $kpi[19]->BOBOT ?></td>
                                <td><?php echo $kpi[19]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. NOA Patra Niaga</td>
                                <td>Cases</td>
                                <td><?php echo $kpi[20]->BOBOT ?></td>
                                <td><?php echo $kpi[20]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. GCG compliance</td>
                                <td>%</td>
                                <td><?php echo $kpi[21]->BOBOT ?></td>
                                <td><?php echo $kpi[21]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. External Audit Option</td>
                                <td>%</td>
                                <td><?php echo $kpi[22]->BOBOT ?></td>
                                <td><?php echo $kpi[22]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>Other Operational Metrics</b></td>
                            </tr>
                            <tr>
                                <td>1. Proper PPN</td>
                                <td>%</td>
                                <td><?php echo $kpi[23]->BOBOT ?></td>
                                <td><?php echo $kpi[23]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. Learning Index</td>
                                <td>%</td>
                                <td><?php echo $kpi[24]->BOBOT ?></td>
                                <td><?php echo $kpi[24]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. Follow up audit findings</td>
                                <td>%</td>
                                <td><?php echo $kpi[25]->BOBOT ?></td>
                                <td><?php echo $kpi[25]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. Akurasi dan kelengkapan Laporan Keuangan</td>
                                <td>%</td>
                                <td><?php echo $kpi[26]->BOBOT ?></td>
                                <td><?php echo $kpi[26]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5. Utilisasi ERP (MySAP)</td>
                                <td>%</td>
                                <td><?php echo $kpi[27]->BOBOT ?></td>
                                <td><?php echo $kpi[27]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6. Knowledge & Innovation Program</td>
                                <td>%</td>
                                <td><?php echo $kpi[28]->BOBOT ?></td>
                                <td><?php echo $kpi[28]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>7. Penyelesaian OFI to AFIPQA</td>
                                <td>%</td>
                                <td><?php echo $kpi[29]->BOBOT ?></td>
                                <td><?php echo $kpi[29]->TW2_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
               KPI TRIWULAN III<br/><br/> 
               <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2">Indikator Kinerja</td>
                                <td rowspan="2">Satuan</td>
                                <td rowspan="2">Frekuensi Monitoring</td>
                                <td rowspan="2">Bobot %</td>
                                <td colspan="2"><span id="triwulan">Triwulan III</span></td>
                                <td colspan="3">Realisasi</td>
                                <td rowspan="2">RKAP OAM</td>
                            </tr>
                            <tr>
                                <td>Base</td>
                                <td>Stretch</td>
                                <td><span id="bulan_1">Januari</span></td>
                                <td><span id="bulan_2">Februari</span></td>
                                <td><span id="bulan_3">Maret</span></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9"><b>1. Revenue</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 4]->RKAP_OAM_TW3?></td>
                            </tr>
                            <tr>
                                <td>Revenue Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[0]->BOBOT ?></td>
                                <td><?php echo $kpi[0]->TW3_BASE ?></td>
                                <td><?php echo $kpi[0]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[1]->BOBOT ?></td>
                                <td><?php echo $kpi[1]->TW3_BASE ?></td>
                                <td><?php echo $kpi[1]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="9"><b>2. Laba Usaha</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 3]->RKAP_OAM_TW3?></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[2]->BOBOT ?></td>
                                <td><?php echo $kpi[2]->TW3_BASE ?></td>
                                <td><?php echo $kpi[2]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Terminal Storage</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[3]->BOBOT ?></td>
                                <td><?php echo $kpi[3]->TW3_BASE ?></td>
                                <td><?php echo $kpi[3]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="9"><b>3. Cost Effectiveness</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 2]->RKAP_OAM_TW3?></td>
                            </tr>
                            <tr>
                                <td>Cost/liter Fleet Management</td> 
                                <td>USD/KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[4]->BOBOT ?></td>
                                <td><?php echo $kpi[4]->TW3_BASE ?></td>
                                <td><?php echo $kpi[4]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Cost/liter Terminal Storage</td> 
                                <td>USD/KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[5]->BOBOT ?></td>
                                <td><?php echo $kpi[5]->TW3_BASE ?></td>
                                <td><?php echo $kpi[5]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>4. Collection Period</b></td> 
                                <td>by date</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[6]->BOBOT ?></td>
                                <td><?php echo $kpi[6]->TW3_BASE ?></td>
                                <td><?php echo $kpi[6]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>5. Terminal Losses</b></td>
                            </tr>
                            <tr>
                                <td>Total Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[7]->BOBOT ?></td>
                                <td><?php echo $kpi[7]->TW3_BASE ?></td>
                                <td><?php echo $kpi[7]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Discharge Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[8]->BOBOT ?></td>
                                <td><?php echo $kpi[8]->TW3_BASE ?></td>
                                <td><?php echo $kpi[8]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Working Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[9]->BOBOT ?></td>
                                <td><?php echo $kpi[9]->TW3_BASE ?></td>
                                <td><?php echo $kpi[9]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr> <tr>
                                <td colspan="9"><b>6. Volume Thruput BBM</b></td>
                                <td><?php echo $kpi[sizeof($kpi)-1]->RKAP_OAM_TW3?></td>
                            </tr>
                            <tr>
                                <td>Fleet Management (BBM/BBK)</td> 
                                <td>KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[10]->BOBOT ?></td>
                                <td><?php echo $kpi[10]->TW3_BASE ?></td>
                                <td><?php echo $kpi[10]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage</td> 
                                <td>KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[11]->BOBOT ?></td>
                                <td><?php echo $kpi[11]->TW3_BASE ?></td>
                                <td><?php echo $kpi[11]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td colspan="10"><b>7. Service Level Agreement</b></td>
                            </tr>
                            <tr>
                                <td>Fuel Retail Fleet Management (BBM/BBK)</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[12]->BOBOT ?></td>
                                <td><?php echo $kpi[12]->TW3_BASE ?></td>
                                <td><?php echo $kpi[12]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Fuel Retail Fleet Management (APMS)</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[13]->BOBOT ?></td>
                                <td><?php echo $kpi[13]->TW3_BASE ?></td>
                                <td><?php echo $kpi[13]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Gas & Aviation</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[14]->BOBOT ?></td>
                                <td><?php echo $kpi[14]->TW3_BASE ?></td>
                                <td><?php echo $kpi[14]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>8. Kegagalan Operasi (Avaibility & Reliability)</b></td>
                            </tr>
                            <tr>
                                <td colspan="10">a. Breakdown Occurences</td>
                            </tr>
                            <tr>
                                <td>- Mobil Tangki Kelola</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[15]->BOBOT ?></td>
                                <td><?php echo $kpi[15]->TW3_BASE ?></td>
                                <td><?php echo $kpi[15]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- Mobil Tangki Milik</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[16]->BOBOT ?></td>
                                <td><?php echo $kpi[16]->TW3_BASE ?></td>
                                <td><?php echo $kpi[16]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>b. Terminal Storage (BBM/Depot)</td> 
                                <td>kasus</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[17]->BOBOT ?></td>
                                <td><?php echo $kpi[17]->TW3_BASE ?></td>
                                <td><?php echo $kpi[17]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>9. Progress Pelaksaan Pekerjaan (BD/Non BD)<b/></td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[18]->BOBOT ?></td>
                                <td><?php echo $kpi[18]->TW3_BASE ?></td>
                                <td><?php echo $kpi[18]->TW3_STRETCH ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW3_BULAN1 ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW3_BULAN2 ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW3_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>Boundary KPIs</b></td>
                            </tr>
                            <tr>
                                <td>1. TRIR Patra Niaga</td>
                                <td>Ratio</td>
                                <td><?php echo $kpi[19]->BOBOT ?></td>
                                <td><?php echo $kpi[19]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. NOA Patra Niaga</td>
                                <td>Cases</td>
                                <td><?php echo $kpi[20]->BOBOT ?></td>
                                <td><?php echo $kpi[20]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. GCG compliance</td>
                                <td>%</td>
                                <td><?php echo $kpi[21]->BOBOT ?></td>
                                <td><?php echo $kpi[21]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. External Audit Option</td>
                                <td>%</td>
                                <td><?php echo $kpi[22]->BOBOT ?></td>
                                <td><?php echo $kpi[22]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>Other Operational Metrics</b></td>
                            </tr>
                            <tr>
                                <td>1. Proper PPN</td>
                                <td>%</td>
                                <td><?php echo $kpi[23]->BOBOT ?></td>
                                <td><?php echo $kpi[23]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. Learning Index</td>
                                <td>%</td>
                                <td><?php echo $kpi[24]->BOBOT ?></td>
                                <td><?php echo $kpi[24]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. Follow up audit findings</td>
                                <td>%</td>
                                <td><?php echo $kpi[25]->BOBOT ?></td>
                                <td><?php echo $kpi[25]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. Akurasi dan kelengkapan Laporan Keuangan</td>
                                <td>%</td>
                                <td><?php echo $kpi[26]->BOBOT ?></td>
                                <td><?php echo $kpi[26]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5. Utilisasi ERP (MySAP)</td>
                                <td>%</td>
                                <td><?php echo $kpi[27]->BOBOT ?></td>
                                <td><?php echo $kpi[27]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6. Knowledge & Innovation Program</td>
                                <td>%</td>
                                <td><?php echo $kpi[28]->BOBOT ?></td>
                                <td><?php echo $kpi[28]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>7. Penyelesaian OFI to AFIPQA</td>
                                <td>%</td>
                                <td><?php echo $kpi[29]->BOBOT ?></td>
                                <td><?php echo $kpi[29]->TW3_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
               KPI TRIWULAN IV<br/><br/> 
               <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2">Indikator Kinerja</td>
                                <td rowspan="2">Satuan</td>
                                <td rowspan="2">Frekuensi Monitoring</td>
                                <td rowspan="2">Bobot %</td>
                                <td colspan="2"><span id="triwulan">Triwulan IV</span></td>
                                <td colspan="3">Realisasi</td>
                                <td rowspan="2">RKAP OAM</td>
                            </tr>
                            <tr>
                                <td>Base</td>
                                <td>Stretch</td>
                                <td><span id="bulan_1">Januari</span></td>
                                <td><span id="bulan_2">Februari</span></td>
                                <td><span id="bulan_3">Maret</span></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9"><b>1. Revenue</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 4]->RKAP_OAM_TW4?></td>
                            </tr>
                            <tr>
                                <td>Revenue Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[0]->BOBOT ?></td>
                                <td><?php echo $kpi[0]->TW4_BASE ?></td>
                                <td><?php echo $kpi[0]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[0]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[1]->BOBOT ?></td>
                                <td><?php echo $kpi[1]->TW4_BASE ?></td>
                                <td><?php echo $kpi[1]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[1]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="9"><b>2. Laba Usaha</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 3]->RKAP_OAM_TW4?></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[2]->BOBOT ?></td>
                                <td><?php echo $kpi[2]->TW4_BASE ?></td>
                                <td><?php echo $kpi[2]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[2]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Terminal Storage</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[3]->BOBOT ?></td>
                                <td><?php echo $kpi[3]->TW4_BASE ?></td>
                                <td><?php echo $kpi[3]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[3]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="9"><b>3. Cost Effectiveness</b></td>
                                <td><?php echo $kpi[sizeof($kpi) - 2]->RKAP_OAM_TW4?></td>
                            </tr>
                            <tr>
                                <td>Cost/liter Fleet Management</td> 
                                <td>USD/KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[4]->BOBOT ?></td>
                                <td><?php echo $kpi[4]->TW4_BASE ?></td>
                                <td><?php echo $kpi[4]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[4]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Cost/liter Terminal Storage</td> 
                                <td>USD/KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[5]->BOBOT ?></td>
                                <td><?php echo $kpi[5]->TW4_BASE ?></td>
                                <td><?php echo $kpi[5]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[5]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>4. Collection Period</b></td> 
                                <td>by date</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[6]->BOBOT ?></td>
                                <td><?php echo $kpi[6]->TW4_BASE ?></td>
                                <td><?php echo $kpi[6]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[6]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>5. Terminal Losses</b></td>
                            </tr>
                            <tr>
                                <td>Total Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[7]->BOBOT ?></td>
                                <td><?php echo $kpi[7]->TW4_BASE ?></td>
                                <td><?php echo $kpi[7]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[7]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Discharge Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[8]->BOBOT ?></td>
                                <td><?php echo $kpi[8]->TW4_BASE ?></td>
                                <td><?php echo $kpi[8]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[8]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Working Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[9]->BOBOT ?></td>
                                <td><?php echo $kpi[9]->TW4_BASE ?></td>
                                <td><?php echo $kpi[9]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[9]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr> <tr>
                                <td colspan="9"><b>6. Volume Thruput BBM</b></td>
                                <td><?php echo $kpi[sizeof($kpi)-1]->RKAP_OAM_TW4?></td>
                            </tr>
                            <tr>
                                <td>Fleet Management (BBM/BBK)</td> 
                                <td>KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[10]->BOBOT ?></td>
                                <td><?php echo $kpi[10]->TW4_BASE ?></td>
                                <td><?php echo $kpi[10]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[10]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage</td> 
                                <td>KL</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[11]->BOBOT ?></td>
                                <td><?php echo $kpi[11]->TW4_BASE ?></td>
                                <td><?php echo $kpi[11]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[11]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr> 
                            <tr>
                                <td colspan="10"><b>7. Service Level Agreement</b></td>
                            </tr>
                            <tr>
                                <td>Fuel Retail Fleet Management (BBM/BBK)</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[12]->BOBOT ?></td>
                                <td><?php echo $kpi[12]->TW4_BASE ?></td>
                                <td><?php echo $kpi[12]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[12]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Fuel Retail Fleet Management (APMS)</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[13]->BOBOT ?></td>
                                <td><?php echo $kpi[13]->TW4_BASE ?></td>
                                <td><?php echo $kpi[13]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[13]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Gas & Aviation</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[14]->BOBOT ?></td>
                                <td><?php echo $kpi[14]->TW4_BASE ?></td>
                                <td><?php echo $kpi[14]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[14]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>8. Kegagalan Operasi (Avaibility & Reliability)</b></td>
                            </tr>
                            <tr>
                                <td colspan="10">a. Breakdown Occurences</td>
                            </tr>
                            <tr>
                                <td>- Mobil Tangki Kelola</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[15]->BOBOT ?></td>
                                <td><?php echo $kpi[15]->TW4_BASE ?></td>
                                <td><?php echo $kpi[15]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[15]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>- Mobil Tangki Milik</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[16]->BOBOT ?></td>
                                <td><?php echo $kpi[16]->TW4_BASE ?></td>
                                <td><?php echo $kpi[16]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[16]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>b. Terminal Storage (BBM/Depot)</td> 
                                <td>kasus</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[17]->BOBOT ?></td>
                                <td><?php echo $kpi[17]->TW4_BASE ?></td>
                                <td><?php echo $kpi[17]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[17]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>9. Progress Pelaksaan Pekerjaan (BD/Non BD)<b/></td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><?php echo $kpi[18]->BOBOT ?></td>
                                <td><?php echo $kpi[18]->TW4_BASE ?></td>
                                <td><?php echo $kpi[18]->TW4_STRETCH ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW4_BULAN1 ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW4_BULAN2 ?></td>
                                <td><?php echo $kpi[18]->REALISASI_TW4_BULAN3 ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>Boundary KPIs</b></td>
                            </tr>
                            <tr>
                                <td>1. TRIR Patra Niaga</td>
                                <td>Ratio</td>
                                <td><?php echo $kpi[19]->BOBOT ?></td>
                                <td><?php echo $kpi[19]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. NOA Patra Niaga</td>
                                <td>Cases</td>
                                <td><?php echo $kpi[20]->BOBOT ?></td>
                                <td><?php echo $kpi[20]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. GCG compliance</td>
                                <td>%</td>
                                <td><?php echo $kpi[21]->BOBOT ?></td>
                                <td><?php echo $kpi[21]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. External Audit Option</td>
                                <td>%</td>
                                <td><?php echo $kpi[22]->BOBOT ?></td>
                                <td><?php echo $kpi[22]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="10"><b>Other Operational Metrics</b></td>
                            </tr>
                            <tr>
                                <td>1. Proper PPN</td>
                                <td>%</td>
                                <td><?php echo $kpi[23]->BOBOT ?></td>
                                <td><?php echo $kpi[23]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. Learning Index</td>
                                <td>%</td>
                                <td><?php echo $kpi[24]->BOBOT ?></td>
                                <td><?php echo $kpi[24]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. Follow up audit findings</td>
                                <td>%</td>
                                <td><?php echo $kpi[25]->BOBOT ?></td>
                                <td><?php echo $kpi[25]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. Akurasi dan kelengkapan Laporan Keuangan</td>
                                <td>%</td>
                                <td><?php echo $kpi[26]->BOBOT ?></td>
                                <td><?php echo $kpi[26]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5. Utilisasi ERP (MySAP)</td>
                                <td>%</td>
                                <td><?php echo $kpi[27]->BOBOT ?></td>
                                <td><?php echo $kpi[27]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6. Knowledge & Innovation Program</td>
                                <td>%</td>
                                <td><?php echo $kpi[28]->BOBOT ?></td>
                                <td><?php echo $kpi[28]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>7. Penyelesaian OFI to AFIPQA</td>
                                <td>%</td>
                                <td><?php echo $kpi[29]->BOBOT ?></td>
                                <td><?php echo $kpi[29]->TW4_BASE ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            
                        </tbody>
                    </table>
               <?php
               }
               else
               { ?>
               
               <b>KPI TRIWULAN I</b><br/><br/> 
               <b>KPI TRIWULAN II</b><br/><br/> 
               <b>KPI TRIWULAN III</b><br/><br/> 
               <b>KPI TRIWULAN IV</b><br/><br/> 
                <?php   
               }
               ?>
               </center>
            </div>
            
        </section>

        <!-- page end-->
    </section>
</section>

<!--script for this page only-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
        
    });
    
</script>
