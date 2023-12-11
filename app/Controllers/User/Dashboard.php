<?php


namespace App\Controllers\User;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!in_array(session()->get('role'), ['user'])) {
            return redirect()->back();
        }
        $data = [
            'title' => 'Dashboard',
        ];
        return view('user/dashboard', $data);
    }
}
