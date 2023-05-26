<?php

    class Conection{
        private $conect;

        public function __construct()
        {
            $conectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
            try {
                $this->conect = new PDO($conectionString, DB_USER, DB_PASSWORD);
                $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                $this->conect = 'Erro de conexao';
                echo "ERRO ".$e->getMessage();
            }
        }
        public function conect(){
            return $this->conect;
        }
    }

?>