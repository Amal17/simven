<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Cetak Barcode</h1>
    </div>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>   
         <div class='box box-primary'>

            <div class='box-header with-border'>
               <h3 class='box-title'>Tabel Data Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class='box-body'>

            <form class='form-horizontal' action='<?php echo base_url('Cetakbarcode/cetak') ?>' method='post' enctype='multipart/form-data'>
              <table id='example1' class='table table-bordered table-striped'>
                <thead>
                <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Merk</th>
                <th>Spek</th>
                <th><center>Aksi</center></th>
                </tr>
                </thead>
                <tbody>
             
                <?php 
                  foreach ($data as $r) {
                ?>
                
                <tr>
                    <td><?php echo $r['id_jenisbarang'] ?></td>
                    <td><?php echo $r['nama_barang'] ?></td>
                    <td><?php echo $r['satuan'] ?></td>
                    <td><?php echo $r['kategori'] ?></td>
                    <td><?php echo $r['jumlah'] ?></td>
                    <td><?php echo $r['merk'] ?></td>
                    <td><?php echo $r['spek'] ?></td>
                    <td>
                        <div id="centang">
                            <center><input type="checkbox" name="daftarku" value="<?php echo $r['id_jenisbarang'] ?>"></center>
                        </div>
                    </td>
                </tr>

                <?php } ?>

                </tbody>
                <tfoot>
                <tr>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Merk</th>
                    <th>Spek</th>
                    <th>
                    <center>
                        <a href="javascript:pilihsemua()"><button type='button' id='semua' class='btn btn-info' name='tambahData'><i class="glyphicon glyphicon-check"></i></button></a>
                        <a href="javascript:bersihkan()"><button type='button' id='semua' class='btn btn-info' name='tambahData'><i class="glyphicon glyphicon-remove"></i></button></a>
                        </center>
                    </th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div> 
          <button type='submit' class='btn btn-success' name='tambahData'><i class="glyphicon glyphicon-print"></i> Cetak Barcode</button> 
        </form>
    </div> 
    </section>
        </div>
     </div>
  </div>
</div>


             
<script>
function pilihsemua()
{
    var daftarku = document.getElementsByName("daftarku[]");
    var jml=daftarku.length;
    var b=0;
    for (b=0;b<jml;b++)
    {
        daftarku[b].checked=true;
        
    }
}

function bersihkan()
{
    var daftarku = document.getElementsByName("daftarku[]");
    var jml=daftarku.length;
    var b=0;
    for (b=0;b<jml;b++)
    {
        daftarku[b].checked=false;
        
    }
}
</script>