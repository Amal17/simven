<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Laporan Inventaris</h1>
    </div>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <!-- /.box -->
     <br>
                    <!-- /.box-header -->
                    <div class='box-body'>
                      <div class="table-responsive">
                      <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Ruang</th>
                        <th>Gedung</th>
                        <th>Jumlah</th>
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
                          <td><?php echo $r['nama_ruang'] ?></td>
                          <td><?php echo $r['nama_gedung'] ?></td>
                          <td><?php echo $r['jumlah'] ?> <?php echo $r['satuan'] ?></td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>

                        <tfoot>
                        <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Ruang</th>
                        <th>Gedung</th>
                        <th>Jumlah</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <br>
                        <a href="<?php echo base_url('Print_lapInventaris'); ?>" target="blank">
                            <button class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Cetak Laporan</button>
                        </a>
                   </div>
            <!-- /.col -->  
            </div>    
        </section>
                </div>
             </div>
          </div>
    </div>


  

