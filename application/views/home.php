<html>

<!-- Best_regards To Jefri Widianto 

     juni 8, 2017 :)
-->

<head>

<script src="<?=base_url();?>assets/js/jquery-1.11.1.min.js"></script>


<?php
    /* Mengambil query report*/
    foreach($report as $result){
        //$date=date_create($result->cdate);
        $bulan[] = $result->month; //ambil bulan
        $value[] = (float)$result->count; //ambil nilai
        //print_r($value);die();
    }

    foreach($report1 as $result1){
        //$date=date_create($result->cdate);
        $bulan1[] = $result1->c_date; // ambil bulan
        $value1[] = (float)$result1->total1; //ambil nilai
        $value2[] = (float)$result1->total2;
        //print_r($result1['Surat Masuk']);die()
        //echo json_encode($result1->cdate);die();
    }
    // foreach($report2 as $result2){
        
    //     $value2[] = (float)$result2->total; //ambil nilai
    // }
    // foreach($report3 as $result3){
        
    //     $bulan3[] = $result3->cdate; //ambil nilai
    // }
    /* end mengambil query*/
     
?>
   
    <script type="text/javascript">
    $(function () {
    $('#report').highcharts({
        chart: {
            type: 'pie',
            options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
        },
        title: {
            text: 'Report Perbulan',
            style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        subtitle: {
           text: 'Surat Keluar',
           style: {
                    fontSize: '15px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories:  <?php echo json_encode($bulan);?>
            
        },
        exporting: { 
            enabled: false 
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
        },

        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45,
                showInLegend: true
            }
        },

        tooltip: {
             formatter: function() {
                 return 'Total <b>' + this.x + '</b> is <b>' + this.y + '</b>, in '+ this.series.name;
             }
          },

        series: [{
            name: 'Surat Keluar',
            data: <?php echo json_encode($value);?>,
            pointStart: 0,
            shadow : true,
            dataLabels: {
                enabled: true,
                color: '#045396',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
            },
        ]
    });
});
</script>

<script type="text/javascript">
console.log(<?php echo json_encode($value2);?>);
    $(function () {
    $('#report1').highcharts({
        chart: {
            type: 'line',
            margin: 75,
            options3d: {
                enabled: false,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Report Perbulan',
            style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        subtitle: {
           text: 'Surat Keluar',
           style: {
                    fontSize: '15px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        credits: {
            //text: 'poltekpos.ac.id',
            href: 'http://poltekpos.ac.id/',
                position: {
                align: 'center',
                x: 0
            }
        },
        xAxis: {
            categories:  <?php echo json_encode($bulan1);?>
            
        },
        exporting: { 
            enabled: true 
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            },
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: 'Total Surat {y}'
                }
            }
        },

        tooltip: {
             formatter: function() {
                 return 'Total <b>' + this.series.name+  '</b> Pada Bulan <b>' + this.x + '</b> Adalah <b>' + this.y + '</b>';
             }
          },

        series: [{
            name: 'Surat Keluar',
            data: <?php echo json_encode($value1);?>,
            pointStart: 0,
            shadow : true,
            dataLabels: {
                enabled: true,
                color: '#045396',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
            },

            {
            name: 'Surat Masuk',
            data: <?php echo json_encode($value2);?>,
            pointStart: 0,
            shadow : true,
            dataLabels: {
                enabled: true,
                color: '#045396',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
            }, 
        ]
    });
});
</script>

    <?= $this->load->view('head'); ?>

</head>

<body>

    <div id="wrapper">

        <?= $this->load->view('nav'); ?>

         <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-12">
                    <h1 class="page-header">Graphic Of Letter</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Powered By HighChart
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="purchase" style="position: relative;"></div>
                            
                            <div class="row">
                                <div class="col-md-6" hidden>
                                <div class="panel panel-default">
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <i class="fa fa-bar-chart-o fa-fw"></i>Powered By HighChart
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div id="purchase" style="position: relative;"></div>
                                            <div id="body">
                                                <div id="report"></div>
                                            </div>
                                        </div>                        
                            </div>

                        </div>            
                        <div class="col-md-12">
                                <div class="panel panel-default">
                                        <!-- panel-heading -->
                                        <div class="panel-heading">
                                            <i class="fa fa-bar-chart-o fa-fw"></i>Powered By HighChart
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div id="purchase" style="position: relative;"></div>
                                            <div id="body">
                                                <div id="report1"></div>
                                            </div>
                                        </div>                        
                            </div>

                        </div>                        
            </div>
            
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?=base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url();?>assets/dist/js/sb-admin-2.js"></script>
    
     <!-- DataTables JavaScript -->
    <script src="<?=base_url();?>assets/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    // $(document).ready(function() {
    //     $('#dataTables-example').DataTable({
    //             responsive: true
    //     });
    // });
    </script>

    <script type="text/javascript">



//     function showValues() {
//         $('#R0-value').html(chart.options.chart.options3d.alpha);
//         $('#R1-value').html(chart.options.chart.options3d.beta);
//     }

//     // Activate the sliders
//     $('#R0').on('change', function () {
//         chart.options.chart.options3d.alpha = this.value;
//         showValues();
//         chart.redraw(false);
//     });
//     $('#R1').on('change', function () {
//         chart.options.chart.options3d.beta = this.value;
//         showValues();
//         chart.redraw(false);
//     });

//     showValues();
// });
</script>
<!-- akhir -->

</body>

</html>