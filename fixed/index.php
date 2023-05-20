<html>
	<title> MEU CEP </title>
	<body> 
		<form method="get">
		<label> Insira o CEP: </label>
		<input type="text" name="cep">
		<input type="submit" value="Enviar">
	</body>
</html>

<?php

if (isset($_GET['cep'])) {
	// get existing $_GET value
	$cep = $_GET['cep'];

	// get address object
	$address = (get_address($cep));

	// render address
	echo "<br><br>CEP Informado: $cep<br>";
	echo "Rua: $address->logradouro<br>";
	echo "Bairro: $address->bairro<br>";
	echo "Estado: $address->uf<br>";
}

function get_address($cep) {
	// remove non-numeric characters
	$cep = preg_replace("/[^0-9]/", "", $cep);

	// create URL
	$url = "http://viacep.com.br/ws/$cep/xml/";
	
	// fetch adress data in XML format and parse it into an object
	$xml = simplexml_load_file($url);
	return $xml;
}

?>