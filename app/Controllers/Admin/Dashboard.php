<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!in_array(session()->get('role'), ['admin'])) {
            return redirect()->back();
        }
        $data = [
            'title' => 'Dashboard',
        ];
        return view('staff/dashboard', $data);
    }
}
