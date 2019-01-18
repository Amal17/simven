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
                    
                </tr>

                <?php } ?>