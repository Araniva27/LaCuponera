<?php

//Clase para realizar las operaciones en la base de datos
class Database{

    /**
     * Atributos de la clase
     */
    private static $connection = null;
    private static $statement = null;
    private static $id = null;
    
    /**
     * Método para establecer conexión con la base de datos
     */
    private function connect()
    {
        $server = "localhost";
        $database = "cuponera";
        $username = "root";
        $password = "";
        try{
            //@ silencia las excepciones que pueden ocurrir
            @self::$connection = new PDO('mysql:host='.$server.'; dbname='.$database.'; charset=utf8',$username,$password);
        }catch(PDOException $error){
            exit(self::getException($error->getCode(), $error->getMessage()));
        }
    }

    /**
     * Método para anular conexión a la base de datos
     */
    private function desconect()
    {
        @self::$connection = null;
        $error = self::$statement->errorInfo();
        if($error[0] != '00000'){
            exit(self::getException($error[1], $error[2]));
        }
    }

    /**
     * Método para ejecutar consultas: insert, update, delete
     * @return boolean si se ejecutó correctamente la consulta
     * 
     * @param $query define la consulta SQL a ejecutar
     * @param $values define los parametros necesarios para ejecutar la consulta
     */
    public static function executeRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        $state = self::$statement->execute($values);
        self::$id = self::$connection->lastInsertId();
        self::desconect();
        return $state;
    }

    /**
     * Método para leer un dato
     * @return array asociativo con los resultados de la consulta
     * 
     * @param $query define la consulta SQL a ejecutar
     * @param $value define los parametros necesarios para ejecutar la consulta
     */
    public static function getRow($query,$value)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($value);
        self::desconect();
        return self::$statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Método para leer varios datos
     * @return array asociativo con los resultados de la consulta
     * 
     * @param $query define la consulta SQL a ejecutar
     * @param $values define los parametros necesarios para ejecutar la consulta
     */
    public static function getRows($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconect();
        return self::$statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Método para retornar el último id ingresado
     * @return int con el id último ingresado
     */
    public static function getLastRowId()
    {
        return self::$id;
    }

    /**
     * Método para obtener los posibles errores provocados por la base de datos
     */
    public static function getException($code, $message)
    {
        switch($code){
            case 1045:
                $message = "Autenticación desconocida";
            break;
            case 1049:
                $message = "Base de datos desconocida";
            break;
            case 1054:
                $message = "Nombre de campo desconocido";
            break;
            case 1062:
                $message = "Dato duplicado no se puede guardar";
            break;
            case 1146:
                $message = "Nombre de tabla desconocido";
            break;
            case 1451:
                $message = "Registro ocupado no se puede eliminar";
            break;
            case 2002:
                $message = "Servidor desconocido";
            break;
        }            
    }
}

?>