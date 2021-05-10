<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>   


  		<div class="card">
  			<div class="card-header bg-success text-white">
  				Filter Data Absensi Pegawai
  			</div>
  			<div class="card-body">
  				<form class="form-inline">
  					<div class="form-group mb-2">
  						<label>Bulan: </label>
  						<select class="form-control ml-2" name="bulan">
  							<option value="">-- Pilih Bulan --</option>
  							<option value="01">Januari</option>
  							<option value="02">Februari</option>
  							<option value="03">Maret</option>
  							<option value="04">April</option>
  							<option value="05">Mei</option>
  							<option value="06">Juni</option>
  							<option value="07">Juli</option>
  							<option value="08">Agustus</option>
  							<option value="09">September</option>
  							<option value="10">Oktober</option>
  							<option value="11">November</option>
  							<option value="12">Desember</option>
  						</select>
  					</div>	

  					<div class="form-group mb-2 ml-5">
  						<label>Tahun: </label>
  						<select class="form-control ml-2" name="tahun">
  							<option value="">-- Pilih Tahun --</option>
  							<?php $tahun = date('Y');
  							for($i=2021;$i<$tahun+8;$i++){ ?>
	  							<option value="<?=$i ?>"><?=$i ?></option>
  							<?php } ?>
  						</select>
  					</div>	
  					<button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
  					<a href="<?=base_url('admin/dataAbsensi/inputAbsensi') ?>" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i> Input Kehadiran</a>
  				</form>
  			</div>
  		</div>

  		<?php 
	  		if((isset($_GET['bulan']) && $_GET['bulan'] !='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
	  			$bulan = $_GET['bulan'];
	  			$tahun = $_GET['tahun'];
	  			$bulantahun = $bulan.$tahun;
	  		}else{
	  			$bulan = date('m');
	  			$tahun = date('Y');
	  			$bulantahun  = $bulan.$tahun;
	  		}
  		?>

  		<div class="alert alert-info mt-5">
  			Menampilkan Data Kehadiran Bulan: <span class="font-weight-bold"><?=$bulan; ?></span> Tahun: <span class="font-weight-bold"><?=$tahun; ?></span>
  		</div>

  		  <?php 
  			$jml_data = count($absensi);
  			if ($jml_data > 0) { ?>


  		<table class="table table-bordered table-striped">
  			<tr>
  				<td class="text-center">No.</td>
  				<td class="text-center">NIK</td>
  				<td class="text-center">Nama Pegawai</td>
  				<td class="text-center">Jenis Kelamin</td>
  				<td class="text-center">Jabatan</td>
  				<td class="text-center">Hadir</td>
  				<td class="text-center">Sakit</td>
  				<td class="text-center">Alpha</td>
  			</tr>

  			<?php $no=1; foreach($absensi as $a): ?>
  				<tr>
  					<td><?=$no++ ?></td>
  					<td><?=$a->nik ?></td>
  					<td><?=$a->nama_pegawai ?></td>
  					<td><?=$a->jenis_kelamin ?></td>
  					<td><?=$a->nama_jabatan ?></td>
  					<td><?=$a->hadir ?></td>
  					<td><?=$a->sakit ?></td>
  					<td><?=$a->alpha ?></td>
  				</tr>
  			<?php endforeach; ?>
  		</table>
  		<?php }else{ ?>
  			<span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data masih kosong, silahkan input data kehadiran pada bulan dan tahun yang anda pilih.</span>
  		<?php } ?>
</div>
