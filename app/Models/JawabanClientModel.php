<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanClientModel extends Model
{
    protected $table = "tabel_jawaban_client";
    protected $primaryKey = "id_jawaban_client";
    protected $allowedFields = ["kode_sesi_user", "kode_jawaban", "jawaban", "hasil", "id_user", "kode_soal"];
    protected $useTimestamps = false;

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
