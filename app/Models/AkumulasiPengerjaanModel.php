<?php

namespace App\Models;

use CodeIgniter\Model;

class AkumulasiPengerjaanModel extends Model
{
    protected $table = "tabel_akumulasi_pengerjaan";
    protected $primaryKey = "id_akumulasi_pengerjaan";
    protected $allowedFields = ["kode_akumulasi_pengerjaan", "kode_sesi_user", "kode_pembayaran", "total_nilai"];
    protected $useTimestamps = false;

    public function getTotalNilaiByKodeSesiUser($kodeSesiUser)
    {
        return $this->selectSum('total_nilai', 'total_nilai')
            ->where('kode_sesi_user', $kodeSesiUser)
            ->get()
            ->getRow()
            ->total_nilai;
    }

    // public function tampil_data_paket()
    // {
    //     return $this->db->table('tabel_paket')
    //         ->join('tabel_jenis_to', 'tabel_jenis_to.kode_jt=tabel_paket.kode_jt')
    //         ->get()->getResultArray();
    // }

    // public function tampil_data_paket_validasi($kode_jt)
    // {
    //     return $this->db->table('tabel_paket')
    //         ->join('tabel_jenis_to', 'tabel_jenis_to.kode_jt=tabel_paket.kode_jt')
    //         ->where('tabel_paket.kode_jt', $kode_jt)
    //         ->get()->getResultArray();
    // }

    // public function update_data_paket($dataupdate, $kode_paket)
    // {
    //     return $this->db->table('tabel_paket')
    //         ->update($dataupdate, ['kode_paket' => $kode_paket]);
    // }
}
