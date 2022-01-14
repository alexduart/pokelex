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

	<div class="container">
		<!--<div class="pokemons">
			<div class="info">
				<span class="numero">#000</span><br>
				<span class="nome">Pokemon</span>
				<div class="tipo">tipo</div>
			</div>
			<div class="imagem">
				<div><img src="" alt=""></div>
			</div>
		</div>-->
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$.ajax({
				url: 'https://pokeapi.co/api/v2/pokemon?offset=0&limit=3',
				method: 'GET'
			}).done(function(resp){
				$.each(resp.results, function(i,item){
					var id;
					var a = $.ajax({
						url: item.url,
						method: 'GET',
						success: (response) => {
							$.each(response, function(i,dados){
								//console.log('#', dados);
								id = dados.id;
							})
							console.log('#', id);
						}
					})
					/*var a = $.getJSON(item.url, (response) => {
						id = response.id;
					})*/


					var pokemon = '<div class="pokemons">'+
					'<div class="info">'+
					'<span class="numero">#'+id+'</span><br>'+
					'<span class="nome">'+item.name+'</span>'+
					'<div class="tipo">tipo</div>'+
					'</div>'+
					'<div class="imagem">'+
					'<div><img src="" alt=""></div>'+
					'</div>'+
					'</div>' ;
					$(pokemon).appendTo('.container');
				})

			})
		});
	</script>
</body>
</html>
