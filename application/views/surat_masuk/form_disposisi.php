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
                    <h1 class="page-header">Disposisi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Disposisi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listsurat_masukselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?> 

                                            <?php echo form_open('surat_masuk/Insert_disposisi'); ?>
                                            
											<div class="form-group">
                                            <label>Id Surat</label>
                                            <input type="text" name="id_surat"  class="form-control" placeholder="ID" value="<?= $rows->id_surat?>">
                                            </div>
											
                                            <div class="form-group">
                                            <label>Disposisi</label>
                                            <input type="text" name="tujukan" class="form-control" placeholder="**Nama Lengkap" value="">
                                            </div>
											
											<div class="form-group">
                                            <label>Alasan</label>
                                            <input type="text" name="alasan" class="form-control" placeholder="" value="" >
                                            </div>
											
											<div class="form-group">
                                            <label>Note</label>
                                            <input type="text" name="note" class="form-control" placeholder="" value="" >
                                            </div>
											
				

                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/surat_masuk"><input type="button" value="Cancel" class="btn btn-default"></a>
                                            </div>
                                            <?php echo form_close(); ?>
                                            <? } ?>  
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
    
     <!-- DataTables JavaScript -->
    <script src="<?=base_url();?>assets/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    
    <!-- Page-pangkat Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
