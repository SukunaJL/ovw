<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/HEROES.php';

$skillData = new SKILLS($_GET['id_skill']);

$typeSkill  = $skillData->ulti ? "Capacité Ultime" : ($skillData->weapon ? "Arme(s)" : ($skillData->skill ? "Capacités" : "Passif(s)"));
$colorSkill = $skillData->ulti ? "rgba(139, 0, 0, 1)" : ($skillData->weapon ? "rgba(218, 165, 32, 1)" : ($skillData->skill ? "rgba(0, 0, 139, 1)" : "rgba(0, 100, 0, 1)"));
?>

<div class="skill-opacity" 
style="text-shadow: 0 0 .25rem <?= $colorSkill; ?>, -.125rem -.125rem 1rem <?= $colorSkill; ?>, .125rem .125rem 1rem <?= $colorSkill; ?>;
font-size: 1.5em; font-weight: bold;">
	<?= $typeSkill; ?>
</div>

<div class="ul-img-skill skill-opacity" 
style="box-shadow: 0 0 .25rem <?= $colorSkill; ?>, -.125rem -.125rem 1rem <?= $colorSkill; ?>, .125rem .125rem 1rem <?= $colorSkill; ?>;
margin-top: 0.5em;">
	<img src="../public/src/skill/<?= $skillData->id_hero; ?>/<?= $skillData->img_skill; ?>">
</div>

<span class="skill-opacity" 
style="text-shadow: 0 0 .25rem <?= $colorSkill; ?>, -.125rem -.125rem 1rem <?= $colorSkill; ?>, .125rem .125rem 1rem <?= $colorSkill; ?>;
font-size: 1.3em;">
	<?= $skillData->name_skill; ?>
</span>

<span class="skill-opacity" 
style="text-shadow: 0 0 .25rem <?= $colorSkill; ?>, -.125rem -.125rem 1rem <?= $colorSkill; ?>, .125rem .125rem 1rem <?= $colorSkill; ?>;
font-size: 0.9em;
margin: 0.5em;
text-justify: auto;">
	<?= $skillData->description_skill; ?>
</span>
