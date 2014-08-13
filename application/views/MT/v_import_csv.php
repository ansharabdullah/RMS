<script type="text/javascript">
    $( document ).ready(function() {
        $("#filePreview").hide();
        $("#commentForm").submit(function(e){
            var isvalidate=$("#commentForm").valid();
            if(isvalidate)
            {
                var ext = $("#fileName").val().split('.').pop();
                if(ext=="csv"){
                    $("#filePreview").hide();
                    $("#filePreview").slideDown("slow");
                }
                else
                {
                    alert("Tipe file yang diupload tidak sesuai (csv)")   
                }                
            }
            e.preventDefault();
        });
    });
    
    function importTable()
    {
        alert("Berhasil disimpan !");
    }
    
    function downloadCsv()
    {
        alert("Csv berhasil di download");
    }
    
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section class="panel">
            <header class="panel-heading">
                Import Data MT Dari CSV
                <button type="button" style="float: right;" class="btn btn-success" onclick="downloadCsv()">Download Format CSV <i class="icon-download-alt"></i></button>
                <br/> <br/>
            </header>
            <div class="panel-body" >
                <form class="cmxform form-horizontal tasi-form" id="commentForm" method="get" action="">

                    <div class="form-group">
                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">File CSV</label>
                        <div class="col-lg-10">
                            <input type="file"  id="fileName" required="required" class="form-control"  placeholder="File SIOD">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button type="submit" style="float: right;" class="btn btn-danger">Upload</button>
                        </div>
                    </div>
                </form>

                <div id="filePreview">
                    <header class="panel-heading">
                    </header>
                    <div class="adv-table editable-table ">
                        <div class="clearfix">

                        </div>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                                <tr>
                                    <th style="display: none;">-</th>
                                    <th>No.</th>
                                    <th>Nopol</th>
                                    <th>Transportir</th>
                                    <th>Kapasitas</th>
                                    <th>Produk</th>
                                    <th>Kategori</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Nomor Rangka</th>
                                    <th>Nomor Mesin</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>1</td>
                                    <td>D 6308 AD</td>
                                    <td>PT Masoem</td>
                                    <td>16</td>
                                    <td>Premium</td>
                                    <td>1</td>
                                    <td>Hino SG260J 32.0</td>
                                    <td>192417</td>
                                    <td>1294147</td>



                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>2</td>
                                    <td>D 1725 AF</td>
                                    <td>PT Masoem</td>
                                    <td>16</td>
                                    <td>Premium</td>
                                    <td>1</td>
                                    <td>Hino SG260J 32.0</td>
                                    <td>124817</td>
                                    <td>1294147</td>

                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>3</td>
                                    <td>D 2245 AF</td>
                                    <td>PT Masoem</td>
                                    <td>8</td>
                                    <td>Pertamax</td>
                                    <td>1</td>
                                    <td>Hino SG260J 32.0</td>
                                    <td>192417KHA</td>
                                    <td>1294147IUY</td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>4</td>
                                    <td>D 6066 AF</td>
                                    <td>PT Incot</td>
                                    <td>24</td>
                                    <td>Premium</td>
                                    <td>1</td>
                                    <td>Hino SG260J 32.0</td>
                                    <td>19KADH2417</td>
                                    <td>12941AH47</td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>5</td>
                                    <td>D 3038 AD</td>
                                    <td>PT Patra</td>
                                    <td>16</td>
                                    <td>Premium</td>
                                    <td>1</td>
                                    <td>Hino SG260J 32.0</td>
                                    <td>192YTASR417</td>
                                    <td>129414ASHY7</td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>6</td>
                                    <td>D 8557 AD</td>
                                    <td>PT Tiara</td>
                                    <td>24</td>
                                    <td>Solar</td>
                                    <td>1</td>
                                    <td>Hino SG260J 32.0</td>
                                    <td>AJSU192417</td>
                                    <td>AJSYD1294147</td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>7</td>
                                    <td>D 1346 AD</td>
                                    <td>PT Tiara</td>
                                    <td>8</td>
                                    <td>Premium</td>
                                    <td>1</td>
                                    <td>Hino SG260J 32.0</td>
                                    <td>KAISU192417</td>
                                    <td>HYTA1294147</td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>8</td>
                                    <td>D 7152 AF</td>
                                    <td>PT Tiara</td>
                                    <td>16</td>
                                    <td>Premium</td>
                                    <td>1</td>
                                    <td>Hino SG260J 32.0</td>
                                    <td>192417KSU</td>
                                    <td>1294147POU</td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>9</td>
                                    <td>D 9487 AD</td>
                                    <td>PT Masoem</td>
                                    <td>24</td>
                                    <td>Solar</td>
                                    <td>1</td>
                                    <td>Hino SG260J 32.0</td>
                                    <td>ASH192417</td>
                                    <td>AIU1294147</td>
                                </tr>
                                <tr class="">
                                    <th style="display: none;"></th>
                                    <td>10</td>
                                    <td>D 8827 AF</td>
                                    <td>PT Masoem</td>
                                    <td>8</td>
                                    <td>Bio Solar</td>
                                    <td>1</td>
                                    <td>Hino SG260J 32.0</td>
                                    <td>POI192417</td>
                                    <td>LKI1294147</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <button style="float: right;" onclick="importTable()" type="button" class="btn btn-success">Simpan </button> 
                    
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>

<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/editable-table.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
        
    });
    
</script>