<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/MAPS.php';
require '../views/layout.php';

if(!isset($_SESSION['email']) || !$_SESSION['isAdmin']) {
	echo '<meta http-equiv="refresh" content="0;URL=http://www.sitetest.local/ovw/views/index.php">';
} else {

?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" crossorigin="anonymous">
<style>
	article {
		
		padding-top: 2em;
	}
	.form-add-map {
		font-size: 1.2em;
		margin-top: 1.5em;
		/* width: 100%; */
		height: 25em;
		background: linear-gradient(#6a84a0, #e5e5f0);
		border: 1px solid black;
		border-radius: 2em;

		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}
	h1 {
		/* margin-top: 2em; */
		margin-bottom: 0;
		text-align: center;
	}
	form  {
		padding: 1.5em;
	}
	form > div  {
		padding: 1.5em;
	}
	.block-radio > div {
		padding: 0.5em;
	}
	.radio-type-maps {
		padding: 0.5em;
		margin: 0.5em;
		border: 1px solid transparent;
		border-radius: 2em;
		background: radial-gradient(skyblue, transparent);
	}
	.radio-type-maps:hover {
		color: white;
		cursor: pointer;
	}
	input[type="radio"] {
		display: none;
	}
	input[type="radio"]:checked + label {
		border: 1px solid white;
	}
	.link-info-type {
		font-size: 0.7em;
		color: deepskyblue;
		font-weight: bold;
	}
	form button {
		width: 15%;
		border-radius: 1em;
		cursor: pointer;
		border: 1px solid deepskyblue;
		margin: auto;
		padding: 0.5em;
		font-weight: bold;
	}
	form button:hover {
		border: 1px solid black;
		background: lightblue;

	}

	.img-file {
		width: 20em;
		border-radius: 0.2em;
		border: 1px solid black;
	}
	#preview {
		/* background: green; */
		width: 20em;
		height: 10em;
	}
	.block-top {

		width: 95%;

		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: space-between;
	}
	.block-top-left {
		height: 8em;

		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: space-between;
	}
	.block-top-left > div{
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	.block-top-left > div > label {
		padding-bottom: 0.5em;
	}
	input[type="text"] {
		border: none;
		border-bottom: 1px solid black;
		border-radius: 0.2em;
	}
	.valided {
		background: linear-gradient(darkgreen, #ddffdd );
	}
	.valided div {
		margin: auto;
		color:greenyellow;
		font-weight:bold;
	}
	.refused {
		background: linear-gradient(darkred, #ffd6db );
	}
	.refused div {
		margin: auto;
		color:darkred;
		font-weight:bold;
	}
	.add-new-map {
		color: white;
		font-weight: bold;
		text-decoration: none;
	}
</style>


<article>
<?
		if(isset($_POST['add_map'])){

			$m = new MAPS();
			$result = $m->addNewMap(
				$_POST['name_new_map'],
				$_POST['type_maps'],
				$_FILES['avatar']['name'],
				$_FILES['plan']['name']
			);

			move_uploaded_file($_FILES['avatar']['tmp_name'], '../public/maps/'.$_FILES['avatar']['name']);
			move_uploaded_file($_FILES['plan']['tmp_name'], '../public/maps/'.$_FILES['plan']['name']);
			
			if($result) { ?>
			 	<a class="add-new-map" href="http://www.sitetest.local/ovw/views/add_map.php"><i class="fas fa-chevron-circle-left"></i> Retour sur le formulaire d'ajout de carte</a>
				<div class="valided form-add-map">
					<div>
						NOUVELLE CARTE AJOUTÉE ! ALLEZ LA VOIR DANS LA LISTE DES CARTES !
					</div>
				</div>
			<? } else { ?>
				<a class="add-new-map" href="http://www.sitetest.local/ovw/views/add_map.php"><i class="fas fa-chevron-circle-left"></i> Retour sur le formulaire d'ajout de carte</a>
				<div class="refused form-add-map">
					<div>
						UNE ERREUR EST SURVENUE.
					</div>
				</div>
			<? }
		} else {
;?>

		<h1>AJOUTER UNE NOUVELLE CARTE !</h1>
		<form class="form-add-map" method="POST" enctype="multipart/form-data">

			<div class="block-top">

				<div class="block-top-left">
					<div>
						<label>Nom de la carte :</label>
						<input type="text" name="name_new_map" required>
					</div>
					
					<div>
						<label for="upload">Image de la carte :</label>
						<input id="upload" onchange="handleFiles(files)" type="file" name="avatar" required>
					</div>
				</div>

				<span id="preview"></span>
			</div>
			<div>
				<label>Plan de la carte (facultatif) :</label>
				<input type="file" name="plan">
			</div>


			<div class="block-radio">
				<div>
					Selectionnez un type de carte :
				</div>
				<div>
					<? $allTypesMaps = MAPS_TYPES::getsAllTypesMaps();
					foreach($allTypesMaps as $typeMaps) { ?>
						<input type="radio" id="<?= $typeMaps->id_type_map; ?>" name="type_maps" value="<?= $typeMaps->id_type_map; ?>" required>
						<label class="radio-type-maps" for="<?= $typeMaps->id_type_map; ?>">
							<?= $typeMaps->name_type; ?>
						</label>
					<? } ?>
				</div>
				<a class="link-info-type" href="http://www.sitetest.local/ovw/views/info_type_map.php">En savoir plus sur les differents types de carte >></a>
			</div>

			<button name="add_map" type="submit">Ajouter</button>

		</form>
		<? } ?>
</article>

<script>
function handleFiles(files) {
	var imageType = /^image\//;
	for (var i = 0; i < files.length; i++) {
		var file = files[i];
		if (!imageType.test(file.type)) {
			alert("veuillez sélectionner une image");
		}else{
			if(i == 0){
				preview.innerHTML = '';
			}
			var img = document.createElement("img");
			img.classList.add("img-file");
			img.file = file;
			preview.appendChild(img); 
			var reader = new FileReader();
			reader.onload = ( function(aImg) { 
				return function(e) { 
					aImg.src = e.target.result; 
				}; 
			})(img);
			reader.readAsDataURL(file);
		}
	}
}
 </script>
<? } ?>