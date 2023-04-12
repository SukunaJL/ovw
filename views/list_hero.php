<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/HEROES.php';
// require '../class/ROLES.php';
require '../views/layout.php';

?>
<style>
	body {
		width: 87%;
	}
	/* logo tank-dps-heal + nom  */
	.role-names-group {
		display: flex;
		justify-content: space-between;
		font-weight: bold;
		color: white;
		width: 98%;
		margin: 1em auto 0.5em;
		text-align: center;
	}
	.role-name {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 30%;
		height: 2em;
	}
	.role-logo{
		display: flex;
		align-items: center;
		justify-content: center;
		width: 1.5em;
		height: 1.5em;
		border: 1px solid white;
		border-radius: 100%;
		margin-right: 0.2em;
	}
	.role-logo img {
		width: 1.2em;
		height: 1em;
	}
	.role-title {
		font-size: 1em;
		font-family: 'Rubik';
		font-weight: normal;
	}

	.contain-hero {
		display: flex;
		justify-content: space-between;
		height: 100%;
	}

	.tanksBlock{
		width: 25%;
		display: flex;
		flex-direction:row;
		flex-wrap: wrap;
		justify-content:flex-end;
	}
	.dpssBlock {
		width: 40%;
		height: 2em;
		display: flex;
		flex-direction:row;
		flex-wrap: wrap;
		justify-content: center;
	}
	.healsBlock{
		width: 25%;
		height: 75%;
		display: flex;
		flex-direction:row;
		flex-wrap: wrap;
		justify-content: flex-start;
	}

	.heroBlock{
		border: 2px solid white;
		border-radius: 3px;
		display: flex;
		flex-direction:column;
		width: 6em;
		height: 7.5em;
		background: white;
		text-align: center;
		margin: 2px;
		text-decoration: none;
		color: black;
	}
	.heroBlock:hover {
		box-shadow: 0 0 .25rem white, -.125rem -.125rem 1rem white, .125rem .125rem 1rem white;
		transform: scale(1.3); 
	}
	.heroBlock img {
		background: linear-gradient(#6a84a0, #e5e5f0);
	}
	@import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
	.heroBlock div {
		font-family: 'Rubik';
		width: 100%;
		height: 100%;
		font-size: 13px;
		margin-top: 2px;
		font-weight: bold;
		box-sizing: border-box;
		text-justify: justify;
		display: flex;
		justify-content:center;
		align-items: center;
		text-transform: uppercase;
	}
	@font-face {
		font-family: pc;
		src: url("../public/pc.ttf");
	}
	.confidential-file {
		border: 10px solid lightgray;
		border-bottom: none;
		font-family: pc;
		font-weight: bold;
		background: lightgray;
		margin-top: 1em;
	}

	@keyframes textflicker {
		from {
			text-shadow: 1px 0 0 #ea36af, -2px 0 0 #75fa69;
		}
		to {
			text-shadow: 2px 0.5px 2px #ea36af, -1px -0.5px 2px #75fa69;
		}
	}
	.block-detail-hero{
		animation-duration: 0.01s;
		animation-name: textflicker;
		animation-iteration-count: infinite;
		animation-direction: alternate;

		height: 80em;
		margin-bottom: 3em;
		border: 10px solid lightgray;
		background: black;
		color: rgb(0, 230, 64);
		font-family: pc;
		font-size: 0.6em;
		padding:1.5em;
		display: flex;
		flex-direction: column;
	}
	
	@keyframes imgflicker {
		from {
			box-shadow: 1px 0 0 #ea36af, -2px 0 0 #75fa69;
		}
		to {
			box-shadow: 2px 0.5px 2px #ea36af, -1px -0.5px 2px #75fa69;
		}
	}
	.block-detail-hero img{
		animation-duration: 0.01s;
		animation-name: imgflicker;
		animation-iteration-count: infinite;
		animation-direction: alternate;

		width: 10em;
		height: 10em;
		filter: sepia(1);
		image-rendering: pixelated;
	}

	.detail-noStory {
		width: 100%;
		height: 10em;
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		margin-bottom: 1.5em;
	}
	table {
		width: 100%;
		height: 100%;
	}
	table tr td:nth-child(odd){
		text-align: end;
	}

	.cursor {
		width: 1em;
		height: 1.5em;
		background: rgb(0, 230, 64);
		animation-duration: 0.7s;
		animation-name: cursor;
		animation-iteration-count: infinite;
		animation-direction: alternate;
		display: flex; 
	}
	@keyframes cursor {
		from {
			opacity : 0;
			box-shadow: 1px 0 0 #ea36af, -2px 0 0 #75fa69;
		}
		to {
			opacity : 1;
			box-shadow: 2px 0.5px 2px #ea36af, -1px -0.5px 2px #75fa69;
		}
	}

	.data-vide {
		flex-direction: row;
	}
	.text-data-vide{
		position: relative;
		top: 0.3em;
			
	}
</style>
<? 
	$tanksHeroes = HEROES::getHeroesByRole(1);
	$dpsHeroes   = HEROES::getHeroesByRole(2);
	$healsHeroes = HEROES::getHeroesByRole(3);
?>


<!--***** AFFICHAGE HEROS PAR ROLE *****-->
	<div class="role-names-group">
		<div class="role-name">
			<div class="role-logo"><img src="../public/role/tankoff.webp"></div>
			<div class="role-title">TANK</div>
		</div>
		
		<div class="role-name">
			<div class="role-logo"><img src="../public/role/dpsoff.webp"></div>
			<div class="role-title">DEGATS</div>
		</div>
		
		<div class="role-name">
			<div class="role-logo"><img src="../public/role/healoff.png"></div>
			<div class="role-title">SOUTIEN</div>
		</div>
	</div>
	<div class="contain-hero">
		<div class="tanksBlock">
			<? foreach ($tanksHeroes as $hero){ ?>
				<a class="heroBlock" data-hero-id="<?= $hero->id_hero;?>">
					<img src="../public/src/<?= $hero->avatar; ?>">
					<? if(strlen($hero->name) > 10) {?>
						<div style="font-size : 0.55em"><?= $hero->name; ?></div>
					<? } else { ?>
						<div><?= $hero->name; ?></div>
					<? } ?>
				</a>
			<? } ?>
		</div>

		<div class="dpssBlock">
			<? foreach ($dpsHeroes as $hero){ ?>
				<a class="heroBlock" data-hero-id="<?= $hero->id_hero;?>">
					<img src="../public/src/<?= $hero->avatar; ?>">
					<div><?= $hero->name; ?></div>
				</a>
			<? } ?>
		</div>

		<div class="healsBlock">
			<? foreach ($healsHeroes as $hero){ ?>
				<a class="heroBlock" data-hero-id="<?= $hero->id_hero;?>">
					<!-- <input style="display: none;" type="text" class="heroID" value=<?=  $heroID;?>> -->
					<img src="../public/src/<?= $hero->avatar; ?>">
					<div><?= $hero->name; ?></div>
				</a>
			<? } ?>
		</div>
	</div>


	<div class="confidential-file">
		CONFIDENTIAL DATA
	</div>
	<div class="block-detail-hero data-vide"  id="result">
		<div class="text-data-vide select-hero">ACCES AUX DONNEES CONFIDENTIELLES...</div>
		<div class="cursor"></div>
	</div>


<!-- <? //! AJAX : ?> -->
<script>
	$(document).ready(function(){		
		$(".heroBlock").click(function(){
			
			// var numValue = $(this).find(".heroID").val();
			var numValue = $(this).data('hero-id');
			
			$.get("../views/list_hero_ajax.php", {id_hero: numValue} , function(data){
				$("#result").html(data);
			});

			$(".select-hero").css("display", "none");
			$(".data-vide").removeClass("data-vide");
	});
});
</script>