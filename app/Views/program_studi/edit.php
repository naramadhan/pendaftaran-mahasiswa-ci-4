<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h2>Edit Program Studi</h2>

<form action="/program_studi/update/<?= $program_studi['id'] ?>" method="post">
    <?= csrf_field() ?>

    <!-- Nama Program Studi -->
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Program Studi:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama', $program_studi['nama']) ?>" required>
        <!-- Menampilkan pesan kesalahan jika ada -->
        <?php if (isset($validation) && $validation->hasError('nama')): ?>
            <div class="text-danger">
                <?= $validation->getError('nama') ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Kode Prodi -->
    <div class="mb-3">
        <label for="kode_prodi" class="form-label">Kode Prodi:</label>
        <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" value="<?= old('kode_prodi', $program_studi['kode_prodi']) ?>" required>
        <!-- Menampilkan pesan kesalahan jika ada -->
        <?php if (isset($validation) && $validation->hasError('kode_prodi')): ?>
            <div class="text-danger">
                <?= $validation->getError('kode_prodi') ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Fakultas -->
    <div class="mb-3">
        <label for="fakultas" class="form-label">Fakultas:</label>
        <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?= old('fakultas', $program_studi['fakultas']) ?>">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>

<?= $this->endSection() ?>
