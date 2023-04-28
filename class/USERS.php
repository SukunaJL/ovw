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
					avatar,
					background
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
		$this->avatar		= $userInfos->avatar;
		$this->background	= $userInfos->background;

	}
//*________________ ENREGISTREMENT _________________
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
			// session_start();

			$_SESSION['ID'] 			= $user->id_user;
			$_SESSION['email'] 			= $user->mail;
			$_SESSION['pseudo'] 		= $user->pseudo;
			$_SESSION['isSuperAdmin'] 	= (int)$user->is_super_admin;
			$_SESSION['isAdmin'] 		= (int)$user->is_admin;
			$_SESSION['avatar'] 		= $user->avatar;
			$_SESSION['background'] 	= $user->background;
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

	//_____________ CONNEXION _______________
	public function login($mail, $pwd){
		$sql ="	SELECT
					id_user AS ID,
					mail,
					pseudo,
					is_super_admin,
					is_admin,
					avatar,
					background
				FROM
					".DBNAME_PS."_ovw_users
				WHERE
					mail = '".DB::escape($mail)."'
				AND
					password = '".DB::escape(hash('sha256', $pwd, false))."'";

		$result = DB::get($sql);

		if($result){
			// session_start();

			$_SESSION['ID'] 			= (int)$result->ID;
			$_SESSION['email'] 			= $result->mail;
			$_SESSION['pseudo'] 		= $result->pseudo;
			$_SESSION['isSuperAdmin'] 	= (int)$result->is_super_admin;
			$_SESSION['isAdmin'] 		= (int)$result->is_admin;
			$_SESSION['avatar'] 		= $result->avatar;
			$_SESSION['background'] 	= $result->background;
			return true;
		} else {
			return false;
		}
	}

	public function updateAvatarUser($avatar){
		$sql ="	UPDATE
					".DBNAME_PS."_ovw_users
				SET
					avatar = '".DB::escape($avatar)."'
				WHERE
					id_user = ".(int)$this->ID;

		$result = DB::update($sql);
		
		if($result){
			$_SESSION['avatar'] = $avatar;
			return true;
		} else {
			return false;
		}
	}

	public function updateBackgroundUser($background){
		$sql ="	UPDATE
					".DBNAME_PS."_ovw_users
				SET
					background = '".DB::escape($background)."'
				WHERE
					id_user = ".(int)$this->ID;

		$result = DB::update($sql);
		
		if($result){
			$_SESSION['background'] = $background;
			return true;
		} else {
			return false;
		}
	}

	public function deleteAccount($userID){
		$sql ="	DELETE
				FROM
					".DBNAME_PS."_ovw_users
				WHERE
					id_user = ".(int)$userID;

		$result = DB::delete($sql);
		
		if($result){
			return true;
		} else {
			return false;
		}
	}

	//________________ ADMINISTRATION _________________________
	static function allUsers(){
		$sql = "SELECT
					id_user,
					mail,
					pseudo,
					is_super_admin,
					is_admin
				FROM
					".DBNAME_PS."_ovw_users
				ORDER BY id_user DESC";

		$result = DB::gets($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}

	static function isSuperAdminByUserID($userID){
		$sql ="	SELECT
					is_super_admin
				FROM
					".DBNAME_PS."_ovw_users
				WHERE
					id_user = ".(int)$userID;

		$result = DB::get($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}
	public function updateAdmin($userID, $bool){
		$sql ="	UPDATE
				".DBNAME_PS."_ovw_users
			SET
				is_admin = ".(int)$bool;

		// si le user est superAdmin, il passe uniquement admin en meme temps qu'il passe admin
		$isSuperAdmin = static::isSuperAdminByUserID($userID);
		if($isSuperAdmin){
		$sql .=",
				is_super_admin = ".(int)$bool;
		}

		$sql .="
			WHERE
				id_user = ".(int)$userID;

		$result = DB::update($sql);
		
		if($result){
			return true;
		} else {
			return false;
		}
	}
	static function isAdminByUserID($userID){
		$sql ="	SELECT
					is_admin
				FROM
					".DBNAME_PS."_ovw_users
				WHERE
					id_user = ".(int)$userID;

		$result = DB::get($sql);

		if($result){
			return $result;
		} else {
			return false;
		}
	}
	public function updateSuperAdmin($userID, $bool){
		$sql ="	UPDATE
				".DBNAME_PS."_ovw_users
			SET
				is_super_admin = ".(int)$bool;

		// si le user n'est pas admin, il passe admin en meme temps qu'il passe superAdmin
		$isAdmin = static::isAdminByUserID($userID);
		if(!$isAdmin){
		$sql .=",
				is_admin = ".(int)$bool;
		}

		$sql .="
			WHERE
				id_user = ".(int)$userID;

		$result = DB::update($sql);
		
		if($result){
			return true;
		} else {
			return false;
		}
	}






}