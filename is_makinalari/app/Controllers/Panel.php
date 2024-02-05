<?php

namespace App\Controllers;

use App\Models\PanelModel;

class Panel extends BaseController
{
    protected $helpers = ['form'];
    

    public function index()
    {
        $session = session();

        if($session->has('durum') && $session->get('durum'))
        {
            return view('tema/header', ['isim'=>$session->get('isim'), 'durum'=>$session->get('durum')])
            .view('tema/panel_header')
            .view('sayfalar/panasayfa')
            .view('tema/panel_footer')
            .view('tema/footer');
            
        }
        else
        {
            return redirect()->to(base_url('login'));
        }        
    }
    public function kayit_ekle()
    {
        $session = session();

        if($session->has('durum') && $session->get('durum'))
        {
            if (! $this->request->is('post')) {
                return view('tema/header', ['isim'=>$session->get('isim'), 'durum'=>$session->get('durum')])
            .view('tema/panel_header')
            .view('sayfalar/kayit_ekle')
            .view('tema/panel_footer')
            .view('tema/footer');
            }
    
            $rules = [
                'baslik' => 'required',
                'icerik' => 'required',
                'resim' => 'uploaded[resim]|max_size[resim,1024]'
            ];
    
            $data = $this->request->getPost(array_keys($rules));
    
            if (! $this->validate($rules)) {
                return view('tema/header', ['isim'=>$session->get('isim'), 'durum'=>$session->get('durum')])
            .view('tema/panel_header')
            .view('sayfalar/kayit_ekle')
            .view('tema/panel_footer')
            .view('tema/footer');
            }
    

            $veri = $this->validator->getValidated();
            $model = model('PanelModel');


            $img = $this->request->getFile('resim');

            if ($img->isValid() && !$img->hasMoved()) {
            $yol = FCPATH.'uploads/';

            $isim = $img->getRandomName();

            $img->move($yol, $isim);

            $sonuc = $model->veri_ekle($veri['baslik'],url_title($veri['baslik'],'_',true),$veri['icerik'],$isim);

            if($sonuc)
            {
                return redirect()->to(base_url('kayit_ekle'));
            }
        }
            /*$sor = $model->where(['kulad'=>$veri['kulad'], 'sifre'=>$veri['sifre']])->find();
            if(count($sor)>0)
            {
                $kul_bilgi= [
                    'isim' => 'ahmet',
                    'durum' => true
                ];

                $session->set($kul_bilgi);

                return redirect()->to(base_url('panel'));
            }
            else
            {
                return view('tema/header', ['uyari' => 'Yanlış Kullanıcı']).view('sayfalar/login').view('tema/footer');
            }
            */
        }
        else
        {
            return redirect()->to(base_url('login'));
        }
    }

    public function kayit_listele()
    {
        $session = session();

        if($session->has('durum') && $session->get('durum'))
        {
            $data['isim']=$session->get('isim');
            $data['durum']=$session->get('durum');

            $model = model('AnasayfaModel');
            $kayitlar = $model->kayitlar();

            if(count($kayitlar)>0)
            {
                $data['kayitlar'] = $kayitlar;
            }

            return view('tema/header', $data)
                .view('tema/panel_header')
                .view('sayfalar/kayit_listele')
                .view('tema/panel_footer')
                .view('tema/footer');
        }
        else
        {
            return redirect()->to(base_url('login'));
        }
    }
    public function kayit_sil($id)
    {
        $session = session();

        if($session->has('durum') && $session->get('durum'))
        {
            $model = model('PanelModel');

            $model->kayit_sil($id);

            return redirect()->to(base_url('kayit_listele'));
        }
        else
        {
            return redirect()->to(base_url('login'));
        }
    }

    public function kayit_duzenle($id)
    {
        $session = session();

        if($session->has('durum') && $session->get('durum'))
        {
            $model = model('PanelModel');
            $data['isim']=$session->get('isim');
            $data['durum']=$session->get('durum');
            $data['veri']=$model->kayit_al($id);

            if (! $this->request->is('post')) {
                return view('tema/header', $data)
                    .view('tema/panel_header')
                    .view('sayfalar/kayit_duzenle')
                    .view('tema/panel_footer')
                    .view('tema/footer');
            }

            $rules = [
                'baslik' => 'required',
                'icerik' => 'required'
            ];
            $data = $this->request->getPost(array_keys($rules));
            if (! $this->validateData($data,$rules)) {
                return view('tema/header',$data)
                    .view('tema/panel_header',$data)
                    .view('sayfalar/kayit_duzenle')
                    .view('tema/panel_footer')
                    .view('tema/footer');
            }

            $veri = $this->validator->getValidated();
            $sonuc = $model->veri_duzenle($veri['baslik'],url_title($veri['baslik'],'_',true),$veri['icerik'],$id);

            if($sonuc)
            {
                return redirect()->to(base_url('kayit_duzenle/'.$id));
            }
        }
        else
        {
            return redirect()->to(base_url('login'));
        }
    }
}
