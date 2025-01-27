<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Tambah Mahasiswa</h2>

<form action="/mahasiswa/store" method="post">
    <?= csrf_field() ?>
    <div>
        <label for="nama">Nama Lengkap:</label><br>
        <input type="text" name="nama" id="nama" value="<?= old('nama') ?>" required>
    </div>
    <br>
    <div>
        <label for="nim">NIM:</label><br>
        <input type="text" name="nim" id="nim" value="<?= old('nim') ?>" required>
    </div>
    <br>
    <div>
        <label for="alamat">Alamat (Opsional):</label><br>
        <textarea name="alamat" id="alamat"><?= old('alamat') ?></textarea>
    </div>
    <br>
    <div>
        <label for="nomor_telepon">Nomor Telepon :</label><br>
        <input type="text" name="nomor_telepon" id="nomor_telepon" value="<?= old('nomor_telepon') ?>">
    </div>
    <br>
    <button type="submit" class="btn-submit">Simpan</button>

</form>

<a href="/mahasiswa">Kembali</a>

<?php if (session()->getFlashdata('errors')) : ?>
    <ul style="color: red;">
        <?php foreach (session()->getFlashdata('errors') as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?= $this->endSection() ?>
