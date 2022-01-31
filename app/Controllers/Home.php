<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct() 
    {
        $this->dataModel = new \App\Models\DataModel;    
    }

    public function index()
    {
        return view('editor');
    }

    public function insert()
    {
        $request = $this->request->getPost();

        $data = [
            'judul' => $request['judul'],
            'konten' => $request['konten']
        ];

        // save
        try {
            $this->dataModel->save($data);
            return $this->response->setStatusCode(200)
                                ->setJson(['pesan' => 'data berhasil disimpan']);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500)
                                ->setJson(['pesan' => $e]);
        }
    }
}
