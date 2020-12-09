<h4>Ubah Data</h4>
<br>
<form action="index.php?mod=produk&page=proses_edit" method="POST">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Nama Tamu</label>
            <input type="text" name="nama_tamu" required
                value="<?= (isset($_POST['nama_tamu'])) ? $_POST['nama_tamu'] : ''; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="">NIK</label>
            <input type="text" name="nik" value="<?= (isset($_POST['nik'])) ? $_POST['nik'] : ''; ?>" required
                class="form-control">

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
        <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>