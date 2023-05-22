<?php
    namespace App\Controllers;

    class Controller {

        public function home() {
            require_once "../app/Views/Home.phtml";
        }
    
        public function query_cep($cep) {
            $address = new \App\Models\Address;
            $address = $address->get_address($cep);
            if(isset($address)) require_once "../app/Views/Home.phtml";
        }
    }
?>