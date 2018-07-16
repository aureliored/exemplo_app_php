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

    public function sendMailAction()
    {
        $to = 'aureliomoreirared@gmail.com';
        $subject = 'Você tem uma nova compra';
        $message = '<p>Segue a baixo as informações da compra.</p>';
        $message .= '<p>Nome do cliente: ' . $_POST['name'] . '</p>';
        $message .= '<p>E-mail do cliente: ' . $_POST['email'] . '</p>';
        $message .= '<p>link com as informações do produto: <a href="' . __BASEURL__ . 'details/?id=' . $_POST['id'] . '">Click aqui</a></p>';
        $from = 'aureliomoreirared@gmail.com';
        $headers = sprintf("From: %s\r\nReply-To: %s", $from, $from);
        if(mail($to, $subject, $message, $headers)){
            echo true;
        }else{
            echo false;
        }
    }
}