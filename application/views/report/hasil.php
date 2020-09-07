<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>
<style type="text/css">
h5{
   font-weight: normal;
}

</style>

<body>

<p style="text-align:justify;"><img src='uploads/gambar/UPI.png' width="150" height="180" style="float:left;" /><h2 style="text-align: center;">UNIVERSITAS PENDIDIKAN INDONESIA
<br>SEKOLAH PASCASARJANA
<br>MAGISTER MANAJEMEN BISNIS (M2B) & DOKTOR ILMU MANAJEMEN (DIM)
<h5>Jl. Dr. Setiabudhi No.229, Cidadap, Isola, Sukasari, Kota Bandung, Jawa Barat 40154 Fax. (022)2021405 
<br> E-mail : sps_mmb@upi.redu - Website : http://sps.upi.org</h5>
</h2>
<hr/>
</p>

<?php if ($this->input->post ('jenis') == 'Select') { ?>


<table width="727" height="154" border="1" align="center">
  <tr align="center">
    <td width="80" height="23">Tanggal Pengiriman</td>
    <td width="80" height="23">Total Surat Keluar</td>
    <td width="80" height="23">Total Surat Masuk</td>
    
  </tr>
                                <?php   
                                                                                                
                                            foreach ($listreport->result() as $rows) {
                                             
                                          
                                            ?>            
                                            
                          <tr>
                          <td><?= $rows->c_date?></td>
                          <td><?= $rows->total1?></td>
                          <td><?= $rows->total2?></td>
                          </tr>
  
                     
                                            <? }?>  
  
</table>
<?php }?>

<?php if ($this->input->post ('jenis') == 'Surat Keluar') { ?>

<table width="727" height="154" border="0" align="center">
                                                        <tr cellspacing="3" align="center" bgcolor="#99ddff">
                                                          <td width="90" height="23">No Surat</td>
                                                          <td width="80" height="23">Hal</td>
                                                          <td width="80" height="23">Atas Nama</td>
                                                          <td width="80" height="23">Prodi</td>
                                                          <td width="80" height="23">Tanggal Terkirim</td>
                                                        </tr>
                                                      
<?php 
    foreach ($suratkeluar->result() as $rows1) {
?>
                                                        <tr>
                                                          <td style="border-bottom:1pt solid black;"><?= $rows1->no_surat_keluar?></td>
                                                          <td style="border-bottom:1pt solid black;"><?= $rows1->hal?></td>
                                                          <td style="border-bottom:1pt solid black;"><?= $rows1->atas_nama?></td>
                                                          <td style="border-bottom:1pt solid black;"><?= $rows1->prodi?></td>
                                                          <td style="border-bottom:1pt solid black;"><?= $rows1->cdate?></td>
                                                        </tr>
  
                     
<? } ?> 
                                                        
                                            
  
</table>

<?php }?>


<?php if ($this->input->post ('jenis') == 'Surat Masuk') { ?>

<table width="727" height="154" border="0" cellspacing="3" cellpadding="10" align="center">
                                                      <tr align="center" bgcolor="#99ddff">
                                                        <td width="90" height="23">No Surat</td>
                                                        <td width="90" height="23">Hal</td>
                                                        <td width="90" height="23">Ditujukan</td>
                                                        <td width="80" height="23">Tanggal Masuk</td>
                                                      </tr>
                                            <?php 
    
    foreach ($suratmasuk->result() as $rows2) {
?>
                                            
                                                        <tr>
                                                        <td style="border-bottom:1pt solid black;"><?= $rows2->no_surat?></td>
                                                        <td style="border-bottom:1pt solid black;"><?= $rows2->hal?></td>
                                                        <td style="border-bottom:1pt solid black;"><?= $rows2->tujukan?></td>
                                                        <td style="border-bottom:1pt solid black;"><?= $rows2->cdate?></td>
                                                        </tr>
  
                     
                                            <? } ?> 
                                                        
  
</table>

<?php }?>
<br />
  Tanggal Cetak &nbsp;&nbsp;:&nbsp;<?php
$today = date("d F Y");                         // 03.10.01
echo $today;
?>


</body>
</html>