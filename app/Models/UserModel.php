<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    public function getUser($where = false)
    {
        if ($where === false) {
            return $this->db->table("users")
                ->select("id_user,username,email,no_hp,foto,nama_role,password")->join("role", "users.role = role.id_role")
                ->get()
                ->getResult();
        }

        return $this->db->table("users")
            ->select("id_user,username,email,no_hp,foto,nama_role as role,password")->join("role", "users.role = role.id_role")
            ->getWhere($where)
            ->getResult();
    }

    public function addUser($data)
    {
        return $this->db->insert($data);
    }

    public function editUser($data, $where)
    {
        $this->db->where($where);
        return $this->db->update($data);
    }

    public function removeUser($where)
    {
        return $this->db->delete($where);
    }
}
