<h4>Ubah Data</h4>
<br>
<form action="index.php?mod=kamar&page=proses_edit" method="POST" enctype="multipart/form-data">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Foto Kamar</label>
            <input type="file" name="foto" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Kamar</label>
            <input type="text" name="nama" required
                value="<?= (isset($_POST['jenis_kamar'])) ? $_POST['jenis_kamar'] : ''; ?>" class="form-control">
            <span class="text-danger"><?= (isset($err['nama'])) ? $err['nama'] : ''; ?></span>
        </div>
        <div class="form-group">
            <label for="">No Kamar</label>
            <input type="text" name="no_kamar" required
                value="<?= (isset($_POST['no_kamar'])) ? $_POST['no_kamar'] : ''; ?>" class="form-control">

        </div>
        <div class="form-group">
            <label for="">Harga Kamar</label>
            <input type="number" min="0" name="harga" required
                value="<?= (isset($_POST['harga'])) ? $_POST['harga'] : ''; ?>" class="form-control">

        </div>
        <input type="hidden" name="id" value="<?= (isset($_POST['id'])) ? $_POST['id'] : ''; ?>">
        <input type="hidden" name="file_old" value="<?= (isset($_POST['foto_kamar'])) ? $_POST['foto_kamar'] : ''; ?>">
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="submit">Save</button>
        </div>
    </div>
</form>