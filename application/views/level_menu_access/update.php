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
                    <h1 class="page-header">Level Menu Access</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Level Menu Access
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listlevel_menu_accessselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('level_menu_access/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID Level Menu Access</label>
                                            <input type="text" name="id_level_menu_access" class="form-control" placeholder="ID Level Menu Access" value="<?= $rows->id_level_menu_access?>" readonly>
                                            </div>

											<div class="form-group">
											<label>Level</label>
                                            <select class="form-control" name="id_level">
											<?php
                                    					
                                                        foreach ($combo_menu_level->result() as $rowmenu) {
                                                    	?>
                                            <option value="<?= $rowmenu->id_level?>" <?php if($rowmenu->id_level == $rows->id_level){echo "selected";} ?> ><?= $rowmenu->nm_level?></option>
                                            
											<?php
											}
											?>
                                            </select> 
                                            </div>
											
                                            <div class="form-group">
											<label>Name Menu Details</label>
                                            <select class="form-control" name="id_menu_details">
											<?php
                                    					
                                                        foreach ($combo_menu_details->result() as $rowmenu) {
                                                    	?>
                                            <option value="<?= $rowmenu->id_menu_details?>" <?php if($rowmenu->id_menu_details == $rows->id_menu_details){echo "selected";} ?> ><?= $rowmenu->nm_menu_details?></option>
                                            
											<?php
											}
											?>
                                            </select> 
                                            </div> 
											
                                            <div class="form-group">
                                            <label>Active</label>
                                            <select class="form-control" name="active">
                                            <option value="1" <?php if ($rows->active == 1){echo set_select('myselect', '1',TRUE);} ?> >Active</option>
                                            <option value="0" <?php if ($rows->active == 0){echo set_select('myselect', '0',TRUE);} ?> >Deactive</option>                                            
                                            </select> 
                                            </div>

                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/level_menu_access"><input type="button" value="Cancel" class="btn btn-default"></a>
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
    
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
