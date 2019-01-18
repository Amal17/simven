  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Tambah Data Pemasok</h1>
    </div>
</section>

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <!-- /.box -->

              <div class='box box-primary'>

                <div class='box-header with-border'>
                  <h3 class='box-title'>Form Data Pemasok</h3>
                </div>
                <!-- /.box-header -->
                <div class='box-body'>
                <form class='form-horizontal' action='<?php echo base_url('Pemasok/tambah'); ?>' method='post' enctype='multipart/form-data'>
                    <div class='form-group'>
                      <label for='inputPassword3' class='col-sm-2 control-label'>Nama Pemasok</label>
                      <div class='col-md-7'>
                        <input type='text' name='nama_pemasok' id='nama_pemasok' class='form-control' required="" placeholder='Masukkan Nama Pemasok'>
                      </div>
                    </div>

                    <div class='form-group'>
                      <label for='inputPassword3' class='col-sm-2 control-label'>Penanggung Jawab</label>
                      <div class='col-md-7'>
                        <input type='text' name='penanggung_jawab' id='penanggung_jawab' class='form-control' required="" placeholder='Masukkan Nama Penanggung Jawab'>
                      </div>
                    </div>

                    <div class='form-group'>
                      <label for='inputPassword3' class='col-sm-2 control-label'>Alamat</label>
                      <div class='col-md-7'>
                        <input type='text' name='alamat' id='alamat' class='form-control' required="" placeholder='Masukkan Alamat'>
                      </div>
                    </div>

                     <div class='form-group'>
                      <label for='inputPassword3' class='col-sm-2 control-label'>Kota</label>
                      <div class='col-md-7'>
                        <input type='text' name='kota' id='kota' class='form-control' required="" placeholder='Masukkan Kota'>
                      </div>
                    </div>

                    <div class='form-group'>
                        <label for='inputPassword3' class='col-sm-2 control-label'>No Telepon</label>
                        <div class='col-md-7'>
                          <input type='text' name='telp' id='telp' class='form-control' required="" placeholder='Masukkan No Telpon'>
                        </div>
                    </div>

                    <div class='form-group'>
                      <label for='inputPassword3' class='col-sm-2 control-label'>Email</label>
                      <div class='col-md-7'>
                        <input type='text' name='email' id='email' class='form-control' required="" placeholder='Masukkan Email'>
                      </div>
                    </div>

                  <!-- /.box-body -->
                  <div class='box-footer'>
                    <a href="#"><button type='button' class='btn btn-default'><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
                    <button type='submit' class='btn btn-warning' name='tambahData'><i class="glyphicon glyphicon-save"></i> Simpan</button>
                  </div>
                  <!-- /.box-footer -->
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
                        <h3 class='box-title'>Tabel Data Pemasok</h3>
                        </div>
                    <!-- /.box-header -->
                    <div class='box-body'>
                      <div class="table-responsive">
                      <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Pemasok</th>
                        <th>Penanggung Jawab</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>No Telepon</th>
                        <th>Email</th>
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
                    <td><?php echo $r['nama_pemasok'] ?></td>
                    <td><?php echo $r['penanggung_jawab'] ?></td>
                    <td><?php echo $r['alamat'] ?></td>
                    <td><?php echo $r['kota'] ?></td>
                    <td><?php echo $r['no_telp'] ?></td>
                    <td><?php echo $r['email'] ?></td>
                    <td>
                        <a
                          href="javascript:;"
                          data-id="<?php echo $r['id_pemasok'] ?>"
                          data-pemasok="<?php echo $r['nama_pemasok'] ?>"
                          data-pj="<?php echo $r['penanggung_jawab'] ?>"
                          data-alamat="<?php echo $r['alamat'] ?>"
                          data-kota="<?php echo $r['kota'] ?>"
                          data-telp="<?php echo $r['no_telp'] ?>"
                          data-email="<?php echo $r['email'] ?>"
                          data-toggle="modal" data-target="#edit-data">
                          <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
                        </a>
	                      <a
                          href="javascript:;"
                          data-id="<?php echo $r['id_pemasok'] ?>"
                          data-toggle="modal" data-target="#hapus-data">
                          <button  data-toggle="modal" data-target="#delete-data" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                        </a>
	                  </td>
                    </tr>

                    <?php $i++;} ?>

                    </tbody>
                        <tfoot>
                        <tr>
                        <th>No</th>
                        <th>Nama Pemasok</th>
                        <th>Penanggung Jawab</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>No Telepon</th>
                        <th>Email</th>
                        <th width='20%'>Aksi</th>
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
                <h4 class="modal-title">Ubah Data Pemasok</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('Pemasok/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Nama Pemasok</label>
                          <div class="col-lg-10">
                              <input type="hidden" class="form-control" id="id" name="id">
                              <input type="text" class="form-control hidden" required="" id="pemasok" name="pemasok" placeholder="Nama Pemasok">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Penanggung Jawab</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" required="" id="pj" name="pj" placeholder="Nama Penanggung Jawab">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" required="" id="alamat" name="alamat" placeholder="Alamat Pemasok">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Kota</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" required="" id="kota" name="kota" placeholder="Kota Pemasok">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">No Telpon</label>
                          <div class="col-lg-10">
                            <input type='text' name='telp' id='telp' class='form-control' required="" placeholder='Masukkan No Telpon'>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Email</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" required="" id="email" name="email" placeholder="Email">
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
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#pemasok').attr("value",div.data('pemasok'));
            modal.find('#pj').attr("value",div.data('pj'));
            modal.find('#alamat').attr("value",div.data('alamat'));
            modal.find('#kota').attr("value",div.data('kota'));
            modal.find('#telp').attr("value",div.data('telp'));
            modal.find('#email').attr("value",div.data('email'));
        });
    });
</script>

<!-- Modal Hapus-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Hapus Data Pemasok</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('Pemasok/hapus/') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                <h3>Anda Yakin Ingin Menghapus Data Pemasok Ini?</h3>
                      <div class="form-group">
                          <div class="col-lg-10">
                              <input type="hidden" id="id_pemasok" name="id_pemasok">
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

<!-- END Modal Hapus-->

<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#hapus-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal  = $(this)

            // Isi nilai pada field
            modal.find('#id_pemasok').attr("value",div.data('id'));
        });
    });
</script>

