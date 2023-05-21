<html>
	<title> MEU CEP </title>
	<body>
		<form method="post">
		<label> Insira o CEP: </label>
		<input type="text" name="cep">
		<input type="submit" value="Enviar">
	</body>
</html>

<?php
if(!empty($_POST['cep'])) {
	$cep = $_POST['cep'];
	$address = (get_address($cep));

	echo "<br><br>CEP Informado: $cep<br>";
	echo "Rua: $address->logradouro<br>";
	echo "Bairro: $address->bairro<br>";
	echo "Estado: $address->uf<br>";
}

function get_address($cep) {
	$cep = preg_replace("/[^0-9]/", "", $cep);
	$url = "http://viacep.com.br/ws/$cep/xml/";

	$xml = simplexml_load_file($url);
	return $xml;
}
?>