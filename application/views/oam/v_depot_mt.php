<!DOCTYPE html>
<script type="text/javascript">
    $(function() {
        $('#grafik2').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KL MT Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/mt_depot_harian/2";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    name: 'KL',
                    type: 'column',
                    data: [92, 99, 101, 98, 95, 92, 89, 90, 85, 87, 88, 93]

                }]
        });
    });

    $(function() {
        $('#grafik1').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM MT Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/mt_depot_harian/2";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    name: 'KM',
                    type: 'column',
                    data: [30, 31, 40, 50, 45, 43, 40, 42, 41, 43, 41, 42]

                }]
        });
    });

    $(function() {
        $('#premium').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM MT Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/mt_depot_harian/2";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    name: 'KM',
                    type: 'column',
                    data: [30, 31, 40, 50, 45, 43, 40, 42, 41, 43, 41, 42]

                }]
        });
    });

    $(function() {
        $('#pertamax').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM MT Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/mt_depot_harian/2";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    name: 'KM',
                    type: 'column',
                    data: [30, 31, 40, 50, 45, 43, 40, 42, 41, 43, 41, 42]

                }]
        });
    });

    $(function() {
        $('#pertamaxPlus').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM MT Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/mt_depot_harian/2";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    name: 'KM',
                    type: 'column',
                    data: [30, 31, 40, 50, 45, 43, 40, 42, 41, 43, 41, 42]

                }]
        });
    });

    $(function() {
        $('#pertaminaDex').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM MT Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/mt_depot_harian/2";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    name: 'KM',
                    type: 'column',
                    data: [30, 31, 40, 50, 45, 43, 40, 42, 41, 43, 41, 42]

                }]
        });
    });

    $(function() {
        $('#solar').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM MT Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/mt_depot_harian/2";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    name: 'KM',
                    type: 'column',
                    data: [30, 31, 40, 50, 45, 43, 40, 42, 41, 43, 41, 42]

                }]
        });
    });

    $(function() {
        $('#biosolar').highcharts({
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: 'Grafik Kinerja Jumlah KM MT Depot 1'
            },
            subtitle: {
                text: 'Tahun 2014'
            },
            plotOptions: {
                series: {
                    events: {
                        click: function(event) {
                            window.location = "<?php echo base_url() ?>depot/mt_depot_harian/2";
                        }
                    }
                }
            },
            xAxis: [{
                    categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember', ]
                }],
            yAxis: [{// Primary yAxis
                    labels: {
                        format: '',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    },
                    title: {
                        text: 'Target',
                        style: {
                            color: Highcharts.getOptions().colors[1]
                        }
                    }
                }],
            tooltip: {
                shared: true
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                x: -10,
                verticalAlign: 'top',
                y: 50,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            series: [{
                    name: 'KM',
                    type: 'column',
                    data: [30, 31, 40, 50, 45, 43, 40, 42, 41, 43, 41, 42]

                }]
        });
    });
</script>

<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row state-overview">
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol terques">
                        <i class="icon-user"></i>
                    </div>
                    <div class="value">
                        <h1 class="count">
                            47
                        </h1>
                        <p>Awak Mobil Tangki</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol red">
                        <i class="icon-truck"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count2">
                            80
                        </h1>
                        <p>Mobil Tangki</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol yellow">
                        <i class="icon-star"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count3">
                            87%
                        </h1>
                        <p>Traget KL</p>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 col-sm-6">
                <section class="panel">
                    <div class="symbol blue">
                        <i class="icon-dashboard"></i>
                    </div>
                    <div class="value">
                        <h1 class=" count4">
                            123
                        </h1>
                        <p>KL (Own Use)</p>
                    </div>
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Bulanan Jumlah KL Depot 1
                    </header>
                    <div class="panel-body" >

                        <div id="grafik2"></div>

                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik Bulanan Jumlah KM Depot 1
                    </header>
                    <div class="panel-body" >

                        <div id="grafik1"></div>

                    </div>
                </section>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik KL Premium
                    </header>
                    <div class="panel-body" >

                        <div id="premium"></div>

                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik KL Pertamina Dex
                    </header>
                    <div class="panel-body" >

                        <div id="pertaminaDex"></div>

                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik KL Pertamax
                    </header>
                    <div class="panel-body" >

                        <div id="pertamax"></div>

                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik KL Pertamax Plus
                    </header>
                    <div class="panel-body" >

                        <div id="pertamaxPlus"></div>

                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik KL Bio Solar
                    </header>
                    <div class="panel-body" >

                        <div id="biosolar"></div>

                    </div>
                </section>
            </div>

            <div class="col-lg-6">
                <section class="panel">
                    <header class="panel-heading">
                        Grafik KL Solar
                    </header>
                    <div class="panel-body" >

                        <div id="solar"></div>

                    </div>
                </section>
            </div>

        </div>
    </section>
</section>