<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik KPI Bulanan Depot 1
                    </header>
                    <div class="panel-body" >
                        <?php $attr = array("class"=>"cmxform form-horizontal tasi-form");
                            echo form_open("depot/changeGrafikBulan/",$attr);
                        ?>

                            <div class="form-group">
                                <div class="col-lg-2">
                                    <select class="form-control m-bot2"  id="depot" name="depot">

                                        <option value="">Depot 1</option>
                                        <option value="">Depot 2</option>
                                        <option value="">Depot 3</option>
                                        <option value="">Depot 4</option>
                                        <option value="">Depot 5</option>
                                       
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="tahun" data-mask="9999" name="tahun" placeholder="Tahun" required="required" id="tahunLaporan"  class="form-control"/>
                                </div>

                                <div class=" col-lg-2">
                                    <input type="submit" class="btn btn-danger" value="Submit">
                                </div>

                            </div>
                        </form>
                        <br/><br/>