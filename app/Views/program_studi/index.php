<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Daftar Program Studi</h2>

<a href="/program_studi/create" class="btn btn-primary mb-3">Tambah Program Studi</a>

<!-- Tampilkan flash message jika ada -->
<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
<?php endif; ?>

<!-- Menampilkan pesan jika tidak ada data program studi -->
<?php if (empty($program_studi)) : ?>
    <div class="alert alert-warning">Belum ada program studi yang terdaftar.</div>
<?php else : ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode Prodi</th>
                <th>Fakultas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?> 
            <?php foreach ($program_studi as $prodi) : ?>
                <tr>
                    <td><?= $no++ ?></td> 
                    <td><?= $prodi['nama'] ?></td>
                    <td><?= $prodi['kode_prodi'] ?></td>
                    <td><?= $prodi['fakultas'] ?: '-' ?></td>
                    <td>
                        <a href="/program_studi/edit/<?= $prodi['id'] ?>" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Form delete dengan metode POST untuk penghapusan -->
                        <form action="/program_studi/delete/<?= $prodi['id'] ?>" method="post" style="display:inline;">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn-delete btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?= $this->endSection() ?>
