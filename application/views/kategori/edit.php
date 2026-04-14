<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Edit kategori</h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('kategori/update/'.$kategori->id);?>">
    <div class="form-group">
    <input type="hidden" name="id" value="<?= $kategori->id; ?>">
    <label>Nama kategori</label><br>
    <input type="text" name="nama_kategori" class="form-control" value="<?= $kategori->nama_kategori;?>" required>
    </div>

    <br><br>

    <button type="submit" class="btn btn-primary mb-4">Update</button>
    <a href="<?= site_url('kategori');?>" class="btn btn-secondary mb-4">Kembali</a>
</form>

</div>
</div>
</div>