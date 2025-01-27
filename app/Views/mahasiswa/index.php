<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Daftar Mahasiswa</h2>

<a href="/mahasiswa/create" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

<!-- Tampilkan flash message jika ada -->
<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Alamat</th>
            <th>Nomor Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $no++ ?></td> <!-- Menampilkan nomor urut -->
                <td><?= $mhs['nama'] ?></td>
                <td><?= $mhs['nim'] ?></td>
                <td><?= $mhs['alamat'] ?: '-' ?></td>
                <td><?= $mhs['nomor_telepon'] ?: '-' ?></td>
                <td>
                    <a href="/mahasiswa/edit/<?= $mhs['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/mahasiswa/delete/<?= $mhs['id'] ?>" method="post" style="display:inline;">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn-delete btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>

                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
