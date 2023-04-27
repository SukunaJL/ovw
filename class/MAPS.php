<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

class MAPS {
	public function __construct($mapsID = NULL, $name = NULL, $typeMapsID = NULL, $avatar = NULL, $plan = NULL) {
		if($mapsID){
			$this->ID = (int)$mapsID;
		} else {
			$this->ID = NULL;
		}

		$this->name 	  = $name;
		$this->typeMapsID = (int)$typeMapsID;
		$this->avatar 	  = $avatar;
		$this->plan 	  = $plan;

		if($this->ID){
			$this->load();
		}
	}

	static function getLoadSQL($mapsID){
		$sql = "SELECT
					id_map AS ID,
					name,
					id_type_map,
					avatar,
					plan
				FROM
					".DBNAME_PS."_ovw_maps
				WHERE
					".DBNAME_PS."_ovw_maps.id_map = ".(int)$mapsID;
		return $sql;
	}
	public function load($mapInfos = NULL){
		if(!$mapInfos) {
			$sql = static::getLoadSQL($this->ID);
			$mapInfos = DB::get($sql);	
		}

		$this->ID 		  = (int)$mapInfos->ID;
		$this->name 	  = $mapInfos->name;
		$this->typeMapsID = (int)$mapInfos->id_type_map;
		$this->avatar	  = $mapInfos->avatar;
		$this->plan		  = $mapInfos->plan;
	}
//*_________________________________

	public function addNewMap($name, $typeMapsID, $avatar = NULL, $plan = NULL){
		$sql ="	INSERT INTO
					".DBNAME_PS."_ovw_maps
				SET
					name 		= '".DB::escape($name)."',
					id_type_map = ".(int)$typeMapsID."";

		if(!empty($avatar)) {
			$sql .=", avatar	= '$avatar'";
		}
		if(!empty($plan)) {
			$sql .=", plan	= '$plan'";
		}

		$result = DB::insert($sql);
		
		if($result){
			return true;
		} else {
			return false;
		}
	}

	public function updateMap($name, $typeMapsID, $avatar = NULL, $plan = NULL){
		$sql ="	UPDATE
					".DBNAME_PS."_ovw_maps
				SET
					name 		= '".DB::escape($name)."',
					id_type_map = ".(int)$typeMapsID."";

		if(!empty($avatar)) {
			$sql .=", avatar	= '$avatar'";
		}
		if(!empty($plan)) {
			$sql .=", avatar	= '$plan'";
		}

		$sql .="
				WHERE
					id_map = ".(int)$this->ID;

		$result = DB::update($sql);
		
		if($result){
			return true;
		} else {
			return false;
		}
	}

	public function getMap(){
		$sql ="	SELECT
					id_map,
					name,
					id_type_map,
					avatar,
					plan,
					".DBNAME_PS."_ovw_type_maps.name_type
				FROM
					".DBNAME_PS."_ovw_maps
				INNER JOIN 
					".DBNAME_PS."_ovw_type_maps
				ON
					".DBNAME_PS."_ovw_maps.id_type_map = ".DBNAME_PS."_ovw_type_maps.id_type_map
				WHERE
					id_map = ".(int)$this->ID;
		$result = DB::get($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

	static function getsAllMaps(){
		$sql ="	SELECT
					id_map,
					name,
					".DBNAME_PS."_ovw_maps.id_type_map,
					avatar,
					plan,
					".DBNAME_PS."_ovw_type_maps.name_type
				FROM
					".DBNAME_PS."_ovw_maps
				INNER JOIN 
					".DBNAME_PS."_ovw_type_maps
				ON
					".DBNAME_PS."_ovw_maps.id_type_map = ".DBNAME_PS."_ovw_type_maps.id_type_map
				ORDER BY 
					".DBNAME_PS."_ovw_maps.id_type_map";

		$result = DB::gets($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

	static function getsAllMapsByType($typeID){
		$sql ="	SELECT
					id_map,
					name,
					".DBNAME_PS."_ovw_maps.id_type_map,
					avatar,
					plan,
					".DBNAME_PS."_ovw_type_maps.name_type
				FROM
					".DBNAME_PS."_ovw_maps
				INNER JOIN 
					".DBNAME_PS."_ovw_type_maps
				ON
					".DBNAME_PS."_ovw_maps.id_type_map = ".DBNAME_PS."_ovw_type_maps.id_type_map
				WHERE
					".DBNAME_PS."_ovw_maps.id_type_map = ".$typeID."";

		$result = DB::gets($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

	static function getAllImagesMaps(){
		$sql ="	SELECT
					avatar
				FROM
					".DBNAME_PS."_ovw_maps";
				
		$result = DB::gets($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

}

//*_________________________________

class MAPS_TYPES {
	public function __construct($typeMapID = NULL, $nameTypeMap = NULL) {
		if($typeMapID){
			$this->ID = (int)$typeMapID;
		} else {
			$this->ID = NULL;
		}

		$this->nameTypeMap 	  = $nameTypeMap;

		if($this->ID){
			$this->load();
		}
	}

	static function getLoadSQL($typeMapID){
		$sql = "SELECT
					id_type_map AS ID,
					name_type
				FROM
					".DBNAME_PS."_ovw_type_maps
				WHERE
					".DBNAME_PS."_ovw_type_maps.id_type_map = ".(int)$typeMapID;
		return $sql;
	}
	public function load($mapTypeInfos = NULL){
		if(!$mapTypeInfos) {
			$sql = static::getLoadSQL($this->ID);
			$mapTypeInfos = DB::get($sql);	
		}

		$this->ID 		   = (int)$mapTypeInfos->ID;
		$this->nameTypeMap = $mapTypeInfos->name_type;
	}
	//*_________________________________


	static function getsAllTypesMaps(){
		$sql ="	SELECT
					id_type_map,
					name_type
				FROM
					".DBNAME_PS."_ovw_type_maps
				ORDER BY 
					id_type_map";

		$result = DB::gets($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}


}