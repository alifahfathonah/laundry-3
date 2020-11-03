<?php namespace App\Controllers;

use App\Libraries\Alert;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        $this->user = new UserModel();
        $this->notif = new Alert();
        helper("url");
    }

    public function login()
    {
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");
        $userData = $this->user->getUser(['username' => $username]);
        if (count($userData) > 0) {
            if (password_verify($password, $userData[0]->password)) {
                $this->session->set(
                    [
                        "userdata" => [
                            "username" => $userData[0]->username,
                            "email" => $userData[0]->email,
                            "role" => $userData[0]->role,
                            "foto" => $userData[0]->foto,
                        ],
                    ]
                );
                return redirect()->to("cekSession");
            } else {
                return redirect()->back()->with("err", $this->notif::danger("Password Salah"));
            }
        } else {
            return redirect()->back()->with("err", $this->notif::danger("username tidak ditemukan"));
        }
    }

    public function cekSession()
    {
        $role = $this->session->get("userdata");
        if ($role['role'] == "admin") {
            return redirect()->to(base_url("/AdminController"));
        } else if ($role['role'] == "kasir") {
            return redirect()->to(base_url("/KasirController"));
        } else if ($role['role'] == "pegawai") {
            return redirect()->to(base_url("/PegawiController"));
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url("/Home/login"));
    }
}
