<?php
namespace Product\Controller;

use Application\Service\Render;
use Product\Repository\ProductRepository;
class ProductController
{

    function __construct()
	{
    }
    
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

        $render->render('product/index', 'Product', $data);
        return true;
    }


    public function detailsAction()
    {
        $api = __API__;
        $shipmentMethod = $api['correios']['method'];
        $render = new Render();
        $repository = new ProductRepository();
        $response = $repository->getById($_GET['id']);
        $produto = false;

        if($response->status) {
            $produto = $response->data[0];
        }

        $data = [
            'produto' => $produto,
            'response' => $response,
            'shipmentMethod' => $shipmentMethod,
        ];

        $render->render('product/details', 'Product', $data);
        return true;
    }

    public function getShipmentAction()
    {
        $repository = new ProductRepository();
        $repository->getShipment($_POST);
    }

}