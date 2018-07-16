<?php
namespace Application;

use Application\Route\Route;

class Application 
{
    private $route;
    private $config;

    public function __construct($config)
    {
        $this->config = $config;
        
        $this->route = new Route($this->config['module']);
    }
    

    public function init()
    {
        $this->route->load();
        return $this;
    }

    public function start(){
        $this->route->run();
        return $this;
    }

}
