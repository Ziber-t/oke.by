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
	
	public function opla($id,$opl){ //зачисление оплаты в базу
		$prevSumma = $this->db->query("SELECT `balans` FROM `users` WHERE `id`='$id'");
		$prevSumma = $prevSumma->fetch_assoc();
		$prevSumma = $prevSumma['balans']+$opl+1-1;
		
		$this->db->query("UPDATE `users` SET `balans`='$prevSumma' WHERE `id`='$id'");
	}
	
	
	public function mesday($id,$mes,$day){
		$this->db->query("UPDATE `users` SET `mes`='$mes' WHERE `id`='$id'");
		$this->db->query("UPDATE `users` SET `day`='$day' WHERE `id`='$id'");
	}
	
	public function __destruct(){
		if($this->db) $this->db->close();
	}
}

/*$prtest = $_COOKIE["ci_session"];
$prtest = unserialize($prtest);
$prtest = $prtest['user_id'];*/
/****************/
$user = User::getObject();
//$proverkaFirstSite = $user->bases($prtest);
$dat = getdate();
$mes = $dat['mon'];
$day = $dat['mday'];
/***************/


if($_POST['WMI_ORDER_STATE']=="Accepted"){
	$user->opla($_POST['usersID'],$_POST['WMI_PAYMENT_AMOUNT']);
	//$user->mesday($_POST['usersID'],$mes,$day);
	echo "WMI_RESULT=OK";
	
	
}else{
	//$gg=$user->opla($prtest);
	echo "WMI_RESULT=RETRY";
}


