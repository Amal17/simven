
<center><h3><u>LAPORAN PENGAMBILAN</u></h3></center>
<?php
  if ($tgl_awal!='0000-00-00' && $tgl_akhir!='9999-12-31') {
    echo '<h5><center>';
    echo 'Tanggal : '.$tgl_awal.' sampai '.$tgl_akhir;
    echo '</center></h5>';
  }
?>
<br>


<table class='table table-bordered table-striped'">
	<thead>
      <tr>
        <th align="center">No</th>
        <th align="center">Nama Barang</th>
        <th align="center">Tempat</th>
        <th align="center">Jumlah</th>
        <th align="center">Tanggal</th>
        <th align="center">Keperluan</th>
        <th align="center">Pengambil</th>
        <th align="center">Karyawan</th>
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
        <td><?php echo $r['jumlah_ambil'] ?></td>
        <td><?php echo $r['tanggal_ambil'] ?></td>
        <td><?php echo $r['keperluan'] ?></td>
        <td><?php echo $r['pengambil'] ?></td>
        <td><?php echo $r['username'] ?></td>
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
