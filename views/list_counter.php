<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/HEROES.php';
require '../class/ROLES.php';
require '../class/COUNTERS.php';
require '../views/layout.php';

?>
<style>
	body {
		width: 90%;
	}
	.barre-entiere-selection {
		display: flex;
		justify-content: space-between;
		width: 100%;
		height: 7em;
		border: 1px solid black;
		background: slategray;
		padding: 0.5em;
		border-radius: 0.5em;
		margin: 1em 0.5em;
	}
	.block-selection {
		height: 100%;
		display: flex;
		flex-direction: row;
		align-items: center;
	}
	.selection-tank {
		width: 30%;
	}
	.selection-dps {
		width: 40%;
	}
	.selection-heal {
		width: 20%;
	}
	.role-logo {
		display: flex;
		align-items: center;
		justify-content: center;
		width: 2.5em;
		height: 1.5em;
		border: 1px solid white;
		border-radius: 100%;
		margin-right: 0.1em;
	}
	.role-logo img {
		width: 1.3em;
		height: 1em;
	}
	.img-block {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}
	.heroBlock{
		border: 2px solid white;
		border-radius: 3px;
		display: flex;
		flex-direction:column;
		width: 3em;
		height: 3em;
		text-align: center;
		margin: 2px;
		text-decoration: none;
		color: black;
	}
	.heroBlock:hover {
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.heroBlock img {
		background: black;
	}
	.selected {
		border: 2px solid gold;
		box-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	.selected img {
		background: gold;
	}
</style>
<? 
	$tanksHeroes = HEROES::getHeroesByRole(1);
	$dpsHeroes   = HEROES::getHeroesByRole(2);
	$healsHeroes = HEROES::getHeroesByRole(3);
?>

<h1 style="text-align: center;color:white;">Ajout de Counters</h1>
<div class="barre-entiere-selection">
								<!--//* TANK -->
	<div class="block-selection selection-tank">
		<div class="role-logo"><img src="../public/role/tankoff.webp"></div>
		<div class="img-block">
			<? foreach ($tanksHeroes as $hero){ ?>
				<a 	class="heroBlock
					<?= $hero->id_hero == $_GET['id_hero'] ? "selected" : " "; ?>" 
					href="http://www.sitetest.local/ovw/views/add_counter.php?id_hero=<?= $hero->id_hero;?>">
					<img src="../public/src/<?= $hero->avatar; ?>">
				</a>
			<? } ?>
		</div>
	</div>
								<!--//* DPS -->
	<div class="block-selection selection-dps">
		<div class="role-logo"><img src="../public/role/dpsoff.webp"></div>
		<div class="img-block">
			<? foreach ($dpsHeroes as $hero){ ?>
				<a class="heroBlock
					<?= $hero->id_hero == $_GET['id_hero'] ? "selected" : " "; ?>" 
					href="http://www.sitetest.local/ovw/views/add_counter.php?id_hero=<?= $hero->id_hero;?>">
					<img src="../public/src/<?= $hero->avatar; ?>">
				</a>
			<? } ?>
		</div>
	</div>
								<!--//* HEAL -->
	<div class="block-selection selection-heal">
		<div class="role-logo"><img src="../public/role/healoff.png"></div>
		<div class="img-block">
			<? foreach ($healsHeroes as $hero){ ?>
				<a class="heroBlock
					<?= $hero->id_hero == $_GET['id_hero'] ? "selected" : " "; ?>" 
					href="http://www.sitetest.local/ovw/views/add_counter.php?id_hero=<?= $hero->id_hero;?>">
					<img src="../public/src/<?= $hero->avatar; ?>">
				</a>
			<? } ?>
		</div>
	</div>
</div>
<h3 style="text-align: center;color:white;">Contre? (selectionnez le hero contre qui celui-ci est fort, puis valider)</h3>

<form method="POST">


	<div class="barre-entiere-selection">
									<!--//* TANK -->
		<div class="block-selection selection-tank">
			<div class="role-logo"><img src="../public/role/tankoff.webp"></div>
			<div class="img-block">
				<? foreach ($tanksHeroes as $hero){ ?>
					<a 	class="heroBlock
						<?= $hero->id_hero == $_GET['id_hero'] ? "selected" : " "; ?>" 
						href="http://www.sitetest.local/ovw/views/add_counter.php?id_hero=<?= $hero->id_hero;?>">
						<img src="../public/src/<?= $hero->avatar; ?>">
					</a>
				<? } ?>
			</div>
		</div>
									<!--//* DPS -->
		<div class="block-selection selection-dps">
			<div class="role-logo"><img src="../public/role/dpsoff.webp"></div>
			<div class="img-block">
				<? foreach ($dpsHeroes as $hero){ ?>
					<a class="heroBlock
						<?= $hero->id_hero == $_GET['id_hero'] ? "selected" : " "; ?>" 
						href="http://www.sitetest.local/ovw/views/add_counter.php?id_hero=<?= $hero->id_hero;?>">
						<img src="../public/src/<?= $hero->avatar; ?>">
					</a>
				<? } ?>
			</div>
		</div>
									<!--//* HEAL -->
		<div class="block-selection selection-heal">
			<div class="role-logo"><img src="../public/role/healoff.png"></div>
			<div class="img-block">
				<? foreach ($healsHeroes as $hero){ ?>
					<a class="heroBlock
						<?= $hero->id_hero == $_GET['id_hero'] ? "selected" : " "; ?>" 
						href="http://www.sitetest.local/ovw/views/add_counter.php?id_hero=<?= $hero->id_hero;?>">
						<img src="../public/src/<?= $hero->avatar; ?>">
					</a>
				<? } ?>
			</div>
		</div>
	</div>


</form>