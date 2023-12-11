<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\JenisToModel;
use App\Models\PaketToModel;
use App\Models\JadwalModel;
use App\Models\PembayaranModel;

use Config\Services;

class Validasi extends BaseController
{
    public function index()
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $jenisto = new JenisToModel();

        $data = [
            'title' => 'Pilih Jenis Try Out',
            'jenis' => $jenisto->findAll(),
        ];
        return view('staff/validasi/data_validasi_jenis', $data);
    }

    public function data_paket($kode_jt)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $paketto = new PaketToModel();

        $data = [
            'title' => 'Pilih Paket Try Out',
            'paket' => $paketto->tampil_data_paket_validasi($kode_jt),
        ];
        return view('staff/validasi/data_validasi_paket', $data);
    }

    public function data_status($kode_paket)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $jadwalto = new JadwalModel();

        $data = [
            'title' => 'Pilih Status Pembayaran',
            'jadwal' => $jadwalto->data_jadwal_with_kode($kode_paket)
        ];

        return view('staff/validasi/status_validasi', $data);
    }

    public function data_pembayaran($status, $kode_jadwal, $kode_paket)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $pembayaranto = new PembayaranModel();

        $data = [
            'title' => 'Data Pembayaran',
            'pembayaran' => $pembayaranto->data_pembayaran_all_with_status($status, $kode_jadwal, $kode_paket)
        ];

        return view('staff/validasi/data_validasi', $data);
    }

    public function verifikasi_pembayaran($kode_pembayaran)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $pembayaranto = new PembayaranModel();

        $dataupdate = [
            'validasi_pembayaran' => 'sudah',
            'update_at' => date('Y-m-d H:i:s')
        ];

        $update = $pembayaranto->update_data_pembayaran($dataupdate, $kode_pembayaran);

        session()->setFlashdata('pembayaran_admin', 'verifikasi');
        return redirect()->back();
    }

    public function detail_pembayaran($kode_pembayaran)
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }

        $pembayaranto = new PembayaranModel();


        // $jadwalto = new JadwalModel();
        // $getidjadwal = $jadwalto->data_jadwal_with_kodejwd($kode_jadwal);
        $data = [
            'title' => 'Detail Pembayaran',
            'pembayaran' => $pembayaranto->detail_pembayaran_role_admin($kode_pembayaran)
        ];
        return view('staff/validasi/detail_data_validasi', $data);
    }
}
