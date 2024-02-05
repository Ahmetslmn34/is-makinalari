<?php
namespace App\Models;


class PanelModel
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function veri_ekle($baslik,$url,$icerik,$resim)
    {
        $builder = $this->db->table('makinalar');

        $data=[
            'baslik'=>$baslik,
            'url'=>$url,
            'icerik'=>$icerik,
            'resim'=>$resim,
        ];

        return $builder->insert($data);
    }

    public function kayit_sil($id)
    {
        $builder = $this->db->table('makinalar');
        $builder->where('id',$id);
        return $builder->delete();
    }

    public function kayit_al($id)
    {
        $builder = $this->db->table('makinalar');
        $builder->where('id',$id);
        $veri=$builder->get()->getResultArray();
        return $veri[0];
    }

    public function veri_duzenle($baslik,$url,$icerik,$id)
    {
        $builder = $this->db->table('makinalar');
        $builder->where('id',$id);

        $data=[
            'baslik'=>$baslik,
            'url'=>$url,
            'icerik'=>$icerik,
        ];

        return $builder->update($data);
    }
}