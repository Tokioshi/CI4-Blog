<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Akun extends BaseController
{
    function __construct()
    {
        /** @disregard P1014 sans */
        $this->validation = \Config\Services::validation();
        /** @disregard P1014 sans */
        $this->m_admin = new AdminModel();
        helper('global_fungsi_helper');
        /** @disregard P1014 sans */
        $this->halaman_controller = "akun";
        /** @disregard P1014 sans */
        $this->halaman_label = "Akun";
    }

    function index()
    {
        $data = [];
        /** @disregard P1014 sans */
        if ($this->request->getMethod() == 'post') {
            $data = $this->request->getVar();

            $nama_lengkap = $this->request->getVar('nama_lengkap');
            $password_lama = $this->request->getVar('password');
            $password_baru = $this->request->getVar('password_baru');
            $password_baru_konfirmasi = $this->request->getVar('password_baru_konfirmasi');

            $aturan = [
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama lengkap harus diisi'
                    ]
                ]
            ];

            if ($password_baru != '') {
                $aturan = [
                    'password_lama' => [
                        'rules' => 'required|check_old_password[password_lama]',
                        'errors' => [
                            'required' => 'Password lama harus diisi',
                            'check_old_password' => 'Password lama tidak sesuai'
                        ]
                    ],
                    'password_baru' => [
                        'rules' => 'min_length[5]|alpha_numeric',
                        'errors' => [
                            'min_length' => 'Minimum panjang password adalah 5 karakter',
                            'alpha_numeric' => 'Hanya angka, huruf, dan beberapa simbol saja yang diperbolehkan'
                        ]
                    ],
                    'password_baru_konfirmasi' => [
                        'rules' => 'matches[password_baru]',
                        'errors' => [
                            'matches' => 'Konfirmasi password tidak sesuai'
                        ]
                    ]
                ];
            }

            if (!$this->validate($aturan)) {
                /** @disregard P1014 sans */
                session()->setFlashdata('warning', $this->validation->getErrors());
            } else {
                $dataUpdate = [
                    'email' => session()->get('akun_email'),
                    'nama_lengkap' => $nama_lengkap
                ];
                /** @disregard P1014 sans */
                $this->m_admin->updateData($dataUpdate);

                $sesi = [
                    'akun_nama_lengkap' => $nama_lengkap
                ];
                session()->set($sesi);

                if ($password_baru != '') {
                    $password_baru = password_hash($password_baru, PASSWORD_DEFAULT);
                    $dataUpdate = [
                        'email' => session()->get('akun_email'),
                        'password' => $password_baru
                    ];
                    /** @disregard P1014 sans */
                    $this->m_admin->updateData($dataUpdate);

                    helper('cookie');
                    if (get_cookie('cookie_password')) {
                        set_cookie("cookie_username", session()->get('akun_username'), 3600 * 24 * 30);
                        set_cookie("cookie_password", $password_baru, 3600 * 24 * 30);
                    }
                }

                session()->setFlashdata('success', 'Data berhasil disimpan');
            }

            /** @disregard P1014 sans */
            return redirect()->to('admin/' . $this->halaman_controller)->withCookies();
        }

        $username = session()->get('akun_username');
        /** @disregard P1014 sans */
        $data = $this->m_admin->getData($username);

        /** @disregard P1014 sans */
        $data['templateJudul'] = 'Halaman ' . $this->halaman_label;

        echo view('admin/v_template_header', $data);
        echo view('admin/v_akun', $data);
        echo view('admin/v_template_footer', $data);
    }
}
