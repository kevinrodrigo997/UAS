<div class="row">
    <div class="pull-left">
        <h4>Daftar Tamu</h4>
    </div>
    <div class="pull-right pl-3 mb-3">
        <a href="index.php?mod=tamu&page=add">
            <button class="btn btn-primary">Tambah Data Tamu</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>
                    #
                </td>
                <td>Nama</td>
                <td>NIK</td>
                <td>Jenis Kelamin</td>
                <th>alamat</th>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if ($tamu != NULL) {
                $no = 1;
                foreach ($tamu as $row) { ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_tamu'] ?></td>
                <td><?= $row['nik'] ?></td>
                <td><?= $row['jenis_kelamin'] ?></td>
                <td><?= $row['alamat'] ?></td>
                <td>
                    <a href="index.php?mod=tamu&page=edit&id=<?= md5($row['id']) ?>"><i class="fa fa-pencil"></i> </a>
                    <a href="index.php?mod=tamu&page=delete&id=<?= md5($row['id']) ?>"><i class="fa fa-trash"></i> </a>
                </td>
            </tr>
            <?php $no++;
                }
            } ?>
        </tbody>
    </table>
</div>