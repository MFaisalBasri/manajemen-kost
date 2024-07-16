<?php

namespace App\Controllers;

use App\Models\UserModel;

// Add this line to import the class.
use CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $data = [
            'user_list' => $model->getUser(),
            'title'     => 'Data Pengguna',
        ];

        // Tampilkan view dengan data yang telah didapatkan
        return view('templates/header', $data)
            . view('templates/sidebar')
            . view('user/dataUser')
            . view('templates/footer');
    }

    public function buatTagihan(): string
    {
        $model = new TagihanModel();
        $model = new PenyewaanModel();
        $data = [
            'tagihan_list' => $model->getPenyewaan(),
            'title'     => 'Buat Tagihan',
        ];
        return view('templates/header', $data)
            . view('templates/sidebar')
            . view('admin/tagihan/buatTagihan')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['id_penyewaan', 'bulan', 'status']);

        // Checks whether the submitted data passed the validation rules.
        if (!$this->validateData($data, [
            'id_penyewaan' => 'required|max_length[255]|min_length[1]',
            'bulan' => 'required|max_length[255]|min_length[1]',
            'status' => 'max_length[255]',
        ])) {
            // The validation fails, so returns the form.
            return $this->buatTagihan();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(TagihanModel::class);
        $model->insert([
            'id_penyewaan' => $post['id_penyewaan'],
            'bulan' => $post['bulan'],
            'status' => $post['status'],
        ]);
        $penyewaanModel = model(PenyewaanModel::class);
        $penyewaanModel->update($post['id_penyewaan'], ['status_pembayaran' => 'Belum Lunas']);

        session()->setFlashdata('success', 'Data berhasil disimpan.');
        return redirect()->to('data-tagihan');
    }


    public function detailPenyewaan($id)
    {
        $model = model(PenyewaanModel::class);

        $data = [
            'penyewaan_item' => $model->getDetailPenyewaan($id),
            'title'     => 'Data Penyewaan',
        ];

        return view('templates/header', $data)
            . view('templates/sidebar')
            . view('admin/penyewaan/editPenyewaan')
            . view('templates/footer');
    }

    public function editPenyewaan()
    {
        helper('form');

        // Ambil data dari POST termasuk nomor_kamar
        $data = $this->request->getPost(['id', 'nomor_kamar', 'tanggal_penyewaan']);

        // Validasi data
        if (!$this->validateData($data, [
            'id' => 'required|min_length[1]',
            'nomor_kamar' => 'required',
            'tanggal_penyewaan' => 'required|max_length[255]|min_length[3]',
        ])) {
            // The validation fails, so returns the form.
            return $this->editPenyewaan();
        }

        // Dapatkan data yang divalidasi
        $validatedData = $this->validator->getValidated();

        // Cek apakah data dengan nomor_kamar tersebut ada
        $model = model(PenyewaanModel::class);

        // Update data kamar
        $model->update($validatedData['id'], [
            'tanggal_penyewaan' => $validatedData['tanggal_penyewaan'],
        ]);
        session()->setFlashdata('success', 'Data berhasil diupdate.');
        // Redirect atau tampilkan view setelah berhasil update
        return redirect()->to('data-penyewaan')->with('success', 'Data kamar berhasil diupdate');
    }

    public function hapusTagihan($id)
    {
        $model = model(TagihanModel::class);

        // Ambil data kamar berdasarkan nomor kamar
        $tagihan = $model->where('id', $id)->first();

        if (!$tagihan) {
            session()->setFlashdata('error', 'Data Tagihan tidak ditemukan.');
            return redirect()->to('data-tagihan');
        }

        // Hapus entri data kamar dari basis data
        $model->where('id', $id)->delete();


        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('data-tagihan');
    }
}
