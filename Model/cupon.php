<?php
/**
 * Clase para manejas las ofertas existentes
 */
require_once 'model.php';
class Cupon extends Model
{    

    public function getCuponesDisponibles($idCliente)
    {
        $query = "SELECT promocion.titulo as Promocion, promocion.fechaInicio as Inicio, promocion.fechaFin as Fin, 
                  cupon.codigoCupon as CodigoC, empresa.nombre as Empresa, cupon.estadoCupon as Estado, CURRENT_DATE() as FechaA FROM cupon INNER JOIN detallefactura ON 
                  cupon.idDetalleFactura = detallefactura.idDetalleFactura INNER JOIN promocion ON detallefactura.idPromocion = promocion.idPromocion 
                  INNER JOIN empresa ON empresa.idEmpresa = promocion.idEmpresa INNER JOIN factura ON detallefactura.idFactura = factura.idFactura 
                  INNER JOIN cliente ON factura.idCliente= cliente.idCliente WHERE cliente.idCliente = :id AND cupon.estadoCupon = 1 AND CURRENT_DATE() <= promocion.fechaFin;";
        return $this->getQuery($query,['id'=>$idCliente]);
    }
    
    public function getCuponesCanjeados($idCliente)
    {
        //El estadoCupon 0 es canjeado
        $query = "SELECT promocion.titulo as Promocion, promocion.fechaInicio as Inicio, promocion.fechaFin as Fin, 
                  cupon.codigoCupon as CodigoC, empresa.nombre as Empresa, cupon.estadoCupon as Estado, CURRENT_DATE() as FechaA FROM cupon INNER JOIN detallefactura ON 
                  cupon.idDetalleFactura = detallefactura.idDetalleFactura INNER JOIN promocion ON detallefactura.idPromocion = promocion.idPromocion 
                  INNER JOIN empresa ON empresa.idEmpresa = promocion.idEmpresa INNER JOIN factura ON detallefactura.idFactura = factura.idFactura 
                  INNER JOIN cliente ON factura.idCliente= cliente.idCliente WHERE cliente.idCliente = :id AND cupon.estadoCupon = 0;";
        return $this->getQuery($query,['id'=>$idCliente]);
    }

    public function getCuponesVencidos($idCliente)
    {
        //El estadoCupon 0 es canjeado
        $query = "SELECT promocion.titulo as Promocion, promocion.fechaInicio as Inicio, promocion.fechaFin as Fin, 
                  cupon.codigoCupon as CodigoC, empresa.nombre as Empresa, cupon.estadoCupon as Estado, CURRENT_DATE() as FechaA FROM cupon INNER JOIN detallefactura ON 
                  cupon.idDetalleFactura = detallefactura.idDetalleFactura INNER JOIN promocion ON detallefactura.idPromocion = promocion.idPromocion 
                  INNER JOIN empresa ON empresa.idEmpresa = promocion.idEmpresa INNER JOIN factura ON detallefactura.idFactura = factura.idFactura 
                  INNER JOIN cliente ON factura.idCliente= cliente.idCliente WHERE cliente.idCliente = :id AND cupon.estadoCUPON = 1 AND CURRENT_DATE() > promocion.fechaFin";
        return $this->getQuery($query,['id'=>$idCliente]);
    }
    
}
?>