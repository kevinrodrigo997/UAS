 <table class="table">
     <thead>
         <tr>
             <td>
                 #
             </td>
             <td>Foto Karyawan</td>
             <td>Nama Karyawan</td>
             <td>Nomor Induk Karyawan</td>
             <td>Jenis Kelamin</td>
             <td>Alamat</td>
             <td>Aksi</td>
         </tr>
     </thead>
     <tbody>
         <?php if ($karyawan != NULL) {
                $no = 1;
                foreach ($karyawan as $row) { ?>
         <tr>
             <td><?= $no ?></td>
             <td><img src="<?= $con->site_url() ?>assets/upload/<?= $row['foto_karyawan'] ?>" alt="" width="75px">
             </td>
             <td><?= $row['nama_karyawan'] ?></td>
             <td><?= $row['id_karyawan'] ?></td>
             <td><?= $row['jenis_kelamin'] ?></td>
             <td><?= $row['alamat'] ?></td>
             <td>
                 <a href="index.php?mod=karyawan&page=edit&id=<?= md5($row['id']) ?>" class="mr-3"><i
                         class="fa fa-pencil"></i>
                 </a>
                 <a href="index.php?mod=karyawan&page=delete&id=<?= md5($row['id']) ?>"><i class="fa fa-trash"></i>
                 </a>
             </td>
         </tr>
         <?php $no++;
                }
            }
            ?>
     </tbody>
 </table>