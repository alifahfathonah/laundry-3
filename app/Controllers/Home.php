<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

    }

    public function login()
    {
        if (session()->has("userdata")) {
            return redirect()->to(base_url("/Auth/cekSession"));
        }
        echo view('login');
    }

}
