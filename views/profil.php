<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require './layout.php';
require '../class/USERS.php';


$allImages = HEROES::getAllImagesHeroes();
// DEBUG::printr($allImages);



?>
<style>
	.block-profil {
		width: 100%;
		height: 25em;
		background: silver;
		padding: 1em;
		margin: auto;
		border: 5px groove dimgrey;
		border-radius: 1em;
		margin-top: 5em;
		box-shadow: 0 0 5.25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 5rem black;

		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
	
	h1 {
		text-align: center;
		margin-top: 1em;
		color: white;
	}
	.error {
		color: red;
		font-weight: bold;
		font-size: 1.2em;
		margin-bottom: 1em;
	}
	/* _______________________________________ */
	.appercu-banniere {
		/* position: absolute; */
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-direction: row;
		top: 0;
		right: 0;
		width: 14em;
		height: 3em;
		padding: 0.5em;
		padding-top: 1em;
		border-radius: 0 0 0 1em;
		border-bottom: 3px solid red;
		border-left: 3px solid red;
		background: black;
		color:white;
		text-align: center;
	}
	.appercu-banniere a {
		background:none;
		font-size: 1em;
	}
	.appercu-banniere a:hover {
		text-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
		color: white;
	}
	#avatar-user {
		background: red;
		padding: 0;
		margin: 0.5em;
		border-radius: 100%;
		min-width : 3em;
		max-width : 3em;
		min-height: 3em;
		max-height: 3em;
	}
	#avatar-user img {
		display:flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		border-radius: 100%;

	}
	#avatar-user:hover {
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.logout {
		font-size: 1.5em;
		color: white;
	}
	/* ________________________________________________ */
	
	.avatar-choose {
		width : 3em;
		height: 3em;
		border: 1px solid black;
		border-radius: 100%;
		background: lightcyan;
		margin: 0.5em;
	}
	.avatar-list {
		display: flex;
		flex-wrap: wrap; 
		/* max-width: 50%;
		min-width: 50%;
		max-height:20%;
		min-height:20%; */

		overflow: hidden;

		border: 1px solid red;
	}
	.avatar-list img {
		max-width : 100%;
height : auto;

	}
	input[type="radio"] {
		display: none;
	}
	input[type="radio"]:checked + label {
		/* width: 87.75px;
		height: 75px; */
		/* border: 5px ridge gold; */
		background: green;
		border-radius: 1em;
	}

	.block-info {
		width: 100%;
		height: 0.5%;
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
</style>
<h1>Profil</h1>

<div class="block-profil">
	<div class="appercu-banniere">
		<a id="avatar-user" href="#">
			<img src="../public/src/<?= $_SESSION['avatar']; ?>">
		</a>
		<div style="font-size: 0.9em;"><span>Bienvenue</span><br><span style="font-weight:bold;font-size: 1.2em;"><?= $_SESSION['pseudo']; ?></span></div>
		<a href="#">
			<i class="fas fa-sign-out-alt logout"></i>
		</a>
	</div>


	<div>
	


		<form class="avatar-list" method="post">
			<h4>Modifier apparence</h4>
			<? foreach($allImages as $img){ 
				// DEBUG::printr($img);
				$avatar = $img->avatar;
				$fanart = 'fanart/'.$img->id_hero.'/'.$img->fanart;
				$pixel  = 'spray/'.$img->id_hero.'/'.$img->pixel;
				$cute   = 'spray/'.$img->id_hero.'/'.$img->cute;
				?>
				
				<!-- <input type="radio" id="<?= $avatar; ?>" name="avatar" value="<?= $avatar; ?>">
				<label for="<?= $avatar; ?>">
					<img class="avatar-choose" src="../public/src/<?= $avatar; ?>"/>
				</label>

				<input type="radio" id="<?= $fanart; ?>" name="avatar" value="<?= $fanart; ?>">
				<label for="<?= $fanart; ?>">
					<img class="avatar-choose" src="../public/src/<?= $fanart; ?>"/>
				</label> -->

				<!-- <input type="radio" id="<?= $pixel; ?>" name="avatar" value="<?= $pixel; ?>">
				<label for="<?= $pixel; ?>">
					<img class="avatar-choose" src="../public/src/<?= $pixel; ?>"/>
				</label> -->

				<input type="radio" id="<?= $cute; ?>" name="avatar" value="<?= $cute; ?>">
				<label for="<?= $cute; ?>">
					<img class="avatar-choose" src="../public/src/<?= $cute; ?>"/>
				</label>
			<? } ?>
		</form>
	</div>
	

	<div class="block-info">
		<h4>Informations personnelles</h4>

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

		<a class="deleteAccount" href="#">Supprimer ce compte</a>
	</div>


</div>
