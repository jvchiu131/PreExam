<?php
require_once "connection.php";
class ModelClient{
	static public function mdlAddClient($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

	        $cust_id = (new Connection)->connect()->prepare("SELECT CONCAT('C', LPAD((count(id)+1),4,'0')) as gen_id  FROM clients FOR UPDATE");

	        $cust_id->execute();
			$custid = $cust_id -> fetchAll(PDO::FETCH_ASSOC);

			$stmt = $pdo->prepare("INSERT INTO clients(clientid, isactive, cname, email, phone, address, website, cperson, mobile) VALUES (:clientid, :isactive, :cname, :email, :phone, :address, :website, :cperson, :mobile)");

			$stmt->bindParam(":clientid", $custid[0]['gen_id'], PDO::PARAM_STR);
			$stmt->bindParam(":isactive", $data["isactive"], PDO::PARAM_INT);
			$stmt->bindParam(":cname", $data["cname"], PDO::PARAM_STR);
			$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
			$stmt->bindParam(":phone", $data["phone"], PDO::PARAM_STR);
			$stmt->bindParam(":address", $data["address"], PDO::PARAM_STR);
			$stmt->bindParam(":website", $data["website"], PDO::PARAM_STR);
			$stmt->bindParam(":cperson", $data["cperson"], PDO::PARAM_STR);
			$stmt->bindParam(":mobile", $data["mobile"], PDO::PARAM_STR);
			$stmt->execute();			

		    $pdo->commit();
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
	}

	static public function mdlShowClientList(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM clients ORDER BY cname");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlShowClient($item, $value){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM clients WHERE $item = :$item");
		$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}		
}