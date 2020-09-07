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
                    <h1 class="page-header">kriteria</h1>
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
							Add kriteria
							</button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-kompetensi" id="myModalLabel">Form Add kompetensi</h4>
                                        </div>
                                        <div class="modal-body">
											<?php echo validation_errors(); ?>

											<?php echo form_open('kompetensi_detail/insert'); ?>
											
											<div class="form-group">
                                            <label>Name kompetensi</label>
                                            <input type="text" name="nm_kompetensi_detail" class="form-control" placeholder="Name kompetensi">
											</div>
											
											<div class="form-group">
                                            <label>Standarisasi</label>
                                            <input type="text" name="bobot" class="form-control" placeholder="">
											</div>
											
											<div class="form-group">
											<label>Kompetensi</label>
                                            <select class="form-control" name="id_kompetensi">
											<?php
                                    					
                                                        foreach ($combobox_kompetensi->result() as $rowmenu) {
                                                    	?>
                                            <option value="<?= $rowmenu->id_kompetensi?>" <?php echo set_select('myselect', '$rowmenu->id_kompetensi'); ?> ><?= $rowmenu->nm_kompetensi?></option>
                                            
											<?php
											}
											?>
                                            </select> 
                                            </div>
											
											<div class="form-group">
                                            <label>status</label>
                                            <select class="form-control" name="status">
                                            <option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Aktif</option>
                                            <option value="0" <?php echo set_select('myselect', '0'); ?> >Not Aktif</option>
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
                                            <th>ID</th>
                                            <th>Nama Kriteria</th>
                                            <th>Standarisasi</th>
											 <th>kompetensi</th>
                                            <th>status</th>
                                            <th>Options</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                    					
                                                        foreach ($listkompetensi_detail->result() as $rows) {
                                                    	?>
                                    										<tr>
                                    											<td><?= $rows->id_kompetensi_detail?></td>
                                    											<td><?= $rows->nm_kompetensi_detail?></td>
																				<td><?= $rows->bobot?></td>
																				<td><?= $rows->nm_kompetensi?></td>
                                    											<td><?php if($rows->status == 1){echo "Aktif";}else{echo "Non Aktif";} ?></td>
                                                                                <td><a href="kompetensi/delete/<?= $rows->id_kompetensi?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="kompetensi/formupdate/<?= $rows->id_kompetensi?>">
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
	
	<!-- Page-pangkat Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                "scrollX": true
        });
    });
    </script>

</body>

</html>
