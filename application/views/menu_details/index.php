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
                    <h1 class="page-header">Menu Details</h1>
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
                                Add Menu Details
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-menu_details" id="myModalLabel">Form Add Menu Details</h4>
                                        </div>
                                        <div class="modal-body">
											<?php echo validation_errors(); ?>

											<?php echo form_open('menu_details/insert'); ?>
											
                                            
											
											<div class="form-group">
                                            <label>Nama Menu Details</label>
                                            <input type="text" name="nm_menu_details" class="form-control" placeholder="Nama Menu Details">
                                            </div>
											
											<div class="form-group">
                                            <label>URL</label>
                                            <input type="text" name="url" class="form-control" placeholder="URL">
                                            </div>
											
											<div class="form-group">
											<label>Active</label>
                                            <select class="form-control" name="active">
                                            <option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
                                            <option value="0" <?php echo set_select('myselect', '0'); ?> >Deactive</option>
                                            </select> 
                                            </div>
											
											<div class="form-group">
                                            <label>Position</label>
                                            <input type="text" name="position" class="form-control" placeholder="Position">
                                            </div>
											
											<div class="form-group">
											<label>Menu Groups</label>
                                            <select class="form-control" name="id_menu_groups">
											<?php
                                    					
                                                        foreach ($combo_menu_groups->result() as $rowmenu) {
                                                    	?>
                                            <option value="<?= $rowmenu->id_menu_groups?>" <?php echo set_select('myselect', '$rowmenu->id_menu_groups'); ?> ><?= $rowmenu->nm_menu_groups?></option>
                                            
											<?php
											}
											?>
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
                                    <thead nowrap>
                                        <tr>
                                            <th nowrap>ID Menu Details</th>
                                            <th nowrap>Nama Menu Details</th>
											<th nowrap>URL</th>
											<th nowrap>Active</th>
											<th nowrap>Position</th>
                                            <th nowrap>Menu Groups</th>
                                            <th nowrap>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                    				
                                                        foreach ($listmenu_details->result() as $rows) {
                                                    	?>
                                    										<tr>
                                    											<td nowrap><?= $rows->id_menu_details?></td>
                                    											<td nowrap><?= $rows->nm_menu_details?></td>
																				<td nowrap><?= $rows->url?></td>
																				<td nowrap><?php if($rows->active == 1){echo "Active";}else{echo "Deactive";} ?></td>
																				<td nowrap><?= $rows->position?></td>
                                    											<td nowrap><?= $rows->nm_groups?></td>
                                                                                <td nowrap><a href="menu_details/delete/<?= $rows->id_menu_details?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="menu_details/formupdate/<?= $rows->id_menu_details?>">
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
