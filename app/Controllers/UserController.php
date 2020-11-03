<?php namespace App\Controllers;

class UserController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addUser($data)
    {
        $data = [
            "id_user" => "",
            "username" => $this->request->getPost("username"),
            "password" => $this->request->getPost("password"),
            "role" => $this->request->getPost("role"),
            "email" => $this->request->getPost("email"),
            "no_hp" => $this->request->getPost("no_hp"),
            "foto" => $this->uploadFile("foto"),
        ];
        if ($this->userModel->addUser($data)) {

        } else {

        }
    }

    public function updateUser($id)
    {
        $data = [
            "username" => $this->request->getPost("username"),
            "password" => $this->request->getPost("password"),
            "role" => $this->request->getPost("role"),
            "email" => $this->request->getPost("email"),
            "no_hp" => $this->request->getPost("no_hp"),
            "foto" => $this->request->getPost("foto"),
        ];
        $where = ["id_user" => $id];
        if ($this->userModel->editUser($data, $where)) {

        } else {

        }
    }

    public function deleteUser($id)
    {
        $where = ["id_user" => $id];
        if ($this->userModel->removeUser($where)) {

        } else {

        }
    }

    public function uploadFile($fileName)
    {
        $this->request->negotiate('media', ['image/png', 'image/jpg']);
        $files = $this->request->getFiles();

        // Grab the file by name given in HTML form
        if ($files->hasFile($fileName)) {
            $file = $files->getFile($fileName);

            // Generate a new secure name
            $name = $file->getRandomName();

            // Move the file to it's new home
            $file->move("images/", $name);

            return $name;
        }
        return "default.png";
    }
}
