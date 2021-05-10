<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title;?>
        <small>Take Home Pay</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i></a></li>
        <li class="active">Data Jabatan</li>
      </ol>
    </section>


     <!-- Main Content -->
    <section class="content">
      <?php $this->view('message') ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Jabatan</h3>

            <div class="pull-right">
              <a class="btn btn-success" href="<?=base_url('admin/dataJabatan/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
          </div>

          <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Jabatan</th>
                  <th>Gaji Pokok</th>
                  <th>Tj. Transport</th>
                  <th>Uang Makan</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
              <?php foreach($jabatan as $key => $j) : ?>
                <tr>
                  <td style="width: 5%;"><?=$no++?></td>
                  <td><?= $j->nama_jabatan ?></td>
                  <td>Rp. <?= number_format($j->gaji_pokok,0,',','.') ?></td>
                  <td>Rp. <?= number_format($j->tj_transport,0,',','.') ?></td>
                  <td>Rp. <?= number_format($j->uang_makan,0,',','.') ?></td>
                  <td>Rp. <?= number_format($j->gaji_pokok + $j->tj_transport + $j->uang_makan,0,',','.') ?></td>
                    <td>
                      <center>
                        <a class="btn btn-sm btn-primary" href="<?=base_url('admin/dataJabatan/updateData/'.$j->id_jabatan) ?>"><i class="fa fa-edit"></i>Update</a>
                        <a onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger" href="<?=base_url('admin/dataJabatan/deleteData/'.$j->id_jabatan) ?>"><i class="fa fa-trash"></i>Delete</a>
                      </center>
                    </td>         
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>


        </div>

    </section>
