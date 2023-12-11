<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JenisToModel;
use App\Models\PaketToModel;
use Config\Services;

class JenisTo extends BaseController
{
    public function index()
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $jenisto = new JenisToModel();

        $data = [
            'title' => 'Jenis Try Out',
            'jenis' => $jenisto->findAll(),
        ];
        return view('staff/jenis/jenis_to', $data);
    }

    public function tambah_TryOut()
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        $jenisto = new JenisToModel();
        $jenisto->insert([
            'kode_jt' => 'TO' . str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT),
            'jenis_to' => $this->request->getVar('jenis_to')
        ]);

        session()->setFlashdata('tryout', 'ditambah');
        return redirect()->to('dashboard/admin/jenis_try_out');
    }

    public function edit_TryOut($kode_jt)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $jenisto = new JenisToModel();

        $data = [
            'title' => 'Edit Jenis Try Out',
            'jenis' => $jenisto->find($kode_jt),
        ];
        return view('staff/jenis/edit_jenis_to', $data);
    }

    public function hapus_TryOut($kode_jt)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        // $id_periode = base64_decode(base64_decode($id_periode));

        $paketto = new PaketToModel();

        $cek = $paketto->where('kode_jt', $kode_jt)->first();

        if ($cek == null) {

            $jenisto = new JenisToModel();

            $jenisto->delete($kode_jt);
            session()->setFlashdata('tryout', 'dihapus');

            return redirect()->to('dashboard/admin/jenis_try_out');
        }
        session()->setFlashdata('tryout', 'fail');

        return redirect()->to('dashboard/admin/jenis_try_out');
    }


    public function update_TryOut($kode_jt)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        // $id_periode = base64_decode(base64_decode($id_periode));


        $jenisto = new JenisToModel();

        $jenisto->save([
            'kode_jt' => $kode_jt,
            'jenis_to' => $this->request->getVar('jenis_to')
        ]);

        session()->setFlashdata('tryout', 'diupdate');

        return redirect()->to('dashboard/admin/jenis_try_out');
    }
}
