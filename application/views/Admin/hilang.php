<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Tambah Barang Hilang</h1>
    </div>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <!-- /.box -->

      <div class='box box-primary'>
        <div class='box-header with-border'>
          <h3 class='box-title'>Form Data Barang Hilang</h3>
        </div>
        <!-- /.box-header -->
        <div class='box-body'>
        <form class='form-horizontal' action='<?php echo base_url('Hilang/tambah'); ?>' method='post' enctype='multipart/form-data'>
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
            <button type='reset' class='btn btn-default'><i class="glyphicon glyphicon-remove"></i> Batal</button>
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
           <h3 class='box-title'>Tabel Data Barang Hilang</h3>
        </div>
        <!-- /.box-header -->
        <div class='box-body'>
          <table id='example1' class='table table-bordered table-striped'>
            <thead>
            <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
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
            </tr>

            <?php $i++; } ?>
                
            </tbody>
                <tfoot>
                <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
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