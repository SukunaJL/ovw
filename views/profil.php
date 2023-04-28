<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require './layout.php';
require '../class/USERS.php';

if(!isset($_SESSION['email'])) {
	echo '<meta http-equiv="refresh" content="0;URL=http://www.sitetest.local/ovw/views/index.php">';
} else {

$allImages = HEROES::getAllImagesHeroes();
$allImagesMaps = MAPS::getAllImagesMaps();



if(isset($_POST['submit-avatar'])){
	$user = new USERS($_SESSION['ID']);
	$result = $user->updateAvatarUser($_POST['avatar']);
// Refresh aprés 1 seconde
	echo '<meta http-equiv="refresh" content="1;URL='.$_SERVER['PHP_SELF'].'">';
}
if(isset($_POST['submit-bg'])){
	$user = new USERS($_SESSION['ID']);
	$result = $user->updateBackgroundUser($_POST['background']);
// Refresh aprés 1 seconde
	echo '<meta http-equiv="refresh" content="1;URL='.$_SERVER['PHP_SELF'].'">';
}

if(isset($_GET['deleteUserID'])){
	$user = new USERS($_GET['deleteUserID']);
	$result = $user->deleteAccount($_GET['deleteUserID']);
	session_destroy();
// Redirection a la page d'accueil aprés avoir supprimé son propre compte
	echo '<meta http-equiv="refresh" content="1;URL=http://www.sitetest.local/ovw/views/index.php">';
}

?>
<style>
	.block-profil {
		width: 100%;
		height: 35em;
		/* height: 100%; */
		background: silver;
		padding: 0.5em;
		margin: auto;
		border: 5px groove dimgrey;
		border-radius: 1em;
		box-shadow: 0 0 5.25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 5rem black;

		display: flex;
		flex-direction: column;
		/* justify-content: space-between; */
		align-items: center;
	}
	
	h1 {
		text-align: center;
		color: white;
	}
	

	.block-modif {
		height: 75%;
		display: flex;
		flex-direction: row;
	}
	.form-avatar {
		text-align: center;
		/* border: 1px solid green; */
		background: radial-gradient(seagreen, transparent);
		/* width: 33%; */
	}
	.form-bg {
		text-align: center;
		/* border: 1px solid green; */
		background: radial-gradient(lightseagreen, transparent);
		/* width: 33%; */
	}
	.avatar-choose {
		width : 3em;
		height: 3em;
		/* padding: 0.5em; */
		border: 1px solid black;
		border-radius: 100%;
		background: lightcyan;
		margin: 0.5em;
		text-align: center;

	}
	.avatar-choose:hover {
		box-shadow: 0 0 .25rem orangered, -.125rem -.125rem 1rem orangered, .125rem .125rem 1rem orangered;
	}
	.avatar-choose img {
		max-width : 3em;
		max-height: 3em;
		
		border-radius: 100%;
	}
	.avatar-list {
		display: flex;
		flex-wrap: wrap; 
		height:90%;
		overflow: auto;

		/* border: 1px solid red; */
		border-top: 1px solid white;
		border-bottom: 1px solid white;
	}

	.bg-choose {
		width : 7em;
		height: 4em;
		border: 1px solid black;
		border-radius: 1em;
		background: lightcyan;
		margin: 0.5em;
		text-align: center;

	}
	.bg-choose img {
		/* max-width : 7em; */
		/* max-height: 4em; */
		width: 100%;
		height: 100%;
		border-radius: 1em;
	}
	.bg-choose:hover {
		box-shadow: 0 0 .25rem orangered, -.125rem -.125rem 1rem orangered, .125rem .125rem 1rem orangered;
	}
	.bg-list {
		display: flex;
		flex-wrap: wrap; 
		height:90%;
		overflow: auto;

		/* border: 1px solid red; */
		border-top: 1px solid white;
		border-bottom: 1px solid white;
	}

	input[type="radio"] {
		display: none;
	}
	input[type="radio"]:checked + label {
		/* width: 87.75px;
		height: 75px; */
		border: 1px solid red;
		background: cyan;
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
		/* border-radius: 1em; */
	}
	.submit-btn {
		padding: 0.3em;
		margin-top: 0.5em;
		border-radius: 0.2em;
		width: 20%;
		border: 3px outset black;
	}
	.submit-btn:hover {
		border: 3px inset black;
	}

	.block-info {
		width: 100%;
		height: 10%;
		display: flex;
		flex-direction: column;
		border-top: 1px solid white;
		text-align: center;
	}
	.info {
		display: flex;
		flex-direction: row;
		justify-content: space-around;
	}

	.loader {
		border: 8px solid #f3f3f3;
		border-top: 8px solid #3498db;
		border-radius: 50%;
		width : 0.5em;
		height: 0.5em;
		animation: spin 1s linear infinite;
		margin: auto;
	}

	@keyframes spin {
		0% { transform: rotate(0deg); }
		100% { transform: rotate(360deg); }
	}
</style>
<h1>Profil</h1>

<div class="block-profil">
	<h4 style="margin: 0.5em;">Modifier apparence</h4>

	<div class="block-modif">

		<form class="form-avatar" method="post">
			<div class="avatar-list">
				<? foreach($allImages as $img){ 
					// DEBUG::printr($img);
					$avatar = $img->avatar;
					$cute   = 'spray/'.$img->id_hero.'/'.$img->cute;
					$checkedCute = ($cute == $_SESSION['avatar']) ? "checked" : "";
					$checkedAvatar = ($avatar == $_SESSION['avatar']) ? "checked" : "";
					?>
					
					<input type="radio" id="<?= $avatar; ?>" name="avatar" value="<?= $avatar; ?>" <?= $checkedAvatar; ?>>
					<label class="avatar-choose" for="<?= $avatar; ?>">
						<img src="../public/src/<?= $avatar; ?>"/>
					</label>

					<input type="radio" id="<?= $cute; ?>" name="avatar" value="<?= $cute; ?>" <?= $checkedCute; ?>>
					<label class="avatar-choose" for="<?= $cute; ?>">
						<img src="../public/src/<?= $cute; ?>"/>
					</label>
				<? } ?>

			</div>
			<button class="submit-btn" name="submit-avatar" type="submit">
				<? if(isset($_POST['submit-avatar'])) { ?>
					<div class="loader"></div>
				<? } else { ?>
					<div>Valider</div>
				<? } ?>
			</button>
		</form>



		<form class="form-bg" method="post">
			<div class="bg-list">
				<? foreach($allImagesMaps as $bg){ 
					$checkedBg = ($bg == $_SESSION['background']) ? "checked" : "";
					?>
					
					<input type="radio" id="<?= $bg; ?>" name="background" value="<?= $bg; ?>" <?= $checkedBg; ?>>
					<label class="bg-choose" for="<?= $bg; ?>">
						<img src="../public/maps/<?= $bg; ?>"/>
					</label>
				<? } ?>

			</div>
			<button class="submit-btn" name="submit-bg" type="submit">
				<? if(isset($_POST['submit-bg'])) { ?>
					<div class="loader"></div>
				<? } else { ?>
					<div>Valider</div>
				<? } ?>
			</button>
		</form>
		
	</div>
	

	<div class="block-info">
		<h4 style="margin: 0.5em;">Informations personnelles</h4>

		<div class="info">
			<div>
				<span style="font-style: italic;">Email :</span>
				<div style="font-weight:bold;">
					<?= $_SESSION['email']; ?>
				</div>
			</div>
			<div>
				<span style="font-style: italic;">Pseudo :</span>
				<div style="font-weight:bold;">
					<?= $_SESSION['pseudo']; ?>
				</div>
			</div>
		</div>

		<!-- <a class="deleteAccount" href="#">Supprimer ce compte</a> -->
		<a class="deleteAccount" 
		href="http://www.sitetest.local/ovw/views/profil.php?deleteUserID=<?= $_SESSION['ID']; ?>" 
		onclick="return(confirm('Etes-vous sûr de vouloir supprimer votre compte?'));">
			<? if(isset($_GET['deleteUserID'])) { ?>
				<div class="loader"></div>
			<? } else { ?>
				<div>Supprimer mon compte</div>
			<? } ?>
		</a>
	</div>


</div>
<? } ?>