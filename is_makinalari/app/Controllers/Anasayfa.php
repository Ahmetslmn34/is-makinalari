<?php

namespace App\Controllers;

use App\Models\AnasayfaModel;

class Anasayfa extends BaseController
{
    protected $helpers = ['form', 'text'];
    public function index()
    {
        $data = [];

        $model = model('AnasayfaModel');
        $kayitlar = $model->kayitlar();

        if(count($kayitlar)>0)
        {
            $data['kayitlar'] = $kayitlar;
        }

        $session = session();

        if($session->has('durum') && $session->get('durum'))
        {
            $data['isim']=$session->get('isim');
            $data['durum']=$session->get('durum');

            return view('tema/header', $data)
            .view('sayfalar/anasayfa')
            .view('tema/footer');
        }
        else
        {
            return view('tema/header', $data).view('sayfalar/anasayfa').view('tema/footer');
        }
        
    }
    public function login()
    {
        $session = session();

        if($session->has('durum') && $session->get('durum'))
        {
            return redirect()->to(base_url('panel'));
        }
        else
        {
            if (! $this->request->is('post')) {
                return view('tema/header').view('sayfalar/login').view('tema/footer');
            }
    
            $rules = [
                'kulad' => 'required',
                'sifre' => 'required'
            ];
    
            $data = $this->request->getPost(array_keys($rules));
    
            if (! $this->validateData($data, $rules)) {
                return view('tema/header').view('sayfalar/login').view('tema/footer');
            }
    

            $veri = $this->validator->getValidated();
            $model = model('AnasayfaModel');

            $sor = $model->where(['kulad'=>$veri['kulad'], 'sifre'=>$veri['sifre']])->find();
            if(count($sor)>0)
            {
                $kul_bilgi=[
                    'isim' => 'yonetici',
                    'durum' => true
                ];

                $session->set($kul_bilgi);

                return redirect()->to(base_url('panel'));
            }
            else
            {
                return view('tema/header', ['uyari' => 'Yanlış Kullanıcı']).view('sayfalar/login').view('tema/footer');
            }
        }
        //return view('tema/header').view('sayfalar/login').view('tema/footer');
    }
    public function logout(){
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('login'));
    }


    public function incele($url)
    {
        $data = [];

        $model = model('AnasayfaModel');
        
        $veri=$model->kayit_detay($url);
        $data['veri']=$veri[0];

        $session = session();

        if($session->has('durum') && $session->get('durum'))
        {
            $data['isim']=$session->get('isim');
            $data['durum']=$session->get('durum');
        }

        
        //var_dump($data);

        return view('tema/header',$data).view('sayfalar/incele').view('tema/footer');
    }
}
