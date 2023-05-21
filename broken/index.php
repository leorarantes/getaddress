
<html>
	<title> MEU CEP </title>
	<body>
		<!-- 1. O atributo 'action' não deveria ter sido especificado, já que as regras de negócio
		foram implementadas no próprio arquivo e o valor padrão desse atributo é o mesmo arquivo -->
		<form action="idex.php" method="post">
		<label> Insira o CEP: </label>
		<input type="text" name="cep">>
		<input type="submit" value="Enviar">
	</body>
</html>

<?php

if(!empty($_POST['cep'])){
	
	$cep = $_POST['cep'];

	/* 2. A variável 'cp' não existe, o nome correto é 'cep' */
	$address = (get_address($cp));

	echo "<br><br>CEP Informado: $cep<br>";
	/* 3. A variável 'addres' e a propriedade 'logradoro' não existem,
	os nomes corretos são 'address' e 'logradouro', respectivamente */
	echo "Rua: $addres->logradoro<br>";
	echo "Bairro: $address->bairro<br>";
	/* 4. A variável 'adress' não existe, o nome correto é 'address' */
	echo "Estado: $adress->uf<br>";
}

function get_address($cep){
	
	
	$cep = preg_replace("/[^0-9]/", "", $cep);

	/* 5. A url é inválida, a url correta é 'http://viacep.com.br/ws/$cep/xml/' */
	$url = "http://viacep.com.br/ws$cep/xml/";

	$xml = simplexml_load_file($url);

	/* 6. O valor correto a ser retornado é o objeto
	'$xml' e não sua propriedade 'logradouro' */
	return $xml->logradouro;
}

?>