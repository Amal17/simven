<i class="glyphicon glyphicon-repeat"></i> <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Tambah Data Barang</h1>
    </div>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <!-- /.box -->

      <div class='box box-primary'>
        <div class='box-header with-border'>
          <h3 class='box-title'>Form Data Barang</h3>
        </div>
        <!-- /.box-header -->
        <div class='box-body'>
        <form class='form-horizontal' action='<?php echo base_url('Barang/tambah'); ?>' method='post' enctype='multipart/form-data'>
          <div class='box-body'>
            <div class='form-group'>
              <label class='col-sm-2 control-label'>Nama Barang</label>
              <div class='col-md-3'>
                <input type='text' name='nama_barang' id='nama_barang' class='form-control' required="" placeholder='Masukkan Nama Barang'>
              </div>
            </div>

            <div class='form-group'>
              <label class='col-sm-2 control-label'>Satuan</label>
              <div class='col-md-3'>
                <select class='form-control' required="" name='satuan'>
                  <option value="Item">Item</option>
                  <option value="Buah">Buah</option>
                  <option value="Pak">Pak</option>
                </select>
              </div>
            </div>

            <div class='form-group'>
              <label class='col-sm-2 control-label'>Kategori</label>
              <div class='col-md-7'>
                <input type='radio' name='kategori' required="" id='nama_barang' class='radio-inline' value='habis'>Habis</input>
                <input type='radio' name='kategori' required="" id='nama_barang' class='radio-inline' value='tidak habis'>Tidak Habis</input>
              </div>
            </div>

            <div class='form-group'>
              <label class='col-sm-2 control-label'>Merk</label>
              <div class='col-md-5'>
                <input type='text' name='merk' id='merk' class='form-control' required="" placeholder='Merk'>
              </div>
            </div>

            <div class='form-group'>
              <label class='col-sm-2 control-label'>Spek</label>
              <div class='col-md-5'>
                <input type='text' name='spek' id='spek' class='form-control' required="" placeholder='Spek'>
              </div>
            </div>

          <!-- /.box-body -->
          <div class='box-footer'>
            <button type='reset' class='btn btn-primary' name='reset'><i class="glyphicon glyphicon-repeat"></i> Reset</button>
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
           <h3 class='box-title'>Tabel Data Barang</h3>
        </div>
        <!-- /.box-header -->
        <div class='box-body'>
          <table id='example1' class='table table-bordered table-striped'>
            <thead>
            <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Merk</th>
            <th>Spek</th>
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
            <td><?php echo $r['nama_barang'] ?></td>
            <td><?php echo $r['satuan'] ?></td>
            <td><?php echo $r['kategori'] ?></td>
            <td><?php echo $r['jumlah'] ?></td>
            <td><?php echo $r['merk'] ?></td>
            <td><?php echo $r['spek'] ?></td>
            <td>
                <a 
                    href="javascript:;"
                    data-id="<?php echo $r['id_jenisbarang'] ?>"
                    data-nama="<?php echo $r['nama_barang'] ?>"
                    data-satuan="<?php echo $r['satuan'] ?>"
                    data-kategori="<?php echo $r['kategori'] ?>"
                    data-jumlah="<?php echo $r['jumlah'] ?>"
                    data-merk="<?php echo $r['merk'] ?>"
                    data-spek="<?php echo $r['spek'] ?>"
                    data-toggle="modal" data-target="#edit-data">
                    <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
                </a>
	            <a 
                    href="javascript:;"
                    data-id="<?php echo $r['id_jenisbarang'] ?>"
                    data-toggle="modal" data-target="#hapus-data">
                    <button  data-toggle="modal" data-target="#delete-data" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                </a>
            </td>
            </tr>

            <?php $i++; } ?>

            </tbody>
            <tfoot>
            <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Merk</th>
            <th>Spek</th>
            <th>Aksi</th>
            </tr>
            </tfoot>
          </table>
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
                <h4 class="modal-title">Ubah Data Barang</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('Barang/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Nama Barang</label>
                          <div class="col-lg-10">
                              <input type="hidden" id="id_jenisbarang" name="id_jenisbarang">
                              <input type="text" class="form-control" required="" id="nama_barang" name="nama_barang" placeholder="Nama Barang">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Satuan</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" required="" id="satuan" name="satuan" placeholder="Satuan" readonly="true">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-lg-2 col-sm-2 control-label">Kategori</label>
                          <div class="col-lg-10">
                              <input type="text" class="form-control" required="" id="kategori" name="kategori" placeholder="Kategori" readonly="true">
                          </div>
                      </div>
                      <div class='form-group'>
                        <label class='col-sm-2 control-label'>Merk</label>
                        <div class='col-md-10'>
                          <input type='text' name='merk' id='merk' class='form-control' required="" placeholder='Merk'>
                        </div>
                      </div>

                      <div class='form-group'>
                        <label class='col-sm-2 control-label'>Spek</label>
                        <div class='col-md-10'>
                          <input type='text' name='spek' id='spek' class='form-control' required="" placeholder='Spek'>
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
            modal.find('#id_jenisbarang').attr("value",div.data('id'));
            modal.find('#nama_barang').attr("value",div.data('nama'));
            modal.find('#satuan').attr("value",div.data('satuan'));
            modal.find('#kategori').attr("value",div.data('kategori'));
            modal.find('#merk').attr("value",div.data('merk'));
            modal.find('#spek').attr("value",div.data('spek'));
        });
    });
</script>

<!-- Modal Hapus-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Hapus Data Barang</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('Barang/hapus/') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                <h3>Anda Yakin Ingin Menghapus Data Barang Ini?</h3>
                      <div class="form-group">
                          <div class="col-lg-10">
                              <input type="hidden" id="id_jenisbarang" name="id_jenisbarang">
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
            modal.find('#id_jenisbarang').attr("value",div.data('id'));            
        });
    });
</script>
