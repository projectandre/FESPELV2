<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = "tabel_soal";
    protected $primaryKey = "id_soal";
    protected $allowedFields = ["kode_soal", "no_soal", "pertanyaan", "pilihan_a", "pilihan_b", "pilihan_c", "pilihan_d", "pilihan_e", "poin_a", "poin_b", "poin_c", "poin_d", "poin_e", "pembahasan", "kode_paket", "create_at", "update_at"];
    protected $useTimestamps = false;

    public function tampil_data_soal($kode_paket)
    {
        return $this->db->table('tabel_soal')
            ->where('tabel_soal.kode_paket', $kode_paket)
            ->get()->getResultArray();
    }

    public function update_soal($dataupdate, $id_soal)
    {
        return $this->db->table('tabel_soal')
            ->update($dataupdate, ['id_soal' => $id_soal]);
    }
}
