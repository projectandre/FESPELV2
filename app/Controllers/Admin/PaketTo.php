<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JenisToModel;
use App\Models\PaketToModel;
use App\Models\SoalModel;
use Config\Services;

class PaketTo extends BaseController
{
    public function index()
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $paketto = new PaketToModel();
        $jenisto = new JenisToModel();

        $data = [
            'title' => 'Paket Try Out',
            'paket' => $paketto->tampil_data_paket(),
            'jenis' => $jenisto->findAll(),
        ];
        return view('staff/paket/paket_to', $data);
    }

    public function tambahpaketTryOut()
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        $paketto = new PaketToModel();
        $paketto->insert([
            'kode_paket' => 'PK' . str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'nama_paket' => $this->request->getVar('nama_paket'),
            'kode_jt' => $this->request->getVar('kode_jt')
        ]);

        session()->setFlashdata('ptryout', 'ditambah');
        return redirect()->to('dashboard/admin/paket_try_out');
    }

    public function editpaketTryOut($kode_paket)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $jenisto = new JenisToModel();
        $paketto = new PaketToModel();

        $data = [
            'title' => 'Edit Psket Try Out',
            'paket' => $paketto->find($kode_paket),
            'jenis' => $jenisto->findAll(),
        ];
        return view('staff/paket/edit_paket', $data);
    }

    public function hapuspaketTryOut($kode_paket)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        // $id_periode = base64_decode(base64_decode($id_periode));

        $paketto = new PaketToModel();

        $paketto->delete($kode_paket);
        session()->setFlashdata('ptryout', 'dihapus');

        return redirect()->to('dashboard/admin/paket_try_out');
    }


    public function updatepaketTryOut($kode_paket)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        // $id_periode = base64_decode(base64_decode($id_periode));


        $paketto = new PaketToModel();

        $dataupdate = [
            'nama_paket' => $this->request->getVar('nama_paket'),
            'kode_jt' => $this->request->getVar('kode_jt'),
        ];

        $paketto->update_data_paket($dataupdate, $kode_paket);

        session()->setFlashdata('ptryout', 'diupdate');

        return redirect()->to('dashboard/admin/paket_try_out');
    }



    public function detail_paket($kode_paket)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        $paketto = new PaketToModel();
        $soalto = new SoalModel();


        $data = [
            'title' => 'Detail Paket Try Out',
            'paket' => $paketto->tampil_data_paket(),
            'soal' => $soalto->tampil_data_soal($kode_paket),
            'kode_paket' => $kode_paket
        ];
        return view('staff/paket/detail_paket', $data);
    }

    public function tambah_soal()
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        $soalto = new SoalModel();
        $soalto->insert([
            'kode_soal' => 'KS' . str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'no_soal' => $this->request->getVar('no_soal'),
            'pertanyaan' => $this->request->getVar('pertanyaan'),
            'pilihan_a' => $this->request->getVar('pilihan_a'),
            'pilihan_b' => $this->request->getVar('pilihan_b'),
            'pilihan_c' => $this->request->getVar('pilihan_c'),
            'pilihan_d' => $this->request->getVar('pilihan_d'),
            'pilihan_e' => $this->request->getVar('pilihan_e'),
            'poin_a' => $this->request->getVar('poin_a'),
            'poin_b' => $this->request->getVar('poin_b'),
            'poin_c' => $this->request->getVar('poin_c'),
            'poin_d' => $this->request->getVar('poin_d'),
            'poin_e' => $this->request->getVar('poin_e'),
            'pembahasan' => $this->request->getVar('pembahasan'),
            'kode_paket' => $this->request->getVar('kode_paket'),
        ]);

        session()->setFlashdata('soal', 'ditambah');
        return redirect()->to('dashboard/admin/detail_paket/' . $this->request->getVar('kode_paket'));
    }

    public function hapus_soal($id_soal, $kode_paket)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        // $id_periode = base64_decode(base64_decode($id_periode));

        $soalto = new SoalModel();

        $soalto->delete($id_soal);
        session()->setFlashdata('soal', 'dihapus');

        return redirect()->to('dashboard/admin/detail_paket/' . $kode_paket);
    }

    public function edit_soal($id_soal, $kode_paket)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        $paketto = new PaketToModel();
        $soalto = new SoalModel();

        $data = [
            'title' => 'Edit Soal',
            'paket' => $paketto->tampil_data_paket(),
            'soal' => $soalto->find($id_soal),
            'kode_paket' => $kode_paket
        ];
        return view('staff/paket/edit_soal', $data);
    }

    public function update_soal($id_soal, $kode_paket)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        // $id_periode = base64_decode(base64_decode($id_periode));


        $soalto = new SoalModel();

        $dataupdate = [
            'no_soal' => $this->request->getVar('no_soal'),
            'pertanyaan' => $this->request->getVar('pertanyaan'),
            'pilihan_a' => $this->request->getVar('pilihan_a'),
            'pilihan_b' => $this->request->getVar('pilihan_b'),
            'pilihan_c' => $this->request->getVar('pilihan_c'),
            'pilihan_d' => $this->request->getVar('pilihan_d'),
            'pilihan_e' => $this->request->getVar('pilihan_e'),
            'jawaban_benar' => $this->request->getVar('jawaban_benar'),
            'pembahasan' => $this->request->getVar('pembahasan'),
        ];

        $soalto->update_soal($dataupdate, $id_soal);

        session()->setFlashdata('soal', 'diupdate');

        return redirect()->to('dashboard/admin/detail_paket/' . $kode_paket);
    }
}
