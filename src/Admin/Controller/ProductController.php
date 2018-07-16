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
            'message' => $_GET['mensagem'] ?? '',
        ];

        $render->render('product/index', 'Admin', $data);
        return true;
    }

    public function newAction()
    {
        $render = new Render();
        $render->render('product/form', 'Admin', ['edit' => false,]);
        return true;
    }

    public function getAction()
    {
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
            'edit' => true,
        ];

        $render->render('product/form', 'Admin', $data);
        return true;
    }
    
    public function deleteAction()
    {
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
        ];

        $render->render('product/remover', 'Admin', $data);
        return true;
    }



    public function saveAction()
    {
        $repository = new ProductRepository();

        $file = __APP_ROOT__ . "\\public\\img\\product\\" . $_FILES["photo"]["name"];
        $response = move_uploaded_file($_FILES["photo"]["tmp_name"], $file);

        if($_FILES['photo']['error'] > 0) {
            $redirect = __BASEURL__ . 'admin/?mensagem=Erro no upload do arquivo.' ;
            header("location: $redirect");
        }

        $_POST['photo'] = __BASEURL__ . "/public/img/product/" . $_FILES["photo"]["name"];

        $return = $repository->new($_POST);
        $redirect = __BASEURL__ . 'admin/?mensagem=' . $return->message ;
        
        header("location: $redirect");
    }

    public function editAction()
    {
        $repository = new ProductRepository();
        $return = $repository->edit($_POST);
        $redirect = __BASEURL__ . 'admin/?mensagem=' . $return->message ;
        header("location: $redirect");
    }
    
    public function removeAction()
    {
        $repository = new ProductRepository();
        $return = $repository->remove($_POST);
        $redirect = __BASEURL__ . 'admin/?mensagem=' . $return->message ;
        header("location: $redirect");
    }
}