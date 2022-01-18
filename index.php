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

	<div class="container"></div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script>

		$(document).ready(function() {
			function pad (str, max) {
				str = str.toString();
				return str.length < max ? pad("0" + str, max) : str;
			}

			function fadeOut(element,time){
				processa(element,time,100,0);
			}

			let dadosPokemon = [];
			$.ajax({
				url: 'https://pokeapi.co/api/v2/pokemon?offset=0&limit=17',
				method: 'GET',
				dataType:"json",
				async: false,
			}).done(function(resp){
				$.each(resp.results, function(i,item){
					dadosPokemon[i] = item;
				})
			});

			$.each(dadosPokemon, function(i,item){
				let id;
				let img;
				let tipos;
				$.ajax({
					url: item.url,
					method: 'GET',
					async: false
				}).done(function(resp){
					id = resp.id;
					img = resp.sprites.other.dream_world.front_default;
					tipos = resp.types;
				});

				//console.log(tipos);

				var loading = '<div class="loading"><img src="assets/img/simbol-pokeball.png" width="80%" alt=""></div>';

				var pokemon = '<div class="pokemons">'+
				loading+
				'<div class="info">'+
				'<span class="numero">#'+pad(id,3)+'</span><br>'+
				'<span class="nome">'+item.name+'</span>';
				$.each(tipos, function(a, tipos){
					pokemon = pokemon + '<div class="tipo">'+tipos.type.name+'</div>';
				});
				pokemon = pokemon + '</div>'+
				'<div class="imagem">'+
				'<div><img src="'+img+'" alt=""></div>'+
				'</div>'+
				'</div>';

				$(pokemon).appendTo('.container');
			});
		});

	</script>
</body>
</html>
