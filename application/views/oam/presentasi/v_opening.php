<script type="text/javascript">
    $(document).ready(function(){
    
        $("#opening").height($(document).height() * 0.95);
    });
    function start()
    {
        window.location="<?php echo $url ?>";
    }
</script>
<section id="main-content" onclick="start()">
    <section class="wrapper" id="opening" style="background: url('<?php echo base_url()?>assets/img/bg_presentasi.png') no-repeat center center fixed;background-size: 100%;" >
        <div style="padding-left: 5%;height:80%;color: white;font-size: 30px;">
            <br/><br/><br/>FLEET MANAGEMENT FUEL RETAIL<br/>
            DIREKTORAT OPERASI<br/>
            OPERATION AREA MANAGER (OAM) V<br/>
            TRIWULAN <?php echo $triwulan?> TAHUN <?php echo date('Y')?>
        </div>
        <div style="height:20%">
            <div style="float: right;padding-right: 20px;">
                <img src="<?php echo base_url()?>assets/img/logo-patraniaga.png">
            </div>
            <div style="width: 45%;color: black;font-size: 20px;padding-left: 5%;">
                <?php echo $this->session->userdata('nama_pegawai') ?><br/><br/>
                Fuel Retail Manager
            </div>
        </div>
    </section>
</section>