<div class="container-fluid">
    <div class="row">
        <div class="pull-left">
            <h4>Daftar Karyawan</h4>
        </div>
        <div class="pull-right pl-3 mb-3">
            <a href="index.php?mod=karyawan&page=add">
                <button class="btn btn-primary">Tambah Data Karyawan</button>
            </a>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-4">
            <form>
                <input class="form-control" id="search_siswa" type="text" placeholder="Cari Nama atau ID Karyawan"
                    name="search">
            </form>
        </div>
    </div>
    <div class="row" id="result">
        <table class="table">
            <thead>
                <tr>
                    <td>
                        #
                    </td>
                    <td>Foto Karyawan</td>
                    <td>Nama Karyawan</td>
                    <td>ID Karyawan</td>
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
                    <td><img src="<?= $con->site_url() ?>assets/upload/<?= $row['foto_karyawan'] ?>" alt=""
                            width="75px">
                    </td>
                    <td><?= $row['nama_karyawan'] ?></td>
                    <td><?= $row['id_karyawan'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td>
                        <a href="index.php?mod=karyawan&page=edit&id=<?= md5($row['id']) ?>" class="mr-3"><i
                                class="fa fa-pencil"></i>
                        </a>
                        <a href="index.php?mod=karyawan&page=delete&id=<?= md5($row['id']) ?>"><i
                                class="fa fa-trash"></i>
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
</div>