<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\AuthDetailModel;
use App\Models\VerifAkunModel;
use Config\Services;
use CodeIgniter\Throttle\ThrottlerInterface;
use CodeIgniter\Throttle\ThrottlerTrait;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->authModel = new AuthModel();
        $this->userModel = new AuthDetailModel();

        $this->session = Services::session();
        $this->verifakunModel = new VerifAkunModel();
        $this->email = Services::email();
    }
    private function hash_password($pass_user)
    {
        return password_hash($pass_user, PASSWORD_BCRYPT);
    }

    public function signin()
    {
        $data['validation'] = Services::validation();

        if (!$this->session->has('isLogin')) {
            return view('auth/login', $data);
        }
        return redirect()->to('home');
    }

    public function authsignin()
    {
        if ($this->session->has('isLogin')) {
            return view('home');
        }

        // validasi input
        if (!$this->validate([
            'email' => [
                'rules' => 'required|trim|valid_email|max_length[120]',
                'errors' => [
                    'required' => 'Email harus di isi!',
                    'valid_email' => 'Masukkan Email',
                    'max_length' => 'Gunakan maksimal 120 karakter!'
                ]
            ],
            'password' => [
                'rules' => 'required|trim|min_length[3]|max_length[45]',
                'errors' => [
                    'required' => 'Password harus di isi',
                    'min_length' => 'Password terlalu pendek!',
                    'max_length' => 'Gunakan maksimal 45 karakter!'
                ]
            ]
        ])) {

            $validation = Services::validation();

            $errors = [
                'email' => $validation->getError('email'),
                'password' => $validation->getError('password')
            ];
            // Lakukan sesuatu dengan daftar error, seperti meneruskannya ke view
            return redirect()->to('Auth/signin')->withInput()->with('errors', $errors);
        }


        $throttler = Services::throttler();
        // ambil alamat ip public user
        $ipAddress = $this->request->getIPAddress();
        $key = 'login_attempts_' . str_replace(':', '_', $ipAddress);

        // cek jika 5 kali percobaan login
        if ($throttler->check($key, 5, 900) === false) {
            session()->setFlashdata('login_err', 'limit');
            return redirect()->back();
        }

        $data = $this->request->getPost();
        $auth = $this->authModel->where('email', $data['email'])
            ->join('tabel_user_detail', 'tabel_user_detail.user_email=tabel_user.email')
            ->first();

        if ($auth) {
            // Saat akun ditemukan
            if (password_verify($data['password'], $auth['password'])) {

                if ($auth['status_akun'] == 'aktif' || $auth['status_akun'] == 'review') {


                    // reset ulang
                    if ($throttler instanceof ThrottlerTrait) {
                        $throttler->reset($key);
                    }
                    // Saat password sesuai
                    $sessLogin = [
                        'id_user' => $auth['id_user'],
                        'email' => $auth['email'],
                        'name' => $auth['name'],
                        'role' => $auth['role'],
                        'photo' => $auth['user_photo'],
                        'status' => $auth['status_akun'],
                        'isLogin' => true
                    ];
                    $this->session->set($sessLogin);
                    session()->setFlashdata('login', 'done');
                    return redirect()->to('dashboard');
                } elseif ($auth['status_akun'] == 'mati') {
                    session()->setFlashdata('login_err', 'not_actived');
                    return redirect()->back();
                } else {
                    session()->setFlashdata('login_err', 'verif');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('login_err', 'wrong_passwd');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('login_err', 'empty');
        }
        return redirect()->back();
    }

    public function signup()
    {
        if ($this->session->has('isLogin')) {
            return redirect()->back();
        }
        $data['validation'] = \Config\Services::validation();
        return view('auth/registrasi', $data);
    }


    public function storesignup()
    {
        if ($this->session->has('isLogin')) {
            return redirect()->back();
        }


        // validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[160]',
                'errors' => [
                    'required' => 'Nama harus di isi!',
                    'min_length' => 'Password terlalu pendek!',
                    'max_length' => 'Gunakan maksimal 160 karakter!'
                ]
            ],
            'email' => [
                'rules' => 'required|trim|valid_email|max_length[120]',
                'errors' => [
                    'required' => 'Email harus di isi!',
                    'valid_email' => 'Masukkan Email',
                    'max_length' => 'Gunakan maksimal 120 karakter!'
                ]
            ],
            'password' => [
                'rules' => 'required|trim|min_length[5]|max_length[45]',
                'errors' => [
                    'required' => 'Password harus di isi',
                    'min_length' => 'Password terlalu pendek!',
                    'max_length' => 'Gunakan maksimal 45 karakter!'
                ]
            ]
        ])) {

            $servis_validation = \Config\Services::validation();

            $validation = [
                'nama' => $servis_validation->getError('nama'),
                'email' => $servis_validation->getError('email'),
                'password' => $servis_validation->getError('password')
            ];
            // dd($validation);

            // Lakukan sesuatu dengan daftar error, seperti meneruskannya ke view
            return redirect()->to('registrasi')->withInput()->with('validation', $validation);
        }

        $data = $this->request->getPost();
        $password = $this->hash_password($data['password']);
        $this->authModel = new AuthModel();
        $email = $this->authModel->where('email', $data['email'])->first();

        if ($email) {
            session()->setFlashdata('reg_err', 'exists');
            return redirect()->back();
        }

        $create = $this->authModel->save([
            'email' => $data['email'],
            'password' => $password,
            'status_akun' => 'belum'
        ]);

        if ($create) {
            $this->userModel = new AuthDetailModel();

            $this->userModel->save([
                'name' => $data['nama'],
                'user_email' => $data['email'],
            ]);

            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            function generate_linkregis($input, $strength = 16)
            {
                $input_length = strlen($input);
                $random_string = '';
                for ($i = 0; $i < $strength; $i++) {
                    $random_character = $input[mt_rand(0, $input_length - 1)];
                    $random_string .= $random_character;
                }

                return $random_string; // redem char untuk dikembalikan
            }

            // Output: Jp8iVNhZXhUdSlPi1sMNF7hOfmEWYl2UIMO9YqA4faJmS52iXdtlA3YyCfSlAbLYzjr0mzCWWQ7M8AgqDn2aumHoamsUtjZNhBfU
            $sublink =  generate_linkregis($permitted_chars, 100);

            $date = date('Y-m-d');
            $date1 = str_replace('-', '/', $date);
            $tomorrow = date('Y-m-d', strtotime($date1 . "+1 days")); //menambah 1 hari dari hari permintaan reset
            $token_link = base_url('verify/' . $sublink); //link verif
            $this->verifakunModel = new VerifAkunModel();
            $tambah_data = $this->verifakunModel->save([
                'email' => $data['email'],
                'link' => $sublink,
                'masa_verif' => $tomorrow
            ]);

            if ($tambah_data) {
                //saat data masuk ke db maka melakukan proses send ke email
                $to = $data['email'];
                $subject = 'Verifikasi Akun Sikam Jejama';

                $data['token_link'] = $token_link;

                $html = view('email/email_registrasi', $data);
                $this->email->setTo($to);
                $this->email->setFrom('sikamjejama@pesawarankab.go.id', 'Festival Pelajar');
                $this->email->setSubject($subject);
                $this->email->setMessage($html);

                if ($this->email->send()) {
                    //  Kehalaman Login dan ada notif verif dikirim ke email
                    // echo "Verif telah terkirim ke email".$data['email'];
                    session()->setFlashdata('reg', 'email');
                    return redirect()->to('login');
                } else {
                    // Saat gagal
                    echo $this->email->printDebugger(['header']);
                    die;
                    return redirect()->back();
                }
            }


            session()->setFlashdata('reg', 'done');
            return redirect()->to('login');
        }

        session()->setFlashdata('reg_err', 'fail');
        return redirect()->back();
    }

    public function validasi_regis($id)
    {
        $akun = $this->verifakunModel->where('link', $id)->first();
        if ($akun) {
            if ($akun['masa_verif'] >= date('Y-m-d')) {

                $this->authModel = new AuthModel();

                // // $email = $akun['email'];
                // $update = $this->authModel->save([
                // 	'email' => $akun['email'],
                // 	'status_akun' => 'review'
                // ]);

                $dataupdate = [
                    'status_akun' => 'aktif'
                ];
                $email = $akun['email'];
                $update = $this->authModel->updateakun($dataupdate, $email);
                if ($update) { //jika update berhasil
                    $this->verifakunModel = new VerifAkunModel();
                    // hapus data verif
                    $hapus = $this->verifakunModel->deleteverif($id);
                    // Jika berhasil melakukan hapus
                    if ($hapus) {
                        // mengirim notif 
                        session()->setFlashdata('reg', 'done');
                        return redirect()->to('login');
                    }
                }
            } else {
                session()->setFlashdata('verif', 'kadaluarsa');
                return redirect()->to('login');
            }
        } else {
            session()->setFlashdata('verif', 'kosong');
            return redirect()->to('login');
        }
    }

    public function logout()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('login');
        }
        session()->destroy();
        session()->setFlashdata('akun', 'logout');
        return redirect()->to('login');
    }

    public function cek_email()
    {
        $data = $this->authModel->getdataemail();
        echo json_encode(array("result" => $data));
    }
}
