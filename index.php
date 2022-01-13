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
		<?php for($a = 1; $a <= 150; $a++){ ?>
			<div class="pokemons">
				<div class="info">
					<span class="numero">#<?php echo str_pad($a, 3, 0, STR_PAD_LEFT) ?></span>
					<span class="nome">Pokemon</span>
					<div class="tipo">Normal</div>
				</div>
				<div class="imagem">
					<div><img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/<?php echo $a ?>.svg" alt=""></div>
				</div>
			</div>
		<?php } ?>
	</div>
</body>
</html>
