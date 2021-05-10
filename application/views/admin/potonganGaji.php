<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$title;?>
        <small>Take Home Pay</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i></a></li>
        <li class="active">Potongan Gaji</li>
      </ol>
    </section>

<!-- Main Content -->
    <section class="content">
      <?=$this->session->flashdata('pesan') ?>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Potongan Gaji</h3>

            <div class="pull-right">
              <a class="btn btn-success" href="<?=base_url('admin/potonganGaji/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
          </div>

          <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Jenis Potongan</th>
                  <th class="text-center">Jumlah Potongan</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
              <?php foreach($pot_gaji as $key => $p) : ?>
                <tr>
                    <td><?=$no++ ?></td>
                    <td><?=$p->potongan ?></td>
                    <td>Rp. <?= number_format($p->jml_potongan,0,',','.') ?></td>
                    <td>
                      <center>
                          <a class="btn btn-sm btn-primary" href="<?=base_url('admin/potonganGaji/updateData/'.$p->id) ?>"><i class="fas fa-edit"> Update</i></a>
                          <a onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger" href="<?=base_url('admin/potonganGaji/deleteData/'.$p->id) ?>"><i class="fas fa-trash"> Delete</i></a>
                        </center>
                    </td>         
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>


        </div>

    </section>





