<?php
/**
 * Clase para manejas las ofertas existentes
 */
require_once 'model.php';
class Offers extends Model
{
    public function get($id=""){
        if($id==""){
            $query = "SELECT titulo, descripcion, precio, empresa.nombre as Empresa from promocion INNER JOIN empresa on empresa.idEmpresa = promocion.idEmpresa WHERE estadoActivo = 1 AND estadoAprobacion = 1 AND  NOW() >= fechaInicio AND NOW() <= fechaFin";
            return $this->getQuery($query);
        }else{
            $query = "SELECT * FROM promocion WHERE idPromocion = :idPromocion";
            return $this->getQuery($query,['idPromocion'=>$id]);
        }
    }
}
?>