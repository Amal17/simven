  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Tambah Data User</h1>
    </div>
</section>

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <!-- /.box -->

              <div class='box box-primary'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Form Data User</h3>
                </div>
                <!-- /.box-header -->
                <div class='box-body'>
                <form class='form-horizontal' action='<?php echo base_url('User/tambah'); ?>' method='post' enctype='multipart/form-data'>
                  <div class='box-body'>

                    <div class='form-group'>
                      <label for='inputPassword3' class='col-sm-2 control-label'>Username</label>
                      <div class='col-md-7'>
                        <input type='text' name='username' id='username' class='form-control' required="" placeholder='Masukkan Username'>
                      </div>
                    </div>

                    <div class='form-group'>
                      <label for='inputPassword3' class='col-sm-2 control-label'>Password</label>
                      <div class='col-md-7'>
                        <input type='password' name='password' id='password' class='form-control' required="" placeholder='Masukkan Password'>
                      </div>
                    </div>

                    <div class='form-group'>
                      <label for='inputPassword3' class='col-sm-2 control-label'>Nama</label>
                      <div class='col-md-7'>
                        <input type='text' name='nama' id='nama' class='form-control' required="" placeholder='Masukkan Nama'>
                      </div>
                    </div>

                    <div class='form-group'>
                          <label for='inputPassword3' class='col-sm-2 control-label'>Level</label>

                          <div class='col-md-5'>
                            <select class='form-control' required="" name='level'>
                              <option>Pilih Level</option>";
                              <option value='admin'>Admin</option>";
                              <option value='karyawan'>Karyawan</option>";
                            </select>
                          </div>
                        </div>

                    
                  <!-- /.box-body -->
                  <div class='box-footer'>
                    <a href="#"><button type='button' class='btn btn-default'><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
                    <button type='submit' class='btn btn-warning' name='tambahData'><i class="glyphicon glyphicon-save"></i> Simpan</button>
                  </div>
                  <!-- /.box-footer -->
                </div>
                </form>
              </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
                    <div class='box box-primary'>

                    <?php if($this->session->flashdata('message')){ ?>
                      <div class="box-body">
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Success!</strong> <?php echo $this->session->flashdata('message'); ?>
                        </div>
                      </div>
                    <?php } ?>

                    <?php if($this->session->flashdata('info')){ ?>
                      <div class="box-body">
                        <div class="alert alert-warning">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
                        </div>
                      </div>
                    <?php } ?>

                    <div class='box-header with-border'>
                    <h3 class='box-title'>Tabel Data User</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class='box-body'>
                      <div class="table-responsive">
                      <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                    <?php
                      $i = 1;
                      foreach ($data as $r) {
                    ?>

                    <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $r['username'] ?></td>
                    <td><?php echo $r['nama'] ?></td>
                    <td><?php echo $r['level'] ?></td>
                    <td>
                        <a 
                          href="javascript:;"
                          data-username="<?php echo $r['username'] ?>"
                          data-nama="<?php echo $r['nama'] ?>"
                          data-toggle="modal" data-target="#edit-data">
                          <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
                        </a>
                        <a 
                          href="javascript:;"
                          data-username="<?php echo $r['username'] ?>"
                          data-toggle="modal" data-target="#delete-data">
                          <button  data-toggle="modal" data-target="#hapus-data" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                        </a>
                    </td>
                    </tr>

                    <?php $i++; } ?>

                    </tbody>
                        <tfoot>
                        <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Aksi</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                   </div>
                 </div>
            <!-- /.col -->
          
        
                </div>
             </div>
             </section>
          </div>


    </div>
  </div>
</div>


  
    <!-- /.content -->


<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Ubah Data User</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('User/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Username</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" required="" id="username" name="username" placeholder="Username" readonly='true'>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Nama</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" required="" id="nama" name="nama" placeholder="Nama User">
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Password</label>
                          <div class="col-lg-10">
                              <input type="password" class="form-control" required="true" id="password" name="password" placeholder="Password Baru">
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-info" type="submit"><i class="glyphicon glyphicon-pencil"></i> Ubah&nbsp;</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</button>
                  </div>
                </form>
            </div>
        </div>
    </div>

<!-- END Modal Ubah -->

<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal  = $(this)

            // Isi nilai pada field
            modal.find('#username').attr("value",div.data('username'));
            modal.find('#nama').attr("value",div.data('nama'));
        });
    });
</script>

<!-- Modal Hapus -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="delete-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Hapus Data User</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('User/hapus') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                      <div class="form-group">
                        
                          <div class="col-lg-10">
                          <h4>Anda Yakin Akan Menghapus User Ini ?</h4>
                              <input type="hidden" class="form-control" required="" id="username" name="username">
                          </div>
                      </div>

                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-trash"></i> Hapus&nbsp;</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</button>
                  </div>
                </form>
            </div>
        </div>
    </div>

<!-- END Modal Ubah -->

<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#delete-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal  = $(this)

            // Isi nilai pada field
            modal.find('#username').attr("value",div.data('username'));
        });
    });
</script>