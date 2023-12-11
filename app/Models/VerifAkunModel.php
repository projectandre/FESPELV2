<?php

namespace App\Models;

use CodeIgniter\Model;

class VerifAkunModel extends Model
{
    protected $table = "verif_akun";
    protected $primaryKey = "id_verif_akun";
    protected $allowedFields = ["email", "link", "masa_verif"];
    protected $useTimestamps = false;

    public function deleteverif($id)
    {
        return $this->db->table('verif_akun')
            ->delete(['link' => $id]);
    }
}
