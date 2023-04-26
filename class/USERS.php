<? include_once $_SERVER['DOCUMENT_ROOT']."../devt.loguy.fr/class/include.php";

require '../class/HEROES.php';


class USERS {
	function __construct($heroID = NULL){
		if($heroID){
			$this->ID = (int)$heroID;
		} else {
			$this->ID = null;
		}

		if ($this->ID) {
			$this->load();
		}
	}

	static function getLoadSQL($heroID){
		$sql = "SELECT
					id_user AS ID,
					mail,
					password,
					pseudo,
					is_super_admin,
					is_admin,
					avatar_hero_id
					
				FROM
					".DBNAME_PS."_ovw_users
				WHERE
					".DBNAME_PS."_ovw_users.id_user = ".(int)$heroID;
		return $sql;
	}
	public function load($userInfos = NULL) {
		if (!$userInfos) {
			$sql = static::getLoadSQL($this->ID);
			$userInfos = DB::get($sql);
		}
		
		$this->ID 			= (int)$userInfos->ID;
		$this->mail 		= $userInfos->mail;
		$this->password 	= $userInfos->password;
		$this->pseudo 		= $userInfos->pseudo;
		$this->isSuperAdmin = (int)$userInfos->is_super_admin;
		$this->isAdmin		= (int)$userInfos->is_admin;
		$this->avatar		= $userInfos->avatar_hero_id;

	}
//*_________________________________
	public function register($mail, $password, $pseudo){
		$sql ="	INSERT INTO
					".DBNAME_PS."_ovw_users
				SET
					mail 	 = '".DB::escape($mail)."',
					pseudo 	 = '".DB::escape($pseudo)."',
					password = '".DB::escape(hash('sha256', $password, false))."'";


		$result = DB::insert($sql);
		
		if($result){
			$user = $this::selectInfoBymail($mail);

			$_SESSION['ID'] = $user->id_user;
			$_SESSION['email'] = $user->mail;
			$_SESSION['pseudo'] = $user->pseudo;
			$_SESSION['isSuperAdmin'] = $user->is_super_admin;
			$_SESSION['isAdmin'] = $user->is_admin;
			$_SESSION['avatar'] = $user->avatar_hero_id;
			return true;
		} else {
			return false;
		}
	}
	
	public function mailExisted($mail){
		$sql ="	SELECT
					COUNT(*) as count
				FROM
					".DBNAME_PS."_ovw_users
				WHERE
					mail = '".DB::escape($mail)."'";

		$result = DB::get($sql);

		if($result == 0){
			return false;
		} else {
			return true;
		}

	}

	static function selectInfoBymail($mail){
		$sql ="	SELECT
					*
				FROM
					".DBNAME_PS."_ovw_users
				WHERE
					mail = '".DB::escape($mail)."'";

		$result = DB::get($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

	public function login($mail, $pwd){
		$sql ="	SELECT
					id_user AS ID,
					mail,
					pseudo,
					is_super_admin,
					is_admin,
					avatar_hero_id
				FROM
					".DBNAME_PS."_ovw_users
				WHERE
					mail = '".DB::escape($mail)."'
				AND
					password = '".DB::escape(hash('sha256', $pwd, false))."'";

		$result = DB::get($sql);

		if($result){
			$_SESSION['ID'] = $result->ID;
			$_SESSION['email'] = $result->mail;
			$_SESSION['pseudo'] = $result->pseudo;
			$_SESSION['isSuperAdmin'] = $result->is_super_admin;
			$_SESSION['isAdmin'] = $result->is_admin;
			$_SESSION['avatar'] = $result->avatar_hero_id;
			return true;
		} else {
			return false;
		}

	}

}