<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pokedex</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="assets/css/base.css?<?php echo rand(); ?>">
</head>
<body>
	<header>
		<div class="ligths">
			<div class="circle-1">
				<div class="circle-1-1"></div>
			</div>
			<div class="circle-2">
				<div class="circle-2-1"></div>
			</div>
			<div class="circle-3">
				<div class="circle-3-1"></div>
			</div>
			<div class="circle-4">
				<div class="circle-4-1"></div>
			</div>
			<div class="pokeball"></div>
		</div>
		<div class="search">
			<form action="">
				<input type="text" placeholder="Pesquisar" name="s">
				<button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
			</form>
		</div>
	</header>

	<?php
	function debug($a){
		echo '<pre>';
		print_r($a);
		echo '</pre>';
	}

	function listaPokemon($offset = 0, $limit = 10){
		$url_base 		= "https://pokeapi.co/api/v2/";
		$headers        = array("Content-Type" => "application/json");
		$form_params 	= '{}';
		$client = new Client([
			'base_uri'    	=> $url_base,
			'headers'       => $headers,
			'timeout'       => 10.0
		]);

		$return = $client->request('GET', 'pokemon?offset='.$offset.'&limit='.$limit, ['debug' => false, 'body' => $form_params, 'http_errors' => true] );
		$codRetorno       = $return->getStatusCode();
		return $body 			  = json_decode($return->getBody());
	}

	function dadosPokemon($url){
		$url_base 		= $url;
		$headers        = array("Content-Type" => "application/json");
		$form_params 	= '{}';
		$client = new Client([
			'base_uri'    	=> $url_base,
			'headers'       => $headers,
			'timeout'       => 10.0
		]);

		$return = $client->request('GET', '', ['debug' => false, 'body' => $form_params, 'http_errors' => true] );
		$codRetorno       = $return->getStatusCode();
		return $body 			  = json_decode($return->getBody());
	}

	$pokemons 		= listaPokemon(0, 640);
	?>

	<div class="container">
		<?php foreach($pokemons->results as $pokemon){
				$dados = dadosPokemon($pokemon->url);
		?>
			<div class="pokemons">
				<div class="info">
					<span class="numero">#<?php echo str_pad($dados->game_indices[3]->game_index, 3, 0, STR_PAD_LEFT)  ?></span><br>
					<span class="nome"><?php echo $pokemon->name; ?></span>
					<?php foreach($dados->types as $tipo){ ?>
					<div class="tipo"><?php echo $tipo->type->name ?></div>
					<?php } ?>
				</div>
				<div class="imagem">
					<div><img src="<?php echo $dados->sprites->other->dream_world->front_default ?>" alt=""></div>
				</div>
			</div>
		<?php } ?>
	</div>
</body>
</html>
