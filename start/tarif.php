<?php header('Content-Type: text/html; charset=UTF-8'); ?>
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
	
	
	public function bases($id){
		$prevSumma = $this->db->query("SELECT `firstsite` FROM `users` WHERE `id`='$id'");
		$prevSumma = $prevSumma->fetch_assoc();
		//echo $prevSumma['firstsite'];
		return $prevSumma['firstsite'];
	}
	
	public function opla($id){ // списание баланса из базы
		$prevSumma = $this->db->query("SELECT `balans` FROM `users` WHERE `id`='$id'");
		$prevSumma = $prevSumma->fetch_assoc();
		$tar = $this->db->query("SELECT `summa` FROM `sum`");
		$tar = $tar->fetch_assoc();
		$tar = $tar['summa'];
		$prevSumma = $prevSumma['balans']-$tar+1-1;
		$this->db->query("UPDATE `users` SET `opl`='1' WHERE `id`='$id'");
		$this->db->query("UPDATE `users` SET `balans`='$prevSumma' WHERE `id`='$id'");
	}
	
	public function mesday($id,$mes,$day){
		$this->db->query("UPDATE `users` SET `mes`='$mes' WHERE `id`='$id'");
		$this->db->query("UPDATE `users` SET `day`='$day' WHERE `id`='$id'");
	}
	
	public function tarif($id){ //активация тарифа
		$prevSumma = $this->db->query("SELECT `balans` FROM `users` WHERE `id`='$id'");
		$prevSumma = $prevSumma->fetch_assoc();
		$prevSumma = $prevSumma['balans'];
		
		$tar = $this->db->query("SELECT `summa` FROM `sum`");
		$tar = $tar->fetch_assoc();
		$tar = $tar['summa']-1+1;
		
		if($prevSumma >= $tar){
			$this->opla($id);
			//$this->mesday($id,$mes,$day);
		}
	}
	
	public function __destruct(){
		if($this->db) $this->db->close();
	}
}

$dat = getdate();
$mes = $dat['mon'];
$day = $dat['mday'];

$user = User::getObject();

$user->tarif($_GET['tID']);

echo "<script language = 'javascript'>
  var delay = 5000;
  setTimeout(\"document.location.href='http://oke.su/start/'\");
</script>";
