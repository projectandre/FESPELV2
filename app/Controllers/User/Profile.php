<?php


namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\AuthDetailModel;

class Profile extends BaseController
{
    public function index()
    {
        if (!in_array(session()->get('role'), ['user'])) {
            return redirect()->back();
        }
        $detailauthmodel = new AuthDetailModel();
        $email = session()->get('email');

        $data = [
            'title' => 'Profile',
            'profile' => $detailauthmodel->getakunlengkapbyemail($email)
        ];
        return view('umum/profile', $data);
    }
}
