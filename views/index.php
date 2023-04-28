<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require './layout.php';


?>
<style>
	body {
		width:90%;
	}
	.index-logo {
		width:  30em;
		height: 30em;
		display: flex;
		justify-content: center;
		align-items: center;
		margin: auto;
		padding: 5em;
		/* background: radial-gradient(white, white, grey, grey); */
	}
	.index-logo img {
		/* border: 1px solid red; */
		/* border-radius: 100%; */
		width: 130%;
		border-radius: 2em;
		border: 0.5em solid black;
		box-shadow: 0 0 5.25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 5rem black;
		filter: brightness(1);
	}
</style>
<div class="index-logo">
	<!-- <img src="./title.png"/> -->
	<img src="../icon_over.gif"/>
</div>