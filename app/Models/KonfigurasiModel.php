<?php

namespace App\Models;

use CodeIgniter\Model;

class KonfigurasiModel extends Model
{
    protected $table = "konfigurasi";
    protected $primaryKey = "id";
    protected $allowedFields = ['konfigurasi_name', 'konfigurasi_value'];

    public function getData($parameter)
    {
        $builder = $this->table($this->table);
        $builder->where($parameter);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function updateData($data)
    {
        helper("global_fungsi_helper");
        $builder = $this->table($this->table);
        foreach ($data as $key => $value) {
            $data[$key] = purify($value);
        }
        if ($builder->save($data)) {
            return true;
        } else {
            return false;
        }
    }
}
