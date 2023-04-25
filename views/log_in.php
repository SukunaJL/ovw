<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require './layout.php';
require '../class/USERS.php';

if(isset($_POST['submit-login'])) {
	
	$u = new USERS();
	$user = $u->login($_POST['mail'], $_POST['pwd']);

	if($user) {
		header("Location: http://www.sitetest.local/ovw/views/index.php");
	} else {
		$error = "mail ou mot de passe incorrect.";
	}
	
}

?>
<style>
	.form-login {
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
	.form-login input {
		height:2em;
		width: 70%;
		border: 2px solid grey;
		border-radius: 0.3em;
		padding:0.5em;
		font-size: 1em;
	}
	.form-login button {
		margin-top: 1em;
		padding: 0.5em;
		border: 2px outset black;
	}
	.form-login button:hover {
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
	.error {
		color: red;
		font-weight: bold;
		font-size: 1.2em;
		margin-bottom: 1em;
	}
</style>
<h1>Connexion</h1>

<form class="form-login" method="post">
	<div class="error"><?= isset($error) ? $error : ""; ?></div>

	<input type="email" name="mail" id="mail" placeholder="Entrez votre adresse mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '';?>" require>

	<input type="password" name="pwd" id="pwd" placeholder="Entrez votre mot de passe" require>
		<?= isset($errorMdp) ? $errorMdp : ""; ?>

	<button type="submit" name="submit-login">Connecter</button>
</form>
