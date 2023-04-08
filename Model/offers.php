<?php
/**
 * Clase para manejas las ofertas existentes
 */
require_once 'model.php';
class Offers extends Model
{
    public function get($empresa=""){
        if($empresa==""){
            $query = "SELECT idPromocion, titulo, descripcion, precio, empresa.nombre as Empresa, empresa.img as Imagen from promocion INNER JOIN empresa on empresa.idEmpresa = promocion.idEmpresa WHERE estadoActivo = 1 AND estadoAprobacion = 1 AND  NOW() >= fechaInicio AND NOW() <= fechaFin";
            return $this->getQuery($query);
        }else{
            $query = "SELECT idPromocion, titulo, descripcion, precio, empresa.nombre as Empresa, empresa.img as Imagen from promocion INNER JOIN empresa on empresa.idEmpresa = promocion.idEmpresa WHERE estadoActivo = 1 AND estadoAprobacion = 1 AND  NOW() >= fechaInicio AND NOW() <= fechaFin AND empresa.nombre LIKE :nombre";
            return $this->getQuery($query,['nombre'=>$empresa]);
        }
    }

    public function getOfferDetail($id)
    {
        $query = "SELECT titulo, descripcion, precio, empresa.nombre as Empresa, empresa.img as Imagen from promocion INNER JOIN empresa on empresa.idEmpresa = promocion.idEmpresa WHERE estadoActivo = 1 AND estadoAprobacion = 1 AND  NOW() >= fechaInicio AND NOW() <= fechaFin AND idPromocion = :id";
        return $this->getQuery($query, ['id'=>$id]);
    }

    public function getCantidadOferta($id)
    {
        $query = "SELECT cantidad FROM promocion WHERE idPromocion =:id";
        return $this->getQuery($query, ['id'=>$id]);
    }

    
}
?>