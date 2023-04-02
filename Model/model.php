<?php

//Clase para realizar las operaciones en la base de datos
class Model{
    /**
     * Atributos de la clase
     */
    private $hostname="localhost";
    private $user="root";
    private $pass="";
    private $db="cuponera";
    private $conn;
          
    /**
     * Método para conectarse a la base de datos
     */
    protected function openConnection(){
        try{
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->db;charset=utf8",$this->user,$this->pass);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    /**
     * Método para cerrar conexión
     */
    protected function closeConnection(){
        $this->conn = null;
    }

    /**
     * Método para obtener datos
     */
    protected function getQuery($query, $params=array()){
        try{
            $this->openConnection();
            $st = $this->conn->prepare($query);
            $st->execute($params);
            $rows = $st->fetchAll();
            $this->closeConnection();
            return $rows;
        }catch(PDOException $e){
            $this->closeConnection();
            return null;
        }
    }

    /**
     * Método para realizar operaciones: Insert, Update, Delete
     */
    protected function setQuery($query, $params = array()){
        try{
            $this->openConnection();
            $st = $this->conn->prepare($query);
            $st->execute($params);
            $affectedRows = $st->rowCount();
            $this->closeConnection();
            return $affectedRows;
        }catch(PDOException $e){
            echo $e->getMessage();
            $this->closeConnection();
            return -1;
        }
    }
    


    
}

?>