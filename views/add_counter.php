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
	.phraseTuto {
		width: 60%;
		text-align: center;
		color:white;
		background: black;
		border: 2px solid orangered;
		border-radius: 0.5em;
		padding: 0.2em;
		margin: 0.5em auto;
	}
	.phraseTuto span {
		color:gold;
		text-transform: uppercase;
	}
	.barre-entiere-selection {
		display: flex;
		justify-content: space-between;
		width: 100%;
		height: 7em;
		border: 3px solid green;
		background: darkolivegreen;
		padding: 0.5em;
		border-radius: 0.5em;
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
		width: 40%;
	}
	.selection-heal {
		width: 20%;
	}
	.role-logo {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 2.5em;
		height: 1.5em;
		border: 1px solid white;
		border-radius: 100%;
		margin-right: 0.1em;
	}
	.role-logo img {
		width: 1.3em;
		height: 1em;
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
		background: black;
	}
	.selected {
		border: 3px solid orangered;
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.selected img {
		background: gold;
	}
				/* //* FORM D'AJOUT */
	.form-add {
		display: flex;
		width: 100%;
		height: 7em;
		border: 3px solid red;
		background: #320007;
		padding: 0.5em;
		border-radius: 0.5em;
		margin: 1em 0.5em;
	}
	.form-add input[type="checkbox"] {
		display: none;
	}
	.form-add input[type="checkbox"]:checked + label {
		border: 3px solid gold;
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.form-add input[type="checkbox"]:checked + label img {
		background: gold;
	}
	.form-add input[type="checkbox"]:checked + label img:hover {
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.form-add button {
		background : -webkit-linear-gradient(top, grey , silver);
		border:  5px  groove lightgrey ;
		border-radius: 0.5em;
		font-weight: bold;
	}
	.form-add button:hover {
		background : -webkit-linear-gradient(top, silver, grey );
		border: 5px ridge lightgrey ;
	}
				/* //* FORM D'UPDATE */
	h4 {
		text-align: center;
	}
	.apercu-block{
		text-align: center;
		color: white;
		background: black;
		border-bottom: 3px solid red;
		border-right : 3px solid red;
		border-left  : 3px solid red;
		border-radius: 0 0 0.5em 0.5em;
	}
	.phraseApercu {
		padding: 0.5em 0;
	}
	
	.form-delete input[type="checkbox"] {
		display: none;
	}
	.form-delete input[type="checkbox"]:checked + label {
		border: 3px solid gold;
	}
	.form-delete input[type="checkbox"]:checked + label img {
		background: gold !important;
	}
	.form-delete input[type="checkbox"]:checked + label img:hover {
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.form-delete button {
		background: orangered;
		margin: 0.5em;
		padding: 0.2em;
		font-weight: bold;
		border-radius: 0.2em;
		background : -webkit-linear-gradient(top, orangered, red);
		border:  5px  groove orangered;
	}
	.form-delete button:hover {
		background : -webkit-linear-gradient(top, red, orangered);
		border: 5px ridge orangered;
	}
	.last-tuto {
		width: 60%;
		text-align: center;
		color:white;
		background: black;
		border-radius: 0.5em 0.5em 0 0;
		padding: 0.2em;
		margin: 0.5em auto;

		border-top: 3px solid red;
		border-left: 3px solid red;
		border-right: 3px solid red;
		margin-bottom: 0;
	}
	.last-tuto span {
		text-transform: uppercase;
		color: gold;
	}
	.imgDelete {
		filter: sepia(1);
	}
	.strong {
		border: 3px solid lime;
	}
	.strong img {
		background: green !important;
	}
	.strongest {
		border: 3px solid lime;
		box-shadow: 0 0 .25rem lime, -.125rem -.125rem 1rem lime, .125rem .125rem 1rem lime;
	}
	.strongest img {
		filter: sepia(0);
		background: green !important;
	}
	.weak {
		border: 3px solid red;
	}
	.weak img {
		background: red !important;
	}
	.weakest {
		border: 3px solid red;
		box-shadow: 0 0 .25rem red, -.125rem -.125rem 1rem red, .125rem .125rem 1rem red;
	}
	.weakest img {
		filter: sepia(0);
		background: red !important;
	}
	@keyframes error {
		from {
			color: red;
		}
		to {
			color: white;
		}
	}
	.error {
		animation-duration: 2s;
		animation-name: error;
		animation-iteration-count: infinite;
		padding: 0.2em;
		color:white;
		/* background:red; */
		width:20%;
		margin: auto;
		border-radius: 0.5em;
	}
	
</style>
<? 
	$tanksHeroes = HEROES::getHeroesByRole(1);
	$dpsHeroes   = HEROES::getHeroesByRole(2);
	$healsHeroes = HEROES::getHeroesByRole(3);
?>
							<!-- //* BARRE DE SELECTION D'UN HERO -->
<h1 style="text-align: center;color:white;margin:0.5em auto;">Gestion des Counters</h1>
<div class="barre-entiere-selection">
								<!--//* TANK -->
	<div class="block-selection selection-tank">
		<div class="role-logo"><img src="../public/role/tankoff.webp"></div>
		<div class="img-block">
			<? foreach ($tanksHeroes as $hero){ 
				$selected = isset($_GET['id_hero']) && $_GET['id_hero'] == $hero->id_hero ? "selected" : "";?>
				<a 	class="heroBlock <?= $selected; ?>" 
					href="http://www.sitetest.local/ovw/views/add_counter.php?id_hero=<?= $hero->id_hero;?>">
					<img src="../public/src/<?= $hero->avatar; ?>">
				</a>
			<? } ?>
		</div>
	</div>
								<!--//* DPS -->
	<div class="block-selection selection-dps">
		<div class="role-logo"><img src="../public/role/dpsoff.webp"></div>
		<div class="img-block">
			<? foreach ($dpsHeroes as $hero){ 
				$selected = isset($_GET['id_hero']) && $_GET['id_hero'] == $hero->id_hero ? "selected" : "";?>
				<a 	class="heroBlock <?= $selected; ?>" 
					href="http://www.sitetest.local/ovw/views/add_counter.php?id_hero=<?= $hero->id_hero;?>">
					<img src="../public/src/<?= $hero->avatar; ?>">
				</a>
			<? } ?>
		</div>
	</div>
								<!--//* HEAL -->
	<div class="block-selection selection-heal">
		<div class="role-logo"><img src="../public/role/healoff.png"></div>
		<div class="img-block">
			<? foreach ($healsHeroes as $hero){ 
				$selected = isset($_GET['id_hero']) && $_GET['id_hero'] == $hero->id_hero ? "selected" : "";?>
				<a 	class="heroBlock <?= $selected; ?>" 
					href="http://www.sitetest.local/ovw/views/add_counter.php?id_hero=<?= $hero->id_hero;?>">
					<img src="../public/src/<?= $hero->avatar; ?>">
				</a>
			<? } ?>
		</div>
	</div>
</div>

							<!-- //* BARRE DE SELECTION D'UN COUNTER -->
<? if(!isset($_GET['id_hero'])) { ?>
	<h3 class="phraseTuto">Quel Hero? (selectionnez un hero)</h3>
<? }

//! FONCTION INSERT
if(isset($_POST['submitCounter'])){
	if(!isset($_POST['counter'])) {
		$error1 = 'Veuillez selectionner au moins 1 hero';
	}

	if(empty($error1)) {
		$c = new COUNTERS();
		$counterHeroId = $_POST['counter'];

		foreach($counterHeroId as $counterHero){
			$result = $c::addNewCounter($_GET['id_hero'], $counterHero);
		}
		
		if($result) { ?> 
			<div style="color:green;font-weight:bold;margin-top:1em;margin-bottom:0;">COUNTER AJOUTÉ.</div><br>
		<? } else { ?>
			<div style="color: red;font-weight:bold;">UNE ERREUR EST SURVENUE.</div><br> 
		<? }
	}
}

if(isset($_GET['id_hero'])) {
	$heroSelected = new HEROES($_GET['id_hero']); 
	// recupération des id_hero sur lequel l'id en parametre est fort
	$heroesCounterStrong = COUNTERS::getCounterStrongByHero($_GET['id_hero']);
	if(!empty($heroesCounterStrong)){
		foreach($heroesCounterStrong as $strongCounterId){
			// liste des counters sous forme de tableau = $arrayStrongCounterId
			$arrayStrongCounterId[] = $strongCounterId->id_hero_vs;
		}
	}
	// recupération des id_hero sur lequel l'id en parametre est faible
	$heroesCounterWeak = COUNTERS::getCounterWeakByHero($_GET['id_hero']);
	if(!empty($heroesCounterWeak)){
		foreach($heroesCounterWeak as $weakCounterId){
			// liste des counters sous forme de tableau = $arrayWeakCounterId
			$arrayWeakCounterId[] = $weakCounterId->id_hero;
		}
	}
	?>

	<h3 class="phraseTuto">
		Contre? (Selectionnez les heros que <span><?= $heroSelected->name; ?></span> bats facilement, puis valider)
	</h3>

	<form class="form-add" method="POST">
	<? if(!empty($error1)) {?>
		<div style="font-weight: bold;" class="error"><?= $error1; ?></div> 
	<? } ?>
		<div class="img-block">
			<? $allHeroes = HEROES::getsAllHeroesInfos(); 
			foreach ($allHeroes as $hero){ 
				if(!empty($arrayStrongCounterId)){
					$strongest = in_array($hero->id_hero, $arrayStrongCounterId) ? "strong" : ""; } else { $strongest = ""; };
				if(!empty($arrayWeakCounterId)){
					$weakest   = in_array($hero->id_hero, $arrayWeakCounterId)   ? "weak"   : ""; } else { $weakest   = ""; };
					if($hero->id_hero == $_GET['id_hero']) { ?>
						<input type="hidden">
					<? } else { ?>
						<input type="checkbox" id="Counter<?= $hero->id_hero ?>" name="counter[]" value="<?= $hero->id_hero ?>" >
						<label class="heroBlock <?= $strongest; ?> <?= $weakest; ?>" for="Counter<?= $hero->id_hero ?>">
							<img src="../public/src/<?= $hero->avatar?>"/>
						</label>
					<? } ?>
			<? } ?>
		</div>
		<button name="submitCounter" type="submit">Valider ce(s) Counter(s)</button>
	</form>

<? } 
							//* BARRE D'APERCU/SUPPRESSION
if(isset($_GET['id_hero'])) {
	// recupération des id_hero sur lequel l'id en parametre est fort
	$heroesCounterStrong = COUNTERS::getCounterStrongByHero($_GET['id_hero']);
	if(!empty($heroesCounterStrong)){
		foreach($heroesCounterStrong as $strongCounterId){
			// liste des counters sous forme de tableau = $arrayStrongCounterId
			$arrayStrongCounterId[] = $strongCounterId->id_hero_vs;
		}
	}
	// recupération des id_hero sur lequel l'id en parametre est faible
	$heroesCounterWeak = COUNTERS::getCounterWeakByHero($_GET['id_hero']);
	if(!empty($heroesCounterWeak)){
		foreach($heroesCounterWeak as $weakCounterId){
			// liste des counters sous forme de tableau = $arrayWeakCounterId
			$arrayWeakCounterId[] = $weakCounterId->id_hero;
		}
	}

//! FONCTION DELETE
if(isset($_POST['deleteSubmitCounter'])){
	
	if(!isset($_POST['deleteCounter'])) {
		$error = 'Veuillez selectionner au moins 1 hero';
	}

	if(empty($error)) {
		$c = new COUNTERS();
		$counterHeroId = $_POST['deleteCounter'];

		if(!empty($heroesCounterWeak)){
			$listStrongHeroId = array_diff($counterHeroId, $arrayWeakCounterId);
			foreach($listStrongHeroId as $counterHero){
				$result = $c::deleteCounterByHeroIdAndVsHeroId($_GET['id_hero'], $counterHero);
			}
		} else {
			foreach($counterHeroId as $counterHero){
				$result = $c::deleteCounterByHeroIdAndVsHeroId($_GET['id_hero'], $counterHero);
			}
		}


		if(!empty($heroesCounterStrong)){
			$listWeakHeroId = array_diff($counterHeroId, $arrayStrongCounterId);
			foreach($listWeakHeroId as $counterHero){
				$result = $c::deleteCounterByHeroIdAndVsHeroId($counterHero, $_GET['id_hero']);
			}
		} else {
			foreach($counterHeroId as $counterHero){
				$result = $c::deleteCounterByHeroIdAndVsHeroId($counterHero, $_GET['id_hero']);
			}
		}
	
		if($result) {
			?><div style="color:green;font-weight:bold;margin-top:1em;margin-bottom:0;">COUNTER SUPPRIMÉ.</div><br><? 
		} else { ?>
			<div style="color: red;font-weight:bold;">UNE ERREUR EST SURVENUE.</div><br> 
		<? }
	}
} 



?>

	<h4 class="last-tuto">
		Aperçu de <span><?= $heroSelected->name; ?></span> et suppression de counter :
	</h4>

	<div class="apercu-block">
	<? if(!empty($error)) {?>
		<div class="error"><?= $error; ?></div> 
	<? } ?>

		<form class="form-delete" method="POST">
			<div class="phraseApercu">
				<span style="text-transform: uppercase;color: gold;"><?= $heroSelected->name; ?></span> 
				<span style="font-weight: bold;color:lime;">gagne</span> ou <span style="font-weight: bold;color:red;">perd</span> contre :
			</div>
			<div class="img-block">
				<? $allHeroes = HEROES::getsAllHeroesInfos(); 
				foreach ($allHeroes as $hero){ 
					if(!empty($arrayStrongCounterId)){
						$strongest = in_array($hero->id_hero, $arrayStrongCounterId) ? "strongest" : ""; } else { $strongest = ""; };
					if(!empty($arrayWeakCounterId)){
						$weakest   = in_array($hero->id_hero, $arrayWeakCounterId)   ? "weakest"   : ""; } else { $weakest   = ""; }; 
						if($hero->id_hero == $_GET['id_hero']) { ?>
							<input type="hidden">
						<? } else { ?>
							<input type="checkbox" id="deleteCounter<?= $hero->id_hero ?>" name="deleteCounter[]" value="<?= $hero->id_hero ?>" >
							<label class="heroBlock <?= $strongest; ?> <?= $weakest; ?>" for="deleteCounter<?= $hero->id_hero ?>">
								<img class="imgDelete" src="../public/src/<?= $hero->avatar?>"/>
							</label>
						<? } ?>
				<? } ?>
			</div>
			<button name="deleteSubmitCounter" type="submit">Supprimer ce(s) Counter(s)</button>
		</form>
	</div>

<? } ?>