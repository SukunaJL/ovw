<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

class SKILLS {
	function __construct(
			$skillID  = NULL
		){

		if($skillID){
			$this->ID = (int)$skillID;
		} else {
			$this->ID = null;
		}

		if ($this->ID) {
			$this->load();
		}
	}

	static function getLoadSQL($skillID){
		$sql = "SELECT
					id_skill as ID,
					id_hero,
					name_skill,
					img_skill,
					description_skill,
					ulti,
					weapon,
					skill,
					passif
				FROM
					".DBNAME_PS."_ovw_skills
				WHERE
					".DBNAME_PS."_ovw_skills.id_skill = ".(int)$skillID;
		return $sql;
	}
	public function load($skillInfos = NULL) {
		if (!$skillInfos) {
			$sql = static::getLoadSQL($this->ID);
			$skillInfos = DB::get($sql);
		}
		
		$this->ID 			 = (int)$skillInfos->ID;

		$this->id_hero 		 = (int)$skillInfos->id_hero;
		$this->name_skill 	 	 = $skillInfos->name_skill;
		$this->img_skill 		 = $skillInfos->img_skill;
		$this->description_skill = $skillInfos->description_skill;
		$this->ulti 		 = (int)$skillInfos->ulti;
		$this->weapon 		 = (int)$skillInfos->weapon;
		$this->skill 		 = (int)$skillInfos->skill;
		$this->passif 		 = (int)$skillInfos->passif;
		
	}
//*_________________________________
	public function addSkills(
		$heroID, $nameSkill, $imgSkill, $descriptionSkill, $isUlti, $isWeapon, $isSkill, $isPassif
	){
		$sql = "INSERT INTO
					".DBNAME_PS."_ovw_skills
				SET
					id_hero = ".(int)$heroID.",
					name_skill = '".DB::escape($nameSkill)."',
					img_skill = '".DB::escape($imgSkill)."',
					description_skill = '".DB::escape($descriptionSkill)."',
					ulti = ".(int)$isUlti.",
					weapon = ".(int)$isWeapon.",
					skill = ".(int)$isSkill.",
					passif = ".(int)$isPassif;
		
		$result = DB::insert($sql);
		// DEBUG::printr($sql);
		

		if($result){
			return true;
		} else {
			return false;
		}

	}
	

	static function getSkillsByHeroID($heroID){
		$sql = "SELECT 
					id_skill,
					name_skill,
					img_skill,
					description_skill,
					CASE
						WHEN passif = 1 THEN 'Passif'
						WHEN weapon = 1 THEN 'Arme'
						WHEN skill  = 1 THEN 'Spell'
						WHEN ulti   = 1 THEN 'Ultime'
					END AS skill_type 
				FROM ".DBNAME_PS."_ovw_skills
				WHERE (ulti = 1 OR weapon = 1 OR skill = 1 OR passif = 1) 
				AND id_hero = ".(int)$heroID."
				ORDER BY 
				  CASE 
				    WHEN passif = 1 THEN 1 
				    WHEN weapon = 1 THEN 2 
				    WHEN skill = 1 THEN 3 
				    WHEN ulti = 1 THEN 4 
				  END ASC";



		$result = DB::gets($sql);
		// DEBUG::printr($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

	static function deleteSkillByID($skillID){
		$sql = "DELETE FROM 
					".DBNAME_PS."_ovw_skills
				WHERE 
					id_skill = ".(int)$skillID;
		$result = DB::delete($sql);

		if($result){
			return true;
		} else {
			return false;
		}
	}

	
}