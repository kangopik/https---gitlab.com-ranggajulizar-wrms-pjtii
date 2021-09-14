<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\UsersModel;
use CodeIgniter\Controller;

class Users extends Controller
{
    public function index()
    {
        echo "<h1>Page Pengguna</h1>";
    }

    public function register()
    {
        $val = $this->validate(
            [
                'name'          => 'required|min_length[3]'
            ],
        );

        if (!$val) {
            $pesanvalidasi = \Config\Services::validation();
            return redirect()->to('/register')->withInput()->with('validate', $pesanvalidasi);
        }

        $data = array(
            "usr_sid"   => $this->request->getPost("usr_sid"),
            "usr_name"   => $this->request->getPost('usr_name'),
            "usr_designation"   => $this->request->getPost('usr_designation'),
            "usr_department"   => $this->request->getPost('usr_department'),
            "usr_email"   => $this->request->getPost('usr_email'),
            "usr_mobile"   => $this->request->getPost('usr_mobile'),
            "usr_password"   => password_hash($this->request->getPost('usr_password'), PASSWORD_DEFAULT),
            "usr_status"   => $this->request->getPost('usr_status'),
            "usr_hash"   => $this->request->getPost('usr_hash'),
            "usr_hashedon"   => $this->request->getPost('usr_hashedon'),
        );

        $model = new UsersModel;
        $model->insert($data);
        session()->setFlashdata('pesan', 'Data pengguna berhasil ditambahkan');
        return redirect()->to('/');
    }

    public function login()
    {
        $model = new AuthModel();
        $table = "tb_user";
        $email = $this->request->getPost("emaillogin");
        $passwordnow = $this->request->getPost("passwordlogin");

        $usr = $model->get_data_login($email, $table);

        if ($usr) {
            if (password_verify($passwordnow, $usr->usr_password)) {
                return redirect()->to(base_url("/dashboard"));
            } else {
                session()->setFlashdata('logingagal', 'Password anda salah.');
                return redirect()->to(base_url("/"));
            }
        } else {
            session()->setFlashdata('logingagal', 'Email anda tidak ditemukan.');
            return redirect()->to(base_url("/"));
        }
    }
}
