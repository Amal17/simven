
<center><h3><u>LAPORAN PEMINJAMAN</u></h3></center>
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
        <th>Kode peminjaman</th>
        <th>Nama Barang</th>
        <th>Tempat</th>
        <th>Jumlah</th>
        <th>Tgl pinjam</th>
        <th>Tgl Kembali</th>
        <th>Keperluan</th>
        <th>Peminjam</th>
        <th>Karyawan</th>
        <th>Status</th>
      </tr>
  </thead>
      <tbody>
        <?php
        foreach ($data as $r) {
        ?>
      <tr>
        <td><?php echo $r['id_peminjaman'] ?></td>
        <td><?php echo $r['nama_barang'] ?></td>
        <td><?php echo $r['nama_ruang'] ?></td>
        <td><?php echo $r['jumlah'] ?></td>
        <td><?php echo $r['tanggal'] ?></td>
        <td><?php echo $r['lama_pinjam'] ?></td>
        <td><?php echo $r['keperluan_pinjam'] ?></td>
        <td><?php echo $r['nama'] ?></td>
        <td><?php echo $r['username'] ?></td>
        <td><?php if ($r['kembali']=='Y') {
                        echo "Sudah kembali";
                  }else{
                        echo "Belum kembali";
                  } ?></td>
      </tr>
      <?php } ?>
  </tbody>
</table></div>
<?php
echo
"<script>
window.print();
setTimeout(window.close, 0);
</script>";
?>
