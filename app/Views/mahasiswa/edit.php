<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Edit Mahasiswa</h2>

<form action="/mahasiswa/update/<?= $mahasiswa['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div>
        <label for="nama">Nama Lengkap:</label><br>
        <input type="text" name="nama" id="nama" value="<?= old('nama', $mahasiswa['nama']) ?>" required>
    </div>
    <br>
    <div>
        <label for="nim">NIM:</label><br>
        <input type="text" name="nim" id="nim" value="<?= old('nim', $mahasiswa['nim']) ?>" required>
    </div>
    <br>
    <div>
        <label for="alamat">Alamat (Opsional):</label><br>
        <textarea name="alamat" id="alamat"><?= old('alamat', $mahasiswa['alamat']) ?></textarea>
    </div>
    <br>
    <div>
        <label for="nomor_telepon">Nomor Telepon (Opsional):</label><br>
        <input type="text" name="nomor_telepon" id="nomor_telepon" value="<?= old('nomor_telepon', $mahasiswa['nomor_telepon']) ?>">
    </div>
    <br>
    <button type="submit" class="btn-submit">Simpan</button>
</form>

<a href="/mahasiswa">Kembali</a>

<?= $this->endSection() ?>
