<?php


namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use App\Models\PembayaranModel;


class Pembayaran extends BaseController
{

    public function index()
    {
        if (!in_array(session()->get('role'), ['user'])) {
            return redirect()->back();
        }
        $pembayaranto = new PembayaranModel();

        $data = [
            'title' => 'Pembayaran Try Out',
            'pembayaran' => $pembayaranto->tampil_data_pembayaran_role_user()
        ];
        return view('user/pembayaran/pembayaran', $data);
    }

    public function pembayaran($kode_paket, $kode_jadwal, $id_jadwal)
    {
        if (!in_array(session()->get('role'), ['user'])) {
            return redirect()->back();
        }

        $pembayaranto = new PembayaranModel();

        $pembayaranto->insert([
            'kode_pembayaran' => 'PT' . str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'kode_jadwal' => $kode_jadwal,
            'validasi_pembayaran' => 'belum',
            'status_pengerjaan' => 'belum',
            'id_user' => session()->get('id_user'),
            'kode_paket' => $kode_paket
        ]);

        session()->setFlashdata('pembayaran_user', 'ditambah');
        return redirect()->to('dashboard/user/detail_pembayaran/' . $id_jadwal . '/' . $kode_jadwal);
    }

    public function detail_pembayaran($id_jadwal, $kode_jadwal)
    {
        if (!in_array(session()->get('role'), ['user'])) {
            return redirect()->back();
        }

        $pembayaranto = new PembayaranModel();


        $jadwalto = new JadwalModel();

        $data = [
            'title' => 'Detail Pembayaran',
            'jadwal' =>  $jadwalto->tampil_detail_jadwal($id_jadwal),
            'status_pembayaran' =>  $pembayaranto->detail_pembayaran_role_user($kode_jadwal),
        ];
        return view('user/pembayaran/detail_pembayaran', $data);
    }
}
