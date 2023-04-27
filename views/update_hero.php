<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

if(!isset($_SESSION['email']) || !$_SESSION['isAdmin']) {
	echo '<meta http-equiv="refresh" content="0;URL=http://www.sitetest.local/ovw/views/index.php">';
}

require '../class/HEROES.php';
require '../views/layout.php';


?>
<style>
	body {
		width: 90%;
	}
	article {
		margin-top: 1em;
		border: 1px solid black;
		border-radius: 1em;
		background: lightgray;
	/* height: 45em; */
	}
	.list-heroes-ul {
		height: 40em;
		overflow: auto;
		margin-right: 4em;
		border-bottom: 1px solid black;
		border-radius: 0.5em;
	}
	.list-heroes-ul a {
		width: 10em;
		color: black;
		text-decoration: none;
		font-weight: bold;
		border: 2px solid red;
		border-radius: 5em;
	}
	.list-heroes-ul a:hover {
		color: white;
		background: orangered;
	}
	.pictures-column {
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
	.avatar {
		width: 5em;
		height: 5em;
		border: 3px ridge purple;
		border-radius: 1em;
	}
	.spray {
		/* width: 5em; */
		height: 5em;
		/* border: 3px ridge purple; */
		padding: 0.5em;
		margin: 0.5em;
		border-radius: 1em;
		background: silver;
	}
	.fanart {
		margin:1em;
		padding:1em;
		/* border: 1px solid black;
		border-radius:0.5em; */
		background:radial-gradient(red, orangered, transparent, transparent);
	}
	.avatar-list {
		width: 2em;
		height: 2em;
		border-radius: 100%;
	}
	.heroName {
		box-sizing: content-box;
		text-justify: justify;
		text-align: center;
	}
	.logo-list {
		width: 1em;
		height: 1em;
		margin-right: 0.5em;
	}
	.row-verti-center {
		display:flex;
		align-items:center;
		justify-content: space-between;
	}
	.space-between {
		display:flex;
		justify-content: space-between;
	}
	input {
		margin-bottom: 0.5em;
	}
	.space-between section {
		width: 50%;
	}
	form input {
		width: 25em;
	}
	form textarea {
		width: 100%;
		height: 5em;
	}
	.ratio {
		width: 20em;
		margin-bottom: 0.5em;
	}
	.role-icon {
		background: orangered;
		width: 87.75px;
		height: 75px;
		border-radius: 11px;
	}
	.role-icon:hover {
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	input[type="radio"] {
		display: none;
	}
	input[type="radio"]:checked + label {
		width: 87.75px;
		height: 75px;
		border: 5px ridge gold;
		border-radius: 1em;
	}
	#add-new-hero {
		border: 1px solid black;
		border-radius: 1em 0 1em 0;
		background: orangered;
		color: white;
		display: flex;
		align-items: center;
		justify-content:center;
		width: 15em;
		height: 1.5em;
		padding: 0.3em;
	}
	#add-new-hero:hover {
		background: black;
		color: orangered;
	}
	.submit-button {
		margin:1em;
		padding: 0.5em;
		/* border: 1px solid black; */
		border-radius: 1em;
	}
	.submit-button:hover {
		color: green;
		border-color: green;
	}
</style>

<?
//**************** POUR AFFICHER L'OBJET HEROES EN COURS
//! A EFFACER UNE FOIS TERMINÉ
if(isset($_GET) && !empty($_GET)){
	// DEBUG::printr(new HEROES($_GET['id_hero']));
}
//********************************************/
// $am = MAPS::getsAllMaps(); 
// $at = MAPS_TYPES::getsAllTypesMaps();
// DEBUG::printr($am);
// DEBUG::printr($at);
?>




<article class="space-between">
	<section class="list-heroes-ul" style="width: 30%;">
		<a id="add-new-hero" href="http://www.sitetest.local/ovw/views/add_hero.php"> → + Ajouter nouveau hero içi !</a>
		<p style="text-align: center; font-weight:bold;">Liste des hero a modifier :</p>
		<? $allHeroesName = HEROES::getsAllHeroesInfos();

		foreach ($allHeroesName as $hero){ 
		?>
			
			<ul>
				<a class="row-verti-center" href="http://www.sitetest.local/ovw/views/update_hero.php?id_hero=<?= $hero->id_hero; ?>">
					<img class="avatar-list" src="../public/src/<?= $hero->avatar; ?>"/>
					<div class="heroName"><?= $hero->name; ?></div>
					<img class="logo-list" src="../public/role/<? 
						if($hero->id_role == 1){echo "tankon.png";}
						else if($hero->id_role == 2){echo "dpson.png";}
						else{echo "healon.png";}; ?>"/>
				</a>
			</ul>

		<? } ?>
	</section>
	<section style="width: 70%;">
<?
		if(isset($_GET) && !empty($_GET)){

			if(isset($_POST['updateHero'])){
				$h = new HEROES($_GET['id_hero']);
				
				$result = $h->updateHero(
					$_POST['nameNewHero'],
					$_POST['origin'],
					$_POST['trueName'],
					$_POST['age'],
					$_POST['job'],
					$_POST['peculiarity'],
					$_POST['replica'],
					$_POST['membership'],
					$_POST['mapAssigned'],
					$_POST['dateAddGame'],
					$_POST['role'],
					$_FILES['avatar']['name'],
					$_FILES['fanart']['name'],
					$_FILES['pixel']['name'],
					$_FILES['cute']['name']
				);

				move_uploaded_file($_FILES['avatar']['tmp_name'], '../public/src/'.$_FILES['avatar']['name']);

				if(!is_dir('../public/src/fanart/'.$h->ID)){
					mkdir('../public/src/fanart/'.$h->ID);
				}
				move_uploaded_file($_FILES['fanart']['tmp_name'], "../public/src/fanart/".$h->ID."/".$_FILES['fanart']['name']);

				if(!is_dir('../public/src/spray/'.$h->ID)){
					mkdir('../public/src/spray/'.$h->ID);
				}
				move_uploaded_file($_FILES['pixel']['tmp_name'], "../public/src/spray/".$h->ID."/".$_FILES['pixel']['name']);
				move_uploaded_file($_FILES['cute']['tmp_name'],  "../public/src/spray/".$h->ID."/".$_FILES['cute']['name']);
				
				if($result) {
					?> <div style="color:green;font-weight:bold;margin-top:1em;margin-bottom:0;">CHANGEMENT VALIDER.</div><br> <?
				} else {
					?> <div>UNE ERREUR EST SURVENUE.</div><br> <?
				}
			}


			$hero = new HEROES($_GET['id_hero']);?>
			<h1 style="margin-bottom:0;">MODIFIER HERO</h1>
						
			<div class="space-between" style="margin-top: 0;">
				<div class="pictures-column" style="width: 20%;">
					<div><span style="color:red;font-weight:bold;">Avatar</span> actuel :</div><br>
					<img class="avatar" src="../public/src/<?= $hero->avatar; ?>"/><br>
					<div class="space-between">
						<div>
							<span style="color:green;font-weight:bold;">Pixel</span><br>
							<img class="spray" src="../public/src/spray/<?= $hero->ID; ?>/<?= $hero->pixel; ?>"/><br>
						</div>
						<div>
							<span style="color:goldenrod;font-weight:bold;">Mignon</span><br>
							<img class="spray" src="../public/src/spray/<?= $hero->ID; ?>/<?= $hero->cute; ?>"/><br>
						</div>
					</div><br>
					<div><span style="color:blue;font-weight:bold;">Fanart</span> actuel :</div>
					<img class="fanart" src="../public/src/fanart/<?= $hero->ID; ?>/<?= $hero->fanart; ?>"/>
				</div>

				<form style="width: 70%; padding-right:1em;" method="POST" enctype="multipart/form-data">

					<div class="space-between ratio">
						<input type="radio" id="Tank" 	name="role" value=1 <?= $hero->roleID->ID == 1 ? "checked" : ""; ?>>
						<label for="Tank">
							<img class="role-icon" src="../public/role/<?= $hero->roleID->ID == 1 ? "tankon.png" : "tankoff.webp"; ?>"/>
						</label>

						<input type="radio" id="DPS" 	name="role" value=2 <?= $hero->roleID->ID == 2 ? "checked" : ""; ?>>
						<label for="DPS">
							<img  class="role-icon" src="../public/role/<?= $hero->roleID->ID == 2 ? "dpson.png" : "dpsoff.webp"; ?>"/>
						</label>

						<input type="radio" id="Healer" name="role" value=3 <?= $hero->roleID->ID == 3 ? "checked" : ""; ?>>
						<label for="Healer">
							<img  class="role-icon" src="../public/role/<?= $hero->roleID->ID == 3 ? "healon.png" : "healoff.png"; ?>"/>
						</label>
					</div>

					<div class="space-between">
						<div style="width: 40%;">
							<label>Nom du Héro :</label><br>
							<input style="width: 90%;" name="nameNewHero" value="<?= $hero->name; ?>"><br>

							<label>Origine :</label><br>
							<input style="width: 90%;" name="origin" value="<?= $hero->origin; ?>"><br>

							<label>Profession :</label><br>
							<input style="width: 90%;" name="job" value ="<?= $hero->metier; ?>"></input><br>

							<label>Affiliation :</label><br>
							<input style="width: 90%;" name="membership" value ="<?= $hero->affiliation; ?>"></input><br>


						</div>

						<div style="width: 40%;">
							<label>Vrai nom :</label><br>
							<input style="width: 90%;" name="trueName" value="<?= $hero->trueName; ?>"><br>

							<label>Age :</label><br>
							<input style="width: 90%;" name="age" value="<?= $hero->age; ?>"><br>

							<label>Réplique :</label><br>
							<input style="width: 90%;" name="replica" value ="<?= $hero->replique; ?>"></input><br>

							<label>Carte d'origine :</label><br>
							<select name="mapAssigned" required>
								<option value="">-- Veuillez selectionner une carte --</option>
								<? $allMaps = MAPS::getsAllMaps(); 
								$allTypesMaps = MAPS_TYPES::getsAllTypesMaps();
								foreach($allTypesMaps as $typeMap) { ?>
									<optgroup label="<?= $typeMap->name_type; ?>">
										<? foreach($allMaps as $map) { 
											$selected = $hero->mapAssigned->ID == $map->id_map ? "selected" : "";
											if($map->id_type_map == $typeMap->id_type_map) { ?>
												<option value="<?= $map->id_map; ?>" <?= $selected; ?>><?= $map->name; ?></option>
											<? }
										} ?>
									</optgroup>
								<? } ?>
							</select><br>

							<label>Date entrée en jeu :</label><br>
							<input style="width: 90%;" type="date" name="dateAddGame" value="<?= $hero->dateAddGame; ?>"><br>
						</div>
					</div>

					<label>Particularité/Histoire :</label><br>
					<textarea name="peculiarity"><?= $hero->particularite; ?></textarea><br>

					<div class="space-between">
						<div>
							<label><span style="color:red;font-weight:bold;">Avatar</span> :</label><br>
							<input type="file" name="avatar"><br>

							<label><span style="color:blue;font-weight:bold;">Fanart</span> :</label><br>
							<input type="file" name="fanart"><br>
						</div>
						<div>
							<label><span style="color:green;font-weight:bold;">Pixel</span> :</label><br>
							<input type="file" name="pixel"><br>

							<label><span style="color:goldenrod;font-weight:bold;">Mignon</span> :</label><br>
							<input type="file" name="cute"><br>
						</div>
					</div>

					

					

					


					

					<button class="submit-button" name="updateHero" type="submit">Appliquer</button>

				</form>
			</div>
		<? } ?>

	</section>
</article>