<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
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
                    <h1 class="page-header">Karyawan </h1>
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
                                Add Karyawan
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-user" id="myModalLabel">Form Add User</h4>
                                        </div>
                                        <div class="modal-body">
											<?php echo validation_errors(); ?>

											<?php echo form_open('user/insert'); ?>
											
                                            <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" name="id_user" class="form-control" placeholder="Harus Angka">
                                            </div>

											<div class="form-group">
                                            <label>Name Karyawan</label>
                                            <input type="text" name="nm_user" class="form-control" placeholder="Nama Lengkap">
											</div>
											
											
											
											
											
											
											<div class="form-group">
                                            <label>Jabatan</label>
                                            <select class="form-control" name="id_corp">

                                            <?php
                                                 foreach ($combobox_jabatan->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_corp?>" <?php echo set_select('myselect', '$rowmenu->id_corp'); ?> ><?= $rowmenu->nm_corp?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>
											
											<div class="form-group">
                                            <label>Atasan</label>
                                            <select class="form-control" name="atasan">

                                            <?php
                                                 foreach ($combobox_atasan->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_user?>" <?php echo set_select('myselect', '$rowmenu->id_user'); ?> ><?= $rowmenu->nm_user?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>
											  
											<hr />  
											  
                                            <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                            </div>

                                            <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                            </div>
											
                                            <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="id_level">

                                            <?php
                                                 foreach ($combobox_level->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_level?>" <?php echo set_select('myselect', '$rowmenu->id_level'); ?> ><?= $rowmenu->nm_level?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>
                                            <div class="form-group">
                                            <label>Status</label>
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
                                            <th nowrap>NIK</th>
                                            <th nowrap>Nama</th>
											<th nowrap>Jabatan</th>
											<th nowrap>Atasan</th>
                                            <th nowrap>Username</th>
                                            <th nowrap>Level Akses</th>
                                            <th nowrap>Active</th>
                                            <th nowrap>Options</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                    					
                                                        foreach ($listuser->result() as $rows) {
                                                    	?>
                                    										<tr>
                                    											<td nowrap><?= $rows->id_user?></td>
                                    											<td nowrap><?= $rows->nm_user?></td>
																				
                                                                                <td nowrap><?= $rows->nm_corp?></td>
																				<td nowrap><?= $rows->atasan?></td>
                                                                                <td nowrap><?= $rows->username?></td>
                                                                                <td nowrap><?= $rows->nm_level?></td>
                                                                                <td nowrap><?php if($rows->active == 1){echo "Active";}else{echo "Deactive";} ?></td>
                                                                                

                                                                                <td nowrap><a href="user/delete/<?= $rows->id_user?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Delete
                                                                                    </button></a>

                                                                                    <a href="user/formupdate/<?= $rows->id_user?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Update
                                                                                    </button></a>
																					
                                                                                </td>
                                                
                                    										</tr>
                                    <?php } ?>
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
