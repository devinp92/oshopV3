<?php

namespace oShop\Controllers;

use oShop\Models\Brand;
use oShop\Models\Category;
use oShop\Models\Type;

class MainController extends CoreController{

   

    public function home()
    {
        $this->show('home');
    }

    public function legalMentions()
    {

    }

    public function page404()
    {
        $this->show('404');
    }
}