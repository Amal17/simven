
<div class="content-wrapper">
 <div class="box-body">
<div class="content">
  <div class="box box-success">
    

    <div class="box-header bg-green with-border">
      <h1 class="box-title">Data Peminjaman</h1>
    </div>
     
       <style>
        .form1 {
        padding:3px;height:30px;width:200px;border:1px solid grey;
        }
      </style>
      
      <section class='content'>
      <div class="row">
      <!-- Blog Post Content Column -->


      <div class="col-lg-12">
      <!-- Blog Post -->

        <!-- Title -->
        <p class="lead" align="center">Form Peminjaman Barang</p>

        <!-- Author -->

        <!-- <hr><a href="<?php echo base_url('Cetak') ?>" style="float: right;"><button name="button" type="submit" class="btn btn-primary">Print</button></a><br><br> -->

        <!-- Date/Time -->
        <form role="form" method="POST" action="<?php echo base_url('Peminjaman/tambah'); ?>">
  
         
            <div class="col-md-2">
            <label>No Peminjaman</label>  
            </div>
            <div class="col-md-1" >                      
            <input class='form-control' name="id_peminjaman" type="text"   tabindex="1"   readonly="true" value="<?php echo ($idpeminjaman->id_peminjaman+1); ?>"  >                     
            </div>
            <div class="col-md-3" >
            </div>  
            <div class="col-md-2">
            <label>Tanggal Pinjam</label>  
            </div>
            <div class="col-md-3">
              <input class='form-control' name="tanggal" type="text" value="<?php echo date('Y-m-d') ?>" readonly>
            </div> 
            <br><br> 
            
            <div class="col-md-2">
            <label>Id Peminjam</label>  
            </div>
            <div class="col-md-1" >                      
            <input class='form-control' name="id_peminjam" type="text"   tabindex="1"   readonly="true" value="<?php echo ($idpeminjam->id_peminjam+1); ?>"  >           
            </div> 
            <div class="col-md-3" >
            </div>            
            <div class="col-md-2">
            <label>Nama Peminjam</label>  
            </div>
            <div class="col-md-3">
              <input class='form-control' name="nama" type="text" tabindex="1" placeholder="Nama Peminjam">
            </div><br><br>

            <div class="col-md-2">
            <label>Alamat</label> 
            </div>
            <div class="col-md-4">
              <textarea name="alamat" class='form-control' type="text" tabindex="4" placeholder="Alamat"></textarea>
            </div> 
                        
            <div class='form-group'>
              <label class='col-md-2 control-label'>Jenis Kelamin</label>
              <div class='col-md-4'>
                <input type='radio' name='jenis_kelamin' id='nama_barang'  class='radio-inline' value='pria'> Pria</input>
                <input type='radio' name='jenis_kelamin' id='nama_barang'  class='radio-inline' value='wanita'> Wanita</input>
              </div>
            </div><br> 

            <div class="col-md-2">
            <label>No Hp</label>  
            </div> 
            <div class="col-md-4">
              <input class='form-control' name="hp" type="number" maxlength="12" tabindex="5" placeholder="No Hp" >
            </div> <br>

            <div class="col-md-2">
            <label>Email</label>  
            </div>
            <div class="col-md-4">
              <input class='form-control' name="email" type="text" placeholder="Email">
            </div><br>

            <div class="col-md-2 ">
            <label>Tanggal Kembali</label> 
            </div>
            <div class="col-md-4">
              <input class='form-control' name="lama_pinjam" type="date" placeholder="Tanggal Kembali">
            </div> 
            <div><br><br>

            <div class="col-md-2">
            <label>Keperluan</label>  
            </div>
            <div class="col-md-4">
              <input class='form-control' name="keperluan_pinjam" type="text" placeholder="Keperluan">
            </div> 

            <div class="col-md-2">
            <label>Karyawan</label>  
            </div>
            <div class="col-md-4">
              <input class='form-control' name="username" type="text" value="<?php echo $this->session->userdata('username'); ?>" readonly="true">
            </div>
            
            <br><br><br>

            <hr>
                  
          <!-- tabel -->
           <div class='box box-primary'>
           <div class='box-header with-border'>
            <h4 align="center">Cari Barang</h4>
           </div>
           <!-- /.box-header -->
           <div class='box-body'>
           <div class="table-responsive">
           <table id="example1" class="table table-bordered table-striped" >
            <thead>
              <tr> 
                <th>Nama Barang</th> 
                <th>Gedung</th>
                <th>Ruang</th> 
                <th>Stock</th>
                <th width="15">Action</th>   
              </tr>
            </thead>
            <tbody>
              <?php 
                  $i = 0;
                  foreach ($data as $row) {
              ?>
                  <tr> 
                  <td><?php echo $row['nama_barang'] ?></td>
                  <td><?php echo $row['nama_gedung'] ?></td>
                  <td><?php echo $row['nama_ruang'] ?></td>
                  <td><?php echo $row['jumlah'] ?></td>
                 
                  <td align="center">
                    <input  id="chk" type="checkbox" value="" data2="<?php echo $row['nama_barang']; ?>" data3="<?php echo $row['nama_gedung']; ?>" data4="<?php echo $row['nama_ruang']; ?>" data5="<?php echo $row['id_penempatan']; ?>" jumlah="<?php echo $row['jumlah']; ?>" class="btn btn-default btn-sm btn-success ">             
                  </td>

              </tr>
             <?php } ?>
            </tbody>
          </table>

          </div>
        </div>
      </div>

      
      <div class="well">
      <h4>Informasi Peminjaman :</h4>
      <!--form role="form" method="POST"-->
      <div class="form-group">                   
        <div style="padding:3px;overflow:auto;width:auto;height:250px;border:0px solid grey">
          <table  class="mtable table table-bordered table-striped" >
            <thead>
              <tr> 
                <th>Nama Barang</th>  
                <th>Nama Gedung</th>
                <th>Nama Ruang</th>
                <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
              <tr> 
                <td></td>
                <td></td>
                <td></td>
                <td></td> 
              </tr>
            </tbody>
        </table> 
    </div>
    </div>
     <button name="submit" type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-save"></i> Simpan</button>
      <button id="reset" name="reset" type="reset" class="btn btn-primary"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
    </div>
    </section>

    </form>

    </div>
    </div>
    </div>
    </div>

     <script>
    var $total = jQuery.noConflict();
    $total(document).click(function(){

      //iterate through each textboxes and add keyup
      //handler to trigger sum event
      $total(".txt").each(function() {

        $total(this).keyup(function(){
          calculateSum();
          var max = $total(this).attr("data-max");
          var min = $total(this).attr("data-min");

              if(this.value > parseInt(max)){
              alert("Melebihi Jumlah Stock");
              this.value = "";

        
        }
        else if(this.value < parseInt(min)){
          alert("Kurang dari Jumlah Stock");
              this.value = "";
        }
        });
        $total(document.getElementById('total_biaya')).value = 0;
        
        $total("#biaya_racikan").keyup(function(){
          calculateSum();
        });
      });

    });

    function calculateSum() {

      var sum = 0;
      var tt = 0;
      //iterate through each textboxes and add the values
      $total(".txt").each(function() {

        //add only if the value is number
        if(!isNaN(this.value) && this.value.length!=0) {
          sum += parseInt(this.value,10) * $total(this).attr("data");
        }

      });
      //fungsi biaya racikan
      
      var tt = sum + parseInt($total('#biaya_racikan').val(),10);
      //
      //.toFixed() method will roundoff the final sum to 2 decimal places
      //$("#sum").html(sum.toFixed(0));
      $total("#total_biaya").val(tt);
    }
    
    </script>

    <!-- table -->
    
    <script>
    var $reset = jQuery.noConflict();
    $reset("#reset").click(function(){
    $reset('.mtable tbody tr:not(:first)').remove();
    });
    </script>

    <script>
    var $autosum = jQuery.noConflict();
    $autosum(document).ready(function() {
      $autosum("input[type=checkbox]").change(function(){
      //recalculate();
          if (this.checked) { 
            var isi2   = $autosum(this).attr("data2");
            var isi3   = $autosum(this).attr("data3");
            var isi4   = $autosum(this).attr("data4");
            var isi5   = $autosum(this).attr("data5");          
            var stok   = $autosum(this).attr("stok");    
            var jumlah = $autosum(this).attr("jumlah");
            
            var u = $autosum("input[sz=jl]").size() + 1; 

            $autosum('.mtable tbody').append($autosum(".mtable tbody tr:last").clone());
             
            $autosum('.mtable tbody tr:last td:nth-child(1)').html(isi2);
            $autosum('.mtable tbody tr:last td:nth-child(2)').html(isi3);
            $autosum('.mtable tbody tr:last td:nth-child(3)').html(isi4);
            $autosum('.mtable tbody tr:last td:nth-child(4)').html(isi5); 
            
            $autosum('.mtable tbody tr:last td:last-child').html('<input type="hidden" name="ver" value='+ isi2 +'><input type="hidden" name="item[]" value='+ isi2 +'><input type="hidden" name="ver" value='+ isi5 +'><input type="hidden" name="id_penempatan[]" value='+ isi5 +'><input type="hidden" name="ver" value='+ isi5 +'><input type="hidden" name="penempatan" value='+ isi5 +'><input type="number" data='+ stok +' class="txt" name="jumlah_item[]" id="isi' + u + '" sz="jl" data-max='+ jumlah +' data-min='+ 0 +'>');
            
        }else{
             $autosum('.mtable tbody tr:last').remove();
           }  
      });
    });
    </script> 
    
<!-- datatable -->


    <script>
    var $jnoc = jQuery.noConflict();
    $jnoc(function() {
      $jnoc('#example1').dataTable();
      });
    </script>