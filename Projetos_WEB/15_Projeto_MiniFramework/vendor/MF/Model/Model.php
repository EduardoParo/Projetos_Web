<?php

    namespace MF\Model;

    abstract class Model{
        
        protected $oDb;

        public function __construct(\PDO $oDb){
            $this->oDb = $oDb;
            
        }
    }