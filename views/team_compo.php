<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/HEROES.php';
// require '../class/ROLES.php';
require '../class/COUNTERS.php';
require '../views/layout.php';

?>
<style>
	body {
		width: 90%;
	}
	@font-face {
			font-family: trtn;
			src: url("../public/Tarantino.ttf");
		}
		
	.formulaire {
		display: flex;
		align-items: center;
		flex-direction: column;
		border: 3px solid orangered;
		border-radius: 0.5em;
		width: 100%;
		background-image: url("../public/src/ovw-mosaic.jpg");
		background-size: 15%;
		background-repeat: repeat;
		background-blend-mode: soft-light;
		background-color: grey;
	}
	.button-submit {
		font-size: 1em;
		color: white;
		font-weight: bold;
		padding: 0.5em;
		margin-bottom: 1em;
		background : -webkit-linear-gradient(top, orangered, red);
		border: 5px groove orangered;
		border-radius: 0.5em;
	}
	.button-submit:hover {
		cursor: pointer;
		color:black;
		background : -webkit-linear-gradient(top, red, orangered);
		border: 5px ridge orangered;
	}

	.barre-entiere-selection {
		display: flex;
		justify-content: space-between;
		width: 100%;
		height: 7em;
		padding: 0.5em;
		margin: 1em 0.5em;
	}
	.block-selection {
		height: 100%;
		display: flex;
		flex-direction: row;
		align-items: center;
	}
	.selection-tank {
		width: 30%;
	}
	.selection-dps {
		width: 45%;
	}
	.selection-heal {
		width: 25%;
	}
	.role-logo img {
		width: 1.3em;
		height: 1em;
		background: orangered;
		padding: 0.3em 0.2em;
		border-radius: 100%;
	}
	.img-block {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}
	.heroBlock{
		border: 3px solid white;
		border-radius: 3px;
		display: flex;
		flex-direction:column;
		width: 3em;
		height: 3em;
		text-align: center;
		margin: 2px;
		text-decoration: none;
		color: black;
	}
	.heroBlock:hover {
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.heroBlock img {
		background: linear-gradient(#6a84a0, #e5e5f0);
	}
	.barre-entiere-selection input[type="checkbox"] {
		display: none;
	}
	.barre-entiere-selection input[type="checkbox"]:checked + label {
		border: 3px solid gold;
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.barre-entiere-selection input[type="checkbox"]:checked + label img:hover {
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.not-checked {
		filter: sepia(1);
	}

	.team-selectionner {
		margin-top: 2em;
		display: flex;
		flex-direction: row;
		justify-content: space-around;
		border: 3px solid orangered;
		border-radius: 10px;
		background-color: Peru;
	}
	.team-selectionner-one {
		display: flex;
		flex-direction:column;
		width: 15%;
		text-align: center;
		margin: 2px;
		color: black;
		justify-content: center;
		align-items: center;
		padding: 1em 0;
	}
	.team-selectionner-one img {
		background: linear-gradient(#decbb6, #bc9a76);
		border: 1px solid black;
		border-radius: 4px;
		width: 60%;
		margin-bottom: -1.7em;
	}
	.team-selectionner-one div {
		font-family: trtn;
		font-size: 1.5em;
		color: Raisin Black;
		transform: rotate(-15grad);
		background: linear-gradient(rgba(208, 183, 155, 0), rgba(205, 133, 63, 1));
		margin-bottom: 1em;
		padding: 0 2em 0.8em 1em;
	}
	.counters-column {
		display: flex;
		flex-direction: column;
	}
	.counters-column img {
		width: 3em;
		height: 3em;
		border: 1px solid black;
	}
	.strong-img {
		background: green;
	}
	.weak-img {
		background: red;
	}
	.counters-result {
		display: flex;
		flex-direction: row;
		justify-content: space-around;
		text-align: center;
		margin-top: 0.5em;
	}
	.one-counter-result {
		display: flex;
		flex-direction: row;
		justify-content: space-around;
	}
	.fas {
		width: 1em;
		height: 1em;
		border: 1px solid black;
		border-radius: 100%;
		background: white;
		padding: 0.3em;
		margin: 0.5em auto;
	}
	.fa-thumbs-up {
		color: green;
	}
	.fa-thumbs-down {
		color: red;
	}
	.block-teams-counters {
		/* border: 1px solid black; */
		border-radius: 1em;
		background: silver;
		width: 100%;
		text-align: center;
		margin: 0.5em 0;
		padding: 0.5em;
	}
	.title-counter {
		font-size: 1.3em;
		font-weight: bold;
		padding-bottom: 1em;
	}
	.teams-counters {
		width: 100%;
		display: flex;
		flex-direction: row;
		justify-content: space-around;
	}
	.one-team-counters {
		width: 33%;
		text-align: center;
	}
	.small-title-counter {
		font-size: 1.2em;
		padding-bottom: 0.5em;
	}
	.span-counter-nb {
		font-size: 0.7em;
	}
	.result-list-counters {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
	}
	.result-list-counters img {
		width: 3em;
		margin: 0.1em;
		border-radius: 0.5em;
	}
	.icon-counter-role {
		width: 1em;
		height: 0.7em;
		padding: 0.3em 0.2em;
		border-radius: 100%;
	}
</style>
<? 
	$tanksHeroes = HEROES::getHeroesByRole(1);
	$dpsHeroes   = HEROES::getHeroesByRole(2);
	$healsHeroes = HEROES::getHeroesByRole(3);

	function enleverCaracteresSpeciaux($text) {
		$utf8 = array(
			'/[áàâãªä]/u' => 'a',
			'/[ÁÀÂÃÄ]/u' => 'A',
			'/[ÍÌÎÏ]/u' => 'I',
			'/[íìîï]/u' => 'i',
			'/[éèêë]/u' => 'e',
			'/[ÉÈÊË]/u' => 'E',
			'/[óòôõºö]/u' => 'o',
			'/[ÓÒÔÕÖ]/u' => 'O',
			'/[úùûü]/u' => 'u',
			'/[ÚÙÛÜ]/u' => 'U',
			'/ç/' => 'c',
			'/Ç/' => 'C',
			'/ñ/' => 'n',
			'/Ñ/' => 'N'
		);
		return preg_replace(array_keys($utf8), array_values($utf8), $text);
	}

if(isset($_POST['team-submit'])){
	// DEBUG::printr($_POST);
?>
								<!--//* AFFICHAGE TEAM SELECTIONNEE -->
	<div class="team-selectionner">
		<? foreach ($_POST['team-compo'] as $heroID){ 
			$hero = new HEROES($heroID);?>
			<div class="team-selectionner-one">
				<img src="../public/src/<?= $hero->avatar; ?>" alt="<?= $hero->name; ?>"/>
				<div><?= enleverCaracteresSpeciaux($hero->name); ?></div>
			</div>
		<? } ?>
	</div>
								<!--//* AFFICHAGE COUNTERS-TEAM SELECTIONNEE -->
	<? foreach ($_POST['team-compo'] as $heroID){
		$allCounters = COUNTERS::getCounterWeakByHero($heroID);
		foreach($allCounters as $counterID) {
			$arrayCountersID[] = $counterID->id_hero;
		}
		$allCountersID = array_count_values($arrayCountersID);
	} ?>

	<div class="block-teams-counters">
		<div>
			<img class="icon-counter-role" src="../public/role/tankoff.webp" style="border: 2px solid blue;  background: dodgerblue;" alt="Tanks">
			<img class="icon-counter-role" src="../public/role/dpsoff.webp"  style="border: 2px solid red;   background: tomato;" alt="DPS">
			<img class="icon-counter-role" src="../public/role/healoff.png"  style="border: 2px solid green; background: limegreen;" alt="Heals">
		</div>
		<div class="title-counter">Héros counters de l'équipe selectionnée</div>
								<!--//* COUNTERS-TEAM 5-4 -->
		<div class="teams-counters">
			<div class="one-team-counters">
				<div class="small-title-counter">
					<div>Héros Trés Fort !</div>
					<span class="span-counter-nb">(counters 4 ou 5 héros de l'équipe)</span>
				</div>
				<div class="result-list-counters">
					<? foreach($allCountersID as  $key =>$counterID){
							if($counterID >= 4) { 
								$h = new HEROES($key); ?>
								<img src="../public/src/<?= $h->avatar; ?>" alt="<?= $h->name; ?>"
									 style="border: 2px solid <? if($h->roleID->ID == 1){ echo "blue"; } else if($h->roleID->ID == 2){ echo "red"; } else { echo "green"; } ?>;
									 		background: <? if($h->roleID->ID == 1){ echo "dodgerblue"; } else if($h->roleID->ID == 2){ echo "tomato"; } else { echo "limegreen"; } ?>;"/>
							<? }
						}
					?>
				</div>
			</div>
								<!--//* COUNTERS-TEAM 3 -->
			<div class="one-team-counters">
				<div class="small-title-counter">
					<div>Héros Fort !</div>
					<span class="span-counter-nb">(counters 3 héros de l'équipe)</span>
				</div>
				<div class="result-list-counters">
					<? foreach($allCountersID as  $key =>$counterID){
							if($counterID == 3) { 
								$h = new HEROES($key); ?>
								<img src="../public/src/<?= $h->avatar; ?>" alt="<?= $h->name; ?>"
									 style="border: 2px solid <? if($h->roleID->ID == 1){ echo "blue"; } else if($h->roleID->ID == 2){ echo "red"; } else { echo "green"; } ?>;
									 		background: <? if($h->roleID->ID == 1){ echo "dodgerblue"; } else if($h->roleID->ID == 2){ echo "tomato"; } else { echo "limegreen"; } ?>;"/>
					<? 		}
						} ?>
				</div>
			</div>
								<!--//* COUNTERS-TEAM 2 -->
			<div class="one-team-counters">
				<div class="small-title-counter">
					<div>Héros bon !</div>
					<span class="span-counter-nb">(counters 2 héros de l'équipe)</span>
				</div>
				<div class="result-list-counters">
					<? foreach($allCountersID as  $key =>$counterID){
							if($counterID == 2) { 
								$h = new HEROES($key); ?>
								<img src="../public/src/<?= $h->avatar; ?>" alt="<?= $h->name; ?>"
									 style="border: 2px solid <? if($h->roleID->ID == 1){ echo "blue"; } else if($h->roleID->ID == 2){ echo "red"; } else { echo "green"; } ?>;
									 		background: <? if($h->roleID->ID == 1){ echo "dodgerblue"; } else if($h->roleID->ID == 2){ echo "tomato"; } else { echo "limegreen"; } ?>;"/>
					<? 		}
						} ?>
				</div>
			</div>

		</div>
	</div>


								<!-- //* DETAIL DES COUNTERS LISTE COLONNES -->
	<div class="counters-result">
		<? foreach ($_POST['team-compo'] as $heroID){ ?>
			<div class="one-counter-result">
				
				<div class="counters-column">
					<i class="fas fa-thumbs-up"></i>
					<? $counters = COUNTERS::getCounterStrongByHero($heroID);
					foreach ($counters as $weakID) { 
						$weak = new HEROES($weakID->id_hero_vs); ?>
						<img class="strong-img" src="../public/src/<?= $weak->avatar; ?>" alt="<?= $weak->name; ?>"/>
					<? } ?> 
				</div>
				<div class="counters-column">
					<i class="fas fa-thumbs-down"></i>
					<? $isCounters = COUNTERS::getCounterWeakByHero($heroID);
					foreach ($isCounters as $strongID) { 
						$strong = new HEROES($strongID->id_hero); ?>
						<img class="weak-img" src="../public/src/<?= $strong->avatar; ?>" alt="<?= $strong->name; ?>"/>
					<? } ?>
				</div>
			</div>
		<? } ?>
	</div>

<? } else {
	?>
								<!-- //* BARRE DE SELECTION D'UNE TEAM -->
	<h1 style="text-align: center;color:white;margin:0.5em auto;">Selectionnez une équipe</h1>
	<form class="formulaire" method="POST">

		<div class="barre-entiere-selection">
										<!--//* TANK -->
			<div class="block-selection selection-tank">
				<div class="role-logo"><img src="../public/role/tankoff.webp"  alt="Tanks"></div>
				<div class="img-block">
					<? foreach ($tanksHeroes as $hero){ ?>
						<input class="tank-input" type="checkbox" id="Hero<?= $hero->id_hero ?>" name="team-compo[]" value="<?= $hero->id_hero ?>" >
						<label class="heroBlock" for="Hero<?= $hero->id_hero ?>">
							<img src="../public/src/<?= $hero->avatar?>" alt="<?= $hero->name; ?>"/>
						</label>
					<? } ?>
				</div>
			</div>
										<!--//* DPS -->
			<div class="block-selection selection-dps">
				<div class="role-logo"><img class="role-logo" src="../public/role/dpsoff.webp" alt="DPS"></div>
				<div class="img-block">
					<? foreach ($dpsHeroes as $hero){ ?>
						<input class="dps-input" type="checkbox" id="Hero<?= $hero->id_hero ?>" name="team-compo[]" value="<?= $hero->id_hero ?>" >
						<label class="heroBlock" for="Hero<?= $hero->id_hero ?>">
							<img src="../public/src/<?= $hero->avatar?>" alt="<?= $hero->name; ?>"/>
						</label>
					<? } ?>
				</div>
			</div>
										<!--//* HEAL -->
			<div class="block-selection selection-heal">
				<div class="role-logo"><img src="../public/role/healoff.png" alt="Heals"></div>
				<div class="img-block">
					<? foreach ($healsHeroes as $hero){ ?>
						<input class="heal-input" type="checkbox" id="Hero<?= $hero->id_hero ?>" name="team-compo[]" value="<?= $hero->id_hero ?>" >
						<label class="heroBlock" for="Hero<?= $hero->id_hero ?>">
							<img src="../public/src/<?= $hero->avatar?>" alt="<?= $hero->name; ?>"/>
						</label>
					<? } ?>
				</div>
			</div>
		</div>
		<button class="button-submit" type="submit" name="team-submit">Valider Équipe</button>

	</form>
<? } ?>



<script>
$(document).ready(function(e){
	$('.tank-input').click(function() {
		nb = $(".tank-input:checked").length;
		if(nb >= 1) {
			$(".tank-input:not(:checked)").attr('disabled', true);
			$(".tank-input:not(:checked) + label").addClass("not-checked");

		} else {
			$(".tank-input").attr('disabled', false);
			$(".tank-input:not(:checked) + label").removeClass("not-checked");

		}
	});

	$('.dps-input').click(function() {
		nb = $(".dps-input:checked").length;

		if(nb >= 2) {
			$(".dps-input:not(:checked)").attr('disabled', true);
			$(".dps-input:not(:checked) + label").addClass("not-checked");

		} else {
			$(".dps-input").attr('disabled', false);
			$(".dps-input:not(:checked) + label").removeClass("not-checked");

		}
	});

	$('.heal-input').click(function() {
		nb = $(".heal-input:checked").length;
		if(nb >= 2) {
			$(".heal-input:not(:checked)").attr('disabled', true);
			$(".heal-input:not(:checked) + label").addClass("not-checked");

		} else {
			$(".heal-input").attr('disabled', false);
			$(".heal-input:not(:checked) + label").removeClass("not-checked");

		}
	});
});
</script>