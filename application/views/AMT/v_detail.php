<script type="text/javascript">

    $(document).ready(function () {
        $("#EditProfile").hide();
    });

    function ShowProfile() {
        $("#ShowProfile").slideDown("slow");
        $("#EditProfile").hide();
        $("#btnProf").addClass("active");
        $("#btnEdit").removeClass("active");
    }

    function EditProfile() {
        $("#ShowProfile").hide();
        $("#EditProfile").slideDown("slow");
        $("#btnProf").removeClass("active");
        $("#btnEdit").addClass("active");
    }


    var tanggal = new Array();
    var amt;
    var total_km = new Array();
    var km = new Array();
    var total_kl = new Array();
    var ritase = new Array();
    var spbu = new Array();
<?php
foreach ($grafik as $ka) {
    ?>
        tanggal.push("<?php echo $ka->tanggal; ?>");
        total_km.push(<?php echo $ka->total_km ?>);
        km.push(<?php echo $ka->total_km ?>);
        total_kl.push(<?php echo $ka->total_kl ?>);
        ritase.push(<?php echo $ka->ritase ?>);
        spbu.push(<?php echo $ka->spbu ?>);
    <?php
}
?>
    $(function () {
        amt = new Highcharts.Chart({
            chart: {
                renderTo: 'grafik'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM',
                x: -20 //center
            },
            subtitle: {
                text: 'PT. Pertamina Patra Niaga',
                x: -20
            },
            xAxis: {
                title: {
                    text: 'Tanggal'
                },
                categories: tanggal
            },
            yAxis: {
                title: {
                    text: 'Kinerja'
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
                enabled: false
            },
            series: [{
                    type: 'spline',
                    name: 'KM',
                    data: km
                }]
        });
    });

    function filterAmt(title)
    {
        amt.setTitle({text: 'Grafik Kinerja Jumlah ' + title});
        if (title == "KM") {
            amt.series[0].setData(total_km);
        } else if (title == "KL") {
            amt.series[0].setData(total_kl);
        } else if (title == "Ritase") {
            amt.series[0].setData(ritase);
        } else if (title == "SPBU") {
            amt.series[0].setData(spbu);

        }

    }
</script>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!--breadcrumbs start -->
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Home</a></li>
                    <li><a href="<?php echo base_url(); ?>amt/">Data AMT</a></li>
                    <li class="active">Detail AMT</li>
                </ul>
                <!--breadcrumbs end -->
            </div>
        </div>
        
        <?php if ($feedback) { ?>
            <?php if ($feedback == 1) { ?>
                <div class="alert alert-block alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Berhasil!</strong> <?php echo $pesan ?>
                </div>
            <?php }else if ($feedback == 2) { ?>
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Error!</strong> <?php echo $pesan ?>
                </div>
            <?php } ?>
        <?php } ?>
        
        <?php foreach ($amt as $row) { ?>
            <section class="panel">
                <header class="panel-heading">
                    Detail Awak Mobil Tangki
                </header>
                <div class="panel-body">
                    <a class="btn btn-warning" data-toggle="modal" href="#ModalPeringatan"><i class="icon-warning-sign"></i> Peringatan</a>

                    <a class="btn btn-danger" href="javascript:hapus('<?php echo $row->ID_PEGAWAI ?>','<?php echo $row->NIP ?>');"><i class="icon-eraser"></i> Hapus</a>


                </div>
            </section>



            <!-- page start-->
            <div class="row">
                <aside class="profile-nav col-lg-3">
                    <section class="panel">
                        <div class="user-heading round">
                            <a href="#">
                                <?php if ($row->PHOTO != "") { ?>
                                    <img src="<?php echo base_url() ?>assets/img/photo/<?php echo $row->PHOTO; ?>" alt="<?php echo $row->NAMA_PEGAWAI ?>">
                                <?php } else { ?>
                                    <img src="<?php echo base_url() ?>assets/img/photo/default.png" alt="<?php echo $row->NAMA_PEGAWAI ?>">
                                <?php } ?>
                            </a>
                            <h1><?php echo $row->NAMA_PEGAWAI; ?></h1>
                            <p></p>
                        </div>

                        <ul class="nav nav-pills nav-stacked">
                            <li id="btnProf" class="active"><a href="javascript:ShowProfile();"> <i class="icon-user" ></i> Profile</a></li>
                            <li id="btnEdit"><a href="javascript:EditProfile();" > <i class="icon-edit"></i> Edit profile</a></li>

                        </ul>

                    </section>
                </aside>
                <aside class="profile-info col-lg-9">

                    <section class="panel">

                        <div class="panel-body bio-graph-info" id="ShowProfile">
                            <h1>Profile Awak Mobil Tangki</h1>
                            <div class="row">
                                <div class="bio-row">
                                    <p><span>NIP </span>:<?php echo $row->NIP ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Nama </span>: <?php echo $row->NAMA_PEGAWAI ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Jabatan </span>: <?php echo $row->JABATAN ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Klasifikasi</span>: <?php echo $row->KLASIFIKASI ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Status </span>: <?php echo $row->STATUS ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>No. Telp </span>: <?php echo $row->NO_TELEPON ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>No. KTP </span>: <?php echo $row->NO_KTP ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>No. SIM </span>: <?php echo $row->NO_SIM ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span>Tempat Lahir </span>: <?php echo $row->TEMPAT_LAHIR ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Tanggal Lahir </span>: <?php echo date("d-M-Y", strtotime($row->TANGGAL_LAHIR)) ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span>Transportir Asal </span>: <?php echo $row->TRANSPORTIR_ASAL ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Tanggal Masuk </span>: <?php echo date("d-M-Y", strtotime($row->TANGGAL_MASUK)) ?></p>
                                </div>

                                <div class="bio-row">
                                    <p><span>Alamat </span>: <?php echo $row->ALAMAT ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="panel-body bio-graph-info" id="EditProfile">
                            <form enctype="multipart/form-data" class="cmxform form-horizontal tasi-form" id="commentForm" method="POST" action="<?php echo base_url() ?>amt/detail/<?php echo $row->ID_PEGAWAI ?>" >
                                <input type="hidden" name="id" value="<?php echo $row->ID_PEGAWAI ?>">
                                <h1>Edit Profile Awak Mobil Tangki</h1>

                                <div class="row">
                                    <div class="bio-row">
                                        <label for="nip" class="control-label col-lg-4">NIP</label><input type="checkbox"> On Call
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="cnip" name="nip" minlength="2" type="text" value="<?php echo $row->NIP ?>" required/>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="nama" class="control-label col-lg-4">Nama</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="cama" name="nama_pegawai" minlength="2" type="text" value="<?php echo $row->NAMA_PEGAWAI ?>" required />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="cjabatan" class="control-label col-lg-4">Jabatan</label>
                                        <div class="col-lg-6">
                                            <select class="form-control input-sm m-bot15" id="cjabatan" name="jabatan" >
                                                <option <?php if ($row->JABATAN == "SUPIR") echo "selected" ?> value="SUPIR">SUPIR</option>
                                                <option <?php if ($row->JABATAN == "KERNET") echo "selected" ?> value="KERNET">KERNET</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="cklas" class="control-label col-lg-4">Klasifikasi</label>
                                        <div class="col-lg-6">
                                            <select class="form-control input-sm m-bot15" id="cklas" name="klasifikasi">
                                                <option <?php if ($row->KLASIFIKASI == 8) echo "selected" ?> value="8">8</option>
                                                <option <?php if ($row->KLASIFIKASI == 16) echo "selected" ?> value="16">16</option>
                                                <option <?php if ($row->KLASIFIKASI == 24) echo "selected" ?> value="24">24</option>
                                                <option <?php if ($row->KLASIFIKASI == 32) echo "selected" ?> value="32">32</option>
                                                <option <?php if ($row->KLASIFIKASI == 40) echo "selected" ?> value="40">40</option>
                                                <option <?php if ($row->KLASIFIKASI == "" || $row->KLASIFIKASI == "-") echo "selected" ?> value="">-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="cstatus" class="control-label col-lg-4">Status</label>
                                        <div class="col-lg-6">
                                            <select class="form-control input-sm m-bot15" id="cstatus" name="status">
                                                <option <?php if ($row->STATUS == "AKTIF") echo "selected" ?> value="AKTIF">Aktif</option>
                                                <option <?php if ($row->STATUS == "TIDAK AKTIF") echo "selected" ?> value="TIDAK AKTIF">Tidak Aktif</option>
                                                <option <?php if ($row->STATUS == "PERINGATAN") echo "selected" ?> value="PERINGATAN">Peringatan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="ctelp" class="control-label col-lg-4">No. Telp</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ctelp" name="no_telepon" minlength="2" type="text" value="<?php echo $row->NO_TELEPON ?>"/>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="cktp" class="control-label col-lg-4">No. KTP</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="cktp" name="no_ktp" minlength="2" type="text" value="<?php echo $row->NO_KTP ?>"/>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="csim" class="control-label col-lg-4">No. SIM</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="csim" name="no_sim" minlength="2" type="text" value="<?php echo $row->NO_SIM ?>"/>
                                        </div>
                                    </div>

                                    <div class="bio-row">
                                        <label for="ctempatlahir" class="control-label col-lg-4">Tempat Lahir</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ctempatlahir" name="tempat_lahir" minlength="2" type="text" value="<?php echo $row->TEMPAT_LAHIR ?>" />
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="ctgllahir" class="control-label col-lg-4">Tanggal Lahir</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ctgllahir" name="tanggal_lahir" size="16" type="date" value="<?php echo $row->TANGGAL_LAHIR ?>"/>
                                            <span class="help-block">Pilih tanggal</span>
                                        </div>
                                    </div>

                                    <div class="bio-row">
                                        <label for="transportir_asal" class="control-label col-lg-4">Transportir Asal</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ctransportir" name="transportir" type="text" value="<?php echo $row->TRANSPORTIR_ASAL ?>"/>
                                        </div>
                                    </div>
                                    <div class="bio-row">
                                        <label for="tanggal_masuk" class="control-label col-lg-4">Tanggal Masuk</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control input-sm m-bot15" id="ctglmasuk" name="tanggal_masuk" type="date" size="16" type="text" value="<?php echo $row->TANGGAL_MASUK ?>"/>
                                            <span class="help-block">Pilih tanggal</span>
                                        </div>
                                    </div>

                                    <div class="bio-row">
                                        <label for="alamat" class="control-label col-lg-4">Alamat</label>
                                        <div class="col-lg-6">
                                            <textarea class=" form-control input-sm m-bot15" id="calamat" name="alamat" rows="5" /><?php echo $row->ALAMAT ?></textarea>
                                        </div>
                                    </div>

                                    <div class="bio-row">
                                        <label class="control-label col-md-4">Unggah Foto</label>
                                        <div class="col-md-6">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">

                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                                        <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                        <input type="file" class="default" name="userfile"/>
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                </div>
                                            </div>
                                            <span class="label label-danger">NOTE!</span>
                                            <span>
                                                Attached image thumbnail is
                                                supported in Latest Firefox, Chrome, Opera,
                                                Safari and Internet Explorer 10 only
                                            </span>
                                        </div>
                                    </div>

                                    <div class="bio-row">


                                    </div>
                                    <div class="bio-row">
                                        <div class="col-lg-10">
                                            <input style="float:right;" class="btn btn-success" type="submit" name="edit_profile" value="Simpan"/>    
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </section>

                </aside>
            </div>

            <!-- page end-->


            <section class="panel">
                <div class="panel-body">
                    <div class="col-lg-12"><header class="panel-heading">
                            Grafik Harian AMT Bulan <b><?php echo date("M-Y", strtotime($tahun . "-" . $bulan)) ?></b>
                        </header>
                        <div class="panel-body" >
                            <!--                        <form class="cmxform form-horizontal tasi-form" action="" role="form" method="POST">-->
                            <?php
                            $attr = array("class" => "cmxform form-horizontal tasi-form");
                            echo form_open("amt/detail_hari/$id_pegawai/", $attr);
                            ?>
                            <div class="form-group">
                                <div class="col-lg-3">
                                    <input type="month" name="bulan" data-mask="9999" placeholder="Bulan" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>
                                <input type="hidden" name="id_pegawai" value="<?php echo $id_pegawai ?>"/>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                                <?php echo form_close() ?>
                                <div class="btn-group pull-right">
                                    <button class="btn dropdown-toggle" data-toggle="dropdown">Filter Grafik<i class="icon-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left">
                                        <li><a style="cursor: pointer" onclick="filterAmt('KM')">KM</a></li>
                                        <li><a style="cursor: pointer" onclick="filterAmt('KL')">KL</a></li>
                                        <li><a style="cursor: pointer" onclick="filterAmt('Ritase')">Ritase</a></li>
                                        <li><a style="cursor: pointer" onclick="filterAmt('SPBU')">SPBU</a></li>
                                    </ul>
                                </div>
                            </div>
                            <br/>
                            <div id="grafik"></div>

                        </div>
                        </section>

                        <!--        //tabel kinerja-->
                        <section class="panel">
                            <header class="panel-heading">
                                Tabel Kinerja Bulan <b><?php echo date("M-Y", strtotime($tahun . "-" . $bulan)) ?></b>
                            </header>
                            <div class="panel-body">
                                <div class="adv-table editable-table "  style="overflow-x: scroll">
                                    <div class="clearfix">

                                        <div class="btn-group pull-right">
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">Filter <i class="icon-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li><a href="javascript:FilterData('');">Semua</a></li>
                                                <li><a href="javascript:FilterData('hadir');">Hadir</a></li>
                                                <li><a href="javascript:FilterData('absen');">Absen</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample" style="overflow-x: scroll">
                                        <thead>
                                            <tr>
                                                <th style="display:none;"></th>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>KM</th>
                                                <th>KL</th>
                                                <th>Rit</th>
                                                <th>SPBU</th>
                                                <th>Pendapatan</th>
                                                <th>Status Tugas</th>
                                                <th>Kehadiran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;

                                            $jumlah = 0;
                                            $bulansekarang = date('Y') . "-" . date('m');
                                            if ($bulansekarang == date('Y-m', strtotime($tahun . "-" . $bulan))) {
                                                $jumlah = date('d');
                                            } else if ($bulan == 1 || $bulan == 3 || $bulan == 5 || $bulan == 7 || $bulan == 8 || $bulan == 10 || $bulan == 12) {
                                                $jumlah = 31;
                                            } else if ($bulan == 4 || $bulan == 6 || $bulan == 9 || $bulan == 11) {
                                                $jumlah = 30;
                                            } else if ($bulan == 2) {
                                                $jumlah = 28;
                                                //jika kabisat
                                                if (date('L', strtotime($tahun . '-01-01'))) {
                                                    $jumlah = 29;
                                                }
                                            }

                                            $status = 0;
                                            for ($i = 1; $i <= $jumlah; $i++) {
                                                foreach ($grafik as $row) {
                                                    $status = 0;
                                                    if ($i == $row->tanggal) {
                                                        $status = 1;
                                                        break;
                                                    } else {
                                                        $status = 0;
                                                    }
                                                }
                                                if ($status == 1) {
                                                    ?>
                                                    <tr class="">
                                                        <td style="display:none;"></td>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo date('d-M-Y', strtotime($row->TANGGAL_LOG_HARIAN)) ?></td>
                                                        <td><?php echo $row->total_km ?></td>
                                                        <td><?php echo $row->total_kl ?></td>
                                                        <td><?php echo $row->ritase ?></td>
                                                        <td><?php echo $row->spbu ?></td>
                                                        <td>Rp. <?php echo number_format($row->pendapatan, 0, ',', '.') ?></td>
                                                        <td><?php echo $row->status_tugas ?></td>
                                                        <td><span class="label label-success">Hadir</span></td>
                                                        <td>
                                                            <a onclick="editKinerja('<?php echo $row->status_tugas ?>', '<?php echo $id_pegawai ?>', '<?php echo $row->ID_KINERJA_AMT ?>', '<?php echo $row->TANGGAL_LOG_HARIAN ?>', '<?php echo $row->total_km ?>', '<?php echo $row->total_kl ?>', '<?php echo $row->ritase ?>', '<?php echo $row->spbu ?>')" data-placement="top" data-toggle="modal" href="#ModalEditKinerja" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                } else {
                                                    $day = 0;
                                                    if ($i < 10) {
                                                        $day = $day . $i;
                                                    } else {
                                                        $day = $i;
                                                    }
                                                    $tanggal = $tahun . "-" . $bulan . "-" . $day;
                                                    ?>
                                                    <tr class="">
                                                        <td style="display:none;"></td>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo date('d-M-Y', strtotime($tanggal)) ?></td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td><span class="label label-danger">Absen</span></td>
                                                        <td>
                                                            <a onclick="tambahKinerja('<?php echo $tanggal ?>', '<?php echo $id_pegawai ?>')" data-placement="top" data-toggle="modal" href="#ModalTambahKinerja" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>

                        <!--        //peringatan-->
                        <section class="panel">
                            <header class="panel-heading">
                                Tabel Peringatan
                            </header>
                            <div class="panel-body">
                                <div class="adv-table editable-table "  style="overflow-x: scroll">
                                    <div class="space15"></div>
                                    <table class="table table-striped table-hover table-bordered" id="editable-sample2" style="overflow-x: scroll">
                                        <thead>
                                            <tr>
                                                <th style="display:none;"></th>
                                                <th>No</th>
                                                <th>Jenis Peringatan</th>
                                                <th>Alasan</th>
                                                <th>Tanggal Berlaku</th>
                                                <th>Tanggal Berakhir</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($peringatan as $row) {
                                                ?>
                                                <tr class="">
                                                    <td style="display:none;"></td>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $row->JENIS_PERINGATAN ?></td>
                                                    <td><?php echo $row->PERINGATAN_PEGAWAI ?></td>
                                                    <td><?php echo date('d-M-Y', strtotime($row->TANGGAL_BERLAKU)) ?></td>
                                                    <td><?php echo date('d-M-Y', strtotime($row->TANGGAL_BERAKHIR)) ?></td>
                                                    <td>
                                                        <a onclick="editPeringatan('<?php echo $row->ID_LOG_PERINGATAN ?>', '<?php echo $row->ID_PEGAWAI ?>', '<?php echo $row->PERINGATAN_PEGAWAI ?>', '<?php echo $row->JENIS_PERINGATAN ?>', '<?php echo $row->TANGGAL_BERLAKU ?>', '<?php echo $row->TANGGAL_BERAKHIR ?>')" data-placement="top" data-toggle="modal" href="#ModalEditPeringatan" class="btn btn-warning btn-xs tooltips" data-original-title="Edit"><i class="icon-pencil"></i></a>
                                                        <a href="javascript:hapusPeringatan('<?php echo $row->ID_LOG_PERINGATAN ?>','<?php echo $row->ID_PEGAWAI ?>');" class="btn btn-danger btn-xs tooltips" data-original-title="Hapus"><i class="icon-remove"></i></a>
                                                    </td>
                                                </tr>
                                            <?php $i++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                        </section>
                        </section>
                        <!--main content end-->

                        <!-- tambah peringatan-->
                        <div class="modal fade" id="ModalPeringatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Peringatan</h4>
                                    </div>
                                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url() ?>amt/detail/<?php echo $row->ID_PEGAWAI ?>">
                                        <div class="modal-body">
                                            <div class="col-lg-12">
                                                <section class="panel">
                                                    <div class="panel-body">
                                                        <div class="form-group ">
                                                            <label for="cjenis" class="control-label col-lg-4">Jenis</label>
                                                            <div class="col-lg-8">
                                                                <select class="form-control input-sm m-bot15" id="cjenis" name="jenis_peringatan">
                                                                    <option value="Teguran 1">Teguran 1</option>
                                                                    <option value="Teguran 2">Teguran 2</option>
                                                                    <option value="Teguran 3">Teguran 3</option>
                                                                    <option value="Surat Peringatan 1">Surat Peringatan 1</option>
                                                                    <option value="Surat Peringatan 2">Surat Peringatan 2</option>
                                                                    <option value="Surat Peringatan 3">Surat Peringatan 3</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">                                            
                                                            <label for="ctglberlaku" class="control-label col-lg-4">Tanggal Berlaku</label>
                                                            <div class="col-lg-8">
                                                                <input class=" form-control input-sm m-bot15" id="ctglberlaku" name="tanggal_berlaku" size="16" type="date" value="" required/>
                                                                <span class="help-block">Pilih Tanggal</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">                                            
                                                            <label for="ctglhangus" class="control-label col-lg-4">Tanggal Hangus</label>
                                                            <div class="col-lg-8">
                                                                <input class=" form-control input-sm m-bot15" id="ctglhangus" name="tanggal_berakhir" size="16" type="date" value="" required/>
                                                                <span class="help-block">Pilih Tanggal</span>
                                                            </div>
                                                        </div>

                                                        <?php foreach ($amt as $row) { ?>
                                                            <input name="id_pegawai" size="16" type="hidden" value="<?php echo $row->ID_PEGAWAI ?>" required/>
                                                        <?php } ?>
                                                        <div class="form-group ">
                                                            <label for="calasan" class="control-label col-lg-4">Alasan</label>
                                                            <div class="col-lg-8">
                                                                <textarea class=" form-control input-sm m-bot15" id="calasan" name="peringatan_pegawai" minlength="2" type="text" required ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                            <input class="btn btn-success" type="submit" name="add_peringatan" value="Simpan"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--edit peringatan-->
                        <div class="modal fade" id="ModalEditPeringatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Peringatan</h4>
                                    </div>
                                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="<?php echo base_url() ?>amt/detail/<?php echo $row->ID_PEGAWAI ?>">
                                        <div class="modal-body">
                                            <div class="col-lg-12">
                                                <section class="panel">
                                                    <div class="panel-body">
                                                        <div class="form-group ">
                                                            <label for="ejenis_peringatan" class="control-label col-lg-4">Jenis</label>
                                                            <div class="col-lg-8">
                                                                <select class="form-control input-sm m-bot15" id="ejenis_peringatan" name="jenis_peringatan">
                                                                    <option value="Teguran 1">Teguran 1</option>
                                                                    <option value="Teguran 2">Teguran 2</option>
                                                                    <option value="Teguran 3">Teguran 3</option>
                                                                    <option value="Surat Peringatan 1">Surat Peringatan 1</option>
                                                                    <option value="Surat Peringatan 2">Surat Peringatan 2</option>
                                                                    <option value="Surat Peringatan 3">Surat Peringatan 3</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">                                            
                                                            <label for="etanggal_berlaku" class="control-label col-lg-4">Tanggal Berlaku</label>
                                                            <div class="col-lg-8">
                                                                <input class=" form-control input-sm m-bot15" id="etanggal_berlaku" name="tanggal_berlaku" size="16" type="date" value="" required/>
                                                                <span class="help-block">Pilih Tanggal</span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group ">                                            
                                                            <label for="etanggal_berakhir" class="control-label col-lg-4">Tanggal Hangus</label>
                                                            <div class="col-lg-8">
                                                                <input class=" form-control input-sm m-bot15" id="etanggal_berakhir" name="tanggal_berakhir" size="16" type="date" value="" required/>
                                                                <span class="help-block">Pilih Tanggal</span>
                                                            </div>
                                                        </div>

                                                        <input id="eid_pegawai" name="id_pegawai" size="16" type="hidden" value="" required/>
                                                        <input id="eid_log_peringatan" name="id_log_peringatan" size="16" type="hidden" value="" required/>
                                                        <div class="form-group ">
                                                            <label for="eperingatan_pegawai" class="control-label col-lg-4">Alasan</label>
                                                            <div class="col-lg-8">
                                                                <textarea class=" form-control input-sm m-bot15" id="eperingatan_pegawai" name="peringatan_pegawai" minlength="2" type="text" required ></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                            <input class="btn btn-success" type="submit" name="edit_peringatan" value="Simpan"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Hapus Awak Mobil Tangki?</h4>
                                    </div>
                                    <div class="modal-body">

                                        Apakah Anda yakin?

                                    </div>
                                    <div class="modal-footer">
                                        <form action="<?php echo base_url() ?>amt/data_amt/" method="POST">
                                            <input type="hidden" name="id_pegawai" id="h_id_pegawai" value=""/>
                                            <input type="hidden" name="nip" id="h_nip" value=""/>
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                            <input type="Submit" class="btn btn-danger danger" name="delete" value="Hapus"/>
                                            <!--<a href="#" onclick="ok()" class="btn btn-danger danger">Hapus</a>-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--modal hapus peringatan-->
                        <div class="modal fade" id="modalHapusPeringatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Hapus Awak Mobil Tangki?</h4>
                                    </div>
                                    <div class="modal-body">

                                        Apakah Anda yakin?

                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="<?php echo base_url() ?>amt/detail/<?php echo $row->ID_PEGAWAI ?>">
                                            <input type="hidden" name="id_log_peringatan" id="did_log_peringatan"/>
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                            <input type="submit" name="delete_peringatan" class="btn btn-danger danger" value="Hapus">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade" id="ModalEditKinerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Edit Kinerja</h4>
                                    </div>
                                    <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url() ?>amt/detail/<?php echo $row->ID_PEGAWAI?>">
                                        <div class="modal-body">
                                            <div class="col-lg-12">
                                                <section class="panel">
                                                    <div class="panel-body">
                                                        <div class="form-group ">                                            
                                                            <label for="ctglkinerja" class="control-label col-lg-4">Tanggal Kinerja</label>
                                                            <div class="col-lg-8">
                                                                <input class=" form-control input-sm m-bot15" id="tanggal_kinerja" name="tanggal_kinerja" size="16" type="date" value="" readonly/>
                                                            </div>
                                                        </div>
                                                        <input class=" form-control input-sm m-bot15" id="id_kinerja" name="id_kinerja_amt" minlength="1" type="hidden" required />
                                                        <input class=" form-control input-sm m-bot15" id="id_pegawai" name="id_pegawai" minlength="1" type="hidden" required />
                                                        <div class="form-group ">
                                                            <label for="ckm" class="control-label col-lg-2">Kilometer</label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control input-sm m-bot15" id="km" name="total_km" minlength="1" type="number" required />
                                                            </div>
                                                            <label for="ckl" class="control-label col-lg-2">Kiloliter</label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control input-sm m-bot15" id="kl" name="total_kl" minlength="1" type="number" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="crit" class="control-label col-lg-2">Ritase</label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control input-sm m-bot15" id="rit" name="ritase_amt" minlength="1" type="number" required />
                                                            </div>
                                                            <label for="cspbu" class="control-label col-lg-2">Jumlah SPBU</label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control input-sm m-bot15" id="spbu" name="spbu" minlength="1" type="number" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="crit" class="control-label col-lg-2">Status Tugas</label>
                                                            <div class="col-lg-4">
                                                                <select class=" form-control input-sm m-bot15" id="status_tugas" name="status_tugas" required>
                                                                    <option value="SUPIR">SUPIR</option>
                                                                    <option value="KERNET">KERNET</option>
                                                                </select>
                                                            </div>
                                                            <label for="chadir" class="control-label col-lg-2">Kehadiran</label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control input-sm m-bot15" id="kehadiran" name="kehadiran" minlength="1" type="text" value="Hadir" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                            <input class="btn btn-success" type="submit" name="edit_kinerja" value="Simpan"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="ModalTambahKinerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Edit Kinerja</h4>
                                    </div>
                                    <form class="cmxform form-horizontal tasi-form" id="signupForm1" method="post" action="<?php echo base_url() ?>amt/detail/<?php echo $row->ID_PEGAWAI?>">
                                        <div class="modal-body">
                                            <div class="col-lg-12">
                                                <section class="panel">
                                                    <div class="panel-body">
                                                        <div class="form-group ">                                            
                                                            <label for="ctglkinerja" class="control-label col-lg-4">Tanggal Kinerja</label>
                                                            <div class="col-lg-8">
                                                                <input class=" form-control input-sm m-bot15" id="ttanggal_kinerja" name="tanggal_kinerja" size="16" type="date" value="" readonly/>
                                                            </div>
                                                        </div>
                                                        <input class=" form-control input-sm m-bot15" id="tid_kinerja" name="id_kinerja_amt" minlength="1" type="hidden" required />
                                                        <input class=" form-control input-sm m-bot15" id="tid_pegawai" name="id_pegawai" minlength="1" type="hidden" required />
                                                        <div class="form-group ">
                                                            <label for="ckm" class="control-label col-lg-2">Kilometer</label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control input-sm m-bot15" id="tkm" name="total_km" minlength="1" type="number" required />
                                                            </div>
                                                            <label for="ckl" class="control-label col-lg-2">Kiloliter</label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control input-sm m-bot15" id="tkl" name="total_kl" minlength="1" type="number" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="crit" class="control-label col-lg-2">Ritase</label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control input-sm m-bot15" id="trit" name="ritase_amt" minlength="1" type="number" required />
                                                            </div>
                                                            <label for="cspbu" class="control-label col-lg-2">Jumlah SPBU</label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control input-sm m-bot15" id="tspbu" name="spbu" minlength="1" type="number" required />
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label for="crit" class="control-label col-lg-2">Status Tugas</label>
                                                            <div class="col-lg-4">
                                                                <select class=" form-control input-sm m-bot15" id="tstatus_tugas" name="status_tugas" required>
                                                                    <option value="SUPIR">SUPIR</option>
                                                                    <option value="KERNET">KERNET</option>
                                                                </select>
                                                            </div>
                                                            <label for="chadir" class="control-label col-lg-2">Kehadiran</label>
                                                            <div class="col-lg-4">
                                                                <input class=" form-control input-sm m-bot15" id="tkehadiran" name="kehadiran" minlength="1" type="text" value="Hadir" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
                                            <input class="btn btn-success" type="submit" name="add_kinerja" value="Simpan"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" id="HapusKinerja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Form Hapus Kinerja</h4>
                                    </div>
                                    <div class="modal-body">

                                        Apakah anda yakin ?

                                    </div>
                                    <div class="modal-footer">
                                        <button data-dismiss="modal" class="btn btn-default" type="button">No</button>
                                        <button class="btn btn-danger" type="button"> Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                    <!--script for this page only-->
                    <script src="<?php echo base_url() ?>assets/js/editable-table.js"></script>

                    <!-- END JAVASCRIPTS -->
                    <script>
                                                jQuery(document).ready(function () {
                                                    EditableTable.init();
                                                });

                                                function FilterData(par) {
                                                    jQuery('#editable-sample_wrapper .dataTables_filter input').val(par);
                                                    jQuery('#editable-sample_wrapper .dataTables_filter input').keyup();
                                                }

                                                //pegawai
                                                var globalId;
                                                var globalId2;
                                                $('#modalHapus').on('show', function () {

                                                });

                                                function hapus(id, id2) {
                                                    globalId = id;
                                                    globalId2 = id2;
                                                    $("#h_id_pegawai").val(globalId);
                                                    $("#h_nip").val(globalId2);
                                                    $('#modalHapus').data('id', id).modal('show');
                                                }

                                                function ok()
                                                {
                                                    $('#modalHapus').modal('hide');
                                                    var url = "<?php echo base_url(); ?>" + "amt/delete_pegawai/" + globalId + "/" + globalId2;
                                                    window.location.href = url;
                                                }

                                                //kinerja
                                                function editKinerja(status_tugas, id_pegawai, id_kinerja, tanggal, km, kl, ritase, spbu) {
                                                    $("#status_tugas").val(status_tugas);
                                                    $("#id_pegawai").val(id_pegawai);
                                                    $("#id_kinerja").val(id_kinerja);
                                                    $("#tanggal_kinerja").val(tanggal);
                                                    $("#km").val(km);
                                                    $("#kl").val(kl);
                                                    $("#rit").val(ritase);
                                                    $("#spbu").val(spbu);
                                                }

                                                function tambahKinerja(tanggal, id_pegawai) {
                                                    $("#tstatus_tugas").val("");
                                                    $("#tid_pegawai").val(id_pegawai);
                                                    $("#tid_kinerja").val("");
                                                    $("#ttanggal_kinerja").val(tanggal);
                                                    $("#tkm").val("");
                                                    $("#tkl").val("");
                                                    $("#trit").val("");
                                                    $("#tspbu").val("");
                                                }

                                                //peringatan
                                                var id_peringatan;
                                                var id_pegawai;
                                                $('#modalHapus').on('show', function () {

                                                });

                                                function hapusPeringatan(id, id2) {
                                                    id_peringatan = id;
                                                    id_pegawai = id2;
                                                    $("#did_log_peringatan").val(id_peringatan);
                                                    $('#modalHapusPeringatan').data('id', id).modal('show');
                                                }

                                                function ok_peringatan()
                                                {
                                                    $('#modalHapusPeringatan').modal('hide');
                                                    var url = "<?php echo base_url(); ?>" + "peringatan/delete_peringatan/" + id_peringatan + "/" + id_pegawai;
                                                    window.location.href = url;
                                                }

                                                function editPeringatan(id_log_peringatan, id_pegawai, peringatan_pegawai, jenis_peringatan, tanggal_berlaku, tanggal_berakhir) {
                                                    $("#eid_log_peringatan").val(id_log_peringatan);
                                                    $("#eid_pegawai").val(id_pegawai);
                                                    $("#ejenis_peringatan").val(jenis_peringatan);
                                                    $("#eperingatan_pegawai").html(peringatan_pegawai);
                                                    $("#etanggal_berlaku").val(tanggal_berlaku);
                                                    $("#etanggal_berakhir").val(tanggal_berakhir);
                                                }

                    </script>