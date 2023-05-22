<?php

namespace App\Services;
use Exception;

class Api {
    private $base_url = "http://viacep.com.br/ws";

    public function get_address($cep) {
        // fetch data
        $address = simplexml_load_file("$this->base_url//$cep//xml//");

        if (!$address) {
            throw new Exception("400 - Bad Request");
        }
        if ($address->erro) throw new Exception("404 - Not found");
        return $address;
    }
}

?>