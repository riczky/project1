<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title;?>
        <small>Take Home Pay</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i></a></li>
        <li class="active">Data Pegawai</li>
      </ol>
    </section>


    <!-- Main Content -->
    <section class="content">
      <?php $this->view('message') ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Pegawai</h3>

            <div class="pull-right">
              <a class="btn btn-success" href="<?=base_url('admin/dataPegawai/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
          </div>

          <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIK</th>
                  <th>Nama Karyawan</th>
                  <th>Jenis Kelamin</th>
                  <th>Jabatan</th>
                  <th>Tanggal Masuk</th>
                  <th>Status</th>
                  <th>Photo</th>
                  <th>Hak Akses</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
              <?php foreach($pegawai as $key => $p) : ?>
                <tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td><?=$p->nik?></td>
                  <td><?=$p->nama_pegawai ?></td>
                  <td><?=$p->jenis_kelamin ?></td>
                  <td><?=$p->jabatan ?></td>
                  <td><?=$p->tanggal_masuk ?></td>
                  <td><?=$p->status ?></td>
                  <td><img src="<?=base_url().'assets/photo/'.$p->photo?>" width="75px"></td>
                  <?php if($p->hak_akses=='1'){ ?>
                    <td>Admin</td>
                  <?php }else{ ?>
                    <td>Pegawai</td>
                  <?php } ?>
                    <td>
                       <center>
                        <a class="btn btn-sm btn-primary" href="<?=base_url('admin/dataPegawai/updateData/'.$p->id_pegawai) ?>"><i class="fa fa-edit"> Update</i></a>
                        <a onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger" href="<?=base_url('admin/dataPegawai/deleteData/'.$p->id_pegawai) ?>"><i class="fa fa-trash"> Delete</i></a>
                       </center>
                   </td>         
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>


        </div>

    </section>
