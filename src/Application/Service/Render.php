<?php
namespace Application\Service;

class Render 
{
    private $path;
    private $base;
    private $content;

    public function __construct()
    {
        $this->path = __TEMPLATE_PATH__;
        $this->base = __TEMPLATE_DEFAULT__;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }
    
    public function getBase()
    {
        return $this->base;
    }

    public function setBase($base)
    {
        $this->base = $base;
    }

    public function getContent($render, $module, $data)
    {
        $src = __APP_ROOT__ . '\\src\\' . $module . "\\View\\" . $render . '.php';
        ob_start();
        include $src;
        $this->content =  ob_get_clean();
        return $this->content;
    }

    public function makeRender($template)
    {
        return str_replace('{{content}}',$this->content, $template);
    }

    function getTemplate(){
        $title = 'Ecommerce';
		ob_start();
        include $this->path . '\\' . $this->base;
        $html =  ob_get_clean();
        return $html;
    }
    
    public function render($render, $module, $data = [],  $base = null)
    {
        $this->getContent($render, $module,$data);
        
        $template = $this->getTemplate();
        echo $this->makeRender($template);
        return $this;
    }
}