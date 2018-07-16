<?php
namespace Product\Repository;

use GuzzleHttp\Client;

class ProductRepository
{
    private $client;

    public function __construct()
    {   
        $this->client = new Client();
    }

    public function getAll()
    {
        $api = __API__;
        $uri = $api['default']['host'] . 'produtos/';
        try {
            $request = $this->client->request('GET', $uri);
            $body = (string) $request->getBody();
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }

        $response = json_decode($body);
        if(!$response->status){
            return $response;
        }

        return $response->data;
    }

    public function getById($id)
    {
        $api = __API__;
        $uri = $api['default']['host'] . 'produto/?id=' . $id;
        
        try {
            $request = $this->client->request('GET', $uri);
            $body = (string) $request->getBody();
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
           
        }

        $response = json_decode($body);
        if(!$response->status){
            return $response;
        }

        return $response->data;
    }
    

    public function getShipment($data)
    {
        
        header ("Content-Type:text/xml");
        $api = __API__;
        $uri = $api['correios']['host'];
        $uriParamtersString = $api['correios']['parameters'];
        
        /**
         * Parametros esperados => [postcode, weight, length, height, width, value, method]
         */
        foreach($data as $paramter => $value){
            $uriParamtersString = str_replace("[{$paramter}]", $value, $uriParamtersString);
        }

        try {
            $request = $this->client->request('GET', $uri . $uriParamtersString);
            $body = (string) $request->getBody();
        } catch (RequestException $e) {
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
       
        echo $body;

        die;
    }
}