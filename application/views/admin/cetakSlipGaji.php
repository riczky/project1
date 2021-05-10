<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title ;?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;

		}
		.test{
			display: none;
		}
	</style>
</head>
<body>
		
		<center>
			<h1>PPL Al-Tsaqafah</h1>
			<h2>Slip Gaji Pegawai</h2>
			<hr style="width: 50%; border-width: 5px;color: black;">
		</center>

		


		 <?php foreach($potongan as $p){
		 	$potongan=$p->jml_potongan;
		 	// echo "$potongan";
		 } ?>
		 	
		 
		 <?php foreach($print_slip as $ps): ?>

		 	<?php $potongan_gaji = $ps->alpha * $potongan; ?>


		 <table style="widows: 100%;font-weight: bold;">
		 	<tr>
		 		<td width="70%">Nama Pegawai</td>
		 		<td width="2%">:</td>
		 		<td><?=$ps->nama_pegawai; ?></td>
		 	</tr>
		 	<tr>
		 		<td>NIK</td>
		 		<td>:</td>
		 		<td><?=$ps->nik; ?></td>
		 	</tr>
		 	 <tr>
		 		<td>Nama Jabatan</td>
		 		<td>:</td>
		 		<td><?=$ps->nama_jabatan; ?></td>
		 	</tr>
		 	<tr>
		 		<td>Bulan</td>
		 		<td>:</td>
		 		<td><?=substr($ps->bulan, 0,2 )  ; ?></td>
		 	</tr>
		 	<tr>
		 		<td>Tahun</td>
		 		<td>:</td>
		 		<td><?=substr($ps->bulan, 2,4 )  ; ?></td>
		 	</tr>
		 </table>

		 <table class="table table-bordered table-striped mt-3">
		 	<tr>
		 		<th width="5%" class="text-center">No</th>
		 		<th>Keterangan</th>
		 		<th>Jumlah</th>
		 	</tr>
		 	
		 	<tr>
		 		<td>1</td>
		 		<td>Gaji Pokok</td>
		 		<td>Rp. <?= number_format($ps->gaji_pokok,0,',','.')  ?></td>
		 	</tr>
		 	
		 	 <tr>
		 		<td>2</td>
		 		<td>Tunjangan Transport</td>
		 		<td>Rp. <?= number_format($ps->tj_transport,0,',','.')  ?></td>
		 	</tr>
		 	
		 	 <tr>
		 		<td>3</td>
		 		<td>Uang Makan</td>
		 		<td>Rp. <?= number_format($ps->uang_makan,0,',','.')  ?></td>
		 	</tr>

		 	<tr>
		 		<td>4</td>
		 		<td>Potongan</td>
		 		<td>Rp. <?= number_format($potongan_gaji,0,',','.')  ?></td>
		 	</tr>

		 	<tr>
		 		<td colspan="2" style="text-align: right;font-weight: bold">Total Gaji</td>
		 		<td style="font-weight: bold">Rp. <?= number_format($ps->gaji_pokok + $ps->tj_transport + $ps->uang_makan - $potongan_gaji,0,',','.')  ?></td>
		 	</tr>
		 </table>

		 <table width="100%">
		 	<tr>
		 		<td></td>
		 		<td>
		 			<p>Pegawai</p>
		 			<br><br><br>
		 			<p class="font-weight-bold"><?=$ps->nama_pegawai ?></p>
		 		</td>

		 		<td width="200px">
		 			<p>Jakarta, <?=date('d M Y') ?> <br> Keuangan,</p>
		 			<br><br><br>
		 			<p>___________________________</p>
		 		</td>

		 	</tr>
		 	
		 </table>

		<?php endforeach ?>

</body>
</html>


<script type="text/javascript">
	window.print();
</script>