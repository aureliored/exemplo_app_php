<?php

namespace Application\Controller;

use Application\Service\Render;

class ApplicationController
{
    private $render;

    function __construct()
	{
        $this->render = new Render();
    }
    
    public function error404Action()
    {
        $this->render->render('');
        return true;
    }
}