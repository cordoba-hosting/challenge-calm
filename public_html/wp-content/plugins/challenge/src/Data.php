<?php 
namespace Challenge;

use GuzzleHttp\Client;

class Data {
    private $urlApi = "";
    public function __construct($urlApi){
        $this->urlApi = $urlApi;
    }

    public function listElement() {
        $client = new Client();

        $response = $client->get($this->urlApi);

        $body = $response->getBody();

        return $body;
    }
}