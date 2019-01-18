
<center><h3><u>Permohonan Peminjaman Barang</u></h3></center>
<br>
<br>
<span>Saya yang bertanda tangan di bawah ini:</span></br></br>
<div style="margin-left: 2em">
<table border="0">
	<?php
       	foreach ($data as $r) {
       		$id = $r['id_peminjaman'];
       		$nama = $r['nama'];
       		$alamat = $r['alamat'];
       		$telp = $r['hp'];
       		$email = $r['email'];
    	}
    ?>
	<tr><td>No Peminjaman</td><td>:</td><td><span><b><?php echo $id;?></b></span></td></tr>
	<tr><td>Nama Peminjam</td><td>:</td><td><span><b><?php echo $nama;?></b></span></td></tr>
	<tr><td>Alamat</td><td>:</td><td><span><b><?php echo $alamat;?></b></span></td></tr>
	<tr><td>No Telpon</td><td>:</td><td><span><b><?php echo $telp;?></b></span></td></tr>
	<tr><td>Email</td><td>:</td><td><span><b><?php echo $email;?></b></span></td></tr>
</table></div><br>
<span>Dengan ini mengajukan permohonan peminjaman Barang kepada Perusahaan sebagai berikut:</span><br><br>
<div >
<table id='example1' class='table table-bordered table-striped'">
	<tr><th>Id Barang</th><th>Nama Barang</th><th>Jumlah</th><th>Tanggal Pinjam</th><th>Tangal Kembali</th><th>Keperluan</th></tr>
	<?php
       	foreach ($data as $r) {
       		$tgl = $r['tanggal'];
       		$user = $r['username'];
    ?>
    <tr>
    <td><?php echo $r['id_barang'] ?></td>
    <td><?php echo $r['nama_barang'] ?></td>
    <td><?php echo $r['jumlah'] ?></td>
    <td><?php echo $r['tanggal'] ?></td>
    <td><?php echo $r['lama_pinjam'] ?></td>
    <td><?php echo $r['keperluan_pinjam'] ?></td>
	</tr>
	<?php
	}
	?>
</table></div><br><br>
<span><b><i>Ketentuan : Saya akan melakukan penggantian atau perbaikan dalam hal Barang tersebut hilang atau rusak.</i></b></span><br><br>
<span>Demikian permohonan ini saya ajukan.</span><br><br><br>
<table  style="width:100%">
	<tr><td></td><td style="float: right;">Malang, <?php echo $tgl;?></td></tr>
	<tr><td>Mengetahui</td><td style="float: right;">Hormat Saya, </td></tr>
	<tr><td><br></td></tr>
	<tr><td><br></td></tr>
	<tr><td><br></td></tr>
	<tr><td><?php echo $user; ?></td><td style="float: right;"><?php echo $nama; ?></td></tr>
</table>
<?php
echo
"<script>
window.print();
setTimeout(window.close, 0);
</script>";
?>