<?php

namespace App\Controllers;

use App\Models\ProgramStudiModel;

class ProgramStudi extends BaseController
{
    public function index()
    {
        $model = new ProgramStudiModel();
        $data['title'] = 'Daftar Program Studi';
        $data['program_studi'] = $model->findAll();

        return view('program_studi/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Program Studi';
        return view('program_studi/create', $data);
    }

    public function store()
    {
        // Validasi input
        if (!$this->validate([
            'nama' => 'required|min_length[3]',
            'kode_prodi' => 'required|min_length[2]',
            'fakultas' => 'permit_empty|min_length[3]',
        ])) {
            return redirect()->back()->withInput()->with('validation', \Config\Services::validation());
        }

        // Simpan data ke database
        $model = new ProgramStudiModel();
        $data = [
            'nama'      => $this->request->getPost('nama'),
            'kode_prodi'=> $this->request->getPost('kode_prodi'),
            'fakultas'  => $this->request->getPost('fakultas'),
        ];

        // Insert data
        $model->save($data);

        return redirect()->to('/program_studi')->with('message', 'Program Studi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $model = new ProgramStudiModel();
        $data['program_studi'] = $model->find($id);
        $data['title'] = 'Edit Program Studi';
        
        if (!$data['program_studi']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Program Studi tidak ditemukan.');
        }

        return view('program_studi/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        if (!$this->validate([
            'nama' => 'required|min_length[3]',
            'kode_prodi' => 'required|min_length[2]',
            'fakultas' => 'permit_empty|min_length[3]',
        ])) {
            return redirect()->back()->withInput()->with('validation', \Config\Services::validation());
        }

        // Update data di database
        $model = new ProgramStudiModel();
        $data = [
            'nama'      => $this->request->getPost('nama'),
            'kode_prodi'=> $this->request->getPost('kode_prodi'),
            'fakultas'  => $this->request->getPost('fakultas'),
        ];

        $model->update($id, $data);
        return redirect()->to('/program_studi')->with('message', 'Program Studi berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new ProgramStudiModel();
        
        // Cek apakah data ada sebelum menghapus
        $programStudi = $model->find($id);
        if (!$programStudi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Program Studi tidak ditemukan.');
        }

        $model->delete($id);
        return redirect()->to('/program_studi')->with('message', 'Program Studi berhasil dihapus.');
    }
}
