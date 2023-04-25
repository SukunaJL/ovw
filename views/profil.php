<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require './layout.php';
require '../class/USERS.php';


$t = HEROES::getAllImagesHeroes();
DEBUG::printr($t);



?>
<style>
	.block-profil {
		width: 30em;
		height: 25em;
		background: silver;
		padding: 1em;
		margin: auto;
		border: 5px groove dimgrey;
		border-radius: 1em;
		margin-top: 5em;
		box-shadow: 0 0 5.25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 5rem black;

		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
	.block-profil input {
		height:2em;
		width: 70%;
		border: 2px solid grey;
		border-radius: 0.3em;
		padding:0.5em;
		font-size: 1em;
	}
	h1 {
		text-align: center;
		margin-top: 1em;
		color: white;
	}
	.error {
		color: red;
		font-weight: bold;
		font-size: 1.2em;
		margin-bottom: 1em;
	}
</style>
<h1>Profil</h1>

<div class="block-profil">


	


</div>
