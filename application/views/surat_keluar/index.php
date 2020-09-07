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
                    <h1 class="page-header">Surat Keluar</h1>
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
							Add Surat Keluar
							</button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-kompetensi" id="myModalLabel">Form Add Surat Keluar</h4>
                                        </div>
                                        <div class="modal-body">
											<?php echo validation_errors(); ?>

											<?php echo form_open('surat_keluar/insert'); ?>
											
											<div class="form-group">
                                            <label>No Surat</label>
                                            <input type="text" id="no_surat_keluar" name="no_surat_keluar" class="form-control" readonly>
                                            <h6 style="color: red;">*Tolong Klick From, Setelah Mengisi Form Prodi Untuk Melihat No. Surat !</h6>
											</div>

                                            <div class="form-group">
                                            <label>Prodi</label>
                                            <input type="text" id="prod" name="prodi" class="form-control" placeholder="">
                                            </div>
											
											<div class="form-group">
                                            <label>Hal</label>
                                            <input type="text" name="hal" class="form-control" placeholder="">
											</div>
											
                                            
											<div class="form-group">
                                            <label>Kepada</label>
                                            <input type="text" name="atas_nama" class="form-control" placeholder="">
											</div>

                                            <?php echo $this->ckeditor->editor('isi_surat','');?> 

                                            <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="date" name="cdate" class="form-control" placeholder="">
                                            </div>
											
											<div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" placeholder="">
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
                                            <th>No Surat</th>
                                            <th>Kepada</th>
                                            <th>Hal</th>
											
											 <th>Keterangan</th>
											 <th>Tanggal Pembuatan</th>
                                            <th>status</th>
                                            <th>Options</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                    					
                                                        foreach ($listsurat_keluar->result() as $rows) {
                                                    	?>
                                    										<tr>
                                    											<td><?= $rows->id_surat_keluar?></td>
                                    											<td><?= $rows->no_surat_keluar?></td>
                                    											<td><?= $rows->atas_nama?></td>
																				<td><?= $rows->hal?></td>
																				<td><?= $rows->keterangan?></td>
																				<td><?= $rows->cdate?></td>
                                    											<td><?php if($rows->status == 1){echo "New";}else{echo "Archieved";} ?></td>
                                                                                <td><a href="surat_keluar/delete/<?= $rows->id_surat_keluar?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="surat_keluar/formupdate/<?= $rows->id_surat_keluar?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Update
                                                                                    </button></a>
                                                                                    <a href="surat_keluar/cetak/<?= $rows->id_surat_keluar?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Cetak PDF
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
	
	<!-- Page-pangkat Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                "scrollX": true
        });
    });


    $('#prod').blur(function() {
    var item1var = $('#prod').val();
    <?php 
            foreach ($codesurat_keluar->result() as $test) {
            $kode1 = $test->no_surat_keluar;
            }

            if(!empty($kode1)){
            $date = getdate(time('now'));
            $kode = substr($kode1, 0, 3);
             ?>
             var kode = <?php echo json_encode(++$kode); ?>;
             var month = <?php echo json_encode($date['month']); ?>;
             var mday = <?php echo json_encode($date['mday']); ?>;
             $('#no_surat_keluar').val('00' + kode + '/' + month + '-' + mday + '/' + item1var);  

                <?php if ($kode >= 10) { ?>
                $('#no_surat_keluar').val('0' + kode + '/' + month + '-' + mday + '/' + item1var); 

            <?php 
                } 
            } 

            else { $date = getdate(time('now'));
                   $kode = substr($kode1, 0, 3);
            ?>

            var month = <?php echo json_encode($date['month']); ?>;
            var mday = <?php echo json_encode($date['mday']); ?>;
            $('#no_surat_keluar').val('001' + '/' + month + '-' + mday + '/' + item1var); <?php } ?>
                 
    });
    </script>

</body>

</html>
