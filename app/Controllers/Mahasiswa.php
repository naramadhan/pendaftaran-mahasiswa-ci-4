<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class Mahasiswa extends Controller
{
    // Menampilkan Daftar Mahasiswa
    public function index()
    {
        $mahasiswaModel = new MahasiswaModel();
        $data['title'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $mahasiswaModel->findAll();
        
        return view('mahasiswa/index', $data);
    }

    // Menampilkan halaman untuk menambah mahasiswa
    public function create()
    {
        $data['title'] = 'Tambah Mahasiswa';
        return view('mahasiswa/create', $data);
    }

    // Menyimpan data mahasiswa baru
    public function store()
    {
        $mahasiswaModel = new MahasiswaModel();
        $validation = \Config\Services::validation();

        // Validasi input
        if (!$this->validate([
            'nama' => 'required',
            'nim' => 'required|alpha_numeric',
            'alamat' => 'permit_empty',
            'nomor_telepon' => 'permit_empty|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Menyimpan data mahasiswa
        $mahasiswaModel->save([
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
        ]);

        return redirect()->to('/mahasiswa')->with('message', 'Mahasiswa berhasil ditambahkan.');
    }

    // Menampilkan halaman untuk mengedit data mahasiswa
    public function edit($id)
    {
        $mahasiswaModel = new MahasiswaModel();
        $data['mahasiswa'] = $mahasiswaModel->find($id);
        
        if (!$data['mahasiswa']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data mahasiswa tidak ditemukan.');
        }

        $data['title'] = 'Edit Mahasiswa';
        return view('mahasiswa/edit', $data);
    }

    // Mengupdate data mahasiswa
    public function update($id)
    {
        $mahasiswaModel = new MahasiswaModel();
        $validation = \Config\Services::validation();

        // Validasi input
        if (!$this->validate([
            'nama' => 'required',
            'nim' => 'required|alpha_numeric',
            'alamat' => 'permit_empty',
            'nomor_telepon' => 'permit_empty|numeric',
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Update data mahasiswa
        $mahasiswaModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'nim' => $this->request->getPost('nim'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
        ]);

        return redirect()->to('/mahasiswa')->with('message', 'Data mahasiswa berhasil diperbarui.');
    }

    // Menghapus data mahasiswa
    public function delete($id)
    {
        $mahasiswaModel = new MahasiswaModel();

        if (!$mahasiswaModel->find($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data mahasiswa tidak ditemukan.');
        }

        $mahasiswaModel->delete($id);

        return redirect()->to('/mahasiswa')->with('message', 'Data mahasiswa berhasil dihapus.');
    }
}
