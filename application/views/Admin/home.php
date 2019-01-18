  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perancangan Sistem Inventaris
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <p><center><h1><?php echo $data['barang']; ?></h1></center></p>
              <p><center><h4>Barang</h4></center></p>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#detil-barang">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <p><center><h1><?php echo $data['gedung']; ?></h1></center></p>
              <p><center><h4>Gedung</h4></center></p>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#detil-gedung">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <p><center><h1><?php echo $data['ruang']; ?></h1></center></p>
              <p><center><h4>Ruang</h4></center></p>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#detil-ruang">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <p><center><h1><?php echo $data['pemasok']; ?></h1></center></p>
              <p><center><h4>Pemasok</h4></center></p>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#detil-pemasok">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <p><center><h1><?php echo $data['user']; ?></h1></center></p>
              <p><center><h4>User</h4></center></p>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#detil-user">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

<div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <p><center><h1><?php echo $data['peminjam']; ?></h1></center></p>
              <p><center><h4>Peminjam</h4></center></p>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#detil-peminjam">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

<div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <p><center><h1><?php echo $data['pengambilan']; ?></h1></center></p>
              <p><center><h4>Pengambilan</h4></center></p>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#detil-pengambilan">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <p><center><h1><?php echo $data['peminjaman']; ?></h1></center></p>
              <p><center><h4>Peminjaman</h4></center></p>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#detil-peminjaman">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <p><center><h1><?php echo $data['pengembalian']; ?></h1></center></p>
              <p><center><h4>Pengembalian</h4></center></p>
            </div>
            <a href="#" class="small-box-footer" data-toggle="modal" data-target="#detil-pengembalian">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
      <!-- /.row -->
      <!-- Main row -->
   
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal barang -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detil-barang" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header bg-aqua">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Data Barang</h4>
      </div>
        <div class='box-body'>
          <div class="table-responsive">
            <table id='example1' class='table table-bordered table-striped'>
              <thead>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
              </thead>
              <tbody>
                <?php 
                    foreach ($dBarang as $r) {
                ?>
                <tr>
                  <td><?php echo $r['nama_barang'] ?></td>
                  <td><?php echo $r['kategori'] ?></td>
                  <td><?php echo $r['jumlah'] ?> <?php echo $r['satuan'] ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>    
      </div>
    </div>
  </div>
</div>
<!-- END Modal barang -->

  <!-- Modal gedung -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detil-gedung" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header bg-orange">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Data Gedung</h4>
      </div>
        <div class='box-body'>
          <div class="table-responsive">
            <table id='tabelGedung' class='table table-bordered table-striped'>
              <thead>
                <th>No</th>
                <th>Nama Gedung</th>
              </thead>
              <tbody>
                <?php
                    $i = 1; 
                    foreach ($dGedung as $r) {
                ?>
                <tr>
                  <td><?php echo $i?></td>
                  <td><?php echo $r['nama_gedung'] ?></td>
                </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          </div>
      </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>    
      </div>
    </div>
  </div>
</div>
<!-- END Modal gedung -->

  <!-- Modal ruang -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detil-ruang" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header bg-aqua">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Data Ruang</h4>
      </div>
        <div class='box-body'>
          <div class="table-responsive">
            <table id='tabelRuang' class='table table-bordered table-striped'>
              <thead>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>Letak</th>
              </thead>
              <tbody>
                <?php 
                    $i =1;
                    foreach ($dRuang as $r) {
                ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $r['nama_ruang'] ?></td>
                  <td><?php echo $r['nama_gedung'] ?></td>
                </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          </div>
      </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>    
      </div>
    </div>
  </div>
</div>
<!-- END Modal ruang -->

  <!-- Modal pemasok -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detil-pemasok" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header bg-yellow">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Data Pemasok</h4>
      </div>
        <div class='box-body'>
          <div class="table-responsive">
            <table id='tabelPemasok' class='table table-bordered table-striped'>
              <thead>
                <th>Nama Pemasok</th>
                <th>Alamat</th>
                <th>Kota</th>
              </thead>
              <tbody>
                <?php 
                    foreach ($dPemasok as $r) {
                ?>
                <tr>
                  <td><?php echo $r['nama_pemasok'] ?></td>
                  <td><?php echo $r['alamat'] ?></td>
                  <td><?php echo $r['kota'] ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>    
      </div>
    </div>
  </div>
</div>
<!-- END Modal pemasok -->

  <!-- Modal user -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detil-user" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header bg-blue">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Data User</h4>
      </div>
        <div class='box-body'>
          <div class="table-responsive">
            <table id='tabelUser' class='table table-bordered table-striped'>
              <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Level</th>
              </thead>
              <tbody>
                <?php 
                    $i =1;
                    foreach ($dUser as $r) {
                ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $r['nama'] ?></td>
                  <td><?php echo $r['level'] ?></td>
                </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          </div>
      </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>    
      </div>
    </div>
  </div>
</div>
<!-- END Modal user -->

<!-- Modal peminjam -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detil-peminjam" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header bg-orange">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Data Peminjam</h4>
      </div>
        <div class='box-body'>
          <div class="table-responsive">
            <table id='tabelPeminjam' class='table table-bordered table-striped'>
              <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>ALamat</th>
                <th>No HP</th>
                <th>Email</th>
              </thead>
              <tbody>
                <?php 
                    $i =1;
                    foreach ($dPeminjam as $r) {
                ?>
                <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $r['nama'] ?></td>
                  <td><?php echo $r['jenis_kelamin'] ?></td>
                  <td><?php echo $r['alamat'] ?></td>
                  <td><?php echo $r['hp'] ?></td>
                  <td><?php echo $r['email'] ?></td>
                </tr>
                <?php $i++;  } ?>
              </tbody>
            </table>
          </div>
      </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>    
      </div>
    </div>
  </div>
</div>
<!-- END Modal peminjam -->

<!-- Modal pengambil -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detil-pengambilan" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header bg-green">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Data Pengambilan</h4>
      </div>
        <div class='box-body'>
          <div class="table-responsive">
            <table id='tabelPengambil' class='table table-bordered table-striped'>
              <thead>
                <th>Kode Pengambilan</th>
                <th>Pengambil</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>keperluan</th>
              </thead>
              <tbody>
                <?php 
                    foreach ($dPengambilan as $r) {
                ?>
                <tr>
                  <td><?php echo $r['id_pengambilan'] ?></td>
                  <td><?php echo $r['pengambil'] ?></td>
                  <td><?php echo $r['nama_barang'] ?></td>
                  <td><?php echo $r['jumlah_ambil'] ?></td>
                  <td><?php echo $r['tanggal_ambil'] ?></td>
                  <td><?php echo $r['keperluan'] ?></td>
                </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          </div>
      </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>    
      </div>
    </div>
  </div>
</div>
<!-- END Modal pengambil -->

<!-- Modal peminjaman -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detil-peminjaman" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header bg-red">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Data Peminjaman</h4>
      </div>
        <div class='box-body'>
          <div class="table-responsive">
            <table id='tabelPeminjaman' class='table table-bordered table-striped'>
              <thead>
                <th>Kode Peminjaman</th>
                <th>Nama</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
              </thead>
              <tbody>
                <?php 
                    foreach ($dPeminjaman as $r) {
                ?>
                <tr>
                  <td><?php echo $r['id_peminjaman'] ?></td>
                  <td><?php echo $r['nama'] ?></td>
                  <td><?php echo $r['nama_barang'] ?></td>
                  <td><?php echo $r['jumlah'] ?></td>
                  <td><?php echo $r['tanggal'] ?></td>
                  <td><?php echo $r['lama_pinjam'] ?></td>
                  <td><?php if ($r['kembali']=='Y') {
                        echo "Sudah kembali";
                  }else{
                        echo "Belum kembali";
                  } ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>    
      </div>
    </div>
  </div>
</div>
<!-- END Modal peminjaman -->

<!-- Modal pengembalian -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="detil-pengembalian" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header bg-yellow">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Data Pengembalian</h4>
      </div>
        <div class='box-body'>
          <div class="table-responsive">
            <table id='tabelPengembalian' class='table table-bordered table-striped'>
              <thead>
                <th>Kode Peminjaman</th>
                <th>Barang</th>
                <th>Ruang</th>
                <th>Gedung</th>
                <th>Jumlah</th>
                <th>Peminjam</th>
                <th>Keterangan</th>
              </thead>
              <tbody>
                <?php 
                    foreach ($dPengembalian as $r) {
                ?>
                <tr>
                  <td><?php echo $r['id_peminjaman'] ?></td>
                  <td><?php echo $r['nama_barang'] ?></td>
                  <td><?php echo $r['nama_ruang'] ?></td>
                  <td><?php echo $r['nama_gedung'] ?></td>
                  <td><?php echo $r['jumlah'] ?></td>
                  <td><?php echo $r['nama'] ?></td>
                  <td><?php echo $r['keterangan'] ?></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
      </div>
            
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="glyphicon glyphicon-circle-arrow-left"></i> Kembali</button>    
      </div>
    </div>
  </div>
</div>
<!-- END Modal pengembalian -->