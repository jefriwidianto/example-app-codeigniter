<html>
<head>
    <title>Cetak PDF</title>
</head>
<body>

<?php                                                        
    foreach ($siswa->result() as $data) {
?>

<style type="text/css">
h5{
   font-weight: normal;
}

</style>

<p style="text-align:justify;"><img src='uploads/gambar/UPI.png' width="150" height="180" style="float:left;" /><h2 style="text-align: center;">UNIVERSITAS PENDIDIKAN INDONESIA
<br>SEKOLAH PASCASARJANA
<br>MAGISTER MANAJEMEN BISNIS (M2B) & DOKTOR ILMU MANAJEMEN (DIM)
<h5>Jl. Dr. Setiabudhi No.229, Cidadap, Isola, Sukasari, Kota Bandung, Jawa Barat 40154 Telp. (022)2021405
<br> Fax. (022)2021405 E-mail : sps_mmb@upi.redu - Website : http://sps.upi.org</h5>
</h2>
<hr/>
</p>


<?php
$d=strtotime($data->cdate);
?>

<h5 style="text-align: right;"><?php echo "Bandung, " . date("d F Y", $d)?></h5>
<p>No.&nbsp;Surat : <?php echo $data->no_surat_keluar?>
<br>Prihal &nbsp; &nbsp; &nbsp; : <?php echo $data->hal?></p>

<p><strong>Kepada Yth,<br><?php echo $data->atas_nama?>
<br><?php echo $data->prodi?></strong></p>

<p>Assalamualaikum Wr. Wb.</p>

<p style="text-align: justify;"><?php echo $data->isi_surat?></p>


<p style="text-align: justify;">Demikian surat ini kami sampaikan, atas perhatian dan kerjasamanya kami yang baik, kami ucapkan banyak terimakasih.</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table align="right" border="0" bgcolor="white">
	<tr>
		<td align="center">Kepala Prodi <?php ?></td>
	</tr>
	<tr>
		<td align="center" height="50"></td>
	</tr>
	<tr>
		<td align="center"><span style="text-decoration: underline;"><?php echo $data->nm_user?></span></td>
	</tr>
	<tr>
		<td align="center"><?php echo $data->nik?></td>
	</tr>
</table>

<?php } ?>

</body>
</html>
