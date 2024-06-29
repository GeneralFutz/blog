<?php

namespace App\Controllers\Front;

use Varyona\Controllers\BaseController;

class Home extends BaseController
{
    //public $theme = 'admin';

    public function index(): string
    {
        $data = [];
        return $this->render('home', $data);
    }
}
