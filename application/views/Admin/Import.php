<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="box-body">

<div class="content">
  <div class="box box-success">
    <div class="box-header bg-green with-border">
      <h1 class="box-title">Import Data Pengadaan Barang</h1>
    </div>
</section>

<section class='content'>
  <div class='row'>
    <div class='col-xs-12'>
      <!-- /.box -->

      <div class='box box-primary'>
        <div class='box-header with-border'>
          <h3 class='box-title'>Form Import Data</h3>
        </div>
        <!-- /.box-header -->
        <div class='box-body'>
          <h6>*Download Format Untuk Mengetahui Format Dari File Excel!!!</h6>
          <form method="post" action="" enctype="multipart/form-data">
          <a href="Data Barang.xlsx" class="btn btn-default">
            <span class="glyphicon glyphicon-download"></span>
            Download Format
          </a><a 
                    href="javascript:;"
                    data-toggle="modal" data-target="#info">
                    <img src="<?php echo base_url('assets/img/info.png'); ?>" style="height: 32px;width: 32px; padding-left : 5px;">
                </a><br><br>
          
          <!-- 
          -- Buat sebuah input type file
          -- class pull-left berfungsi agar file input berada di sebelah kiri
          -->
          <input type="file" name="file" class="pull-left">
          
          <button type="submit" name="preview" class="btn btn-success btn-sm">
            <span class="glyphicon glyphicon-eye-open"></span> Preview
          </button>
        </form>
        <hr>
        <?php
      // Jika user telah mengklik tombol Preview
        if(isset($_POST['preview'])){
          //$ip = ; // Ambil IP Address dari User
          $nama_file_baru = 'data.xlsx';
          
          // Cek apakah terdapat file data.xlsx pada folder tmp
          if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
            unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
          
          $tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
          $tmp_file = $_FILES['file']['tmp_name'];
          
          // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
          if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
            // Upload file yang dipilih ke folder tmp
            // dan rename file tersebut menjadi data{ip_address}.xlsx
            // {ip_address} diganti jadi ip address user yang ada di variabel $ip
            // Contoh nama file setelah di rename : data127.0.0.1.xlsx
            move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);
            
            // Load librari PHPExcel nya
            //require_once 'PHPExcel/PHPExcel.php';
            $this->load->view('PHPExcel/PHPExcel');
            
            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
            $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
            
            // Buat sebuah tag form untuk proses import data ke database
            echo "<form role='form' method='post' action=".base_url('Import/tambah').">";
            
            // Buat sebuah div untuk alert validasi kosong
            echo "<div class='alert alert-danger' id='kosong'>
            Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
            </div>";
            
            echo "<table id='example1' class='table table-bordered table-striped'>
            <tr>
              <th colspan='6' class='text-center'>Preview Data</th>
            </tr>
            <tr>
              <th>No</th>
              <th>Id Jenis Barang</th>
              <th>Tanggal Beli</th>
              <th>Stok</th>
              <th>Id Pemasok</th>
              <th>Harga Satuan</th>
              <th>Harga Total</th>
            </tr>";
            
            $numrow = 1;
            $kosong = 0;
            $no=1;
            foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
              // Ambil data pada excel sesuai Kolom
              $id_jenisbarang = $row['A']; // Ambil data NIS
              $tanggal_beli = $row['B']; // Ambil data nama
              $stok = $row['C']; // Ambil data jenis kelamin
              $id_pemasok = $row['D']; // Ambil data telepon
              $harga_satuan = $row['E']; // Ambil data alamat
              $harga_total = $row['F'];
              // Cek jika semua data tidak diisi
              if(empty($id_jenisbarang) && empty($tanggal_beli) && empty($stok) && empty($id_pemasok) && empty($harga_satuan) && empty($harga_total))
                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
              
              // Cek $numrow apakah lebih dari 1
              // Artinya karena baris pertama adalah nama-nama kolom
              // Jadi dilewat saja, tidak usah diimport
              if($numrow > 1){
                // Validasi apakah semua data telah diisi
                $id_jenisbarang_td = ( ! empty($id_jenisbarang))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                $tanggal_beli_td = ( ! empty($tanggal_beli))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                $id_pemasok_td = ( ! empty($id_pemasok))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                $stok_td = ( ! empty($stok))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                $harga_satuan_td = ( ! empty($harga_satuan))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                $harga_total_td = ( ! empty($harga_total))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                
                // Jika salah satu data ada yang kosong
                if(empty($id_jenisbarang) && empty($tanggal_beli) && empty($stok) && empty($id_pemasok) && empty($harga_satuan) && empty($harga_total)){
                  $kosong++; // Tambah 1 variabel $kosong
                }
                
                echo "<tr>";
                echo "<td>".$no++."</td>";
                echo "<td".$id_jenisbarang_td.">".$id_jenisbarang."</td>";
                echo "<td".$tanggal_beli_td.">".$tanggal_beli."</td>";
                echo "<td".$id_pemasok_td.">".$id_pemasok."</td>";
                echo "<td".$stok_td.">".$stok."</td>";
                echo "<td".$harga_satuan_td.">".$harga_satuan."</td>";
                echo "<td".$harga_total_td.">".$harga_total."</td>";
                echo "</tr>";
              }
              
              $numrow++; // Tambah 1 setiap kali looping
            }
            
            echo "</table>";
            
            // Cek apakah variabel kosong lebih dari 1
            // Jika lebih dari 1, berarti ada data yang masih kosong
            if($kosong > 1){
            ?>  
              <script>
              $(document).ready(function(){
                // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                
                $("#kosong").show(); // Munculkan alert validasi kosong
              });
              </script>
            <?php
            }else{ // Jika semua data sudah diisi
              echo "<hr>";
              
              // Buat sebuah tombol untuk mengimport data ke database
              echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
            }
            
            echo "</form>";
          }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
            // Munculkan pesan validasi
            echo "<div class='alert alert-danger'>
            Hanya File Excel 2007 (.xlsx) yang diperbolehkan
            </div>";
          }
        }
        ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    <!-- /.col -->
  

                </div>
             </div>
             </section>
          </div>
    </div>
  </div>
</div>


<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="info" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Petunjuk Import Data</h4>
                <span>1. Pilih <b>Download</b> untuk mengetahui format data yang akan di import:</span><br><br>
                <img src="<?php echo base_url('assets/img/import/download.png'); ?>"> <br><br>
                <span>2. Buka file <b>Excel</b> yang telah di download tadi:</span><br><br>
                <img src="<?php echo base_url('assets/img/import/buka.png'); ?>"> <br><br>
                <span>3. Didalam File tersebut terdapat 3 sheet, sheet pertama yaitu <b>Data Import</b> yang bertujuan untuk menampung data-data yang akan anda upload, yang kedua <b>Data Jenis Barang</b> yang bertujuan untuk menampilkan dan menginformasikan <b>Data Jenis Barang</b> yang dapat anda pilih untuk dapat di import di sheet <b>Data Import</b>, yang ketiga <b>Data Pemasok</b> sama seperti <b>Data Jenis Barang</b> sheet ini juga bertujuan untuk menampung dan menginformasikan data-data yang dapat anda pilih untuk di import.</span><br><br>
                <span>Sheet Data Import</span><br><br>
                <img src="<?php echo base_url('assets/img/import/dataimport.png'); ?>" style="height: 500px;width: 500px;"> <br><br>
                <span>Sheet Data Jenis Barang</span><br><br>
                <img src="<?php echo base_url('assets/img/import/datajenisbarang.png'); ?>" style="height: 500px;width: 500px;"> <br><br>
                <span>Sheet Data Pemasok</span><br><br>
                <img src="<?php echo base_url('assets/img/import/datapemasok.png'); ?>" style="height: 500px;width: 500px;"> <br><br>
                <span>4. Untuk mengisi Field <b>Id Jenis Barang</b> anda cukup mengisi dengan id nya saja yang dapat diperoleh dari sheet <b>Data Jenis Barang</b>.</span><br><br>
                <span>5. Untuk mengisi Field <b>Id Pemasok</b> anda cukup mengisi dengan id nya saja yang dapat diperoleh dari sheet <b>Data Pemasok</b>.</span><br><br>
                <span>6. Setelah data dirasa cukup jangan lupa <b>di Save</b>.</span><br><br>
                <span>7. Selanjutnya pilih <b>Choose File</b> dan pilih file yang akan di upload.</span><br><br>
                <img src="<?php echo base_url('assets/img/import/choose.png'); ?>"> <br><br>
                <span>7. Selanjutnya pilih <b>Priview</b>.</span><br><br>
                <span>8. Setelah tidak ada error maka pilih <b>Import</b>.</span><br><br>
                <span>9. Data Berhasil Di Import</span><br><br>
            </div>
            <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal"> Kembali</button>
                  </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // Untuk sunting
        $('#info').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal  = $(this)
        });
    });
</script>


  
    <!-- /.content -->
<style>
        #loading{
      background: whitesmoke;
      position: absolute;
      top: 140px;
      left: 82px;
      padding: 5px 10px;
      border: 1px solid #ccc;
    }
    </style>
    
    <script>
    $(document).ready(function(){
      // Sembunyikan alert validasi kosong
      $("#kosong").hide();
    });
    </script>