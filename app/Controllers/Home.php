<?php

namespace App\Controllers;

use App\Models\PostsModel;

class Home extends BaseController
{
    function __construct()
    {
        /** @disregard P1014 sans */
        $this->m_posts = new PostsModel();
        helper('global_fungsi_helper');
    }

    public function index()
    {
        $data = [];

        $post_type = 'article';
        $jumlahBaris = 3;
        $katakunci = '';
        $group_dataset = 'ft';

        $konfigurasi_name = "set_halaman_depan";
        $konfigurasi = konfigurasi_get($konfigurasi_name);
        $page_id = $konfigurasi['konfigurasi_value'];

        /** @disregard P1014 sans */
        $dataHalaman = $this->m_posts->getPost($page_id);
        $data['type'] = $dataHalaman['post_type'];
        $data['judul'] = $dataHalaman['post_title'];
        $data['deskripsi'] = $dataHalaman['post_description'];
        $data['thumbnail'] = $dataHalaman['post_thumbnail'];

        /** @disregard P1014 sans */
        $hasil = $this->m_posts->listPost($post_type, $jumlahBaris, $katakunci, $group_dataset);
        $data['record'] = $hasil['record'];
        $data['pager'] = $hasil['pager'];

        echo view('depan/v_template_header', $data);
        echo view('depan/v_home', $data);
        echo view('depan/v_template_footer', $data);
    }
}
