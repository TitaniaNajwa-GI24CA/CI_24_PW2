<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800" class="fas fa-plus-circle">Tambah kategori</h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('kategori/simpan');?>">
    <div class="form-group">
    <label>Nama kategori</label><br>
    <input type="text" name="nama_kategori" class="form-control" required>
    </div>

    <br><br>

    <button type="submit" class="btn btn-primary mb-4">Simpan</button>
    <a href="<?= site_url('kategori');?>" class="btn btn-secondary mb-4">Kembali</a>
</form>

</div>
</div>
</div>