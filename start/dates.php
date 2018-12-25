<?php
class User{
	
	
				//echo $prtest;
	
	private $db;
	private static $user = null;
	

	private function __construct(){
		$this->db = new mysqli("localhost","newartic_newlp","tocsovo123","newartic_newlp");
		$this->db->query("SET NAME 'utf8'");
	}

	public static function getObject(){
		if(self::$user === null) self::$user = new User();
		return self::$user;
	}
	
	public function provDat(){
		$result_set = $this->db->query("SELECT `day`,`mes`, `id` FROM `users`");
		while(($row = $result_set->fetch_assoc()) != false){
			$day = $row['day'];
			$mes = $row['mes']+1; //9+1 = 10
			$id = $row['id'];
			
			$serdat = getdate();
			$sermes = $dat['mon'];// 9
			$serday = $dat['mday'];
			
			if($mes == $sermes){
				if($serday == $day){
					$this->db->query("UPDATE `users` SET `opl`='0' WHERE `id`='$id'");
				}
			}
			
		}
	}
	
	
	public function __destruct(){
		if($this->db) $this->db->close();
	}
}


/****************/
$user = User::getObject();

$idUSer = $_REQUEST['id'];




/***************/