<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Laporan Peminjaman</h1>
    </div>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
     <br>
            <form role="form" method="POST" action="<?php echo base_url('LapPeminjaman/setTanggal'); ?>">
                <div class="col-md-2 control-label">
                <label>Tanggal Awal</label> 
                </div>
                <div class="col-md-3">
                <input class='form-control' required="" name="tgl_awal" type="date" value="<?php 
                    if(isset($tgl_awal)){
                        echo $tgl_awal;
                    }
                ?>">
                </div><br><br>
                <div class="col-md-2 control-label">
                <label>Tanggal Akhir</label> 
                </div>
                <div class="col-md-3">
                <input class='form-control' required="" name="tgl_akhir" type="date" value="<?php 
                    if(isset($tgl_akhir)){
                        echo $tgl_akhir;
                    }
                ?>" >
                </div><br><br>
                <div class="box-footer">
                <a href="<?php echo base_url('LapPeminjaman/resetTanggal'); ?>"><button type='button' class='btn btn-warning pull-center'><i class="glyphicon glyphicon-list-alt"></i> Tampilkan semua</button></a>    
                <button type='submit' class='btn btn-info pull-center' name='settangal'><i class="glyphicon glyphicon-filter"></i> Filter</button>
                </div><br>
            </form>
                    <!-- /.box-header -->
                    <div class='box-body'>
                    <div class="table-responsive">
                      <table id='example1' class='table table-bordered table-striped'>
                        <thead>
                        <tr>
                        <th>Kode peminjaman</th>
                        <th>Nama Barang</th>
                        <th>Tempat</th>
                        <th>Jumlah</th>
                        <th>Tgl pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Keperluan</th>
                        <th>Peminjam</th>
                        <th>Karyawan</th>
                        <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                      foreach ($data as $r) {
                    ?>
                          <tr>
                    <td><?php echo $r['id_peminjaman'] ?></td>
                    <td><?php echo $r['nama_barang'] ?></td>
                    <td><?php echo $r['nama_ruang'] ?></td>
                    <td><?php echo $r['jumlah'] ?></td>
                    <td><?php echo $r['tanggal'] ?></td>
                    <td><?php echo $r['lama_pinjam'] ?></td>
                    <td><?php echo $r['keperluan_pinjam'] ?></td>
                    <td><?php echo $r['nama'] ?></td>
                    <td><?php echo $r['username'] ?></td>
                    <td><?php if ($r['kembali']=='Y') {
                                    echo "Sudah kembali";
                              }else{
                                    echo "Belum kembali";
                              } ?></td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                        <tfoot>
                        <tr>
                        <th>Kode peminjaman</th>
                        <th>Nama Barang</th>
                        <th>Tempat</th>
                        <th>Jumlah</th>
                        <th>Tgl pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Keperluan</th>
                        <th>Peminjam</th>
                        <th>Karyawan</th>
                        <th>Status</th>
                        </tr>
                        </tfoot>
                      </table>
                  </div>
                  <br>
                      <form role="form" method="POST" action="<?php echo base_url('Print_lapPeminjaman'); ?>">
                    <input name="tg_awal" type="hidden" value="<?php 
                        if(isset($tgl_awal)){
                            echo $tgl_awal;
                        }else{
                            echo "0000-00-00";
                        }
                    ?>" >
                    <input name="tg_akhir" type="hidden" value="<?php 
                        if(isset($tgl_akhir)){
                            echo $tgl_akhir;
                        }else{
                            echo "9999-12-31";
                        }
                    ?>" >
                    <button name="submit" class="btn btn-success" type="submit" formtarget="_blank"><i class="glyphicon glyphicon-print"></i> Cetak Laporan</button>
                </form>                    
            </div>

                   </div>
            <!-- /.col -->
          
        </section>
                </div>
             </div>
          </div>


    </div>


  

