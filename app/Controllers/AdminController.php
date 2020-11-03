<?php namespace App\Controllers;

use App\models\UserModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->userModel = new UserModel();
        $session = \Config\Services::session();
        if ($session->get("userdata")['role'] != "admin") {
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        echo view("Admin/dashboard", $data);
    }

    public function manageUser()
    {
        $data['title'] = "Kelola Data Pengguna";
        $data['users'] = $this->userModel->getUser();
        echo view("Admin/manage-user", $data);
    }

    public function report()
    {

    }
}
