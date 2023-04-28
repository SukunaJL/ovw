<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/MAPS.php';
require '../views/layout.php';


?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<style>
	body {
		width: 85%;
	}
	.body {
		width: 100%;
		background: silver;
		margin-top: 2em;
		border-radius: 0.5em;
		padding: 0.5em 0 0.5em 0.5em;
	}
	.body > div {
		background: lightcyan;
		margin: 0.5em 0 0.5em 0.5em;
		border-radius: 0.5em 0 0 0.5em;
	}
	.title-type-maps {
		font-size: 2em;
		padding-top: 0.5em;
		padding-left: 2em;
		font-weight: bold;
		/* color: mediumpurple; */
		font-style: italic;
	}

/***************************** SCROLLBAR CSS */
	.row-list-maps {
		scrollbar-width: thin;
		scrollbar-color: lightblue lightgray;
	}
	/* Works on Chrome, Edge, and Safari */
	.row-list-maps::-webkit-scrollbar {
		width: 8px;
	}
	.row-list-maps::-webkit-scrollbar-track {
		background: transparent;
		border-radius: 0.5em;
	}
	.row-list-maps::-webkit-scrollbar-thumb {
		background-color: transparent;
		border-radius: 0.4em;
		border: 2px solid black;
	}


	.row-list-maps {
		display: flex;
		flex-direction: row;
		flex-wrap: nowrap;
		overflow-x: scroll;

		padding: 0.5em;
	}
	.row-list-maps a {
		margin: 0.2em;
		text-decoration: none;
		filter: grayscale(60%);
		border: 2px solid grey;
		border-radius: 0.2em;
	}
	.row-list-maps a:hover {
		filter: grayscale(0%);
		filter: contrast(120%);
		/* border: 2px solid orangered; */
	}
	.one-block-map {
		display: flex;
		flex-direction: column;
		justify-content: flex-end;
		
		border-radius: 0.2em;
		width: 14em;
		height: 8em;
		background-size: cover;
	}
	@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap');
	.one-block-map div {
		font-family: 'Abril Fatface';

		color: lightgrey ;
		background: linear-gradient(transparent, black);
		font-size: 2em;
		opacity: 0.8;
		/* -webkit-text-stroke: 1px grey; */

		display: flex;
		justify-content: flex-end;
		/* align-content: flex-end; */
	}
	.one-block-map div:hover{
		color: white;
		opacity: 1;
	}
	
	.escort-link:hover {
		border: 2px solid mediumpurple;
		box-shadow: 0 0 .25rem mediumpurple, -.125rem -.125rem 1rem mediumpurple, .125rem .125rem 1rem mediumpurple;
	}
	.hybrid-link:hover {
		border: 2px solid tomato;
		box-shadow: 0 0 .25rem tomato, -.125rem -.125rem 1rem tomato, .125rem .125rem 1rem tomato;
	}
	.control-link:hover {
		border: 2px solid yellowgreen;
		box-shadow: 0 0 .25rem yellowgreen, -.125rem -.125rem 1rem yellowgreen, .125rem .125rem 1rem yellowgreen;
	}
	.push-link:hover {
		border: 2px solid darkturquoise;
		box-shadow: 0 0 .25rem darkturquoise, -.125rem -.125rem 1rem darkturquoise, .125rem .125rem 1rem darkturquoise;
	}
	.assault-link:hover {
		border: 2px solid hotpink;
		box-shadow: 0 0 .25rem hotpink, -.125rem -.125rem 1rem hotpink, .125rem .125rem 1rem hotpink;
	}
	.other-link:hover {
		border: 2px solid black;
		box-shadow: 0 0 .25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 1rem black;
	}
	.link-info-type {
		font-size: 0.7em;
		color: red;
		font-weight: bold;
	}
</style>
<? 	$allMaps = MAPS::getsAllMaps();
	$allTypeMaps = MAPS_TYPES::getsAllTypesMaps();

	$escortColor 		= "mediumpurple";
	$escortColorLight 	= "lavender";
	$hybridColor 		= "tomato";
	$hybridColorLight 	= "#ffe5e0";
	$controlColor 		= "yellowgreen";
	$controlColorLight 	= "#f1f8e0";
	$pushColor	 		= "darkturquoise";
	$pushColorLight 	= "#e0ffff";
	$assaultColor 		= "hotpink";
	$assaultColorLight 	= "#feebf5";

	$otherColor			= "goldenrod";
	$otherColorLight	= "palegoldenrod";
?>
<div class="body">
					<!----- ESCORT ----->
	<div style="background: <?= $escortColorLight; ?>;">
		<div class="title-type-maps" style="color: <?= $escortColor; ?>;">
			<?= $allTypeMaps[0]->name_type; ?>
		</div>

		<div class="row-list-maps">
			<? foreach($allMaps as $map) { 
				
				if($map->id_type_map == 1) { ?>

					<a class="escort-link" href="http://www.sitetest.local/ovw/views/detail_map.php?id_map=<?= $map->id_map; ?>">
						<div class="one-block-map" style="background-image: url('../public/maps/<?= $map->avatar; ?>');">

							<? if(strlen($map->name) > 13) {?>
								<div style="font-size : 1.3em"><?= $map->name; ?></div>
							<? } else { ?>
								<div><?= $map->name; ?></div>
							<? } ?>

						</div>
					</a>

			<? }; }; ?>
		</div>
	</div>

					<!----- HYBRID ----->
	<div style="background: <?= $hybridColorLight; ?>;">
		<div class="title-type-maps" style="color: <?= $hybridColor; ?>;">
			<?= $allTypeMaps[1]->name_type; ?>
		</div>

		<div class="row-list-maps">
			<? foreach($allMaps as $map) { 
				
				if($map->id_type_map == 2) { ?>

					<a class="hybrid-link" href="http://www.sitetest.local/ovw/views/detail_map.php?id_map=<?= $map->id_map; ?>">
						<div class="one-block-map" style="background-image: url('../public/maps/<?= $map->avatar; ?>');">

							<? if(strlen($map->name) > 13) {?>
								<div style="font-size : 1.3em"><?= $map->name; ?></div>
							<? } else { ?>
								<div><?= $map->name; ?></div>
							<? } ?>

						</div>
					</a>

			<? }; }; ?>
		</div>
	</div>

					<!----- CONTROL ----->
	<div style="background: <?= $controlColorLight; ?>;">
		<div class="title-type-maps" style="color: <?= $controlColor; ?>;">
			<?= $allTypeMaps[2]->name_type; ?>
		</div>

		<div class="row-list-maps">
			<? foreach($allMaps as $map) { 
				if($map->id_type_map == 3) { 
					$controlMaps[] = $map;
				}
			}
			unset($controlMaps[1], $controlMaps[2], $controlMaps[4], $controlMaps[5], $controlMaps[7], 
				  $controlMaps[8], $controlMaps[10], $controlMaps[11], $controlMaps[13], $controlMaps[14]);

			foreach($controlMaps as $map) { 
				if($map->id_type_map == 3) { 
					$explode = explode(":", $map->name);
					$map->name = $explode[0];
					?>
					<a class="control-link" href="http://www.sitetest.local/ovw/views/detail_map.php?id_map=<?= $map->id_map; ?>">
						<div class="one-block-map" style="background-image: url('../public/maps/<?= $map->avatar; ?>');">
							<? if(strlen($map->name) > 13) {?>
								<div style="font-size : 1.3em"><?= $map->name; ?></div>
							<? } else { ?>
								<div><?= $map->name; ?></div>
							<? } ?>
						</div>
					</a>
			<? }; }; ?>
		</div>
	</div>

					<!----- PUSH ----->
	<div style="background: <?= $pushColorLight; ?>;">
		<div class="title-type-maps" style="color: <?= $pushColor; ?>;">
			<?= $allTypeMaps[3]->name_type; ?>
		</div>

		<div class="row-list-maps">
			<? foreach($allMaps as $map) { 
				
				if($map->id_type_map == 4) { ?>

					<a class="push-link" href="http://www.sitetest.local/ovw/views/detail_map.php?id_map=<?= $map->id_map; ?>">
						<div class="one-block-map" style="background-image: url('../public/maps/<?= $map->avatar; ?>');">

							<? if(strlen($map->name) > 13) {?>
								<div style="font-size : 1.3em"><?= $map->name; ?></div>
							<? } else { ?>
								<div><?= $map->name; ?></div>
							<? } ?>

						</div>
					</a>

			<? }; }; ?>
		</div>
	</div>

					<!----- ASSAULT ----->
	<div style="background: <?= $assaultColorLight; ?>;">
		<div class="title-type-maps" style="color: <?= $assaultColor; ?>;">
			<?= $allTypeMaps[4]->name_type; ?>
		</div>

		<div class="row-list-maps">
			<? foreach($allMaps as $map) { 
				
				if($map->id_type_map == 5) { ?>

					<a class="assault-link" href="http://www.sitetest.local/ovw/views/detail_map.php?id_map=<?= $map->id_map; ?>">
						<div class="one-block-map" style="background-image: url('../public/maps/<?= $map->avatar; ?>');">

							<? if(strlen($map->name) > 13) {?>
								<div style="font-size : 1.3em"><?= $map->name; ?></div>
							<? } else { ?>
								<div><?= $map->name; ?></div>
							<? } ?>

						</div>
					</a>

			<? }; }; ?>
		</div>
	</div>


	
					<!----- AUTRES ----->
					<div style="background: <?= $otherColorLight; ?>;">
		<div class="title-type-maps" style="color: <?= $otherColor; ?>;">
			<?= $allTypeMaps[5]->name_type; ?>
		</div>

		<div class="row-list-maps">
			<? foreach($allMaps as $map) { 
				
				if($map->id_type_map == 6) { ?>

					<a class="other-link" href="http://www.sitetest.local/ovw/views/detail_map.php?id_map=<?= $map->id_map; ?>">
						<div class="one-block-map" style="background-image: url('../public/maps/<?= $map->avatar; ?>');">

							<? if(strlen($map->name) > 13) {?>
								<div style="font-size : 1.3em"><?= $map->name; ?></div>
							<? } else { ?>
								<div><?= $map->name; ?></div>
							<? } ?>

						</div>
					</a>

			<? }; }; ?>
		</div>
	</div>
	<a class="link-info-type" href="http://www.sitetest.local/ovw/views/info_type_map.php">En savoir plus sur les differents types de carte >></a>
	

</div>
