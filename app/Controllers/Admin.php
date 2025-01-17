<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    protected $db, $builder;

    function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $this->builder = $this->db->table('users');
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

        $query = $this->builder->get();
        $data['users'] = $query->getResultObject();

        // Contoh kode tambahan untuk tabel lain
        // $query = $this->db->query("SELECT * FROM akun1s");
        // $data['dataakun1'] = $query->getResult();

        return view('admin/index', $data);

        // Debugging opsional:
        // dd($query->getResult());
        // dd($query);
    }

    public function detail($id)
    {
        $this->builder = $this->db->table('users');
        $this->builder->select('users.id as userid, username, email, fullname, gbr, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        // Contoh query tambahan (opsional):
        // $query = $this->db->query("SELECT * FROM akun1s");
        // $data['dataakun1'] = $query->getResult();

        return view('admin/detail', $data);
    }
}