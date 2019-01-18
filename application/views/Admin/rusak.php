<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Tambah Data Barang Rusak</h1>
    </div>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <!-- /.box -->

      <div class='box box-primary'>
        <div class='box-header with-border'>
          <h3 class='box-title'>Form Data Barang Rusak</h3>
        </div>
        <!-- /.box-header -->
        <div class='box-body'>
        <form class='form-horizontal' action='<?php echo base_url('Rusak/tambah'); ?>' method='post' enctype='multipart/form-data'>
          <div class='box-body'>

            <div class='form-group'>
              <label class='col-sm-2 control-label'>Nama Barang</label>

              <div class='col-md-5'>
                <select class='form-control' required="" name='nama_barang'>
                    <?php 
                    foreach ($dataBarang as $barang) {
                    ?>
                    <option value='<?php echo $barang['id_barang']; ?>'><?php echo $barang['nama_barang']; ?></option>";
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class='form-group'>
              <label class='col-sm-2 control-label'>Jumlah</label>
              <div class='col-md-5'>
                <input type='text' name='jumlah' id='jumlah' class='form-control' required="" placeholder='Jumlah'>
              </div>
            </div>

          <!-- /.box-body -->
          <div class='box-footer'>
          <div class='col-md-9'>
            <a href="#"><button type='button' class='btn btn-default'><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
            <button type='submit' class='btn btn-warning' name='tambahData'><i class="glyphicon glyphicon-save"></i> Simpan</button>
          </div>
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
           <h3 class='box-title'>Tabel Data Barang Rusak</h3>
        </div>
        <!-- /.box-header -->
        <div class='box-body'>
          <table id='example1' class='table table-bordered table-striped'>
            <thead>
            <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            
            <?php 
            $i = 1;
            foreach ($data as $r) {
            ?>
            
            <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $r['nama_barang']; ?></td>
            <td><?php echo $r['jumlah']; ?></td>
            
            <td>
              <a 
                  href="javascript:;"
                  data-id="<?php echo $r['id_penempatan'] ?>"
                  data-jumlah="<?php echo $r['jumlah'] ?>"
                  data-barang="<?php echo $r['id_barang'] ?>"
                  data-toggle="modal" data-target="#hapus-data">
                  <button  data-toggle="modal" data-target="#delete-data" class="btn btn-primary"><i class="glyphicon glyphicon-move"></i> Keluarkan</button>
              </a>
            </td>
            </tr>

            <?php $i++; } ?>
                
            </tbody>
                <tfoot>
                <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
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

<!-- Modal Hapus-->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="hapus-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Gudangkan barang</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('Rusak/hapus') ?>" method="post" enctype="multipart/form-data" role="form">
              <div class="modal-body">
                <h3>Anda Yakin Ingin Mengembalikan Barang Ini ke Gudang ?</h3>
                      <div class="form-group">
                          <div class="col-lg-10">
                              <input type="hidden" id="id_penempatan" name="id_penempatan">
                              <input type="hidden" id="id_barang" name="id_barang">
                              <input type="hidden" id="jumlah" name="jumlah">
                          </div>
                      </div>

                      <div class='form-group'>
                        <label class='col-sm-2 control-label'>Jumlah</label>
                        <div class='col-md-5'>
                          <input type='text' name='jumlah_keluar' id='jumlah_keluar' class='form-control' required="" placeholder='Jumlah'>
                        </div>
                      </div>
                      
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-move"></i> Keluarkan&nbsp;</button>
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
            modal.find('#id_penempatan').attr("value",div.data('id'));
            modal.find('#id_barang').attr("value",div.data('barang'));
            modal.find('#jumlah').attr("value",div.data('jumlah'));       
        });
    });
</script>