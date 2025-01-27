<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2 class="mb-4">Tambah Program Studi</h2>

<form action="/program_studi/store" method="post">
    <?= csrf_field() ?>

    <!-- Nama Program Studi -->
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Program Studi:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama') ?>" required>
        <!-- Tampilkan pesan kesalahan jika ada -->
        <?php if (isset($validation) && $validation->hasError('nama')): ?>
            <div class="text-danger">
                <?= $validation->getError('nama') ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Kode Prodi -->
    <div class="mb-3">
        <label for="kode_prodi" class="form-label">Kode Prodi:</label>
        <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" value="<?= old('kode_prodi') ?>" required>
        <!-- Tampilkan pesan kesalahan jika ada -->
        <?php if (isset($validation) && $validation->hasError('kode_prodi')): ?>
            <div class="text-danger">
                <?= $validation->getError('kode_prodi') ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Fakultas -->
    <div class="mb-3">
        <label for="fakultas" class="form-label">Fakultas:</label>
        <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?= old('fakultas') ?>">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>
