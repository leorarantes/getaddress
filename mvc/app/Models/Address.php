<?php

namespace App\Models;
use Exception;

class Address {

	public function get_address($cep) {
        // remove non-numeric characters
        $cep = preg_replace("/[^0-9]/", "", $cep);
        
        // fetch api data
        try {
            $api = new \App\Services\Api;
            $address =  $api->get_address($cep);
            return $address;
        } catch (Exception $error) {
            echo $error->getMessage();
        }
	}
}

?>