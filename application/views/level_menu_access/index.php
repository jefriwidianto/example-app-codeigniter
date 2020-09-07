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
                        <div class="panel-heading">
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
                                Add level Menu Access
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-level_menu_access" id="myModalLabel">Form Add level Menu Access</h4>
                                        </div>
                                        <div class="modal-body">
											<?php echo validation_errors(); ?>

											<?php echo form_open('level_menu_access/insert'); ?>
											
                                            
											
											<div class="form-group">
											<label>Level</label>
                                            <select class="form-control" name="id_level">
											<?php
                                    					
                                                        foreach ($combo_menu_level->result() as $rowmenu) {
                                                    	?>
                                            <option value="<?= $rowmenu->id_level?>" <?php echo set_select('myselect', '$rowmenu->id_level'); ?> ><?= $rowmenu->nm_level?></option>
                                            
											<?php
											}
											?>
                                            </select> 
                                            </div>
											
											<div class="form-group">
											<label>Menu Details</label>
                                            <select class="form-control" name="id_menu_details">
											<?php
                                    					
                                                        foreach ($combo_menu_details->result() as $rowmenu) {
                                                    	?>
                                            <option value="<?= $rowmenu->id_menu_details?>" <?php echo set_select('myselect', '$rowmenu->id_menu_details'); ?> ><?= $rowmenu->nm_menu_details?></option>
                                            
											<?php
											}
											?>
                                            </select> 
                                            </div>
											
											<div class="form-group">
											<label>Active</label>
                                            <select class="form-control" name="active">
                                            <option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
                                            <option value="0" <?php echo set_select('myselect', '0'); ?> >Deactive</option>
                                            </select> 
                                            </div>
											
											
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" value="Save" class="btn btn-primary">
                                        
                                            <?php echo form_close(); ?>
                                        </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th nowrap>ID</th>
                                            <th nowrap>Level</th>
											<th nowrap>Menu Details</th>
											<th nowrap>Active</th>
											<th nowrap>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                    				
                                                        foreach ($level_menu_access->result() as $rows) {
                                                    	?>
                                    										<tr>
                                    											<td nowrap><?= $rows->id_level_menu_access?></td>
                                    											<td nowrap><?= $rows->nm_level?></td>
																				<td nowrap><?= $rows->nm_menu_details?></td>
																				<td nowrap><?php if($rows->active == 1){echo "Active";}else{echo "Deactive";} ?></td>
                                                                                <td nowrap><a href="level_menu_access/delete/<?= $rows->id_level_menu_access?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="level_menu_access/formupdate/<?= $rows->id_level_menu_access?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Update
                                                                                    </button></a>                                                        
                                                                                </td>
                                                
                                    										</tr>
                                    <? } ?>
									</tbody>   
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
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
                 "scrollX": true
        });
    });
    </script>

</body>

</html>
