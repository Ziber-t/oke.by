<?php/*
class User{
	//echo $prtest;
	
	/*private $db;
	private static $user = null;
	

	private function __construct(){
		$this->db = new mysqli("localhost","newartic_newlp","tocsovo123","newartic_newlp");
		$this->db->query("SET NAME 'utf8'");
	}

	public static function getObject(){
		if(self::$user === null) self::$user = new User();
		return self::$user;
	}
	/*
	public function activ($pass){
		$prevSumma = $this->db->query("SELECT `password` FROM `sum`");
		$prevSumma = $prevSumma->fetch_assoc();
		$prevSumma = $prevSumma['password'];
		if($pass == $prevSumma){
			return true
		}else{
			return false
		}
	}
	*/
	/*public function getbase(){
		$prevSumma = $this->db->query("SELECT `summa` FROM `sum` WHERE `id`='$id'");
		$prevSumma = $prevSumma->fetch_assoc();
		return $prevSumma['summa'];
	}*/
	
	/*public function upda($summa){
		$this->db->query("UPDATE `sum` SET `summa`='$summa'");
	}*/
	
	/*public function __destruct(){
		if($this->db) $this->db->close();
	}
}

?>
