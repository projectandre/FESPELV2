<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = "tabel_pembayaran";
    protected $primaryKey = "id_pembayaran";
    protected $allowedFields = ["kode_pembayaran", "kode_jadwal", "validasi_pembayaran", "tgl_daftar", "tgl_bayar", "id_user", "kode_paket", "create_at", "update_at"];
    protected $useTimestamps = false;

    public function tampil_data_pembayaran_role_user()
    {
        return $this->db->table('tabel_pembayaran')
            ->join('tabel_paket', 'tabel_pembayaran.kode_paket=tabel_paket.kode_paket')
            ->join('tabel_jadwal', 'tabel_pembayaran.kode_jadwal=tabel_jadwal.kode_jadwal')
            ->where('tabel_pembayaran.id_user', session()->get('id_user'))
            ->get()->getResultArray();
    }

    public function detail_pembayaran_role_user($kode_jadwal)
    {
        return $this->db->table('tabel_pembayaran')
            ->where('tabel_pembayaran.kode_jadwal', $kode_jadwal)
            ->where('tabel_pembayaran.id_user', session()->get('id_user'))
            ->get()->getRow();
    }

    public function detail_pembayaran_role_admin($kode_pembayaran)
    {
        return $this->db->table('tabel_pembayaran')
            ->join('tabel_paket', 'tabel_pembayaran.kode_paket=tabel_paket.kode_paket')
            ->join('tabel_jadwal', 'tabel_pembayaran.kode_jadwal=tabel_jadwal.kode_jadwal')
            ->join('tabel_user', 'tabel_pembayaran.id_user=tabel_user.id_user')
            ->join('tabel_user_detail', 'tabel_user.email=tabel_user_detail.user_email')
            ->where('tabel_pembayaran.kode_pembayaran', $kode_pembayaran)
            ->get()->getRow();
    }


    public function data_pembayaran_all_with_status($status, $kode_jadwal, $kode_paket)
    {
        return $this->db->table('tabel_pembayaran')
            ->join('tabel_paket', 'tabel_pembayaran.kode_paket=tabel_paket.kode_paket')
            ->join('tabel_jadwal', 'tabel_pembayaran.kode_jadwal=tabel_jadwal.kode_jadwal')
            ->join('tabel_user', 'tabel_pembayaran.id_user=tabel_user.id_user')
            ->join('tabel_user_detail', 'tabel_user.email=tabel_user_detail.user_email')
            ->where('tabel_pembayaran.validasi_pembayaran', $status)
            ->where('tabel_pembayaran.kode_jadwal', $kode_jadwal)
            ->where('tabel_pembayaran.kode_paket', $kode_paket)
            ->get()->getResultArray();
    }

    public function update_data_pembayaran($dataupdate, $kode_pembayaran)
    {
        return $this->db->table('tabel_pembayaran')
            ->update($dataupdate, ['kode_pembayaran' => $kode_pembayaran]);
    }
}
