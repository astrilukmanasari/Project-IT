<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('auth/register');
    }
    public function daftar()
    {
        helper(['form', 'url']);

        $rules = [
            'nama'              => 'required|min_length[3]|max_length[50]',
            'email'             => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'password'          => 'required|min_length[8]|max_length[255]',
            'repeat_password'   => 'matches[password]',
            'alamat'            => 'required',
            'no_hp'             => 'required|numeric|min_length[10]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'nama'      => $this->request->getVar('nama'),
                'email'     => $this->request->getVar('email'),
                'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'address'   => $this->request->getVar('address'),
                'no_hp'     => $this->request->getVar('no_hp'),
                'role'      => 'pelanggan',  // Atur default role ke 'pelanggan'
                'image'     => 'assets/img/undraw_profile.svg',  // Nilai default untuk image
                'created_at' => date('Y-m-d H:i:s')
            ];

            $model->save($data);

            return redirect()->to('/register')->with('success', 'Registrasi berhasil');
        } else {
            $data['validation'] = $this->validator;
            return view('auth/register', $data);
        }
    }

    public function login()
    {
        helper(['form']);
        return view('auth/login');
    }

    public function authenticate()
    {
        helper(['form', 'url']);
        $session = session();
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'nama'     => $data['nama'],
                    'email'    => $data['email'],
                    'role'     => $data['role'],
                    'image'    => $data['image'],  // Tambahkan atribut image
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Salah Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email Tidak Ada');
            return redirect()->to('/login');
        }
    }
}
