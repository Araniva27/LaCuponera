<?php
/**
 * Clase para manejas las ofertas existentes
 */
require_once 'model.php';
class Offers extends Model
{
    public function get($empresa=""){
        if($empresa==""){
            $query = "SELECT titulo, descripcion, precio, empresa.nombre as Empresa, empresa.img as Imagen from promocion INNER JOIN empresa on empresa.idEmpresa = promocion.idEmpresa WHERE estadoActivo = 1 AND estadoAprobacion = 1 AND  NOW() >= fechaInicio AND NOW() <= fechaFin";
            return $this->getQuery($query);
        }else{
            $query = "SELECT titulo, descripcion, precio, empresa.nombre as Empresa, empresa.img as Imagen from promocion INNER JOIN empresa on empresa.idEmpresa = promocion.idEmpresa WHERE estadoActivo = 1 AND estadoAprobacion = 1 AND  NOW() >= fechaInicio AND NOW() <= fechaFin AND empresa.nombre LIKE :nombre";
            return $this->getQuery($query,['nombre'=>$empresa]);
        }
    }

    
}
?>