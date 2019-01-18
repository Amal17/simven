
<center><h3><u>LAPORAN INVENTARIS</u></h3></center>
<br>


<table class='table table-bordered table-striped'">
	<thead>
      <tr>
      <th align="center">No</th>
      <th align="center">Nama Barang</th>
      <th align="center">Nama Ruang</th>
      <th align="center">Nama Gedung</th>
      <th align="center">Jumlah Barang</th>
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
</table></div>
<?php
echo
"<script>
window.print();
setTimeout(window.close, 0);
</script>";
?>