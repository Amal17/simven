<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Data Pengembalian</h1>
    </div>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <!-- /.box -->

      
      <div class='box box-primary'>
        <div class='box-header with-border'>
           <h3 class='box-title'>Tabel Data Peminjaman</h3>
        </div>
        <!-- /.box-header -->
        <div class='box-body'>
          <div class="table-responsive">
          <table id='example1' class='table table-bordered table-striped'>
            <thead>
            <tr>
            <th>ID Peminjaman</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            
            <?php 
              $i = 0;
              foreach ($data as $r) {
              if($r['kembali']=='N')
              {
                $button = "<a href='#ubah_dokter' data-toggle='modal' data-id=".$r['id_peminjaman']." class='btn btn-success'><i class='glyphicon glyphicon-check'></i> Cek Barang</button>
                </a>";
              }
              else
              {
                $button = "<a href='#ubah_dokter' data-toggle='modal' data-id=".$r['id_peminjaman']." class='btn btn-danger'><i class='glyphicon glyphicon-check'></i> Cek Barang</button>
                </a>";
              }
            ?>
            
            <tr>
            <td><?php echo $r['id_peminjaman'] ?></td>
            <td><?php echo $r['nama'] ?></td>
            <td><?php echo $r['tanggal'] ?></td>
            <td><?php echo $r['lama_pinjam'] ?></td>
            <td><?php echo $button; ?></td>
             
              
            
            </tr>

            <?php } ?>
                
            </tbody>
                <tfoot>
                <tr>
                <th>ID Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
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


<!-- Modal Ubah -->
<div class='modal fade' id='ubah_dokter' role='dialog'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                            <h4 class='modal-title'>Detail Peminjaman</h4>
                        </div>
                        <div class='modal-body'>
                            <div class='hasil-data'></div>
                        </div>
                        <div class='modal-footer'>
                            
                        </div>
                    </div>
                </div>
            </div>

<!-- END Modal Ubah -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#ubah_dokter').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'Popup',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>
  

