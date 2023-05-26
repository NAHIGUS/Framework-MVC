<?php

    class Mysql Extends Conection{
        private $conection;
        private $strquery;
        private $arrValues;

        function __construct(){
            $this->conection = new Conection();
            $this->conection = $this->conection->conect();
        }

        //INSERIR UM REGISTO
        public function insert(string $query, array $arrValues)
        {
            $this->strquery = $query;
            $this->arrValues = $arrValues;
            $insert = $this->conection->prepare($this->strquery);
            $resInsert = $insert->execute($this->arrValues);
            if ($resInsert) 
            {
                $lastInsert = $this->conection->lastInsertId();
            }else{
                $lastInsert = 0;
            }

            return $lastInsert;
        }

        //BUSCAR UM REGISTO
        public function select(string $query)
        {
            $this->strquery = $query;
            $result = $this->conection->prepare($this->strquery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);

            return $data;
        }

        //BUSCAR TODOS REGISTOS
        public function select_all(string $query)
        {
            $this->strquery = $query;
            $result = $this->conection->prepare($this->strquery);
            $result->execute();
            $data = $result->fetchall(PDO::FETCH_ASSOC);

            return $data;
        }

        //ACTUALIZAR REGISTOS
        public function update(string $query, array $arrValues)
        {
            $this->strquery = $query;
            $this->arrValues = $arrValues;
            $update = $this->conection->prepare($this->strquery);
            $resExecute = $update->execute($this->arrValues);
            
            return $resExecute;
        }

        //ELIMINAR REGISTOS
        public function delete(string $query)
        {
            $this->strquery = $query;
            $result = $this->conection->prepare($this->strquery);
            $del = $result->execute();
            
            return $del;
        }
    }

?>