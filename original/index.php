
<html>
	<title> MEU CEP </title>
	<body>
		<!-- 1. O atributo 'action' não deveria ter sido especificado, já que as regras de negócio
		foram implementadas no próprio arquivo e o valor padrão desse atributo é o mesmo arquivo -->

		<!-- 2. O atributo 'method' deveria receber 'get', pois a intenção da página
		é fazer uma consulta e não criar/alterar/deletar um registro no servidor -->
		<form action="idex.php" method="post">
		<label> Insira o CEP: </label>
		<input type="text" name="cep">>
		<input type="submit" value="Enviar">
	</body>
</html>

<?php

if(!empty($_POST['cep'])){
	
	$cep = $_POST['cep'];

	/* 3. A função 'get_address' recebeu como parâmetro uma variável
	inexistente, o nome correto da variável é '$cep' e não '$cp'*/
	$address = (get_address($cp));

	echo "<br><br>CEP Informado: $cep<br>";

	/* 4. O nome da variável está incorreto, o correto é 'address' e não 'addres' */
	echo "Rua: $addres->logradoro<br>";
	echo "Bairro: $address->bairro<br>";
	echo "Estado: $adress->uf<br>";
}

function get_address($cep){
	
	
	$cep = preg_replace("/[^0-9]/", "", $cep);

	/* 5. A url está incorreta, pois após o 'ws' há uma '/' */
	$url = "http://viacep.com.br/ws$cep/xml/";

	$xml = simplexml_load_file($url);

	/* 6. O valor correto a ser retornado é o objeto
	'$xml' e não sua propriedade 'logradouro' */
	return $xml->logradouro;
}

?>