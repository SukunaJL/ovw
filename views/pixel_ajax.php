<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/HEROES.php';

$heroData = new HEROES($_GET['id_hero']);
$genjiHeight = $heroData->ID == 16 ? "genji-height" : "";
?>
<a class="valided" href="http://www.sitetest.local/ovw/views/hero_art.php?id_hero=<?= $heroData->ID; ?>">
	<span>Valider</span>
	<i class="fas fa-angle-right"></i>
</a>

<img class="pixel <?= $genjiHeight; ?>" src="../public/src/spray/<?= $heroData->ID; ?>/<?= $heroData->pixel; ?>">

<img class="spot" src="../public/spot.png">


