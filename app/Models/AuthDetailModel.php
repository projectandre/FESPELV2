<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthDetailModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tabel_user_detail';
    protected $primaryKey           = 'id_user_detail';
    protected $allowedFields        = ['name', 'user_photo', 'user_email', 'user_phone'];

    // Dates
    protected $useTimestamps        = false;

    public function getakunlengkap()
    {
        $session = session();
        $email = $session->get('email');

        return $this->db->table('tabel_user_detail')
            ->join('tabel_user', 'tabel_user.email = tabel_user_detail.user_email', 'LEFT')
            ->where('user_email', $email)
            ->get()->getRow();
    }

    public function getakunlengkapbyemail($email)
    {

        return $this->db->table('tabel_user_detail')
            ->join('tabel_user', 'tabel_user.email = tabel_user_detail.user_email', 'LEFT')
            ->where('user_email', $email)
            ->get()->getRow();
    }
}
