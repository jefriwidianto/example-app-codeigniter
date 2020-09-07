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
                    <h1 class="page-header">User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listuserselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('user/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID User</label>
                                            <input type="text" name="id_user" class="form-control" placeholder="ID User" value="<?= $rows->id_user?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Name User Awal</label>
                                            <input type="text" name="nm_user" class="form-control" placeholder="Name User" value="<?= $rows->nm_user?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $rows->username?>">
                                            </div>    

                                            <div class="form-group">
                                            <label>Password</label>
                                            <input type="text" name="password" class="form-control" placeholder="Password" value="<?= $rows->password?>">
                                            </div>   

                                            

                                           
                                            <div class="form-group">
                                            <label>ID Level</label>
                                            <select class="form-control" name="id_level">

                                            <?php
                                                 foreach ($combobox_level->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_level?>" <?php if ($rows->id_level == $rowmenu->id_level){echo "selected"; }else{} ?> ><?= $rowmenu->nm_level?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>                                            

                                            <div class="form-group">
                                            <label>Status Active</label>
                                            <select class="form-control" name="active">
                                            <option value="1" <?php if ($rows->active == 1){echo set_select('myselect', '1',TRUE);} ?> >Active</option>
                                            <option value="0" <?php if ($rows->active == 0){echo set_select('myselect', '0',TRUE);} ?> >Deactive</option>                                            
                                            </select> 
                                            </div>

                                           

                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/user"><input type="button" value="Cancel" class="btn btn-default"></a>
                                            </div>
                                            <?php echo form_close(); ?>
                                            <?php } ?>  
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
