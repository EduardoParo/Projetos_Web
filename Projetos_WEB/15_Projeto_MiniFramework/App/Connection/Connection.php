<?php
    namespace App\Connection;

    class Connection{

        public static function getDb(){
            try{
                $oConn = new \PDO(
                    "mysql:host=localhost;dbname=mvc;charset=utf8",
                    "root",
                    ""
                );
                return $oConn;

            }catch(\PDOException $e){

            }
        }
    }



?>