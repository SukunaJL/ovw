<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";
require '../class/SKILLS.php';
require '../class/ROLES.php';
require '../class/MAPS.php';

class HEROES {
	function __construct(
			$heroID 		= NULL, 
			$name 			= NULL, 
			$origin 		= NULL, 
			$trueName 		= NULL, 
			$age 			= NULL, 
			$metier 		= NULL, 
			$particularite 	= NULL, 
			$replique 		= NULL,
			$affiliation 	= NULL,
			$mapAssigned	= NULL,
			$dateAddGame 	= NULL, 
			$roleID 		= NULL,
			$avatar 		= NULL,
			$fanart			= NULL,
			$pixel			= NULL,
			$cute			= NULL
		){

		if($heroID){
			$this->ID = (int)$heroID;
		} else {
			$this->ID = null;
		}

		$this->name 		 = $name;
		$this->origin 		 = $origin;
		$this->trueName		 = $trueName;
		$this->age			 = (int)$age;
		$this->metier		 = $metier;
		$this->particularite = $particularite;
		$this->replique 	 = $replique;
		$this->affiliation	 = $affiliation;
		$this->mapAssigned	 = $mapAssigned;
		$this->dateAddGame	 = $dateAddGame;
		$this->roleID		 = (int)$roleID;
		$this->avatar		 = $avatar;
		$this->fanart		 = $fanart;
		$this->pixel		 = $pixel;
		$this->cute			 = $cute;

		if ($this->ID) {
			$this->load();
		}
	}

	static function getLoadSQL($heroID){
		$sql = "SELECT
					id_hero AS ID,
					name,
					origin,
					true_name,
					age,
					job,
					peculiarity,
					replica,
					membership,
					id_map_assigned,
					date_addgame,
					id_role,
					avatar,
					fanart,
					pixel,
					cute
				FROM
					".DBNAME_PS."_ovw_heroes
				WHERE
					".DBNAME_PS."_ovw_heroes.id_hero = ".(int)$heroID;
		return $sql;
	}
	public function load($heroInfos = NULL) {
		if (!$heroInfos) {
			$sql = static::getLoadSQL($this->ID);
			$heroInfos = DB::get($sql);
		}
		
		$this->ID 			 = (int)$heroInfos->ID;
		$this->name 		 = $heroInfos->name;
		$this->origin 		 = $heroInfos->origin;
		$this->trueName		 = $heroInfos->true_name;
		$this->age			 = $heroInfos->age;
		$this->metier		 = $heroInfos->job;
		$this->particularite = $heroInfos->peculiarity;
		$this->replique		 = $heroInfos->replica;
		$this->affiliation	 = $heroInfos->membership;

		$this->mapAssigned	 = new MAPS((int)$heroInfos->id_map_assigned);

		$this->dateAddGame	 = $heroInfos->date_addgame;

		$this->roleID 		 = new ROLES((int)$heroInfos->id_role);

		$this->avatar		 = $heroInfos->avatar;
		$this->fanart		 = $heroInfos->fanart;

		$this->pixel		 = $heroInfos->pixel;
		$this->cute			 = $heroInfos->cute;

		$this->skills = SKILLS::getSkillsByHeroID((int)$heroInfos->ID);
	}
//*_________________________________

	public function addNewHero($name, $origin, $trueName, $age, $metier, $particularite, $replique, $affiliation, $mapID, $dateAddGame, $roleID, $avatar = NULL){
		$sql ="	INSERT INTO
					".DBNAME_PS."_ovw_heroes
				SET
					name 		 = '".DB::escape($name)."',
					origin 		 = '".DB::escape($origin)."',
					true_name 	 = '".DB::escape($trueName)."',
					age			 = '".DB::escape($age)."',
					job			 = '".DB::escape($metier)."',
					peculiarity  = '".DB::escape($particularite)."',
					replica		 = '".DB::escape($replique)."',
					membership	 = '".DB::escape($affiliation)."',
					id_map_assigned	 = ".(int)$mapID.",
					date_addgame = '$dateAddGame',
					id_role 	 = ".(int)$roleID."";

		if(!empty($avatar)) {
			$sql .=", avatar = '$avatar'";
		}

		$result = DB::insert($sql);
		
		if($result){
			return true;
		} else {
			return false;
		}
	}

	public function updateHero(
		$name, $origin, $trueName, $age, $metier, $particularite, $replique, $affiliation, $mapID, $dateAddGame, $roleID, 
		$avatar = NULL, $fanart = NULL, $pixel = NULL, $cute = NULL){
		$sql ="	UPDATE
					".DBNAME_PS."_ovw_heroes
				SET
					name 		 = '".DB::escape($name)."',
					origin 		 = '".DB::escape($origin)."',
					true_name 	 = '".DB::escape($trueName)."',
					age			 = '".DB::escape($age)."',
					job			 = '".DB::escape($metier)."',
					peculiarity  = '".DB::escape($particularite)."',
					replica		 = '".DB::escape($replique)."',
					membership	 = '".DB::escape($affiliation)."',
					id_map_assigned	 = ".(int)$mapID.",
					date_addgame = '$dateAddGame',
					id_role 	 = ".(int)$roleID."";

		if(!empty($avatar)) {
			$sql .=", avatar = '$avatar'";
		}
		if(!empty($fanart)) {
			$sql .=", fanart = '$fanart'";
		}
		if(!empty($pixel)) {
			$sql .=", pixel	 = '$pixel'";
		}
		if(!empty($cute)) {
			$sql .=", cute	 = '$cute'";
		}

		$sql .="
				WHERE
					id_hero = ".(int)$this->ID;

		$result = DB::update($sql);
		
		if($result){
			return true;
		} else {
			return false;
		}
	}

	public function getHero(){
		$sql ="	SELECT
					id_hero,
					name,
					origin,
					true_name,
					age,
					job,
					peculiarity,
					replica,
					membership,
					id_map_assigned,
					date_addgame,
					".DBNAME_PS."_ovw_roles.role_name,
					avatar,
					fanart,
					pixel,
					cute
				FROM
					".DBNAME_PS."_ovw_heroes
				INNER JOIN 
					".DBNAME_PS."_ovw_roles
				ON
					".DBNAME_PS."_ovw_heroes.id_role = ".DBNAME_PS."_ovw_roles.id_role
				WHERE
					id_hero = ".(int)$this->ID;
		$result = DB::get($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

	static function getsAllHeroesInfos(){
		$sql ="	SELECT
					id_hero,
					name,
					origin,
					true_name,
					age,
					job,
					peculiarity,
					replica,
					membership,
					id_map_assigned,
					date_addgame,
					id_role,
					avatar,
					fanart,
					pixel,
					cute
				FROM
					".DBNAME_PS."_ovw_heroes
				ORDER BY name";

		$result = DB::gets($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

	static function getHeroesByRole($roleID){
		$sql ="	SELECT
					id_hero,
					name,
					id_role,
					avatar,
					pixel,
					cute
				FROM
					".DBNAME_PS."_ovw_heroes
				WHERE
					id_role = ".(int)$roleID."
				ORDER BY name";
				
		$result = DB::gets($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}



	
}