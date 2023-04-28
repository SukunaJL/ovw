<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";
require '../class/HEROES.php';
require '../views/layout.php';

if(!isset($_SESSION['email']) || !$_SESSION['isAdmin']) {
	echo '<meta http-equiv="refresh" content="0;URL=http://www.sitetest.local/ovw/views/index.php">';
} else {




$allHeroes = HEROES::getsAllHeroesInfos();
// DEBUG::printr($allHeroes);
?>
<style>
	/* SCROLL-BAR */
	*::-webkit-scrollbar {
		width: 0.5em;
	}
	*::-webkit-scrollbar-track {
		background: silver;
		border-radius: 0.5em;
	}
	*::-webkit-scrollbar-thumb {
		opacity: 0.5;
		background-color: grey;
		border-radius: 20px;
		border: 3px solid grey;
	}

	body {
		width: 80%;
	}
	.main {
		margin-top: 1.5em;
		border-radius: 0.5em;
		width: 100%;
		height: 40em;
		max-height: 40em;
		background: white;
		display: flex;
		border:5px solid silver;
	}
	.listing-heroes {
		display:flex;
		flex-direction: column;
		width: 28%;
		height: 100%;
		background: lightblue;
		overflow: auto;

		scrollbar-width: 0.2em;
	}
	
	.hero-on-list-selected {
		border:2px solid red;
		border-radius:0.2em;
		width:92%;
		height:3em;
		text-decoration: none;
		padding:1em 0.5em;
		
		opacity: 1;
		filter: sepia(0);
	}
	.hero-on-list {
		border:1px solid black;
		border-radius:0.2em;

		width:92%;
		height:3em;
		text-decoration: none;
		padding:1em 0.5em;
		
		opacity: 0.7;
		filter: sepia(1);
	}
	.hero-on-list:hover {
		opacity: 1;
		filter: sepia(0);
	}
	.name-hero-list {
		height: 2em;
		font-weight: bold;
		color:orangered;
		font-size: 2em;
		text-shadow: 0 0 .25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 1rem black;
	}
	.name-hero-list-selected {
		height: 2em;
		font-weight: bold;
		color:black;
		font-size: 2em;
		text-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}

	.block-modif {
		width: 100%;
		height:100%;
		background: dimgrey;
		border-radius: 0.2em;
		/* color: white; */

		/* overflow: auto; */

	}
	.titleAndPic {
		display: flex;
		align-items: center;
		height: 10%;
	}
	.titleAndPic h1 {
		text-align: center;
		margin: 0.2em 0 0.5em;
		width: 80%;
	}
	.titleAndPic img {
		width: 3em;
		height: 3em;
		border: 2px solid red;
		border-radius: 100%;
		margin: 0.5em;
		background: orange;
	}
	
	.add-form {
		padding: 0.5em;
		display: flex;
		justify-content: space-around;
		height: 10%;
		max-height: 10%;
	}
	textarea {
		height: 100%;
		width: 28em;
	}
	.add-form > div {
		display: flex;
		flex-direction: column;
		text-align: center;
		align-items: center;
		justify-content: center;
	}
	.add-form input {
		margin: 0.2em;
	}
	label {
		margin-bottom: 0.2em;
	}
	.submit-addskill {
		border-radius: 100%;
		width: 2em;
		height: 2em;
		color: green;
		font-size: 1.2em;
		font-weight: bold;
		border:2px groove green;
		
	}
	.submit-addskill:hover {
		border: 2px ridge white;
		background: green;
		color: white;
		cursor: pointer;
	}


	table {
		width: 100%;
		margin: 0;
		font-family: "Poppins", sans-serif;
		border-collapse: separate;
		background-color: #828c96;
		color: #dcdcdc;
		border-radius: 0.5em;
	}
	thead, tbody { 
		display: block;
	}
	thead {
		width:99.2%;
	}
	tbody {
		overflow-y: scroll;
		height: 25em;

		scrollbar-width: 2%;
	}
	th {
		
		border-radius: 0.2em;
	}
	th:nth-child(1), td:nth-child(1) {
		width: 9%;
	}
	th:nth-child(2), td:nth-child(2) {
		width: 17%;
	}
	th:nth-child(3), td:nth-child(3) {
		width: 63%;
	}
	th:nth-child(4), td:nth-child(4) {
		width: 8%;
	}

	th, td {
		padding: 10px 15px;
		text-align: left;
	}
	th {
		background-color: #4a4e69;
		font-weight: bold;
		text-transform: uppercase;
	}
	tr:nth-child(even) {
		background-color: slategray;
	}
	tr:nth-child(odd) {
		background-color: #8c96a0;
	}
	tr:hover {
		background-color: #5a6478;
	}
	td:last-child {
		text-align: right;
	}
	caption {
		font-size: 1.5em;
		font-weight: bold;
		text-align: center;
		margin: 10px;
		color: white;
	}
	.td-img-skill-table {
		padding: 0.2;

	}
	.td-img-skill-table div {
		display: flex;

		width: 3em;
		height: 3em;
		border: 1px solid white;
		border-radius: 100%;
		background: #1a2936;
	}
	.td-img-skill-table div img {
		width: 70%;
		margin: auto;
		padding: 0.1em;
	}
	.td-description {
		font-size: 0.8em;
	}

	.link-delete {
		color: red;
	}
	.link-delete i:hover {
		transform: scale(2);
	}
</style>
<? 
if(isset($_POST['submit_addskill'])) {
	$isUlti   = 0;
	$isWeapon = 0;
	$isSpell  = 0;
	$isPassif = 0;

	switch($_POST['add_type_skill']) {
		case 'Arme' 	: $isWeapon = 1; break;
		case 'Spell'	: $isSpell 	= 1; break;
		case 'Ultimate'	: $isUlti 	= 1; break;
		case 'Passif'	: $isPassif = 1; break;
	};

	$s = new SKILLS();
	$resultAddSkill = $s->addSkills(
		$_GET['id_hero'],
		$_POST['add_name_skill'],
		$_FILES['add_picture_skill']['name'],
		$_POST['add_description_skill'],
		$isUlti,
		$isWeapon,
		$isSpell,
		$isPassif
	);
	
	if($resultAddSkill) {
		if(!is_dir('../public/src/skill/'.$_GET['id_hero'])){
			mkdir('../public/src/skill/'.$_GET['id_hero']);
		}
		move_uploaded_file($_FILES['add_picture_skill']['tmp_name'], '../public/src/skill/'.$_GET['id_hero'].'/'.$_FILES['add_picture_skill']['name']);
		$validated = "enregistré ✓";
	}

}
if(isset($_GET['id_skill'])) {
	$r = SKILLS::deleteSkillByID($_GET['id_skill']);
	
}
?>

<div class="main">
	<div class="listing-heroes">
		<? foreach ($allHeroes as $hero){ ?>
			<a class="
			<?= isset($_GET['id_hero']) && $_GET['id_hero'] == $hero->id_hero ? "hero-on-list-selected" : "hero-on-list"; ?>"
			href="http://www.sitetest.local/ovw/views/edit_skills.php?id_hero=<?= $hero->id_hero; ?>" 
				style="background:linear-gradient(to top, transparent, transparent),0% url('../public/src/<?= $hero->avatar; ?>');background-size: cover;">
				<? if(strlen($hero->name) > 10) {?>
					<span class="
					<?= isset($_GET['id_hero']) && $_GET['id_hero'] == $hero->id_hero ? "name-hero-list-selected" : "name-hero-list"; ?>"
					style="font-size : 1.5em"><?= $hero->name; ?></span>
				<? } else { ?>
					<span class="<?= isset($_GET['id_hero']) && $_GET['id_hero'] == $hero->id_hero ? "name-hero-list-selected" : "name-hero-list"; ?>"><?= $hero->name; ?></span>
				<? } ?>
			</a>
			
		<? } ?>
	</div>

	<div class="block-modif">
		<? if(isset($_GET['id_hero'])){ 
			$heroSelected = new HEROES($_GET['id_hero']);?>
			<div class="titleAndPic">
				<img src="../public/src/<?= $heroSelected->avatar; ?>"></img>
				<h1>Gestion des capacités de : <span style="color:orangered;"><?= $heroSelected->name; ?></span></h1>
			</div>
			<form class="add-form" method="POST" enctype="multipart/form-data">

				<div>
					<label>Nom</label>
					<input type="text" name="add_name_skill" placeholder="Intitulé" required>
				</div>
						
				<div>
					<label>Descriptif</label>
					<textarea type="text" name="add_description_skill" placeholder="Description" required></textarea>
				</div>

				<div>
					<label>Type</label>
					<select name="add_type_skill">
							<option value = "Arme"	  > Arme</option>
							<option value = "Spell"	  > Spell</option>
							<option value = "Ultimate"> Ultimate</option>
							<option value = "Passif"  > Passif</option>
					</select>
				</div>
						
				<div>
					<label for="pic_skill">Image</label>
					<input class="inputfile" type="file" id="pic_skill" name="add_picture_skill">
				</div>
				<div>
					<button type="submit" class="submit-addskill" name="submit_addskill">✓</button>
				</div>
				
			</form>
			<table>
				<caption>Liste des capacités</caption>
				<thead>
					<tr>
						<th>Image</th>
						<th>Nom</th>
						<th>Description</th>
						<th>Type</th>
						<th><i class="fas fa-trash-alt"></i></th>
					</tr>
				</thead>
				<tbody>
					<? $heroSkillsList = SKILLS::getSkillsByHeroID($_GET['id_hero']);
					// DEBUG::printr($heroSkillsList);
					if($heroSkillsList) {
						foreach($heroSkillsList as $heroSkill){ 
							$pathImgSkill = "../public/src/skill/".$_GET['id_hero']."/".$heroSkill->img_skill."";
							// DEBUG::printr($heroSkill);
							?>
							<tr>
								<td class="td-img-skill-table"><div><img src="../public/src/skill/<?= $_GET['id_hero']; ?>/<?= $heroSkill->img_skill; ?>"></div></td>
								<td><?= $heroSkill->name_skill; ?></td>
								<td class="td-description"><?= $heroSkill->description_skill; ?></td>
								<td><?= $heroSkill->skill_type; ?></td>
								<td>
									<a class="link-delete" 
									href="http://www.sitetest.local/ovw/views/edit_skills.php?id_skill=<?= $heroSkill->id_skill; ?>&id_hero=<?= $_GET['id_hero']; ?>">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
							</tr>
						<? } 
					} ?>
				</tbody>
			</table>

		<? } ?>
	</div>


</div>
<? } ?>