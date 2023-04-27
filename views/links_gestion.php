<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

if(!isset($_SESSION['email']) || !$_SESSION['isAdmin']) {
	echo '<meta http-equiv="refresh" content="0;URL=http://www.sitetest.local/ovw/views/index.php">';
}

require '../views/layout.php';

?>
<style>
	.main-gestion {
		background: silver;
		border-radius: 0.5em;
		display: flex;
		flex-wrap: wrap;
		margin-top: 2em;
		justify-content: center;
	}
	.main-gestion a {
		text-decoration: none;
		color:black;
	}
	h2 {
		text-align: center;
		color: orangered;
	}
	
	.article-gestion {
		background: lightblue;
		border: 1px solid grey;
		border-radius: 0.2em;
		margin: 0.5em;
		padding: 1em;
		width: 20%;
	}
	.article-gestion:hover {
		background: lightcyan;
	}
	ol li {
		padding: 0.1em;
	}
	.link-superadmin {
		width: 50%;
		margin-top: 2em;
		margin-left: auto;
		margin-right: auto;
		padding: 0;
		border: 2px double orangered;
		border-radius: 0.3em;
		background: dimgrey;
	}
	.link-superadmin a:hover {
		color: black;
		text-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.link-superadmin a {
		display: flex;
		justify-content: center;
		text-decoration: none;
		font-weight: bold;
		width: 100%;
		height: 100%;
		padding: 0.5em;
	}
</style>
<? if(!isset($_SESSION['email']) || !$_SESSION['isSuperAdmin']) { ?>
	<div class="link-superadmin">
		<a href="http://www.sitetest.local/ovw/views/superadmin.php">Espace superAdmin</a>
	</div>
<? } ?>

<div class="main-gestion">
	<a href="http://www.sitetest.local/ovw/views/update_hero.php" class="article-gestion">
		<h2>HEROS</h2>

		<div>
			<p>Besoin d'ajouter un nouveau héro?</p>
			<p>Nécessité de modifier une donnée en particulier?</p>
			<p>C'est içi que ca se passe !</p>
			<p>Cette espace vous donnera accés à une liste de données qui concernent directement vos héros favoris :</p>
			<ul>
				<li>Nom</li>
				<li>Origine</li>
				<li>Vrai nom</li>
				<li>Age</li>
				<li>Histoire</li>
				<li>Particularité</li>
				<li>Réplique</li>
				<li>Affiliation</li>
				<li>Date d'entrée en jeu</li>
				<li>1 Image de profil du héro</li>
				<li>1 Fanart du héro</li>
			</ul>
		</div>
	</a>

	<a href="http://www.sitetest.local/ovw/views/add_counter.php" class="article-gestion">
		<h2>COUNTERS</h2>

		<div>
			<p>Accedez à tout les Counters enregistrés.</p>
			<p>Ajouter, modifier ou supprimer chaque counter selon chaques heros selectionnés</p>
			<ol>
				<li>Choisissez un héro.</li>
				<li>Selectionnez les héros que le héro que vous avez choisi précédemment bats facilement(définition de counter...).</li>
				<li>Visualisez le rendu des counters du héro choisi en 1ére parti.</li>
			</ol>
			<p>Ps : Un héro ne peut être le counter de lui-même, et ne peut pas counter un héro qui est déja son counter.</p>
		</div>
	</a>

	<a href="http://www.sitetest.local/ovw/views/edit_skills.php" class="article-gestion">
		<h2>COMPÉTENCES</h2>

		<div>
			<p>Pour une gestion totale de chacunes des compétences de votre héro favori !</p>
			<p>Accèdez aux fonctions de modification concernant les skills :</p>
			<ul>
				<li>Nom de la compétence</li>
				<li>Image de la compétence</li>
			</ul>
			<p>Les compétences des détaillés pour chacun spell :</p>
			<ul>
				<li>Ultimate</li>
				<li>Arme principale</li>
				<li>Chacun des spells et même plus si vous le souhaitez(jusqu'à 4 spells)</li>
			</ul>
		</div>
	</a>

	<a href="http://www.sitetest.local/ovw/views/edit_maps.php" class="article-gestion">
		<h2>CARTES</h2>

		<div>
			<p>Une nouvelle carte viens d'arriver sur Overwatch? Intégrez-la dans le site via cette section !</p>
			<p>Accèdez aux fonctions de modification concernant les cartes :</p>
			<ul>
				<li>Nom de la carte</li>
				<li>Image de la carte</li>
				<li>Type de la carte</li>
			</ul>
			<p>Les cartes du mode arcade ne sont pas prévues pour le moment.</p>
			<p>Les modes élimination, combat à mort, combat à mort par équipe et capture du drapeau ont des cartes de type Aréne non intégré pour le moment.</p>
		</div>
	</a>


</div>


