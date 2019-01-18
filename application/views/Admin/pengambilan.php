
<div class="content-wrapper">
  <div class="box-body">
<div class="content">
  <div class="box box-success">
    

    <div class="box-header bg-green with-border">
      <h1 class="box-title">Data Pengambilan</h1>
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
        <p class="lead" align="center">Form Pengambilan Barang</p>

        <!-- Author -->

        <hr><br><br>

        <!-- Date/Time -->
        <form role="form" method="POST" action="<?php echo base_url('pengambilan/tambah'); ?>">
  
         
            <div class="col-md-2">
            <label>No Pengambilan</label>  
            </div>
            <div class="col-md-1" >                      
            <input class='form-control' name="id_pengambilan" type="text"   tabindex="1"  value="<?php echo $id;?>" readonly="true">             
            </div>
            <div class="col-md-3">
            </div>  
            <div class="col-md-2">
            <label>Tanggal Ambil</label>  
            </div>
            <div class="col-md-3">
              <input class='form-control' name="tanggal_ambil" type="text" value="<?php echo date('Y-m-d') ?>" readonly>
            </div> 
            <br><br> 
            
            <div class="col-md-2">
            <label>Nama Pengambil</label>  
            </div>
            <div class="col-md-4" >                      
            <input class='form-control' name="nama_pengambil" type="text"   tabindex="1" placeholder="Nama Pengambil"  >             
            </div> 
            
            <div class="col-md-2">
            <label>Keperluan</label>  
            </div>
            <div class="col-md-3">
              <input class='form-control' name="keperluan" type="text" tabindex="1" placeholder="Keperluan">
            </div><br><br>

            <div class="col-md-2">
            <label>Karyawan</label>  
            </div>
            <div class="col-md-4">
              <input class='form-control' name="username" type="text"  value="<?php echo $this->session->userdata('username'); ?>" readonly>
            </div>
            
            <br><br><br>

            <hr>
                 
          <div class='box box-primary'>
           <div class='box-header with-border'>
            <h4 align="center">Cari Barang</h4>
           </div>

           <div class='box-body'>
           <div class="table-responsive">
          <table id="example1" class="table table-bordered table-striped" >
            <thead>
              <tr>
                <th>Nama Barang</th> 
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
                  <td><?php echo $row['jumlah'] ?></td> 
                   
              <td align="center">
                <input  id="chk<?php echo $i; ?>" type="checkbox" value="" data2="<?php echo $row['nama_barang']; ?>"  data6="<?php echo $row['id_penempatan']; ?>" jumlah="<?php echo $row['jumlah']; ?>" class="btn btn-default btn-sm btn-success ">             
              </td>

              </tr>
             <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
          </div>
      
          <div class="well">
          <h4>Informasi Pengambilan :</h4>
          <!--form role="form" method="POST"-->
          <div class="form-group">                   
            <div style="padding:3px;overflow:auto;width:auto;height:250px;border:0px solid grey">
              <table  class="mtable table table-bordered table-striped" >
                <thead>
                  <tr>
                    <th>Nama Barang</th>  
                    <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
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
        

        </form>
        </div>
        </div>
        </section>
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
          var isi6   = $autosum(this).attr("data6");           
          var stok   = $autosum(this).attr("stok");
          var jumlah = $autosum(this).attr("jumlah");
          
          var u = $autosum("input[sz=jl]").size() + 1; 

          $autosum('.mtable tbody').append($autosum(".mtable tbody tr:last").clone());
          $autosum('.mtable tbody tr:last td:first-child').html(isi2);
          $autosum('.mtable tbody tr:last td:nth-child(2)').html(isi3);
          $autosum('.mtable tbody tr:last td:nth-child(3)').html(isi6);  
          
          $autosum('.mtable tbody tr:last td:last-child').html('<input type="hidden" name="ver" value='+ isi2 +'><input type="hidden" name="item[]" value='+ isi2 +'><input type="hidden" name="ver" value='+ isi6 +'><input type="hidden" name="id_penempatan[]" value='+ isi6 +'><input type="number" data='+ stok +' class="txt" name="jumlah_item[]" id="isi' + u + '" sz="jl" data-max='+ jumlah +' data-min='+ 0 +' >');
          
      }else{
           $autosum('.mtable tbody tr:last ').remove();}  
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