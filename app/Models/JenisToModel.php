<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisToModel extends Model
{
    protected $table = "tabel_jenis_to";
    protected $primaryKey = "kode_jt";
    protected $allowedFields = ["kode_jt", "jenis_to"];
    protected $useTimestamps = false;
}
