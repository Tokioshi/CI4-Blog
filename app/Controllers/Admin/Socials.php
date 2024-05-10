<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PostsModel;

class Socials extends BaseController
{
    function __construct()
    {
        /** @disregard P1014 sans */
        $this->validation = \Config\Services::validation();
        /** @disregard P1014 sans */
        $this->m_posts = new PostsModel();
        helper('global_fungsi_helper');
        /** @disregard P1014 sans */
        $this->halaman_controller = "socials";
        /** @disregard P1014 sans */
        $this->halaman_label = "Socials Media";
    }

    function index()
    {
        $data = [];
        /** @disregard P1014 sans */
        if ($this->request->getMethod() == 'post') {
            $konfigurasi_name = 'set_socials_twitter';
            $dataSimpan = [
                'konfigurasi_value' => $this->request->getVar('set_socials_twitter')
            ];
            konfigurasi_set($konfigurasi_name, $dataSimpan);

            $konfigurasi_name = 'set_socials_facebook';
            $dataSimpan = [
                'konfigurasi_value' => $this->request->getVar('set_socials_facebook')
            ];
            konfigurasi_set($konfigurasi_name, $dataSimpan);

            $konfigurasi_name = 'set_socials_instagram';
            $dataSimpan = [
                'konfigurasi_value' => $this->request->getVar('set_socials_instagram')
            ];
            konfigurasi_set($konfigurasi_name, $dataSimpan);

            session()->setFlashdata('success', 'Data berhasil disimpan');
            /** @disregard P1014 sans */
            return redirect()->to('admin/' . $this->halaman_controller);
        }

        $konfigurasi_name = 'set_socials_twitter';
        $data['set_socials_twitter'] = konfigurasi_get($konfigurasi_name)['konfigurasi_value'];

        $konfigurasi_name = 'set_socials_facebook';
        $data['set_socials_facebook'] = konfigurasi_get($konfigurasi_name)['konfigurasi_value'];

        $konfigurasi_name = 'set_socials_instagram';
        $data['set_socials_instagram'] = konfigurasi_get($konfigurasi_name)['konfigurasi_value'];

        /** @disregard P1014 sans */
        $data['templateJudul'] = 'Halaman ' . $this->halaman_label;

        echo view('admin/v_template_header', $data);
        echo view('admin/v_socials', $data);
        echo view('admin/v_template_footer', $data);
    }
}
