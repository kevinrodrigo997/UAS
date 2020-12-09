<h4>Ubah Data</h4>
<br>
<form action="index.php?mod=karyawan&page=proses_edit" method="POST" enctype="multipart/form-data">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Foto Karyawan</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" required
                value="<?= (isset($_POST['nama_karyawan'])) ? $_POST['nama_karyawan'] : ''; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="">ID Karyawan</label>
            <input type="text" name="id_karyawan" required
                value="<?= (isset($_POST['id_karyawan'])) ? $_POST['id_karyawan'] : ''; ?>" class="form-control">
        </div>
        <?php
        $lk = '';
        $pr = '';
        if ($_POST['jenis_kelamin'] == "Laki-Laki") {
            $lk = "selected";
        } else {
            $pr = "selected";
        }

        ?>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jk" required class="form-control">
                <option value="">Masukkan Jenis Kelamin</option>
                <option value="Laki-Laki" <?= $lk ?>>Laki-Laki</option>
                <option value="Perempuan" <?= $pr ?>>Perempuan</option>
            </select>

        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea type="number" name="alamat" required class="form-control"><?= $_POST['alamat']; ?>
            </textarea>

        </div>
        <input type="hidden" name="id" value="<?= (isset($_POST['id'])) ? $_POST['id'] : ''; ?>">
        <input type="hidden" name="file_old"
            value="<?= (isset($_POST['foto_karyawan'])) ? $_POST['foto_karyawan'] : ''; ?>">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>