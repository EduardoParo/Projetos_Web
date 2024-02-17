<?php
    namespace App\Models;

    use MF\Model\Model;
    class Produto extends Model{
        //protected $oDb;
        //public function __construct(\PDO $oDb){
        //    $this->oDb = $oDb;
        //    
        //}
        public function getProdutos(){
           $cQuery = "SELECT id, descricao, preco FROM tb_produtos";

           return $this->oDb->query($cQuery)->fetchAll();
        }
    }



?>