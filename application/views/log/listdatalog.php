<meta http-equiv="refresh" content="180">
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead nowrap>
                                        <tr nowrap>
                                            <th nowrap>Id</th>
                                            <th nowrap>Mac Address</th>
											<th nowrap>Temperature</th>
											<th nowrap>Humadity</th>
											<th nowrap>Smoke</th>
											<th nowrap>Time</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                    					
                                                        foreach ($listlog->result() as $rows) {
                                                    	?>
                                    										<tr>
                                    											<td nowrap><?= $rows->id_log?></td>
                                    											<td nowrap><?= $rows->mac_address?></td>
																				<td nowrap><?= $rows->temp?></td>
																				<td nowrap><?= $rows->humidity?></td>
																				<td nowrap><?= $rows->asap?></td>
																				<td nowrap><?= $rows->time?></td>
                                    											 
                                                
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