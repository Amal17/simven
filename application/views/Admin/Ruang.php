  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Tambah Data Ruang</h1>
    </div>
</section>

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <!-- /.box -->

              <div class='box box-primary'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Form Data Ruang</h3>
                </div>
                <!-- /.box-header -->
                <div class='box-body'>
                <form class='form-horizontal' action='<?php echo base_url('Ruang/tambah'); ?>' method='post' enctype='multipart/form-data'>
                  <div class='box-body'>
                    
                     <div class='form-group'>
                          <label for='inputPassword3' class='col-sm-2 control-label'>Nama Gedung</label>

                          <div class='col-md-5'>
                            <select class='form-control' required="" name='nama_gedung'>
                              <?php 
                              foreach ($dataGedung as $gedung) {
                              ?>
                              <option value='<?php echo $gedung['id_gedung']?>'><?php echo $gedung['nama_gedung']?></option>";
                              <?php } ?>
                            </select>
                          </div>
                      </div>

                    <div class='form-group'>
                      <label for='inputPassword3' class='col-sm-2 control-label'>Nama Ruang</label>
                      <div class='col-md-5'>
                        <input type='text' name='nama_ruang' id='nama_ruang' class='form-control' required="" placeholder='Masukkan Nama Ruang'>
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
                <!-- /.box-body -->
              </div>
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
                        <h3 class='box-title'>Tabel Data Ruang</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class='box-body'>
                      <div class="table-responsive">
                      <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Gedung</th>
                        <th>Nama Ruang</th>
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
                    <td><?php echo $r['nama_gedung'] ?></td>
                    <td><?php echo $r['nama_ruang'] ?></td>
                    <td><?php if ($r['nama_gedung'] !== 'Virtual') {
                                  echo '
                        <a 
                            href="javascript:;"
                            data-id="'.$r['id_ruang'].'"
                            data-idgedung="'.$r['id_gedung'].'"
                            data-gedung="'.$r['nama_gedung'].'"
                            data-ruang="'.$r['nama_ruang'].'"
                            data-toggle="modal" data-target="#edit-data">
                            <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
                        </a>
                        <a 
                            href="javascript:;"
                            data-id="'.$r['id_ruang'].'"
                            data-toggle="modal" data-target="#hapus-data">
                            <button  data-toggle="modal" data-target="#delete-data" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                        </a>';

                        } ?>
                        
	                  </td>
                    </tr>

                    <?php $i++; } ?>
                    
                    </tbody>
                        <tfoot>
                        <tr>
                        <th>No</th>
                        <th>Nama Gedung</th>
                        <th>Nama Ruang</th>
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
                <h4 class="modal-title">Ubah Data Ruang</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('Ruang/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Nama Gedung</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" required="" id="nama_gedung" name="nama_gedung" placeholder="Nama Gedung" readonly='true'>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Nama Ruang</label>
                          <div class="col-lg-10">
                              <input type="hidden" id="id_ruang" name="id_ruang">
                              <input type="hidden" id="id_gedung" name="id_gedung">
                              <input type="text" class="form-control" required="" id="nama_ruang" name="nama_ruang" placeholder="Nama Ruang">
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
            modal.find('#id_ruang').attr("value",div.data('id'));
            modal.find('#id_gedung').attr("value",div.data('idgedung'));
            modal.find('#nama_gedung').attr("value",div.data('gedung'));
            modal.find('#nama_ruang').attr("value",div.data('ruang'));
        });
    });
</script>

<!-- Modal Hapus-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Hapus Data Ruang</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('Ruang/hapus/') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                <h3>Anda Yakin Ingin Menghapus Data Ruang Ini?</h3>
                      <div class="form-group">
                          <div class="col-lg-10">
                              <input type="hidden" id="id_ruang" name="id_ruang">
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
            modal.find('#id_ruang').attr("value",div.data('id'));            
        });
    });
</script>

