<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require './layout.php';
require '../class/USERS.php';

$disabled = "";

if(isset($_POST['submit-new-user'])) {
	if(($_POST['pwd'] === $_POST['pwd-repeat']) && (!empty($_POST['pwd']))){
		$u = new USERS();
		$mailExisted = $u->mailExisted($_POST['mail']);

		if($mailExisted) {
			$errorMailExisted = "Cette adresse mail existe déja.";
		} else {
			$user = $u->register($_POST['mail'], $_POST['pwd']);

			if($user) {
				$valided = "Vous avez bien été enregisté. Vous allez être redirigé vers la page d'accueil";
				$disabled = "disabled";
				header("refresh:3;url=http://www.sitetest.local/ovw/views/index.php");
			} else {
				$error = "une erreur est survenu.";
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
		border: 2px outset black;
	}
	.form-signup button:hover {
		border: 2px inset black;
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
		margin-bottom: 1em;
		text-align: center;
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
</style>
<h1>Enregistrement</h1>

<form class="form-signup" method="post">
	<div class="valided"><?= isset($valided) ? $valided : ""; ?></div>
	<div class="error"><?= isset($error) ? $error : ""; ?></div>
	<div class="error"><?= isset($errorMailExisted) ? $errorMailExisted : ""; ?></div>

	<input type="email" name="mail" id="mail" placeholder="Entrez votre adresse mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '';?>" require>

	<span class="secure-mdp">1 majuscule, 1 chiffre et 1 caractére spécial.</span>
	<input type="password" name="pwd" 		 id="pwd" 		 placeholder="Entrez un mot de passe valide" require <?= $disabled; ?>>
	<input type="password" name="pwd-repeat" id="pwd-repeat" placeholder="Validez votre mot de passe" require <?= $disabled; ?>>
		<?= isset($errorMdp) ? $errorMdp : ""; ?>

	<button type="submit" name="submit-new-user" <?= $disabled; ?>>Enregistrer</button>
</form>

