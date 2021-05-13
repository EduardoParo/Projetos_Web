<?php
 namespace conexao;

class connection{

	public static function getDb(){
		try{
			$oConn = new \PDO("mysql:host=localhost;
			dbname=test;
			charset=utf8",
			"root",
			"");

		return $oConn;

	}catch(\PDOException $e){

	}
		
	}
}

