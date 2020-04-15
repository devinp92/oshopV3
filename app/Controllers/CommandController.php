<?php

namespace oShop\Controllers;

class CommandController extends CoreController {

    public function cart()
    {
        $this->show('cart');
    }
}