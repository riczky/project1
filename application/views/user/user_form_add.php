<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main Content -->
    <section class="content">
     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add Users</h3>

            <div class="pull-right">
              <a href="<?=site_url('user');?>" class="btn btn-flat"> 
                <i class="fa fa-undo"></i> Back
              </a>
            </div>
          </div>

          <div class="box-body">
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <!-- <?= validation_errors();?> -->
                 <form action="" method="post">
                   <div class="form-group <?=form_error('fullname')? 'has-error' : null?>">
                     <label for="name">Name *</label>
                     <input class="form-control" type="text" name="fullname" id="name" value="<?=set_value('fullname')?>"><?=form_error('fullname')?>
                   </div>
                   <div class="form-group <?=form_error('username')? 'has-error' : null?>">
                     <label for="username">Username *</label>
                     <input class="form-control" type="text" name="username" id="username" value="<?=set_value('username')?>"><?=form_error('username')?>
                   </div>
                   <div class="form-group <?=form_error('password')? 'has-error' : null?>">
                     <label for="password">Password *</label>
                     <input class="form-control" type="password" name="password" id="password" value="<?=set_value('password')?>"><?=form_error('password')?>
                   </div>
                   <div class="form-group <?=form_error('passconf')? 'has-error' : null?>">
                     <label for="passconf">Password Confirmation *</label>
                     <input class="form-control" type="password" name="passconf" id="passconf" value="<?=set_value('passconf')?>"><?=form_error('passconf')?>
                   </div>
                   <div class="form-group">
                     <label for="address">Address</label>
                     <textarea class="form-control" type="text" name="address" id="address"><?=set_value('address')?></textarea><?=form_error('address')?>
                   </div>
                   <div class="form-group <?=form_error('level')? 'has-error' : null?>">
                     <label for="level">Level *</label>
                     <select class="form-control" name="level" id="level">
                       <option value="">- Pilih -</option>
                       <option value="1" <?=set_value('level') == 1 ? "selected" : null?>>Admin</option>
                       <option value="2" <?=set_value('level') == 2 ? "selected" : null?>>Kasir</option>
                     </select><?=form_error('level')?>
                   </div>
                   <div class="form-group">
                   <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Save</button>
                   <button type="reset" class="btn btn-warning btn-flat">Reset</button>
                   </div>
                 </form>     
              </div>
            </div>

          </div>
        </div>

    </section>