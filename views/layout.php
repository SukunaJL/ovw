<? 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_GET['logout']) && !empty($_GET['logout'])) {
	if($_GET['logout']) {
		
		session_destroy();
		
		echo '<meta http-equiv="refresh" content="0;URL=http://www.sitetest.local/ovw/views/index.php">';
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/svg+xml" href="../public/src/icon.png"/>
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
			position: relative;

			font-size: 1.5em;
			text-decoration: none;
			color:white;
			font-weight: bold;
			padding: 0.5em;
			margin-right: 0.2em;
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
			justify-content: space-around;
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
			/* background: black; */
			box-shadow: 0 0 .25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 1rem black;
		}
		.login a {
			background:none;
			font-size: 1em;
		}
		.login a:hover {
			text-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
			color: white;
			background:none;
		}
		#avatar-user {
			background: rgba(173, 216, 230, 0.5);
			padding: 0;
			margin: 0.5em;
			border: 2px solid black;
			border-radius: 100%;
			min-width : 3em;
			max-width : 3em;
			min-height: 3em;
			max-height: 3em;
			
			box-shadow: 0 0 .25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 1rem black;
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
			background: radial-gradient(black, transparent);
		}
		.logout:hover {
			background: none;
		}
		.icon-userLock {
			position: absolute;
			top: 75%;
			left: 40%;

			width: 1em;
			height: 1em;
			font-size: 0.5em;

			display: flex;
			justify-content: center;
			align-items: center;

			padding: 0.5em;
			border: 1px solid black;
			border-radius: 100% !important;
			background: lightgreen;
			color: black;
		}
		.link-locked:hover::before {
			content: "Veuillez vous connectez pour accéder a cette page.";
			position: absolute;
			z-index: 10;
			top: 1em;
			left: 1em;
			/* transform: translate(-50%, 0); */
			width:10em;
			background-color: rgba(0, 0, 0, 0.5);
			border-radius: 1em;
			border: 2px solid black;
			padding: 0.5em;
			font-size: 0.6em;
			color: white;
			padding: 5px;
			text-shadow: 0 0 .25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 1rem black;

			-webkit-animation: fadeInFromOpacityTrue 0.5s ease-in-out;
		}
		@keyframes fadeInFromOpacityTrue {
			0% {
				opacity: 0;
			}
			100% {
				opacity: 1;
			}
		}
	</style>
</head>
<body>
	<header>
		<a href="http://www.sitetest.local/ovw/views/index.php"><h1 class="main-title">overwatch</h1></a>
		<nav>
			<!-- ESPACE ADMIN  -->
			<? if(isset($_SESSION['isAdmin']) && $_SESSION['isAdmin']) { ?>
				<a class="link-gestion" href="http://www.sitetest.local/ovw/views/links_gestion.php">Gestion des données/Admin</a>
			<? } ?>
			<!-- PAGE DES HEROS  -->
			<a href="http://www.sitetest.local/ovw/views/list_hero.php">HEROS DATA</a>
			<!-- PAGE HERO-ART  -->
			<a class="<?= (!isset($_SESSION['email']) || empty($_SESSION['email'])) ? "link-locked" : ""; ?>"
			href="<?= (!isset($_SESSION['email']) || empty($_SESSION['email'])) ? "http://www.sitetest.local/ovw/views/log_in.php" : "http://www.sitetest.local/ovw/views/list_hero_art.php"; ?>">
				ART-OF-HERO
				<? if(!isset($_SESSION['email']) || empty($_SESSION['email'])) { ?>
					<i class="fas fa-user-lock icon-userLock"></i>
				<? } ?>
			</a>
			<!-- PAGE CARTES  -->
			<a href="http://www.sitetest.local/ovw/views/list_maps.php">CARTES</a>
			<!-- PAGE COMPOSITION DES EQUIPES -->
			<a class="link-team <?= (!isset($_SESSION['email']) || empty($_SESSION['email'])) ? "link-locked" : ""; ?>" 
			href="<?= (!isset($_SESSION['email']) || empty($_SESSION['email'])) ? "http://www.sitetest.local/ovw/views/log_in.php" : "http://www.sitetest.local/ovw/views/team_compo.php"; ?>">
				TEAM COMPO
				<? if(!isset($_SESSION['email']) || empty($_SESSION['email'])) { ?>
					<i class="fas fa-user-lock icon-userLock"></i>
				<? } ?>
			</a>
			
			<!-- ESPACE CONNEXION -->
			<div class="login" 
			<?= (isset($_SESSION['background']) && $_SESSION['background'] !== NULL) ? 
				"style=\"background-image: url('../public/maps/".$_SESSION['background']."');background-size: cover;background-position: center;\"" : "style=\"background:black\"" ?>
			>
				<? if(isset($_SESSION['email']) && !empty($_SESSION['email'])) { ?>
					<a id="avatar-user" href="http://www.sitetest.local/ovw/views/profil.php">
						<img src="../public/src/<?= $_SESSION['avatar']; ?>">
					</a>
					<div style="font-size: 0.9em;
						color:white;
						text-shadow: 0 0 1.25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 1rem black;
						background: radial-gradient(rgba(0, 0, 0, 0.5), transparent);">
						Bienvenue <br>
						<span style="font-weight:bold;font-size: 1.2em;"><?= $_SESSION['pseudo']; ?></span>
					</div>
					<a href="http://www.sitetest.local/ovw/views/index.php?logout=true">
						<!-- Logout -->
						<i class="fas fa-sign-out-alt logout"></i>
					</a>
				<? } else { ?>
					<a style="color:lightgreen;" href="http://www.sitetest.local/ovw/views/log_in.php">Connecter</a>
					<hr style="transform:rotate(90deg);width: 50%;">
					<a style="color:lightgreen;" href="http://www.sitetest.local/ovw/views/sign_up.php">Enregistrer</a>
				<? } ?>
			</div>
			
		</nav>
	</header>

<?






?>





	

