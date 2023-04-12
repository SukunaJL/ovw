<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

class ROLES {
	function __construct($roleID = NULL, $roleName = NULL) {
		if($roleID){
			$this->ID = (int)$roleID;
		} else {
			$this->ID = null;
		}

		$this->roleName = $roleName;

		if ($this->ID) {
			$this->load();
		}
	}

	static function getLoadSQL($roleID){
		$sql = "SELECT
					id_role AS ID,
					role_name
				FROM
					".DBNAME_PS."_ovw_roles
				WHERE
					".DBNAME_PS."_ovw_roles.id_role = ".(int)$roleID;
		return $sql;
	}
	public function load($roleInfos = NULL) {
		if (!$roleInfos) {
			$sql = static::getLoadSQL($this->ID);
			$roleInfos = DB::get($sql);
		}
		
		$this->ID 		= (int)$roleInfos->ID;
		$this->roleName = $roleInfos->role_name;
	}
//____________________________________________________________

	static function getsAllRoles(){
		$sql ="	SELECT
					role_name
				FROM
					".DBNAME_PS."_ovw_roles";

		$result = DB::get($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}



}