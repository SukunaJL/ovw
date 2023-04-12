<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/MAPS.php';
require '../views/layout.php';

$map = new MAPS($_GET['id_map']);

$typeMap = new MAPS_TYPES($map->typeMapsID);

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

switch($map->typeMapsID) {
	case '1':
		$color 		= $escortColor;
		$colorLight = $escortColorLight;
		break;
	case '2':
		$color 		= $hybridColor;
		$colorLight = $hybridColorLight;
		break;
	case '3':
		$color 		= $controlColor;
		$colorLight = $controlColorLight;
		break;
	case '4':
		$color 		= $pushColor;
		$colorLight = $pushColorLight;
		break;
	case '5':
		$color 		= $assaultColor;
		$colorLight = $assaultColorLight;
		break;
	case '6':
		$color 		= $otherColor;
		$colorLight = $otherColorLight;
		break;
}



// DEBUG::printr($typeMap);
?>
<style>
	.block-detail-map {
		width: 100%;
		background: <?= $colorLight; ?>;
		margin-top: 2em;
		padding: 1em;
		border-radius: 1em;
		border: 2px solid <?= $color; ?>;
	}
	.title-map {
		text-align: center;
		font-size: 3em;
		font-weight: bold;
		padding-bottom: 0.5em;
		text-shadow: 0 0 .25rem <?= $color; ?>, -.125rem -.125rem 1rem <?= $color; ?>, .125rem .125rem 1rem <?= $color; ?>;
	}
	.block-content {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
	}
	.span-type {
		font-weight: bold;
		color: <?= $color; ?>;
	}
	.block-right {
		width: 60%;
		height: 20%;
		border: 3px solid <?= $color; ?>;
		border-radius: 0.2em;
	}
	.block-left {
		width: 30%;
	}
	.block-left > div {
		font-size: 1.5em;
		text-align: center;
	}
	.block-plan {
		width: 100%;
		margin: 1em;
		border-radius: 0.2em;
		border: 2px solid black;
	}
	.block-plan:hover {
		border: 2px solid orangered;
		box-shadow: 0 0 .25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 1rem black;
	}

	/* CSS CONTROL TYPE */
	.title-control {
		font-size: 1.5em;
		text-align: center;
	}
	.column-control {
		display: flex;
		flex-direction: column;
		align-items: center;
		width: 30%;
	}
	.three-maps-control {
		display: flex;
		flex-direction: row;
		width: 100%;
		justify-content: space-between;
	}
	.round-control-title {
		font-size: 1.4em;
		font-weight: bold;
		margin: 1em;
		color: orangered;
		text-decoration: underline;
	}
	.column-control img {
		width: 100%;
		margin-bottom: 1em;
	}
	.control-plan {
		width: 100%;
		border-radius: 0.2em;
		border: 2px solid black;
	}
	.control-plan:hover {
		border: 2px solid orangered;
		box-shadow: 0 0 .25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 1rem black;
	}
</style>

<div class="block-detail-map">

	<? if($map->typeMapsID == 3) {
		$mapNameExplode = explode(":", $map->name);
		$mapShortName = $mapNameExplode[0];

		$mapsControl[] = new MAPS($_GET['id_map']);
		$mapsControl[] = new MAPS($_GET['id_map'] +1);
		$mapsControl[] = new MAPS($_GET['id_map'] +2);

		// DEBUG::printr($mapsControl);
	?>

		<div class="title-map">
			<?= $mapShortName; ?>
		</div>

		<div class="title-control">
			Carte de type <span class="span-type"><?= $typeMap->nameTypeMap; ?></span>.
		</div>

		<div class="three-maps-control">
			<? foreach($mapsControl as $oneMapControl) { 
				$controlExplode = explode(":", $oneMapControl->name);
				$mapRoundName = $controlExplode[1];
				?>
				<div class="column-control">

					<div class="round-control-title">
						<?= $mapRoundName; ?>
					</div>

					<img class="block-right" src="../public/maps/<?= $oneMapControl->avatar; ?>">
					
						
					<? if($oneMapControl->plan) {?>
						<a href="../public/maps/<?= $oneMapControl->plan; ?>">
							<img class="control-plan" src="../public/maps/<?= $oneMapControl->plan; ?>">
						</a>
					<? }; ?>

					
				</div>
			<? } ?>
		</div>



	<? } else { ?>



		<div class="title-map">
			<?= $map->name; ?>
		</div>

		<div class="block-content">
			<div class="block-left">
				<div>
					Carte de type <span class="span-type"><?= $typeMap->nameTypeMap; ?></span>.
				</div>
				<? if($map->plan) {?>
					<a href="../public/maps/<?= $map->plan; ?>">
						<img class="block-plan" src="../public/maps/<?= $map->plan; ?>">
					</a>
				<? }; ?>

			</div>
			
			<img class="block-right" src="../public/maps/<?= $map->avatar; ?>">


		</div>

	<? } ?>
	
</div>