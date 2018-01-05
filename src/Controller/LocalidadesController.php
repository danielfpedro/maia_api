<?php
namespace App\Controller;

use App\Controller\AppController;

class LocalidadesController extends AppController
{
    
    public function estados()
    {
        $this->loadModel('Estados');
        $estados = $this->Estados->find();
        
        $this->set(compact('estados'));
        $this->set('_serialize', 'estados');
    }

    public function cidadesByEstadoId()
    {
        $this->loadModel('Cidades');
        $cidades= $this->Cidades->find()
            ->where(['Cidades.estado_id' => $this->request->getQuery('estado_id')]);
        
        $this->set(compact('cidades'));
        $this->set('_serialize', 'cidades');
    }
    
}

