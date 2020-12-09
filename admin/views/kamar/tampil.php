<div class="container-fluid">
    <div class="row">
        <div class="pull-left">
            <h4>Daftar Kamar</h4>
        </div>
        <div class="pull-right pl-3 mb-3">
            <a href="index.php?mod=kamar&page=add">
                <button class="btn btn-primary">Tambah Data Kamar</button>
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
                    <td>Foto Kamar</td>
                    <td>Nama Kamar</td>
                    <td>Nomor Kamar</td>
                    <td>Harga</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php if ($kamar != NULL) {
                    $no = 1;
                    foreach ($kamar as $row) { ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><img src="<?= $con->site_url() ?>assets/upload/<?= $row['foto_kamar'] ?>" alt="" width="75px">
                    </td>
                    <td><?= $row['jenis_kamar'] ?></td>
                    <td><?= $row['no_kamar'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td>
                        <a href="index.php?mod=kamar&page=edit&id=<?= md5($row['id']) ?>" class="mr-3"><i
                                class="fa fa-pencil"></i>
                        </a>
                        <a href="index.php?mod=kamar&page=delete&id=<?= md5($row['id']) ?>"><i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>