<?php


namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use App\Models\PembayaranModel;

class Jadwal extends BaseController
{
    public function index()
    {
        if (!in_array(session()->get('role'), ['user'])) {
            return redirect()->back();
        }
        $jadwalto = new JadwalModel();

        $data = [
            'title' => 'Jadwal Try Out',
            'jadwal' => $jadwalto->tampil_data_jadwal()
        ];
        return view('user/jadwal/jadwal', $data);
    }

    public function detail_jadwal($id_jadwal)
    {
        if (!in_array(session()->get('role'), ['user'])) {
            return redirect()->back();
        }

        $pembayaranto = new PembayaranModel();


        $jadwalto = new JadwalModel();
        $cek = $jadwalto->find($id_jadwal);


        $data = [
            'title' => 'Detail Try Out',
            'jadwal' =>  $jadwalto->tampil_detail_jadwal($id_jadwal),
            'status_daftar' =>  $pembayaranto->detail_pembayaran_role_user($cek['kode_jadwal']),

        ];
        return view('user/jadwal/detail_jadwal', $data);
    }
}
