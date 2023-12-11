<?php

namespace App\Controllers;

use Config\Services;

use App\Controllers\BaseController;

class RoleController extends BaseController
{
    public function index()
    {
        if (in_array(session()->get('role'), ['admin'])) {
            // jika admin
            session()->setFlashdata('login', 'done');
            return redirect()->to('dashboard/admin');
        } elseif (session()->get('role') == 'user') {
            // jika user
            session()->setFlashdata('login', 'done');
            return redirect()->to('dashboard/user');
        }
    }
}
