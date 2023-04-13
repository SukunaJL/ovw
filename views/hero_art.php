<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/HEROES.php';
// require '../views/layout.php';

$hero = new HEROES($_GET['id_hero']);
// DEBUG::printr($hero);

// $s = new SKILLS(5);
// DEBUG::printr($s);

//* 2 tableau pour remplacé les caracteres speciaux pour la signature du hero
$caracteres = array("É", "é", "è", "ë", "ê", "à", "â", "ä", "&", '\'', "\\", "\"", "/", "%", "ù", "ú", "ü", "ö", "ô", "î", "ï", ";", "$", "~", "`", "ç", "°", "@", "^", "¨", "¤", "#");
$remplace   = array("E", "e", "e", "e", "e", "a", "a", "a", "et", "", "", "", "/", "pourcent", "u", "u", "u", "o", "o", "i", "i","","","","","c","0", "a", "", "", "", "diese");

//* affichage drapeau avec une api
$flag_url = 'https://flagcdn.com/fr/codes.json';
$flag_codes_json = file_get_contents($flag_url);
$flag_codes = json_decode($flag_codes_json, true);

$flag_search_value = $hero->origin; 

$flag_search_key = null;

foreach ($flag_codes as $flag_key => $flag_value) {
	if ($flag_value === $flag_search_value) {
		$flag_search_key = $flag_key;
		break;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../public/style_hero_art.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" crossorigin="anonymous">
	<title>Art To Hero</title>
</head>
<body style="background-image: url('../public/maps/<?= $hero->mapAssigned->avatar;?>');background-size: cover;background-position: center;">
	<div class="falling-leaves-container"></div>

	<div class="header">
		<a class="retour" href="http://www.sitetest.local/ovw/views/list_hero_art.php">
			<i class="fas fa-backspace"></i>
			<div>Retour</div>
		</a>

		<div class="header-name">
			<div><?= $hero->name; ?></div>
		</div>
		

		<img src="../public/src/<?= $hero->avatar; ?>">
	</div>
	
	
	<div class="block-content">
		<div class="breathing-animation">
			<img class="fanart" src="../public/src/fanart/<?= $hero->ID; ?>/<?= $hero->fanart; ?>">
			
			<div class="replique">
				<div class="signature"><?= str_replace($caracteres, $remplace, $hero->name); ?></div>
				<?= $hero->replique; ?>
				<sub><?= $hero->trueName; ?></sub>
			</div>
		</div>


		<div class="skills-block">
			<div class="description-skill"  id="div-description" onclick="closeDescription(this);"></div>


			<div class="flag-and-role">
				<img class="role-icon" src="../public/role/<?= $hero->roleID->ID === 1 ? "tankon" : ($hero->roleID->ID === 2 ? "dpson" : "healon"); ?>.png"/>

				<? if(isset($flag_search_key)) { ?>
					<img class="flag" src="https://flagcdn.com/h40/<?= $flag_search_key; ?>.png">
				<? } ?>
			</div>
			
			
			<div class="block-skills-list">
				<? $heroSkillsList = SKILLS::getSkillsByHeroID($hero->ID);
				$skills_by_type = array(
					'Passif' => array(),
					'Arme'	 => array(),
					'Spell'  => array(),
					'Ultime' => array()
				);
				foreach ($heroSkillsList as $row) {
					$skills_by_type[$row->skill_type][] = $row;
				}

				foreach ($skills_by_type as $type => $skills) { 
					$type_color 	  = $type == 'Passif' ? 'rgba(0, 100, 0, 0.5)'	   : ($type == 'Arme' ? 'rgba(218, 165, 32, 0.5)' : ($type == 'Spell' ? 'rgba(0, 0, 139, 0.5)' 	   : 'rgba(139, 0, 0, 0.5)'));
					$type_color_light = $type == 'Passif' ? 'rgba(144, 238, 144, 0.5)' : ($type == 'Arme' ? 'rgba(238, 232, 170, 0.5)': ($type == 'Spell' ? 'rgba(173, 216, 230, 0.5)' : 'rgba(255, 99, 71, 0.5)'));
					$typeTrueName  = $type === "Ultime" ? "Capacité Ultime" : ($type === "Arme" ? "Arme(s)" : ($type === "Spell" ? "Capacités" : "Passif(s)"));
					if(!empty($skills)) { ?>
						<div style="background: <?= $type_color; ?>;">
							<?= $typeTrueName; ?>
						</div>
					<? } ?>

					<ul class="ul-skills-link">
						<? foreach ($skills as $skill) { ?>
							<li style="background: <?= $type_color_light; ?>;" id="li-skill" class="li-skill" data-id-skill="<?= $skill->id_skill;?>" onclick="clignoter(this);openDescription(this);">
								<a>
									<div class="ul-img-skill">
										<img src="../public/src/skill/<?= $hero->ID; ?>/<?= $skill->img_skill; ?>">
									</div>
									<span>
										<?= $skill->name_skill; ?>
									</span>
								</a>
							</li>
						<? } ?>
					</ul>

				<? } ?>

			</div>
			
		</div>
	</div>
	

	
	


<script>
	let isExpanded = false;

	// background clignotant sur skill au clic
	function clignoter(skill) {		

		skill.classList.add('clignotement');

		setTimeout(() => {
			skill.classList.remove('clignotement');
		}, 1000);

	}

	// ouverture de la div description sur skill au clic
	function openDescription(skill){
		var description = document.getElementById('div-description');
		//si la div est deja ouverte la refermé
		if (isExpanded) {
			isExpanded = false;
			description.classList.remove("elargie");
			description.classList.add("flash");
			setTimeout(() => {
				// applique a tout les enfants opacity-0
				children = description.children;
				for (let i = 0; i < children.length; i++) {
					child = children[i];
					child.classList.remove("opacity-to-1");
				}
			}, 50);
			setTimeout(() => {
				description.classList.remove("flash");
				description.classList.remove("elargie");
			}, 800);

			// puis la rouvrir avec le skill selectionné
			setTimeout(() => {
				isExpanded = true;
				description.classList.add("elargie");
				setTimeout(() => {
						description.classList.add("flash");
						setTimeout(() => {
							// applique a tout les enfants opacity-1
							children = description.children;
							for (let i = 0; i < children.length; i++) {
								child = children[i];
								child.classList.add("opacity-to-1");
							}
							description.classList.remove("flash");
						}, 500);
					}, 1000);
			}, 800);

		} else {
			isExpanded = true;
			setTimeout(() => {
				description.classList.add("elargie");
				setTimeout(() => {
						description.classList.add("flash");
						setTimeout(() => {
							// applique a tout les enfants opacity-1
							children = description.children;
							for (let i = 0; i < children.length; i++) {
								child = children[i];
								child.classList.add("opacity-to-1");
							}
							description.classList.remove("flash");
						}, 500);
					}, 1000);
			}, 800);
		}
	}

	// sur bloc-description
	function closeDescription(div){
		if (isExpanded) {
			isExpanded = false;
			div.classList.add("flash");

			setTimeout(() => {
				// applique a tout les enfants opacity-0
				children = div.children;
				for (let i = 0; i < children.length; i++) {
					child = children[i];
					child.classList.remove("opacity-to-1");
				}
			}, 50);
			setTimeout(() => {
				div.classList.remove("flash");
				div.classList.remove("elargie");
			}, 800);
		} else {
			return;
		}
	}
	
// AJAX SKILLS
	$(document).ready(function(){		
		$(".li-skill").click(function(){
			
			var numValue = $(this).data('id-skill');
			
			$.get("../views/skill_art_ajax.php", {id_skill: numValue} , function(data){
				$("#div-description").html(data);
			});

		});
	});

// ANIMATION PAGE
	// Conteneur des animations
	const container = document.querySelector(".falling-leaves-container");

	// Conteneur du fanart
	const fanart = document.querySelector(".fanart");

	// recupération de l'id_hero dans url
	const urlParams = new URLSearchParams(window.location.search);
	const idHero = parseInt(urlParams.get('id_hero'));

	// ANIMATION FEUILLES
	// tableau des id_hero qui doivent avoir l'animation feuilles
	const feuillesHeroIds = [5, 12, 35, 18, 21, 29, 16, 17, 4, 20, 14, 28, 23, 7]; 
	if (feuillesHeroIds.includes(idHero)) {
		for (let i = 0; i < 30; i++) {
			// creation de la div globale
			const leaf = document.createElement("div");
			leaf.classList.add("falling-leaf");

			// création des feuilles
			const image = document.createElement("img");
			image.setAttribute("src", `../public/feuille1.png`);

			if(idHero == 4 || idHero == 20) {
				image.setAttribute("class", `autumn`);
			}
			if(idHero == 16 || idHero == 17) {
				image.setAttribute("class", `cerisier`);
			}
			// ajout des feuilles dans image et image dans la div globale
			leaf.appendChild(image);
			container.appendChild(leaf);

			leaf.style.left = Math.random() * container.offsetWidth + "px";
			leaf.style.animationDelay = Math.random() * 10 + "s";
		}
	}

	// ANIMATION NEIGES
	// tableau des id_hero qui doivent avoir l'animation neiges
	const snowHeroIds = [27, 33, 37, 19, 31, 32]; 
	if (snowHeroIds.includes(idHero)) {
		for (let i = 0; i < 30; i++) {
			const snowflake = document.createElement("div");
			snowflake.classList.add("falling-snow");

			const imageSnow = document.createElement("img");
			imageSnow.setAttribute("src", `../public/snow.png`);
			imageSnow.classList.add("img", "falling-snowflake");
			snowflake.appendChild(imageSnow);

			container.appendChild(snowflake);

			snowflake.style.left = Math.random() * window.innerWidth + "px";
			snowflake.style.animationDelay = Math.random() * 10 + "s";

			const scale = Math.random() * 0.5 + 0.1;
			imageSnow.style.transform = `scale(${scale})`;
		}
	}

	// ANIMATION BUISSON-CACTUS-SCORPION
	// tableau des id_hero qui doivent avoir l'animation buisson
	const buissonHeroIds = [3, 8, 13]; 
	if (buissonHeroIds.includes(idHero)) {
		// BUISSON
		const buisson = document.createElement("img");
		buisson.classList.add("buisson-image");
		buisson.setAttribute("src", `../public/buisson_cartoon.png`);
		container.appendChild(buisson);

		// CACTUS
		const cactus = document.createElement("img");
		cactus.classList.add("cactus-image");
		cactus.setAttribute("src", `../public/cactus.png`);
		container.appendChild(cactus);

		// SCORPION
		const scorpio = document.createElement("img");
		scorpio.classList.add("scorpio-image");
		scorpio.setAttribute("src", `../public/scorpio.png`);
		container.appendChild(scorpio);

		setTimeout(() => {
			startAnimation();
			setInterval(startAnimation, 5000);
		}, 3500);

		scorpTurn = false;
		function startAnimation() {
			cactus.classList.add("cactus-anim");
			if(scorpTurn){
				scorpio.classList.add("scorpio-anim-around-cactus");
			} else {
				scorpio.classList.add("scorpio-anim");
			}
			
			setTimeout(() => {
				cactus.classList.remove("cactus-anim");
				if(scorpTurn){
					scorpTurn = false;
					scorpio.classList.remove("scorpio-anim-around-cactus");
				} else {
					scorpTurn = true;
					scorpio.classList.remove("scorpio-anim");
				}
			}, 4000);
		}
	}

	// ANIMATION DVA
	// si DVa(id:11) alors faire l'animation
	if(idHero == 11) {
		setInterval(shootDva, 5000);
		
		

		function shootDva(){
			const shootDva = document.createElement("img");
			shootDva.setAttribute("src", `../public/flash.png`);
			shootDva.classList.add("shoot-dva");
			fanart.appendChild(shootDva);

			shootDva.classList.add("shoot-dva-anim");
			setTimeout(() => {
				shootDva.classList.remove("shoot-dva-anim");
			}, 4000);
		}

	}

</script>


</body>
</html>


