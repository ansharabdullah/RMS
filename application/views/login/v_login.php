<body class="login-body">

    <div class="container">
        <form class="form-signin" action="<?php echo base_url()?>login/validate_login/" method="POST">
            <h2 class="form-signin-heading">OSCRMS LOG IN</h2>
            <div class="login-wrap">
                <input type="email" class="form-control" placeholder="E-Mail" name="email" autofocus>
                <br />
                <input type="password" class="form-control" name="password" placeholder="Password">
                <button class="btn btn-lg btn-login btn-block" type="submit">Masuk</button>

                <a data-toggle="modal" href="#myModal">
                    Tentang OSCRMS
                </a>
            </div>
        </form>

        <!-- Modal -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Tentang OSCRMS</h4>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="col-lg-4">
                           logo
                        </div>

                        <div class="col-lg-8" align="justify">
                            RMS (Reporting Management System) merupakan sistem pengelolaan kinerja crew awak mobil tangki dan mobil tangki untuk depot-depot PT  Pertamina Patra Niaga wilayah Jawa Tengah  berbasis web dimana pada akhirnya keluaran dari sistem berupa laporan serta tampilan grafik.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>Developed by CobiLab</p>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>