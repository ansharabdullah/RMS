
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>kpi/internal/<?php echo date('Y')?>/5">KPI Internal OAM</a></li>
                   <li class="active">Tambah KPI Internal OAM</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        <!-- page start-->
        <section class="panel"> 
            <header class="panel-heading">
                Tambah KPI Internal OAM
            </header>
            <div class="panel-body">
                <?php
                    $attr = array("class"=>"cmxform form-horizontal tasi-form");
                     echo form_open("kpi/insert_internal/");
                ?>
                    <label for="bulanLaporan" class="col-lg-1 col-sm-1 control-label">Tahun</label>
                    <div class="col-lg-2">
                        <input type="number"  name="tahun" minlength="4" maxlength="4" min="2010" value="<?php echo date('Y') ?>" required="required" id="tahunLaporan"  class="form-control"/>
                    </div>
                    <label for="bulanLaporan" class="col-lg-1 col-sm-1 control-label">Triwulan</label>
                    <div class="col-lg-3">
                        <select name="triwulan" id="select_triwulan" class="form-control" onchange="changeTriwulan()"> 
                            <option value="1"> Triwulan I </option>
                            <option value="2"> Triwulan II </option>
                            <option value="3"> Triwulan III </option>
                            <option value="4"> Triwulan IV </option>
                        </select>
                    </div><br/><br/><br/>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <td rowspan="2">Indikator Kinerja</td>
                                <td rowspan="2">Satuan</td>
                                <td rowspan="2">Frekuensi Monitoring</td>
                                <td rowspan="2">Bobot %</td>
                                <td colspan="2"><span id="triwulan">Triwulan I</span></td>
<!--                                <td colspan="3">Realisasi</td>-->
                                <td rowspan="2">RKAP OAM</td>
                            </tr>
                            <tr>
                                <td>Base</td>
                                <td>Stretch</td>
<!--                                <td><span id="bulan_1">Januari</span></td>
                                <td><span id="bulan_2">Februari</span></td>
                                <td><span id="bulan_3">Maret</span></td>-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6"><b>1. Revenue</b></td>
                                <td><input type="number" value="0"  name="rkap_revenue" required="required" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Revenue Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch1" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_1_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_1_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_1_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch2" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_2_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_2_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_2_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6"><b>2. Laba Usaha</b></td>
                                <td><input name="rkap_laba_usaha" type="number" value="0"  required="required" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Fleet Management</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot3" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base3" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch3" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_3_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_3_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_3_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td>Laba Usaha Terminal Storage</td> 
                                <td>USD</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot4" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base4" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch4" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_4_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_4_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_4_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="6"><b>3. Cost Effectiveness</b></td>
                                <td><input name="rkap_cost_liter" type="number" value="0"  required="required" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Cost/liter Fleet Management</td> 
                                <td>USD/KL</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot5" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base5" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch5" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_5_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_5_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_5_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td>Cost/liter Terminal Storage</td> 
                                <td>USD/KL</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot6" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base6" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch6" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_6_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_6_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_6_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>4. Collection Period</b></td> 
                                <td>by date</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot7" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base7" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch7" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_7_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_7_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_7_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>5. Terminal Losses</b></td>
                            </tr>
                            <tr>
                                <td>Total Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot8" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base8" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch8" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_8_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_8_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_8_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td>Discharge Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot9" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base9" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch9" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_9_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_9_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_9_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td>Working Loss</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot10" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base10" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch10" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_10_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_10_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_10_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr> <tr>
                                <td colspan="6"><b>6. Volume Thruput BBM</b></td>
                                <td><input name="rkap_thruput" type="number" value="0"  required="required" class="form-control"/></td>
                            </tr>
                            <tr>
                                <td>Fleet Management (BBM/BBK)</td> 
                                <td>KL</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot11" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base11" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch11" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_11_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_11_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_11_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td>Terminal Storage</td> 
                                <td>KL</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot12" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base12" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch12" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_12_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_12_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_12_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr> 
                            <tr>
                                <td colspan="7"><b>7. Service Level Agreement</b></td>
                            </tr>
                            <tr>
                                <td>Fuel Retail Fleet Management (BBM/BBK)</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot13" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base13" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch13" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_13_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_13_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_13_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td>Fuel Retail Fleet Management (APMS)</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot14" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base14" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch14" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_14_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_14_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_14_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td>Gas & Aviation</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot15" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base15" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch15" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_15_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_15_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_15_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>8. Kegagalan Operasi (Avaibility & Reliability)</b></td>
                            </tr>
                            <tr>
                                <td colspan="7">a. Breakdown Occurences</td>
                            </tr>
                            <tr>
                                <td>- Mobil Tangki Kelola</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot16" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base16" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch16" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_16_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_16_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_16_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td>- Mobil Tangki Milik</td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot17" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base17" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch17" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_17_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_17_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_17_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td>b. Terminal Storage (BBM/Depot)</td> 
                                <td>kasus</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot18" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base18" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch18" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_18_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_18_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_18_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td><b>9. Progress Pelaksaan Pekerjaan (BD/Non BD)<b/></td> 
                                <td>%</td>
                                <td>Monthly</td>
                                <td><input type="number" value="0"  name="bobot19" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="base19" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch19" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="realisasi_19_1" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_19_2" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="realisasi_19_3" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>Boundary KPIs</b></td>
                            </tr>
                            <tr>
                                <td>1. TRIR Patra Niaga</td>
                                <td>Ratio</td>
                                <td></td>
                                <td></td>
                                <td><input type="number" value="0"  name="base20" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="stretch20" required="required" class="form-control"/></td>-->
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. NOA Patra Niaga</td>
                                <td>Cases</td>
                                <td></td>
                                <td></td>
                                <td><input type="number" value="0"  name="base21" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="stretch21" required="required" class="form-control"/></td>-->
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. GCG compliance</td>
                                <td>%</td>
                                <td></td>
                                <td></td>
                                <td><input type="number" value="0"  name="base22" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="stretch22" required="required" class="form-control"/></td>-->
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. External Audit Option</td>
                                <td>%</td>
                                <td></td>
                                <td></td>
                                <td>WTP</td>
                                <td></td>
<!--                                <td><input type="number" value="0"  name="base23" required="required" class="form-control"/></td>-->
<!--                                <td><input type="number" value="0"  name="stretch23" required="required" class="form-control"/></td>-->
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="7"><b>Other Operational Metrics</b></td>
                            </tr>
                            <tr>
                                <td>1. Proper PPN</td>
                                <td>%</td>
                                <td></td>
                                <td></td>
                                <td><input type="number" value="0"  name="base24" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="stretch24" required="required" class="form-control"/></td>-->
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2. Learning Index</td>
                                <td>%</td>
                                <td></td>
                                <td></td>
                                <td><input type="number" value="0"  name="base25" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="stretch25" required="required" class="form-control"/></td>-->
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3. Follow up audit findings</td>
                                <td>%</td>
                                <td></td>
                                <td></td>
                                <td><input type="number" value="0"  name="base26" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="stretch26" required="required" class="form-control"/></td>-->
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4. Akurasi dan kelengkapan Laporan Keuangan</td>
                                <td>%</td>
                                <td></td>
                                <td></td>
                                <td><input type="number" value="0"  name="base27" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="stretch27" required="required" class="form-control"/></td>-->
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5. Utilisasi ERP (MySAP)</td>
                                <td>%</td>
                                <td></td>
                                <td></td>
                                <td><input type="number" value="0"  name="base28" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="stretch28" required="required" class="form-control"/></td>-->
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6. Knowledge & Innovation Program</td>
                                <td>%</td>
                                <td></td>
                                <td></td>
                                <td><input type="number" value="0"  name="base29" required="required" class="form-control"/></td>
<!--                                <td><input type="number" value="0"  name="stretch29" required="required" class="form-control"/></td>-->
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>7. Penyelesaian OFI to AFIPQA</td>
                                <td>%</td>
                                <td></td>
                                <td></td>
                                <td><input type="number" value="0"  name="base30" required="required" class="form-control"/></td>
                                <td><input type="number" value="0"  name="stretch30" required="required" class="form-control"/></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                    <div class="col-lg-12">
                        <input type="submit" style="float: right;" class="btn btn-success" value="Simpan"/>
                    </div>
                <?php echo form_close();?>
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
<script type="text/javascript">
    function changeTriwulan()
    {
        $("#triwulan").html($("#select_triwulan option:selected").text());
       if($("#select_triwulan").val() == 1)
        {
            $("#bulan_1").html("Januari");
            $("#bulan_2").html("Februari");
            $("#bulan_3").html("Maret");
        }else  if($("#select_triwulan").val() == 2){
            $("#bulan_1").html("April");
            $("#bulan_2").html("Mei");
            $("#bulan_3").html("Juni");
        }else  if($("#select_triwulan").val() == 3){
            $("#bulan_1").html("Juli");
            $("#bulan_2").html("Agustus");
            $("#bulan_3").html("September");
        }else  if($("#select_triwulan").val() == 4){
            $("#bulan_1").html("Oktober");
            $("#bulan_2").html("November");
            $("#bulan_3").html("Desember");
        }
    }
</script>