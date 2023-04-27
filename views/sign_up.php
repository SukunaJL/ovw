<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require './layout.php';
require '../class/USERS.php';

$disabled = "";

if(isset($_POST['submit-new-user'])) {
	if(($_POST['pwd'] === $_POST['pwd-repeat'])){
		$u = new USERS();
		$mailExisted = $u->mailExisted($_POST['mail']);

		if($mailExisted) {
			$errorMailExisted = "Cette adresse mail existe déja.";
		} else {

			// Vérifie que le mot de passe contient au moins une majuscule
			if (!preg_match('/[A-Z]/', $_POST['pwd'])) {
				$errorStrengthPwd = "Votre mot de passe dois contenir au moins une majuscule.";
				
				// Vérifie que le mot de passe contient au moins une minuscule
			} else if (!preg_match('/[a-z]/', $_POST['pwd'])) {
				$errorStrengthPwd = "Votre mot de passe dois contenir au moins une minuscule.";
				
				// Vérifie que le mot de passe contient au moins un chiffre
			} else if (!preg_match('/\d/', $_POST['pwd'])) {
				$errorStrengthPwd = "Votre mot de passe dois contenir au moins un chiffre.";
				
				// Vérifie que le mot de passe contient au moins un caractère spécial
			} else if (!preg_match('/[^a-zA-Z\d]/', $_POST['pwd'])) {
				$errorStrengthPwd = "Votre mot de passe dois contenir au moins un caractère spécial.";
				
				// Vérifie que le mot de passe a une longueur minimale de 8 caractères
			} else if (strlen($_POST['pwd']) < 8) {
				$errorStrengthPwd = "Votre mot de passe dois faire une longueur minimale de 8 caractères.";
				
			} else {

				$user = $u->register($_POST['mail'], $_POST['pwd'], $_POST['pseudo']);

				if($user) {
					$valided = "Vous avez bien été enregisté. Vous allez être redirigé vers la page d'accueil";
					$disabled = "disabled";
					// header("refresh:3;url=http://www.sitetest.local/ovw/views/index.php");
					echo '<meta http-equiv="refresh" content="2;URL=http://www.sitetest.local/ovw/views/index.php">';
				} else {
					$error = "une erreur est survenu.";
				}

			}

		}


	} else {
		$errorMdp = "Mot de passe non identique.";
	}
}

?>
<style>
	.form-signup {
		width: 25em;
		height: 18em;
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
	.form-signup input {
		height:2em;
		width: 70%;
		border: 2px solid grey;
		border-radius: 0.3em;
		padding:0.5em;
		font-size: 1em;
	}
	.form-signup button {
		margin-top: 1em;
		padding: 0.5em;
		border: 3px outset black;
		border-radius: 0.5em;
	}
	.form-signup button:hover {
		border: 3px inset black;
	}
	#mail {
		margin-bottom: 2em;
	}
	#pwd {
		margin-bottom: 0.5em;
	}
	h1 {
		text-align: center;
		margin-top: 1em;
		color: white;
	}
	.valided {
		color: green;
		font-weight: bold;
		font-size: 1.2em;
		/* margin-bottom: 1em; */
		text-align: center;
		text-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;

		background:rgba(230, 205, 61, 0.5);
		border-radius: 1em;
		padding:0.5em;
	}
	.error {
		color: red;
		font-weight: bold;
		font-size: 1.2em;
		margin-bottom: 1em;
	}
	.secure-mdp {
		font-weight: bold;
		font-size: 0.7em;
	}
	.carac-max {
		font-size: 0.7em;
		font-weight: bold;
		margin-bottom: 2em;
	}
</style>
<h1>Enregistrement</h1>

<form class="form-signup" method="post">
	<? if(isset($valided)) { ?>
		<div class="valided"><?= isset($valided) ? $valided : ""; ?></div>
	<? } ?>
	<div class="error"><?= isset($error) ? $error : ""; ?></div>
	<div class="error"><?= isset($errorMailExisted) ? $errorMailExisted : ""; ?></div>

	<input type="email" name="mail" id="mail" placeholder="Entrez votre adresse mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '';?>" require <?= $disabled; ?>>

	<input type="text" name="pseudo" id="pseudo" placeholder="Entrez un pseudo" maxlength="25" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : '';?>" require <?= $disabled; ?>>
	<span class="carac-max">25 caractére maximum</span>

	<span class="secure-mdp">8 caractéres minimum : 1 majuscule/1 minuscule/1 chiffre/1 caractére spécial.</span>
	<input type="password" name="pwd" 		 id="pwd" 		 placeholder="Entrez un mot de passe valide" require <?= $disabled; ?>>
	<input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Validez votre mot de passe" require <?= $disabled; ?>>

	<!-- <span style="font-size: 0.7em;color:red;font-weight:bold;"><?= isset($errorMdp) ? $errorMdp : ""; ?></span> -->
	<span style="font-size: 0.7em;color:red;font-weight:bold;"><?= isset($errorStrengthPwd) ? $errorStrengthPwd : (isset($errorMdp) ? $errorMdp : ""); ?></span>
	

	<button type="submit" name="submit-new-user" <?= $disabled; ?>>Enregistrer</button>
</form>

