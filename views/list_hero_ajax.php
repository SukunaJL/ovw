<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/HEROES.php';

$heroData = new HEROES($_GET['id_hero']);?>


	<div class="detail-noStory">
		<img src="../public/src/<?= $heroData->avatar; ?>">

		<table>
			<tbody>
				<tr>
					<td>NOM D'USAGE : </td>
					<td><?= $heroData->name; ?></td>
					<td>ROLE : </td>
					<td><? if($heroData->roleID->ID == 1){echo"Tank";}elseif($heroData->roleID->ID == 2){echo"Dégats";}else{echo"Soutien";}; ?></td>
				</tr>
				<tr>
					<td>IDENTITE : </td>
					<td><?= $heroData->trueName; ?></td>
					<td>DATE D'ENTREE : </td>
					<td><?= $heroData->dateAddGame; ?></td>
				</tr>
				<tr>
					<td>NATIONALITE : </td>
					<td><?= $heroData->origin; ?></td>
					<td>REPLIQUE : </td>
					<td><?= $heroData->replique; ?></td>
				</tr>
				<tr>
					<td>AGE : </td>
					<td><?= $heroData->age; ?></td>
					<td>AFFILIATION : </td>
					<td><?= $heroData->affiliation; ?></td>
				</tr>
				<tr>
					<td>PROFESSION : </td>
					<td style="white-space: nowrap;" colspan="3"><?= $heroData->metier; ?></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>

	<div>
		HISTOIRE/PARTICULARITE : 
	</div>
	<div style="white-space: pre-line;text-align: justify;line-height: 150%;">
		<?= $heroData->particularite;?><div class="cursor"></div>
	</div>

