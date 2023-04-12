<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../views/layout.php';

?>
<style>
	.main-gestion {
		background: silver;
		border-radius: 0.5em;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
		margin-top: 2em;
		font-size: 0.7em;
	}
	h2 {
		text-align: center;
		color: orangered;
	}
	
	.article-gestion {
		background: lightblue;
		border: 1px solid grey;
		border-radius: 0.2em;
		margin: 1em;
		padding: 1em;
		/* width: 100%; */
	}
	.article-gestion:hover {
		background: lightgoldenrodyellow;
		position: relative;
		transform: scale(1.4);
	}
</style>

<div class="main-gestion">
	<div class="article-gestion">
		<h2>Escort</h2>
		
		<div>
			<p>Les cartes d'Escorts sont des cartes dont l'objectif est de faire avancer le convoi le plus loin possible.</p>
			<p>Le convoi progresse sur la carte tant que des alliés y sont proches.</p>
			<p>Si il n'y a plus d'alliés sur le convoi, celui-ci s'arrête et recule petit à petit.</p>
			<p>Si alliés et ennemis sont proches du convoi, in dit que l'objectif est en contestation et n'avance pas.</p>
			<p>Les maps d'escort ont des points de réapparition(check-point) réparti sur 3 parti de la carte.</p>
		</div>
	</div>

	<div class="article-gestion">
		<h2>Hybrid</h2>

		<div>
			<p>
				Les cartes Hybrid sont des cartes entre l'Escort et le Control dont l'objectif est de capturer une zone dans un premier temps, 
				une fois celui-ci acquis, un convoi apparait, l'objectif est de faire avancer le convoi le plus loin possible.
			</p>
			<p>
				La capture de zone se fait progressivement, si les alliés sortent de la zone ou si un ennemi conteste la zone, 
				l'objectif de capture de progresse plus.
			</p>

		</div>
	</div>

	<div class="article-gestion">
		<h2>Control</h2>

		<div>
			<p>Les cartes de Control sont des cartes dont l'objectif est capturer une zone et de la garder jusqu'à la fin de la progression du %.</p>
			<p>
				La zone se capture en étant présent a l'interieure de celle-ci, si un ennemi est aussi dans la zone, 
				elle sera en constestation tant qu'il u sera présent, une fois la zone capturé, la progression du % commencera.
			</p>
			<p>Une fois la zone capturée à 100%, la manche est gagnante.</p>
			<p>Les cartes de Control se gagnent en 2 manches gagnantes.</p>
			<p>Les cartes de Control ont 3 cartes differentes, celles-ci changent à chaque manche.</p>
		</div>
	</div>

	<div class="article-gestion">
		<h2>Push</h2>

		<div>
			<p>Les cartes de Push sont des cartes dont l'objectif est un robot au centre de la carte qui dois progresser au bout de sa route.</p>
			<p>Tout comme les cartes Escort, les carte Push ont un robot qui peut être ressemblant au convoi.</p>
			<p>Sur le commencement de la partie, le robot se trouve au centre de la carte.</p>
			<p>Le robot a 2 chemins, chacun de ses 2 chemins ménent aux points de réapparissions des 2 équipes.</p>
			<p>L'objectif étant de pousser le robot le plus loin au chemin opposé.</p>
		</div>
	</div>

	<div class="article-gestion">
		<h2>Assault</h2>

		<div>
			<p>Les cartes d'Assault sont des cartes à double capture de zone.</p>
			<p>Assez ressemblantes aux cartes de Control, les cartes d'Assault se gagnent en capturant, dans 1er temps, une 1ere zone puis une seconde plus loin sur la carte.</p>
			<p>Tout comme les autres mode capture, la zone de se capture pas si vous n'êtes pas dans zone ou si un ennemi y est aussi.</p>
			<p>
				Le point particulier de se mode est surtout la seconde zone de capture. 
				En effet, la 2eme zone sera systématiquement collée au point de réapparition de l'équipe defensive.
				Ce qui rends la capture assez difficile à prendre.
			</p>
			<p><span>PS : Les cartes d'Assault sont disponibles dans Overwatch 2 uniquement en mode arcade quand le mode Assault est disponible.</span></p>
		</div>
	</div>


</div>


