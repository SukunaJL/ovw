<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

class COUNTERS {
	function __construct($counterID = NULL, $heroID = NULL, $VsHeroID = NULL, $isStrong = 0) {
		if($counterID){
			$this->ID = (int)$counterID;
		} else {
			$this->ID = null;
		}

		$this->heroID = $heroID;
		$this->VsHeroID = $VsHeroID;
		$this->isStrong = $isStrong;

		if ($this->ID) {
			$this->load();
		}
	}

	static function getLoadSQL($counterID){
		$sql = "SELECT
					id_counter AS ID,
					id_hero,
					id_hero_vs,
					is_strong
				FROM
					".DBNAME_PS."_ovw_counters
				WHERE
					".DBNAME_PS."_ovw_counters.id_counter = ".(int)$counterID;
		return $sql;
	}
	public function load($counterInfos = NULL) {
		if (!$counterInfos) {
			$sql = static::getLoadSQL($this->ID);
			$roleInfos = DB::get($sql);
		}
		
		$this->ID 		= (int)$counterInfos->ID;
		$this->heroID 	= (int)$counterInfos->id_hero;
		$this->VsHeroID = (int)$counterInfos->id_hero_vs;
		$this->isStrong = (int)$counterInfos->is_strong;
	}
//____________________________________________________________

	static function addNewCounter($heroID, $VsHeroID){
		$sql ="	INSERT INTO
					".DBNAME_PS."_ovw_counters
				SET
					id_hero 	 = ".(int)$heroID.",
					id_hero_vs 	 = ".(int)$VsHeroID.",
					is_strong 	 = 1";

		$result = DB::insert($sql);
		
		if($result){
			return true;
		} else {
			return false;
		}
	}

	static function getCounterStrongByHero($heroID){
		$sql ="	SELECT
					id_counter,
					id_hero,
					id_hero_vs,
					is_strong
				FROM
					".DBNAME_PS."_ovw_counters
				WHERE
					is_strong = 1
				AND
					id_hero = ".(int)$heroID;
				
		$result = DB::gets($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

	static function getCounterWeakByHero($vsHeroID){
		$sql ="	SELECT
					id_counter,
					id_hero,
					id_hero_vs,
					is_strong
				FROM
					".DBNAME_PS."_ovw_counters
				WHERE
					is_strong = 1
				AND
					id_hero_vs = ".(int)$vsHeroID;
				
		$result = DB::gets($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

	public function deleteCounter() {

			$sql = "DELETE FROM 
					".DBNAME_PS."_ovw_counters
				WHERE
				id_counter =".$this->ID;

			DB::delete($sql);
			return true;
	}

	static function deleteCounterByHeroIdAndVsHeroId($heroID, $vsHeroID) {

		$sql = "DELETE FROM 
				".DBNAME_PS."_ovw_counters
			WHERE
				is_strong = 1
			AND
				id_hero    = ".(int)$heroID."
			AND
				id_hero_vs = ".(int)$vsHeroID;

		DB::delete($sql);
		return true;
	}


}