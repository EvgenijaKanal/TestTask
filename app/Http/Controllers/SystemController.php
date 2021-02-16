<?php

namespace App\Http\Controllers;

use App\Action\GetNewsAction;

class SystemController extends Controller
{
    use GetNewsAction;

    public function cronWorkImitation()
    {
       return $this->fire();
    }
}
