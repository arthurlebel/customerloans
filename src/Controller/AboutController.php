<?php

namespace App\Controller;

use App\Controller\AppController;

class AboutController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $this->set(compact('about'));        
             
    
    }
}