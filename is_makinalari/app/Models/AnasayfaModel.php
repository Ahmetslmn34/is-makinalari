<?php

namespace App\Models;


use CodeIgniter\Model;

class AnasayfaModel extends Model
{
    protected $table = 'kullanıcılar';

    public function kayitlar()
    {
        $this->table = 'makinalar';

        return $this->findAll();
    }

    public function kayit_detay($url)
    {
        $this->table = 'makinalar';

        return $this->where('url',$url)->find();
    }
}