<? 
session_start();

if(isset($_GET['logout']) && !empty($_GET['logout'])) {
	if($_GET['logout']) {
		
		session_destroy();
		
		header('Location: http://www.sitetest.local/ovw/index.php');
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/svg+xml" href="./public/src/icon.png"/>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" crossorigin="anonymous">
	<title>OVW-Tactik</title>
	<style>
		@font-face {
			font-family: ovw;
			src: url("../public/ovw.ttf");
		}
		body {
			width: 70%;
			margin: auto;
			background: gray;
		}
		header {
			color: white;
			padding-top: 0.5em;
		}
		.main-title {
			font-family: ovw;
			writing-mode: vertical-rl;
			text-orientation: upright;
			color: white;
			position: absolute;
			left: -2%;
			top:10%;
			border-radius: 0 1em 1em 0;
			padding: 0.3em;
			background : -webkit-linear-gradient(top, orangered, red);
			border: 5px groove orangered;
		}
		.main-title:hover {
			box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
			color:black;
			background : -webkit-linear-gradient(top, red, orangered);
			border: 5px ridge orangered;
		}
		nav {
			text-align: center;
		}
		nav a {
			font-size: 1.5em;
			text-decoration: none;
			color:white;
			font-weight: bold;
			padding: 0.5em;
			background: orangered;
			border-radius: 0 0 1em 1em;
		}
		nav a:hover {
			background: black;
			color:orangered;
		}
		.link-team {
			color:gold;
			background: black;
			border: 3px solid orangered;
			border-radius: 0 0 1em 1em;
		}
		.link-team:hover {
			color:orangered;
			background: gold;
			border: 3px solid black;
		}
		.link-gestion {
			border: 1px solid black;
			background: silver;
			color: black;
		}
		.login {
			position: absolute;
			display: flex;
			flex-direction: column;
			top: -1em;
			right: 0;
			padding: 0.5em;
			padding-top: 1em;
			border-radius: 0 0 0 1em;
			border-top: none;
			border-right: none;
			border-bottom: 3px solid red;
			border-left: 3px solid red;
			background: black;
		}
		.login a {
			background:none;
			font-size: 1em;
		}
		.login a:hover {
			text-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
			color: white;
		}
		#avatar-user {
			color: green;
			background: red;
			padding: 1em;
			margin: 0.5em;
			border-radius: 100%;
			width: 1em;
			height: 1em;
		}
		#avatar-user:hover {
			box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
		}
		.logout {
			font-size: 1em;
			color: white;
		}
	</style>
</head>
<body>
	<header>
		<a href="http://www.sitetest.local/ovw/index.php"><h1 class="main-title">overwatch</h1></a>
		<nav>
			<a class="link-gestion" href="http://www.sitetest.local/ovw/views/links_gestion.php">GESTION DES DONNÉES</a>
			<a href="http://www.sitetest.local/ovw/views/list_hero.php">HEROS DATA</a>
			<a href="http://www.sitetest.local/ovw/views/list_hero_art.php">ART-OF-HERO</a>
			<a href="http://www.sitetest.local/ovw/views/list_maps.php">CARTES</a>
			<a class="link-team" href="http://www.sitetest.local/ovw/views/team_compo.php">TEAM COMPO</a>
			
			<div class="login">
				<? if(isset($_SESSION['email']) && !empty($_SESSION['email'])) { ?>
					<a id="avatar-user">
						<?= $_SESSION['email']; ?>
					</a>
					<a href="http://www.sitetest.local/ovw/index.php?logout=true">
						<!-- Logout -->
						<i class="fas fa-sign-out-alt logout"></i>
					</a>
				<? } else { ?>
					<a href="http://www.sitetest.local/ovw/views/log_in.php">Connecter</a>
					<a href="http://www.sitetest.local/ovw/views/sign_up.php">Enregistrer</a>
				<? } ?>
			</div>
			
		</nav>
	</header>

<?






?>





	

