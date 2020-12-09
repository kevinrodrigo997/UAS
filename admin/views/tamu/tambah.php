<h4>Tambah Data</h4>
<br>
<form action="index.php?mod=produk&page=save" method="POST">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Nama Tamu</label>
            <input type="text" name="nama_tamu" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">NIK</label>
            <input type="text" name="nik" required class="form-control">

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
            <textarea type="number" name="alamat" required class="form-control"></textarea>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>