<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

if(!isset($_SESSION['email']) || !$_SESSION['isAdmin']) {
	echo '<meta http-equiv="refresh" content="0;URL=http://www.sitetest.local/ovw/views/index.php">';
}

require '../class/MAPS.php';
require '../views/layout.php';

?>
<style>
	body {
		width: 85%;
	}
	.block-map-edit {
		margin-top: 1.5em;
		width: 100%;
		height: 40em;
		background: linear-gradient(#6a84a0, #e5e5f0);
		border: 2px solid black;
		border-radius: 2em;

		display: flex;
		flex-direction: column;
	}
	.block-list-maps {
		display: flex;
		flex-direction: row;
		width: 100%;
		justify-content: space-around;
	}
	.block-list-maps > div {
		/* border: 1px solid red; */

		width: auto;
		/* padding: 0.5em;
		margin: 0.5em; */
	}
	.block-escort {
		margin-left: 0;
		padding-left: 0;
	}
	.block-other {
		margin-right: 2em;
	}
	.block-list-maps > div div {
		text-align: center;
		font-weight: bold;
		font-size: 1.6em;
		color: lightblue;
	}
	li {
		list-style-type: "✪ ";
		font-size: 1.043em;
	}
	.block-list-maps a {
		text-decoration: none;
		color: black;
	}
	.block-list-maps a:hover {
		color: orangered;
		text-shadow: 0 0 .25rem gold, -.125rem -.125rem 1rem gold, .125rem .125rem 1rem gold;
	}
	#add-new-map {
		border-bottom: 1px solid red;
		border-right: 1px solid red;
		border-radius: 2em 0 2em 0;
		background: orangered;
		color: white;
		display: flex;
		align-items: center;
		justify-content:center;
		width: 15em;
		height: 1.5em;
		padding: 0.3em;
		text-decoration: none;
		font-weight: bold;
	}
	#add-new-map:hover {
		background: black;
		color: orangered;
	}
	.block-modif-maps {
		border-top: 8px groove lightslategray;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100%;
	}
	h2 {
		font-size: 2em;
		margin: center;
		text-align: center;
		font-style: italic;
		color: orangered;
	}
	h2 i {
		padding: 0 1em;
	}
	.form-update-map {
		display: flex;
		flex-direction: column;
		align-items: center;
		width: 95%;
	}
	.form-update-map > div {
		display: flex;
		flex-direction: row;
		width: 100%;
		align-items: center;
		justify-content: space-around;
	}
	.form-update-map > div > div {
		display: flex;
		flex-direction: column;
		width: auto;
		text-align: center;
	}
	.link-info-type {
		font-size: 0.7em;
		color: deepskyblue;
		font-weight: bold;
	}
	.margin-top-05 {
		margin-top: 0.5em;
	}
	.form-update-map img {
		width: auto;
		max-width: 10em;
		max-height: 7em;
		margin-top: 0.5em;
		border: 1px solid grey;
		border-radius: 0.2em;
	}
	.form-update-map img:hover {
		scale: 3;
		transform: translate(-10px, -2em);
	}
	.valided {
		font-size: 2em;
		font-weight: bold;
		color: green;
	}
	.failed {
		font-size: 2em;
		font-weight: bold;
		color: red;
	}
</style>


<div class="block-map-edit">

	<div>
		<a id="add-new-map" href="http://www.sitetest.local/ovw/views/add_map.php"> + Ajouter nouvelle carte içi !</a>
	</div>


	<? $allMaps = MAPS::getsAllMaps();
	   $allTypeMaps = MAPS_TYPES::getsAllTypesMaps();
	?>
	<div class="block-list-maps">

					<!----- ESCORT ----->
		<div class="block-escort">
			<div>
				<?= $allTypeMaps[0]->name_type; ?>
			</div>

			<ul>
				<? foreach($allMaps as $map) { 
					if($map->id_type_map == 1) { ?>
						<a href="http://www.sitetest.local/ovw/views/edit_maps.php?id_map=<?= $map->id_map; ?>"><li><?= $map->name; ?></li></a>
					<? };
				}; ?>
			</ul>
		</div>

					<!----- HYBRID ----->
		<div>
			<div>
				<?= $allTypeMaps[1]->name_type; ?>
			</div>

			<ul>
				<? foreach($allMaps as $map) { 
					if($map->id_type_map == 2) { ?>
						<a href="http://www.sitetest.local/ovw/views/edit_maps.php?id_map=<?= $map->id_map; ?>"><li><?= $map->name; ?></li></a>
					<? };
				}; ?>
			</ul>
		</div>

					<!----- CONTROL ----->
		<div>
			<div>
				<?= $allTypeMaps[2]->name_type; ?>
			</div>

			<ul>
				<? foreach($allMaps as $map) { 
					if($map->id_type_map == 3) { ?>
						<a href="http://www.sitetest.local/ovw/views/edit_maps.php?id_map=<?= $map->id_map; ?>"><li><?= $map->name; ?></li></a>
					<? };
				}; ?>
			</ul>
		</div>

					<!----- PUSH ----->
		<div>
			<div>
				<?= $allTypeMaps[3]->name_type; ?>
			</div>

			<ul>
				<? foreach($allMaps as $map) { 
					if($map->id_type_map == 4) { ?>
						<a href="http://www.sitetest.local/ovw/views/edit_maps.php?id_map=<?= $map->id_map; ?>"><li><?= $map->name; ?></li></a>
					<? };
				}; ?>
			</ul>
		</div>

					<!----- ASSAULT ----->
		<div>
			<div>
				<?= $allTypeMaps[4]->name_type; ?>
			</div>

			<ul>
				<? foreach($allMaps as $map) { 
					if($map->id_type_map == 5) { ?>
						<a href="http://www.sitetest.local/ovw/views/edit_maps.php?id_map=<?= $map->id_map; ?>"><li><?= $map->name; ?></li></a>
					<? };
				}; ?>
			</ul>
		</div>

					<!----- AUTRES ----->
		<div class="block-other">
			<div>
				<?= $allTypeMaps[5]->name_type; ?>
			</div>

			<ul>
				<? foreach($allMaps as $map) { 
					if($map->id_type_map == 6) { ?>
						<a href="http://www.sitetest.local/ovw/views/edit_maps.php?id_map=<?= $map->id_map; ?>"><li><?= $map->name; ?></li></a>
					<? };
				}; ?>
			</ul>
		</div>


	</div>

	<div class="block-modif-maps">
		<? if(isset($_GET) && !empty($_GET)){
			$map = new MAPS($_GET['id_map']);

			


			
			if(isset($_POST['update_map'])){

				$result = $map->updateMap(
					$_POST['name_update_map'],
					$_POST['update_type_map'],
					$_FILES['avatar']['name'],
					$_FILES['plan']['name']
				);
	
				move_uploaded_file($_FILES['avatar']['tmp_name'], '../public/maps/'.$_FILES['avatar']['name']);
				move_uploaded_file($_FILES['plan']['tmp_name'], '../public/maps/'.$_FILES['plan']['name']);
				
				if($result) { ?>
						<div class="valided">
							La carte à bien été modifier !
						</div>
				<? } else { ?>
						<div class="failed">
							UNE ERREUR EST SURVENUE.
						</div>
				<? }
			} else {





			?>
			<form class="form-update-map" method="POST" enctype="multipart/form-data">
				<div>
					<div>
						<label>Nom de la carte :</label>
						<input type="text" name="name_update_map" value="<?= $map->name; ?>" required>
					

						<div class="margin-top-05">
							Selectionnez un type de carte :
						</div>

						<select name="update_type_map">
							<? $allTypesMaps = MAPS_TYPES::getsAllTypesMaps();
							foreach($allTypesMaps as $typeMaps) { 
								$selected =  $typeMaps->id_type_map == $map->typeMapsID ? "selected" : ""; ?>
								<option value="<?= $typeMaps->id_type_map; ?>" <?= $selected; ?>>
									<?= $typeMaps->name_type; ?>
								</option>
							<? } ?>
						</select>

						<a class="link-info-type" href="http://www.sitetest.local/ovw/views/info_type_map.php">En savoir plus sur les differents types de carte >></a>
					</div>

					<div>
						<label>Image de la carte :</label>
						<input type="file" name="avatar"  value="../public/maps/'.<?= $map->avatar; ?>'">

						<label class="margin-top-05">Plan de la carte (facultatif) :</label>
						<input type="file" name="plan" value="<?= $map->plan; ?>">
					</div>
					
						<div>
							<div>
								Aperçu de l'image actuel :
							</div>
							<div>
								<img src="../public/maps/<?= $map->avatar; ?>" alt="<?= $map->name; ?>"/>
							</div>
						</div>

						<div>
							<div>
								Aperçu du plan actuel :
							</div>
							<div>
								<? if(!empty($map->plan)) { ?>
									<img src="../public/maps/<?= $map->plan; ?>" alt="<?= $map->name; ?>"/>
								<? } else { ?>
									<div>Pas de plan.</div>
								<? } ?>
							</div>
						</div>
					
				</div>

				<button type="submit" name="update_map">Modifier</button>
			</form>




		<? } } else { ?>
			<h2>
				<i class="fas fa-arrow-alt-circle-up"></i>Sélectionnez une carte à modifier<i class="fas fa-arrow-alt-circle-up"></i>
			</h2>
		<? } ?>



	</div>


	

</div>