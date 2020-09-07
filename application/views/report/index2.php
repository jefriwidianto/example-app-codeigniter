<!DOCTYPE html>
<html lang="en">

<head>

   <?= $this->load->view('head'); ?>
</head>

<body>

    <div id="wrapper">

       <?= $this->load->view('nav'); ?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-12">
                    <h1 class="page-header">Report .Pdf</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- Button trigger modal -->
                            Report 
                            <!-- Modal -->
                            
                            <!-- /.modal -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('report/report_pdf'); ?>
                                            
                                            

                                            
                                            <div class="form-group col-lg-4">
                                            <label>Tanggal Awal</label>
                                            <input type="text" maxlength="10" name="tglawal" id="tglawal" class="form-control" placeholder="" readonly>
                                            </div>

                                            <div class="form-group col-lg-4">
                                            <label>Tanggal Akhir</label>
                                            <input type="text" maxlength="10" name="tglakhir" id="tglakhir" class="form-control" placeholder="" readonly>
                                            </div>

                                            <div class="form-group col-lg-4">
                                            <label>Jenis Surat</label>
                                            <select class="form-control" name="jenis" id="jenis">
                                            <option selected>Select</option>

                                            <?php                                                        
                                            foreach ($combo->result() as $rows) {
                                            ?>
                                            <option value="<?= $rows->keterangan?>"><?= $rows->keterangan?></option>
                                            <?php } ?>
                                            
                                            </select>
                                            </div>

                                            
                                            <div class="form-group col-lg-4">
                                            <label>Options</label>
                                            <input type="submit" value="Lihat" class="form-control btn btn-success">
                                            
                                            </div>
                                            <?php echo form_close(); ?>
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
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
    <script src="<?=base_url();?>assets/js/jquery-ui.js"></script>
	
	
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script type="text/javascript">
    $(function() {
            $( "#tglawal" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"


            });
        });
    $(function() {
            $( "#tglakhir" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"


            });
        });

    </script>    

</body>

</html>
