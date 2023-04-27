<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

if(!isset($_SESSION['email']) || !$_SESSION['isSuperAdmin']) {
	echo '<meta http-equiv="refresh" content="0;URL=http://www.sitetest.local/ovw/views/index.php">';
}

require '../views/layout.php';
require '../class/USERS.php';

// mettre ou retirer un utilisateur en admin
if(isset($_GET['user_id']) && isset($_GET['is_admin'])) {
	$user = new USERS($_GET['user_id']);
	$updateAdmin = $user->updateAdmin($_GET['user_id'], $_GET['is_admin']);
}
// mettre ou retirer un utilisateur en super-admin
if(isset($_GET['user_id']) && isset($_GET['is_super_admin'])) {
	$user = new USERS($_GET['user_id']);
	$updateAdmin = $user->updateSuperAdmin($_GET['user_id'], $_GET['is_super_admin']);
}
// supprimer un utilisateur
if(isset($_GET['id_user_delete'])) {
	$user = new USERS($_GET['id_user_delete']);
	$updateAdmin = $user->deleteAccount($_GET['id_user_delete']);
}
?>
<style>
	/* SCROLL-BAR */
	/* *::-webkit-scrollbar {
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
	} */

	table {
		width: 100%;
		/* margin: 0; */
		margin-top: 1em;
		font-family: "Poppins", sans-serif;
		/* border-collapse: separate; */
		border-spacing: 0;

		background-color: #828c96;
		color: #dcdcdc;
		border-radius: 0.5em;
		box-shadow: 0 0 .25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 1rem black;
	}
	thead, tbody { 
		display: block;
	}
	thead {
		/* width:99.2%; */
		width:100%;
		/* margin-right: 0.5em; */
	}
	tbody {
		/* overflow-y: scroll; */
		width:100%;
		min-height: 30em;

		/* scrollbar-width: 2%; */
	}
	thead tr {
		border-radius:5.5em ;
	}
	th:nth-child(1) {
		border-radius:0.5em 0.2em 0.2em 0.2em;
	}
	th:nth-child(1), td:nth-child(1) {
		width: 10%;
	}
	th:nth-child(2), td:nth-child(2) {
		width: 35%;
	}
	th:nth-child(3), td:nth-child(3) {
		width: 35%;
	}
	th:nth-child(4), td:nth-child(4) {
		width: 10%;
	}
	th:nth-child(5), td:nth-child(5) {
		width: 10%;
	}
	th:nth-child(6), td:nth-child(6) {
		width: 5%;
	}
	th:nth-child(6) {
		border-radius:0.2em 0.5em 0.2em 0.2em;
	}

	th, td {
		/* padding: 0.55em; */
		/* text-align: left; */
		text-align: center;
		border-radius: 0.2em;
		padding: 0.5em 0;
		border: 1px solid silver;

		display: flex;
		justify-content: center;
		align-items: center;
	}
	th {
		background-color: #4a4e69;
		font-weight: bold;
		text-transform: uppercase;
		
		min-height: 3em;
		margin: auto;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	tr {
		display: flex;
		width: 100%;
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
	caption {
		font-size: 1.5em;
		font-weight: bold;
		text-align: center;
		margin: 10px;
		color: white;
	}

	.socle {
		display: flex;
		justify-content: center;
		align-items: center;

		width : 2em;
		height: 2em;
		border: 2px outset grey;
		border-radius: 100%;

		background: dimgrey;
	}
	.socle:hover {
		border: 2px inset grey;
		cursor: pointer;
	}
	.led {
		display: flex;
		justify-content: center;
		align-items: center;

		border: 5px double dimgrey;
		border-radius: 100%;
		padding: 0.5em;
		
		background: radial-gradient(black, transparent);
		box-shadow: 0 0 5.25rem black, -.125rem -.125rem 1rem black, .125rem .125rem 5rem black;
	}
	.light-green {
		background: lime;
		box-shadow: 0 0 5.25rem lime, -.125rem -.125rem 1rem lime, .125rem .125rem 5rem lime;
	}
</style>

<table>
	<caption>Liste des utilisateurs</caption>
	<thead>
		<tr>
			<th>Numéro</th>
			<th>Email</th>
			<th>Pseudo</th>
			<th>Admin</th>
			<th>Super-Admin</th>
			<th><i class="fas fa-trash-alt"></i></th>
		</tr>
	</thead>
	<tbody>
		<? $allUsers = USERS::allUsers();
		// DEBUG::printr($heroSkillsList);
		if($allUsers) {
			foreach($allUsers as $user){ 
				// DEBUG::printr($heroSkill);
				?>
				<tr>
					<td><?= $user->id_user; ?></td>
					<td><?= $user->mail; ?></td>
					<td><?= $user->pseudo; ?></td>
					<td>
						<div class="socle">
							<a href="http://www.sitetest.local/ovw/views/superadmin.php?user_id=<?= $user->id_user; ?>&is_admin=<?= $user->is_admin ? 0 : 1 ; ?>"
							class="led <?= $user->is_admin ? "light-green" : "" ; ?>"></a>
						</div>
					</td>
					<td>
						<div class="socle">
							<a href="http://www.sitetest.local/ovw/views/superadmin.php?user_id=<?= $user->id_user; ?>&is_super_admin=<?= $user->is_super_admin ? 0 : 1 ; ?>"
							class="led <?= $user->is_super_admin ? "light-green" : "" ; ?>"></a>
						</div>	
					</td>
					<td>
						<a class="link-delete" 
						href="http://www.sitetest.local/ovw/views/superadmin.php?id_user_delete=<?= $user->id_user; ?>">
							<i class="fas fa-trash-alt"></i>
						</a>
					</td>
				</tr>
			<? } 
		} ?>
	</tbody>
</table>