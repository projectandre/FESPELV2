<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tabel_user';
    protected $primaryKey           = 'id_user';
    protected $allowedFields        = ['email', 'password', 'role', 'status_akun'];

    // Dates
    protected $useTimestamps        = false;


    public function getlistakun()
    {
        return $this->db->table('tabel_user')
            ->join('tabel_user_detail', 'tabel_user_detail.user_email=tabel_user.email', 'LEFT')
            ->where('tabel_user.role', 'user')
            ->get()->getResultArray();
    }

    public function getdetailakun($email)
    {
        return $this->db->table('tabel_user')
            ->join('tabel_user_detail', 'tabel_user_detail.user_email=tabel_user.email', 'LEFT')
            ->where('tabel_user.role', 'user')
            ->where('tabel_user.email', $email)
            ->get()->getRow();
    }


    public function updateakun($dataupdate, $email)
    {
        // belum login
        return $this->db->table('tabel_user')
            ->update($dataupdate, ['email' => $email]);
    }

    public function getdataemail()
    {
        return $this->db->table('tabel_user')
            ->select('email')
            ->get()->getResultArray();
    }

    public function editGetdataemail()
    {
        $session = session();
        $email = $session->get('email');
        return $this->db->table('tabel_user')
            ->select('email')
            ->where('email !=', $email)
            ->get()->getResultArray();
    }

    public function getPassword()
    {
        $session = session();
        $email = $session->get('email');
        // sudah login
        return $this->db->table('tabel_user')
            ->where('email', ['email' => $email])
            ->get()->getRow('password');
    }
}
