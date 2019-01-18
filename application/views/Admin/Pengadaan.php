  <div class="content-wrapper">
 <div class="box-body">
<div class="content">
  <div class="box box-success">


    <div class="box-header bg-green with-border">
      <h1 class="box-title">Tambah Data Pengadaan Barang</h1>
    </div>

       <style>
        .form1 {
        padding:3px;height:30px;width:200px;border:1px solid grey;
        }
      </style>

        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <!-- /.box -->

              <div class='box box-primary'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Form Data Pengadaan Barang</h3>
                </div>
                <!-- /.box-header -->
                <div class='box-body'>
                <form class='form-horizontal' action='<?php echo base_url('Pengadaan/tambah') ?>' method='post' enctype='multipart/form-data'>
                  <div class='box-body'>

                    <div class='form-group'>
                        <label class='col-sm-2 control-label'>Nama Barang</label>
                        <div class='col-md-5'>
                          <select class='form-control' required="" name='id_jenisbarang'>
                            <?php
                            foreach ($dataBarang as $r) {
                            ?>
                            <option value='<?php echo $r['id_jenisbarang']?>'><?php echo $r['nama_barang']?></option>";
                            <?php } ?>
                          </select>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label class='col-sm-2 control-label'>Pemasok</label>
                        <div class='col-md-5'>
                          <select class='form-control' required="" name='id_pemasok'>
                            <?php
                            foreach ($dataPemasok as $r) {
                            ?>
                            <option value='<?php echo $r['id_pemasok']?>'><?php echo $r['nama_pemasok']?></option>";
                            <?php } ?>
                          </select>
                        </div>
                    </div>

                    <div class='form-group'>
                      <label class='col-sm-2 control-label'>Tanggal Beli</label>
                      <div class='col-md-5'>
                        <input type="date" name='tanggal_beli' id='tanggal_beli' class='form-control' required="" placeholder='Tanggal Pembelian' value="<?php echo date('d-m-Y');?>">
                      </div>
                    </div>

                    <div class='form-group'>
                      <label class='col-sm-2 control-label'>Stok</label>
                      <div class='col-md-5'>
                        <input type='text' name='stok' id='stok' class='form-control' required="" placeholder='Stok' onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                      </div>
                    </div>

              <div class="form-group">
                <label class='col-sm-2 control-label'>Harga Satuan</label>
                <div class="col-md-5">
                  <div class="input-group">
                <span class="input-group-addon">Rp</span>
                <input type="text" class="form-control" name='harga_satuan' id='harga_satuan' required="" placeholder='Harga Satuan' onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                <span class="input-group-addon">,00</span>
                </div>
                </div>
              </div>

                    <!-- <div class='form-group'>
                      <label class='col-sm-2 control-label'>Harga Satuan</label>
                      <div class='col-md-5'>
                        <input type='text' name='harga_satuan' id='harga_satuan' class='form-control' required="" placeholder='Harga Satuan' onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
                      </div>
                    </div> -->
                  <!-- /.box-body -->
                  <div class='box-footer'>
                  <button type='reset' class='btn btn-default'><i class="glyphicon glyphicon-remove"></i> Batal</button>
                  <button type='submit' value='Simpan' class='btn btn-warning'><i class="glyphicon glyphicon-save"></i> Simpan</button>
                  <a href="<?php echo site_url('Import'); ?>" style="float: right;"><button type='button' class='btn btn-danger pull-center'><i class="glyphicon glyphicon-import"></i> Import Data</button></a>&nbsp;<a href="<?php echo site_url('Export/export'); ?>" style="float: right; padding-right:5px;"><button type='button' class='btn btn-primary pull-center'><i class="glyphicon glyphicon-export"></i> Export Data</button></a>
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
                      <strong>Success!</strong> <?php echo $this->session->flashdata('info'); ?>
                  </div>
                </div>
              <?php } ?>


                <div class='box-header with-border'>
                  <h3 class='box-title'>Tabel Data Pengadaan Barang</h3>
                </div>
                <!-- /.box-header -->
                <div class='box-body'>
		              <div class="table-responsive">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Pemasok</th>
                    <th>Tanggal Beli</th>
                    <th>Stok</th>
                    <th>Harga Satuan</th>
                    <th>Harga Total</th>
                    <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>

                  <?php
                    function tanggal_indo($tanggal, $cetak_hari = false)
                    {
                      $hari = array ( 1 =>    'Senin',
                            'Selasa',
                            'Rabu',
                            'Kamis',
                            'Jumat',
                            'Sabtu',
                            'Minggu'
                          );

                      $bulan = array (1 =>   'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                          );
                      $split    = explode('-', $tanggal);
                      $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

                      if ($cetak_hari) {
                        $num = date('N', strtotime($tanggal));
                        return $hari[$num] . ', ' . $tgl_indo;
                      }
                      return $tgl_indo;
                    }

                    $i = 1;
                    foreach ($data as $r) {
                  ?>

                  <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $r['nama_barang'] ?></td>
                  <td><?php echo $r['nama_pemasok'] ?></td>
                  <td><?php $tanggal = date('Y-m-d', strtotime($r['tanggal_beli'])); echo tanggal_indo($tanggal, true); ?></td>
                  <td><?php echo $r['stok'] ?></td>
                  <td><?php $angka = $r['harga_satuan']; $angka_format = number_format($angka,2,",","."); echo "Rp. ".$angka_format; ?></td>
                  <td><?php $angka = $r['harga_total']; $angka_format = number_format($angka,2,",","."); echo "Rp. ".$angka_format; ?></td>
                  <td><a
                          href="javascript:;"
                          data-id="<?php echo $r['id_barang'] ?>"
                          data-idjenis="<?php echo $r['id_jenisbarang'] ?>"
                          data-nama="<?php echo $r['nama_barang'] ?>"
                          data-pemasok="<?php echo $r['nama_pemasok'] ?>"
                          data-tanggal="<?php echo $r['tanggal_beli'] ?>"
                          data-stok="<?php echo $r['stok'] ?>"
                          data-satuan="<?php echo $r['harga_satuan'] ?>"

                          data-toggle="modal" data-target="#edit-data">
                          <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
                      </a></td>
                  </tr>

                  <?php $i++; } ?>

                </tbody>
                    <tfoot>
                    <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Pemasok</th>
                    <th>Tanggal Beli</th>
                    <th>Stok</th>
                    <th>Harga Satuan</th>
                    <th>Harga Total</th>
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
                <h4 class="modal-title">Ubah Data Pengadaan</h4>
            </div>
                <form class="form-horizontal" action="<?php echo base_url('Pengadaan/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
                  <div class="modal-body">
                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Nama Barang</label>
                        <div class="col-lg-10">
                            <input type="hidden" id="id_barang" name="id_barang">
                            <input type="hidden" id="id_jenisbarang" name="id_jenisbarang">
                            <input type="text" class="form-control" required="" id="nama_barang" name="nama_barang" placeholder="Nama Barang" readonly="true">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Pemasok</label>
                        <div class="col-lg-10">

                            <input type="text" class="form-control hidden" required="" id="nama_pemasok" name="nama_pemasok" placeholder="Nama Pemasok" readonly="true">
                            <select class="form-control" name="nama_pemasok" id="nama_pemasok">
                                <option value="0">Pilih Pemasok</option>
                                <?php foreach ($dataPemasok as $rows): ?>
                                  <option value="<?php echo $rows['id_pemasok'] ?>"><?php echo $rows['nama_pemasok'] ?></option>
                                <?php endforeach ?>
                              </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Tanggal Beli</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" required="" id="tanggal_beli" name="tanggal_beli" placeholder="Tanggal Beli">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Stok</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" required="" id="stok" name="stok" placeholder="Stok" readonly="true">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Harga Satuan</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" required="" id="harga_satuan" name="harga_satuan" placeholder="Harga Satuan">
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
            modal.find('#id_barang').attr("value",div.data('id'));
            modal.find('#id_jenisbarang').attr("value",div.data('idjenis'));
            modal.find('#nama_barang').attr("value",div.data('nama'));
            modal.find('#nama_pemasok').attr("value",div.data('pemasok'));
            modal.find('#tanggal_beli').attr("value",div.data('tanggal'));
            modal.find('#stok').attr("value",div.data('stok'));
            modal.find('#harga_satuan').attr("value",div.data('satuan'));
        });
    });
</script>

<script>
  function tandaPemisahTitik(b){
    var _minus = false;
    if (b<0) _minus = true;
    b = b.toString();
    b=b.replace(".","");

    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--){
       j = j + 1;
       if (((j % 3) == 1) && (j != 1)){
         c = b.substr(i-1,1) + "." + c;
       } else {
         c = b.substr(i-1,1) + c;
       }
    }
    if (_minus) c = "-" + c ;
    return c;
  }

  function numbersonly(ini, e){
    if (e.keyCode>=49){
      if(e.keyCode<=57){
      a = ini.value.toString().replace(".","");
      b = a.replace(/[^\d]/g,"");
      b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
      ini.value = tandaPemisahTitik(b);
      return false;
      }
      else if(e.keyCode<=105){
        if(e.keyCode>=96){
          //e.keycode = e.keycode - 47;
          a = ini.value.toString().replace(".","");
          b = a.replace(/[^\d]/g,"");
          b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
          ini.value = tandaPemisahTitik(b);
          //alert(e.keycode);
          return false;
          }
        else {return false;}
      }
      else {
        return false; }
    }else if (e.keyCode==48){
      a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
      b = a.replace(/[^\d]/g,"");
      if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
      } else {
        return false;
      }
    }else if (e.keyCode==95){
      a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
      b = a.replace(/[^\d]/g,"");
      if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
      } else {
        return false;
      }
    }else if (e.keyCode==8 || e.keycode==46){
      a = ini.value.replace(".","");
      b = a.replace(/[^\d]/g,"");
      b = b.substr(0,b.length -1);
      if (tandaPemisahTitik(b)!=""){
        ini.value = tandaPemisahTitik(b);
      } else {
        ini.value = "";
      }

    return false;
  } else if (e.keyCode==9){
    return true;
  } else if (e.keyCode==17){
    return true;
  } else {
    //alert (e.keyCode);
    return false;
  }
  }


</script>