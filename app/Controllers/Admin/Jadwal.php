<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaketToModel;
use App\Models\JadwalModel;



class Jadwal extends BaseController
{
    public function index()
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $paketto = new PaketToModel();
        $jadwalto = new JadwalModel();
        $data = [
            'title' => 'Jadwal Try Out',
            'paket' => $paketto->tampil_data_paket(),
            'jadwal' => $jadwalto->tampil_data_jadwal()
        ];
        return view('staff/jadwal/jadwal', $data);
    }

    public function tambah_jadwal()
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        $jadwalto = new JadwalModel();

        $jadwalto->insert([
            'kode_jadwal' => 'JO' . str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'kode_paket' => $this->request->getVar('kode_paket'),
            'tempat' => $this->request->getVar('tempat'),
            'tgl_pelaksanaan' => $this->request->getVar('tgl_pelaksanaan'),
            'tgl_daftar' => $this->request->getVar('tgl_daftar'),
            'tgl_tutup' => $this->request->getVar('tgl_tutup'),
            'jam_mulai' => $this->request->getVar('jam_mulai'),
            'jam_selesai' => $this->request->getVar('jam_selesai'),
            'biaya' => $this->request->getVar('biaya')
        ]);

        session()->setFlashdata('jadwal_admin', 'ditambah');
        return redirect()->to('dashboard/admin/jadwal');
    }

    public function editjadwalTryOut($id_jadwal)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $jadwalto = new JadwalModel();
        $paketto = new PaketToModel();

        $data = [
            'title' => 'Edit Jadwal Try Out',
            'jadwal' => $jadwalto->find($id_jadwal),
            'paket' => $paketto->findAll(),
        ];
        return view('staff/jadwal/edit_jadwal', $data);
    }

    public function updatejadwalTryOut($kode_jadwal)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        // $id_periode = base64_decode(base64_decode($id_periode));

        $jadwalto = new JadwalModel();

        $dataupdate = [
            'kode_paket' => $this->request->getVar('kode_paket'),
            'tempat' => $this->request->getVar('tempat'),
            'tgl_pelaksanaan' => $this->request->getVar('tgl_pelaksanaan'),
            'tgl_daftar' => $this->request->getVar('tgl_daftar'),
            'tgl_tutup' => $this->request->getVar('tgl_tutup'),
            'jam_mulai' => $this->request->getVar('jam_mulai'),
            'jam_selesai' => $this->request->getVar('jam_selesai'),
            'biaya' => $this->request->getVar('biaya'),
            'update_at' => date('Y-m-d H:i:s')
        ];

        $jadwalto->update_data_jadwal($dataupdate, $kode_jadwal);

        session()->setFlashdata('jadwal_admin', 'diupdate');

        return redirect()->to('dashboard/admin/jadwal');
    }

    public function hapusjadwalTryOut($id_jadwal)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        // $id_periode = base64_decode(base64_decode($id_periode));

        $jadwalto = new JadwalModel();

        $jadwalto->delete($id_jadwal);
        session()->setFlashdata('jadwal_admin', 'dihapus');

        return redirect()->to('dashboard/admin/jadwal');
    }

    public function detailjadwalTryOut($id_jadwal)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $jadwalto = new JadwalModel();
        $paketto = new PaketToModel();

        $data = [
            'title' => 'Detail Jadwal Try Out',
            'jadwal' => $jadwalto->find($id_jadwal),
            'paket' => $paketto->findAll(),
        ];
        return view('staff/jadwal/detail_jadwal', $data);
    }
}
