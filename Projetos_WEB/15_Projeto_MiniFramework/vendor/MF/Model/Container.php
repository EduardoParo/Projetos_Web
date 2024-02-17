<?php
    namespace MF\Model;
    
    use App\Connection\Connection;

    class Container {

        public static function getModel($oModel){
            
            $oClass = "\\App\\Models\\".ucfirst($oModel);
            //RETORNAR O MODELO SOLICITADO COM A CONEXAO ESTABELECIDA

            $oConn = Connection::getDb();

            return new $oClass($oConn);
        }
    }



?>