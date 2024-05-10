<?php

namespace App\Controllers;

use App\Models\PostsModel;

class Article extends BaseController
{
    function __construct()
    {
        /** @disregard P1014 sans */
        $this->m_posts = new PostsModel();
        helper("global_fungsi_helper");
    }
    public function index($seo_title)
    {
        $data = [];

        /** @disregard P1014 sans */
        $dataHalaman = $this->m_posts->getPostBySeo($seo_title);

        $data['type'] = $dataHalaman['post_type'];
        if ($data['type'] != 'article') {
            return redirect()->to('');
        }
        $data['judul'] = $dataHalaman['post_title'];
        $data['thumbnail'] = $dataHalaman['post_thumbnail'];
        $data['deskripsi'] = $dataHalaman['post_description'];
        $data['konten'] = $dataHalaman['post_content'];
        $data['penulis'] = $dataHalaman['username'];
        $data['tanggal'] = $dataHalaman['post_time'];

        echo view("depan/v_template_header", $data);
        echo view("depan/v_article", $data);
        echo view("depan/v_template_footer", $data);
    }
}
