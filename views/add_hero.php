<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/HEROES.php';
require '../views/layout.php';

if(!isset($_SESSION['email']) || !$_SESSION['isAdmin']) {
	echo '<meta http-equiv="refresh" content="0;URL=http://www.sitetest.local/ovw/views/index.php">';
} else {

?>
<style>
	article {
		margin-top: 1em;
		border: 1px solid black;
		border-radius: 1em;
		background: lightgray;
		height: 100%;
		margin: 1em 0;
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
	form{
		display: flex;
		align-items: center;
		flex-direction: column;
	}
	form input {
		width: 25em;
	}
	textarea {
		width: 80%;
		height: 8em;
	}
	.ratio {
		width: 20em;
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
	h1 {
		text-align: center;
		font-size:2em;
		margin: 0.5em;
	}
	.PS {
		margin: 0;
		padding: 0;
		padding-left: 1em;
		font-style: italic;
	}
	.PS a {
		color: black;
	}
	.PS a:hover {
		color: orangered;
	}
	.form-content {
		width: 100%;
		display:flex;
		justify-content: space-around;
	}
	form input {
		margin: 0.5em;
	}
	form label {
		margin: 0.5em;
	}
	button {
		margin-bottom: 1em;
	}
</style>

<?
//**************** POUR AFFICHER L'OBJET HEROES EN COURS
//! A EFFACER UNE FOIS TERMINÉ
// if(isset($_GET) && !empty($_GET)){
// 	DEBUG::printr(new HEROES($_GET['id_hero']));
// }
//********************************************/
?>




<article>
	<section style="width: 100%;">
<?
		if(isset($_POST['addHero'])){
			$h = new HEROES();
			
			$result = $h->addNewHero(
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
				$_FILES['avatar']['name']
			);

			DEBUG::printr($_POST);

			move_uploaded_file($_FILES['avatar']['tmp_name'], '../public/src/'.$_FILES['avatar']['name']);
			
			if($result) {
				?> <div style="color:green;font-weight:bold;margin-top:1em;margin-bottom:0;">NOUVEAU HERO AJOUTÉ ! ALLEZ LE VOIS DANS LA LISTE DES HEROS !</div><br> <?
			} else {
				?> <div>UNE ERREUR EST SURVENUE.</div><br> <?
			}
		} else {
;?>
		
		<p class="PS">Ajoutez <strong>Fanart</strong>, <strong>Pixel</strong> et <strong>Mignon</strong> dans les <a href="http://www.sitetest.local/ovw/views/update_hero.php">modifications</a></p>
		<h1>AJOUTER UN NOUVEAU HERO !</h1>

		<form method="POST" enctype="multipart/form-data">

			<div class="space-between ratio">
				<input type="radio" id="Tank" 	name="role" required value=1>
				<label for="Tank">
					<img class="role-icon" src="../public/role/tankon.png"/>
				</label>

				<input type="radio" id="DPS" 	name="role" value=2>
				<label for="DPS">
					<img  class="role-icon" src="../public/role/dpson.png"/>
				</label>

				<input type="radio" id="Healer" name="role" value=3>
				<label for="Healer">
					<img  class="role-icon" src="../public/role/healon.png"/>
				</label>
			</div>

			<div class="form-content">
				<div>
					<label>Nom du Héro :</label><br>
					<input name="nameNewHero" required><br>

					<label>Origine :</label><br>
					<input name="origin"><br>

					<label>Vrai nom :</label><br>
					<input name="trueName"><br>

					<label>Age :</label><br>
					<input name="age"><br>

					<label>avatar :</label><br>
					<input type="file" name="avatar"><br>
				</div>

				<div>
					<label>Profession :</label><br>
					<input name="job"></input><br>

					<label>Réplique :</label><br>
					<input name="replica"></input><br>

					<label>Affiliation :</label><br>
					<input name="membership"></input><br>

					<label>Carte d'origine :</label><br>
					<select name="mapAssigned" required>
						<? $allMaps = MAPS::getsAllMaps(); 
						foreach($allMaps as $map) { ?>
							<option value="<?= $map->id_map; ?>"><?= $map->name; ?></option>
						<? } ?>
					</select><br>

					<label>date entrée en jeu :</label><br>
					<input type="date" name="dateAddGame"><br>
				</div>
			</div>

			<label>Particularité/Histoire :</label><br>
			<textarea name="peculiarity"></textarea><br>

			<button name="addHero" type="submit">Ajouter</button>

		</form>
		<? } ?>

	</section>
</article>
<? } ?>