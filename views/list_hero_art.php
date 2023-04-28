<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/HEROES.php';
require '../views/layout.php';

if(!isset($_SESSION['email']) || empty($_SESSION['email'])) {
	echo '<meta http-equiv="refresh" content="0;URL=http://www.sitetest.local/ovw/views/index.php">';
} else {

$allHeroes = HEROES::getsAllHeroesInfos();

// DEBUG::printr($allHeroes);

?>
<style>
	body {
		width: 90%;
	}
	.main {
		display: flex;
		flex-direction: row;
		width: 100%;

		margin-top : 3em;
	}

	.select-hero {
		width: 70%;

		text-align:center;
		height: 35em;
		background: black;
		border: 2px solid white;

		background-image: url("../icon-anim.png") ;
		animation: scroll 300s linear infinite;
		background-size: 100%;

		display: grid;
		grid-template-columns: repeat(8, 1fr);
		grid-template-rows: repeat(5, 1fr);

		padding: 1em;
		/* margin: 0.5em; */
		border-radius:0.5em 0 0 0.5em;
	}
	@keyframes scroll {
		100%{
			background-position:0px -3000px;
		}
	}
	.hero-case {
		position: relative;
		border: 3px solid white;
		border-radius: 0.5em;
		background: silver;
		margin: 0.7em;
		height:  5em;
		width :  5em;
	}
	@keyframes selectColor {
		0% {
			background: white;
		}
		50% {
			background: cyan;
		}
		100% {
			background: white;
		}
	}
	.div-selection-color {
		animation: selectColor 0.2s ease-in-out 5;
	}

	.hero-case img {
		padding: 0.1em;
		max-height:  5em;
		max-width :  5em;
		
	}

	.scene {
		/* position: relative; */

		width: 30%;
		background: black;
		border: 2px solid white;
		border-radius:0 0.5em 0.5em 0;
		color: white;
	}
	.spot {
		position: absolute;
		z-index: 1;
		
		/* top:0;
		left:10; */
		height: 65%;
		/* width: 80%; */
	}
	.pixel {
		position: absolute;
		z-index: 2;

		height: 10em;
		top:48%;
		right: 12%;

		animation: breathing 5s ease-in-out infinite;
	}
	.genji-height {
		right: 7%;
	}

	/* animation respiration  */
	@keyframes breathing {
		0% {
			transform: scale(1) translateY(0);
		}
		50% {
			transform: scale(1.02) translateY(-0.4%);
		}
		100% {
			transform: scale(1) translateY(0);
		}
	}

	.div-selection {
		position: absolute;

		top : -0.5em;
		left: -0.5em;

		padding: 0.2em;

		height: 5.3em;
		width : 5.3em;

		/* border: 3px solid red; */
		border-radius: 0.5em;
		/* margin: 0.1em;
		padding: 0; */
	}
	.div-selection:hover {
		border: 3px solid red;

		animation: select 1s ease-in-out infinite;
	}
	@keyframes select {
		0% {
			transform: scale(1.02);
		}
		50% {
			transform: scale(1.08);
		}
		100% {
			transform: scale(1.02);
		}
	}
	.valided {
		position: absolute;
		width: 5em;
		display:flex;
		justify-content: space-between;
		align-items: center;
		z-index: 5;
		color: red;
		font-size: 1.2em;
		font-weight: bold;
		padding: 1em;
		margin: 1em;
		margin-left: 1em;
		background: silver;
		border-radius: 0.5em;
		text-decoration: none;
	}
	.valided:hover {
		color: silver;
		background: orangered;
		box-shadow: 0 0 .25rem white, -.125rem -.125rem 1rem white, .125rem .125rem 1rem white;
	}
	.valided i {
		font-size: 1.25em;
		transition: transform 1s;
	}
	.valided:hover i {
		transform: rotate(180deg);

	}

</style>

<div class="main">
	<div class="select-hero">
		<? foreach ($allHeroes as $hero){ ?>
			
			<a class="hero-case" href="#" data-id-hero="<?= $hero->id_hero;?>" onclick="validatedColor(this);">
				<div class="div-selection"></div>
				<img src="../public/src/spray/<?= $hero->id_hero; ?>/<?= $hero->cute; ?>">
			</a>
			
		<? } ?>


	</div>
	<div class="scene">
		
		<img class="spot" src="../public/spot.png">
		
	</div>

</div>

<script>
	// AJAX 
	$(document).ready(function(){		
		$(".hero-case").click(function(){
			
			var numValue = $(this).data('id-hero');
			
			$.get("../views/pixel_ajax.php", {id_hero: numValue} , function(data){
				$(".scene").html(data);
			});

		});
	});
// clique pour validé le choix
	function validatedColor(div){
		div.classList.add("div-selection-color");
		setTimeout(() => {
			div.classList.remove("div-selection-color");
		}, 2000);
	}
</script>
<? } ?>