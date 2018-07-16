<?php
namespace Admin\Controller;

use Product\Repository\ProductRepository;
use Application\Service\Render;

class ProductController 
{
    public function indexAction()
    {
        $render = new Render();
        $repository = new ProductRepository();
     
        $response = $repository->getAll();
        $produtos = [];

        if($response->status) {
            $produtos = $response->data;
        }

        $data = [
            'produtos' => $produtos,
            'response' => $response,
        ];

        $render->render('product/index', 'Admin', $data);
        return true;
    }
}