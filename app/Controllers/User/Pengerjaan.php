<?php


namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use App\Models\PembayaranModel;
use App\Models\SoalModel;
use App\Models\PaketToModel;
use App\Models\JawabanClientModel;
use App\Models\AkumulasiPengerjaanModel;


class Pengerjaan extends BaseController
{
    public function pengerjaan($kode_paket, $kode_pembayaran)
    {
        if (!in_array(session()->get('role'), ['user'])) {
            return redirect()->back();
        }

        $paketto = new PaketToModel();
        $soalto = new SoalModel();
        $pembayaranto = new PembayaranModel();

        $dataupdate = [
            'status_pengerjaan' => 'sudah'
        ];

        $pembayaranto->update_data_pembayaran($dataupdate, $kode_pembayaran);

        $data = [
            'title' => 'Pengerjaan Try Out',
            'paket' => $paketto->tampil_data_paket(),
            'soal' => $soalto->tampil_data_soal($kode_paket),
            'kode_paket' => $kode_paket
        ];
        return view('user/pengerjaan/pengerjaan', $data);
    }


    public function selesai_pengerjaan()
    {
        if (!in_array(session()->get('role'), ['user'])) {
            return redirect()->back();
        }
        $jawabanclient = new JawabanClientModel();
        $jumlah_soal = count($this->request->getVar()) / 2;
        // dd($jumlah_soal);
        $kode_sesi_user = 'KSU' . str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
        $hitung_total_nilai = 0;
        for ($i = 1; $i <= $jumlah_soal; $i++) {
            $jawabanclient->insert([
                'kode_sesi_user' => $kode_sesi_user,
                'kode_jawaban' => 'KJ' . str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
                'hasil' => $this->request->getVar('jawaban' . $i),
                'id_user' => session()->get('id_user'),
                'kode_soal' => $this->request->getVar('kode_soal' . $i)
            ]);

            $hitung_total_nilai += $this->request->getVar('jawaban' . $i);
        }

        $akumulasipengerjaan = new AkumulasiPengerjaanModel();

        // dd($hitung_total_nilai);

        $akumulasipengerjaan->insert([
            'kode_akumulasi_pengerjaan' => 'KAP' . str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
            'kode_sesi_user' => $kode_sesi_user,
            'kode_pembayaran' => 3,
            'total_nilai' => $hitung_total_nilai
        ]);

        // $jawabanclient->insert([
        //     'kode_jawaban' => 'KJ' . str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT),
        //     'jawaban' => $this->request->getVar('jawaban'),
        //     'hasil' => $this->request->getVar('hasil'),
        //     'id_user' => session()->get('id_user'),
        //     'kode_soal' => $this->request->getVar('kode_soal')
        // ]);


        session()->setFlashdata('pengerjaan', 'selesai');
        return redirect()->to('dashboard/user/pembayaran');

        // dd(count($this->request->getVar()));
    }
}
