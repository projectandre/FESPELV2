<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalModel extends Model
{
    protected $table = "tabel_jadwal";
    protected $primaryKey = "id_jadwal";
    protected $allowedFields = ["kode_jadwal", "kode_paket", "tempat", "tgl_pelaksanaan", "tgl_daftar", "tgl_tutup", "jam_mulai", "jam_selesai", "biaya", "create_at", "update_at"];
    protected $useTimestamps = false;

    public function tampil_data_jadwal()
    {
        return $this->db->table('tabel_jadwal')
            ->join('tabel_paket', 'tabel_jadwal.kode_paket=tabel_paket.kode_paket')
            ->get()->getResultArray();
    }

    public function data_jadwal_with_kode($kode_paket)
    {
        return $this->db->table('tabel_jadwal')
            ->join('tabel_paket', 'tabel_jadwal.kode_paket=tabel_paket.kode_paket')
            ->where('tabel_jadwal.kode_paket', $kode_paket)
            ->get()->getResultArray();
    }

    public function data_jadwal_with_kodejwd($kode_jadwal)
    {
        return $this->db->table('tabel_jadwal')
            ->join('tabel_paket', 'tabel_jadwal.kode_paket=tabel_paket.kode_paket')
            ->where('tabel_jadwal.kode_jadwal', $kode_jadwal)
            ->get()->getRow();
    }

    public function tampil_detail_jadwal($id_jadwal)
    {
        return $this->db->table('tabel_jadwal')
            ->join('tabel_paket', 'tabel_jadwal.kode_paket=tabel_paket.kode_paket')
            ->where('tabel_jadwal.id_jadwal', $id_jadwal)
            ->get()->getRow();
    }

    public function update_data_jadwal($dataupdate, $kode_jadwal)
    {
        return $this->db->table('tabel_jadwal')
            ->update($dataupdate, ['kode_jadwal' => $kode_jadwal]);
    }
}
