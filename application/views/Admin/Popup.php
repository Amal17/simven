<form class="form-horizontal" action="<?php echo base_url('Pengembalian/kembali') ?>" method="post" enctype="multipart/form-data" role="form">
<table id='example1' class='table table-bordered table-striped'>
            <thead>
            <tr>
            <th></th>
            <th>Nama Barang</th>
            <th>Nama Gedung</th>
            <th>Nama Ruang</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            </tr>
            </thead>
            <tbody>
            
            <?php 
              if($_POST['idx']) {
              $id = $_POST['idx'];  
              $querys = $this->db->query("SELECT MAX(id_pengembalian)+1 as id FROM tb_pengembalian");
              foreach ($querys->result_array() as $v) 
              {
                 $ido = $v['id'];
              }
              if($ido=='')
              {
                $id_peng = 1;
              }
              else
              {
                $id_peng = $ido;
              }    
              
           

              $datass = $this->db->query("SELECT tb_peminjaman.id_peminjaman,tb_peminjaman.kembali,tb_penempatan.id_penempatan,tb_penempatan.id_barang,tb_peminjaman.jumlah,tb_jenisbarang.nama_barang,tb_ruang.nama_ruang,tb_gedung.nama_gedung from tb_penempatan INNER JOIN tb_peminjaman ON tb_peminjaman.id_penempatan = tb_penempatan.id_penempatan INNER JOIN tb_jenisbarang ON  tb_jenisbarang.id_jenisbarang=tb_penempatan.id_barang   INNER JOIN tb_ruang ON tb_penempatan.id_ruang=tb_ruang.id_ruang  INNER JOIN tb_gedung ON tb_gedung.id_gedung=tb_ruang.id_gedung WHERE tb_peminjaman.id_peminjaman=".$id);
              $no=0;

              foreach ($datass->result_array() as $r) 
              {
                    if($r['kembali']=='N')
                    {
                ?>
                    
                        <tr>
                        <td><input type="checkbox" name="idx[]"  value=<?php echo $no++; ?>></td>                
                        <td><?php echo $r['nama_barang'] ?></td>
                        <td><?php echo $r['nama_gedung'] ?></td>
                        <td><?php echo $r['nama_ruang'] ?></td>
                        <td><?php echo $r['jumlah'] ?></td>
                        <td>
                            <input type="hidden" name="id_pengambilan" class='form-control' value="<?php echo $id_peng; ?>">
                            <input type="hidden" name="id_peminjaman" class='form-control' value="<?php echo $r['id_peminjaman'] ?>">
                            <input type="hidden" name="id_penempatan[]" class='form-control' value="<?php echo $r['id_penempatan'] ?>">
                            <input type="hidden" name="jumlah[]" id="jumlah[]" class='form-control' value="<?php echo $r['jumlah'] ?>">
                            <input type="hidden" name="barang[]" class='form-control' value="<?php echo $r['id_barang'] ?>">
                            <select name="keterangan[]" id="keterangan[]" onchange ="viewInput()">
                            	<option value="Tidak Bermasalah">Tidak Bermasalah</option>
                            	<option value="Hilang">Hilang</option>
                            	<option value="Rusak" >Rusak</option>
                            </select>
                            <td><input type="number" name="input_id[]" id="input_id[]" style="display: none;width: 60px;" placeholder="Jumlah" onchange="kuota()"></td>
                            
                        </td>
                        </tr>

        <?php 
                    }
              } 
              $data1 = $this->db->query("SELECT DISTINCT tb_peminjaman.id_peminjaman,tb_peminjaman.kembali,tb_penempatan.id_penempatan,tb_penempatan.id_barang,tb_peminjaman.jumlah,tb_jenisbarang.nama_barang,tb_ruang.nama_ruang,tb_gedung.nama_gedung,tb_pengembalian.keterangan,tb_pengembalian.jumlah as jml
                from tb_penempatan 
                INNER JOIN tb_peminjaman ON tb_peminjaman.id_penempatan = tb_penempatan.id_penempatan 
                INNER JOIN tb_jenisbarang ON  tb_jenisbarang.id_jenisbarang=tb_penempatan.id_barang   
                INNER JOIN tb_ruang ON tb_penempatan.id_ruang=tb_ruang.id_ruang  
                INNER JOIN tb_gedung ON tb_gedung.id_gedung=tb_ruang.id_gedung 
                INNER JOIN tb_pengembalian ON tb_peminjaman.id_penempatan=tb_pengembalian.id_penempatan AND tb_peminjaman.id_peminjaman=tb_pengembalian.id_peminjaman
                WHERE tb_peminjaman.id_peminjaman=".$id);

              foreach ($data1->result_array() as $e) 
              {
                $tdk = $e['jumlah']-$e['jml'];
                if($e['keterangan']=='Tidak Bermasalah')
                {
                    $status = "<span style='color:green;'><b>Tidak Bermasalah</b></span>";
                    $gil = "<i class='glyphicon glyphicon-ok' style='color: green;'></i>";
                }
                else
                {
                    $status = "<span style='color:red;'><b>".$e['jumlah']." ".$e['keterangan']." "."<span style='color:green;'><b><br>".$tdk." Tidak Bermasalah</b></span></span>";
                    $gil = "<i class='glyphicon glyphicon-ok' style='color: red;'></i>";
                }
                  if($r['kembali']=='Y')
                  {
                    ?>
                        <tr>
                        <td><?php echo $gil; ?></td>                
                        <td><?php echo $e['nama_barang'] ?></td>
                        <td><?php echo $e['nama_gedung'] ?></td>
                        <td><?php echo $e['nama_ruang'] ?></td>
                        <td><?php echo $e['jumlah'] ?></td>
                        <td><?php echo $status; ?></td>
                        </tr>
                        <?php
                  }
              }
    }

    $but = $this->db->query("SELECT COUNT(kembali) as jml FROM tb_peminjaman WHERE id_peminjaman=".$id." AND kembali='N'");
              foreach ($but->result_array() as $f) 
              {
                if($f['jml']==0)
                {
                    $bus = "<span style='color:green;'><b></b></span>";
                }
                else
                {
                    $bus = "<button type='submit' class='btn btn-info pull-center' name='tambahData' style='float: right;margin-left: 5px;'><i class='glyphicon glyphicon-save'></i> Kembalikan</button>";
                }
              }
    ?>
                
            
          </table>
          <?php echo $bus; ?>
          <button type='button' class='btn btn-danger' data-dismiss='modal' style="float: right;"><i class="glyphicon glyphicon-remove"></i> Keluar</button>
      </form>

      <script type="text/javascript">
    function viewInput() {
        var e = document.getElementById('input_id[]');
        var f = document.getElementById('keterangan[]').value;
        if(f=="Tidak Bermasalah")
        {
        	document.getElementById('input_id[]').style.display = "none";
        }
        else
        {
        	document.getElementById('input_id[]').style.display = "block";
        }
        
       
    }

    function kuota()
    {
    	var j = document.getElementById('input_id[]').value;
    	var k = document.getElementById('jumlah[]').value;
    	if (j>k) 
    	{
    		alert("Data Melebihi Jumlah");
    		document.getElementById('input_id[]').value ="";
    	}
    	else if(j<0)
    	{
    		alert("Data Tidak Boleh Kurang Dari 0");
    		document.getElementById('input_id[]').value ="";
    	}
    }
    </script>