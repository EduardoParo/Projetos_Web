<?php
    namespace App\Models;

    use MF\Model\Model;

    class Info extends Model{
        //protected $oDb;
        //public function __construct(\PDO $oDb){
        //    $this->oDb = $oDb;
        //    
        //}
        public function getInfo(){
           $cQuery = "SELECT titulo, descricao FROM tb_info";

           return $this->oDb->query($cQuery)->fetchAll();
        }
    }



?>