<h4>Tambah Data Kamar</h4>
<br>
<h1 id="result"></h1>
<form action="index.php?mod=kamar&page=save" method="POST" id="form_dosen" enctype="multipart/form-data">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Foto Kamar</label>
            <input type="file" name="foto" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Jenis Kamar</label>
            <input type="text" name="nama" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Nomer Kamar</label>
            <input type="text" name="no_kamar" required class="form-control">

        </div>
        <div class="form-group">
            <label for="">Harga Kamar</label>
            <input type="number" min="0" name="harga" required class="form-control">

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="form-submit">Save</button>
        </div>
    </div>
</form>