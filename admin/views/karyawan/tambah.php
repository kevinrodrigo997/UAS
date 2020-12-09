<h4>Tambah Data</h4>
<br>
<form action="index.php?mod=karyawan&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Foto Mahasiswa</label>
            <input type="file" name="foto" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nama Karyawan</label>
            <input type="text" name="nama_karyawan" required class="form-control">
            <span class="text-danger"><?= (isset($err['nama'])) ? $err['nama'] : ''; ?></span>
        </div>
        <div class="form-group">
            <label for="">ID Karyawan</label>
            <input type="text" name="id_karyawan" required class="form-control">

        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jk" required class="form-control">
                <option value="">Masukkan Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="alamat" required class="form-control"></textarea>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>