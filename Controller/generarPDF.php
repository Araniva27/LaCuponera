<?php
	require_once 'libraries\dompdf\autoload.inc.php';
	use Dompdf\Dompdf;

	function crearPDFCupones($cupones)
    {
		// Generar el contenido HTML de la tabla
		date_default_timezone_set('America/El_Salvador');
		$fechaActual = date('d-m-Y');
		$horaActual = date('H:i:s');
        var_dump($cupones);
        $html = '
            <html>      
                <body
                <div style= "border-color:blue; padding: 10; ">                    
                    <center style = "font-family: Smack Boom; font-size: 30px; font-weight: bold;">LaCuponera</center>
                    <center style = "font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: bold;">Cupón de promoción</center>
                    <center style = "font-family: Arial, Helvetica, sans-serif; font-size: 15px">Fecha de creación: '.$fechaActual.'</center>
                    <center style = "font-family: Arial, Helvetica, sans-serif; font-size: 15px">Hora de creación '.$horaActual.'</center>
                </div>
                <div style = "margin-top: 10px">
                    <table style = "width: 100%; border-style: solid;>
                    <thead style = "background-color: black;">
                    <tr style = "border-style:solid; background-color: black; color: white; font-weight: bold">
                        <th style="font-family: Arial, Helvetica, sans-serif;">Código</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Empresa</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Promoción</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Fecha de inicio</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Fecha de finalización</th>                        
                    </tr>
                    </thead>			
                    <tbody>';                   
                    foreach($cupones as $cupon){
                        $html.='	
                            <tr>
                                <td><center style="font-family: Arial, Helvetica, sans-serif;">'.$cupon[0]['CodigoC'].'</center></td>
                                <td><center style="font-family: Arial, Helvetica, sans-serif;">'.$cupon[0]['Empresa'].'</center></td>
                                <td><center style="font-family: Arial, Helvetica, sans-serif;">'.$cupon[0]['Promocion'].'</center></td>
                                <td><center style="font-family: Arial, Helvetica, sans-serif;">'.$cupon[0]['Inicio'].'</center></td>					
                                <td><center style="font-family: Arial, Helvetica, sans-serif;">'.$cupon[0]['Fin'].'</center></td>
                            </tr>
                        ';                        
                    }		 
                    $html.=' 			
                    </tbody>
                    </table>
                        <hr>
                        
                    </div>
                    </body>
                </html>';




            //Creando instancia de Dompdf
            $dompdf = new Dompdf();
            
            //Cargar el html en Dompdf
            $dompdf->loadHtml($html);
            
            //Renderizar el html como pdf
            $dompdf->render();

            $pdf = $dompdf->output();
            if (file_exists('pdf/cupon.pdf')) {
                unlink('pdf/cupon.pdf');
                echo 'El archivo PDF se ha borrado exitosamente.';
            } else {
                echo 'El archivo PDF no existe.';
            }
            
            file_put_contents('pdf/cupon.pdf',$pdf);    
            
            //Abrir PDF

            // Enviar las cabeceras para indicar que el archivo es un PDF
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="documento.pdf"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize('pdf/cupon.pdf'));

            readfile('pdf/cupon.pdf');

	}
    function crearPDFFactura()
    {
		// Generar el contenido HTML de la tabla
		date_default_timezone_set('America/El_Salvador');
		$fechaActual = date('d-m-Y');
		$horaActual = date('H:i:s');
        $cliente = $_SESSION['user']['Nombre'];
        if(isset($_SESSION["carrito"]))
        {
                        $tabla = "";
            if(count($_SESSION["carrito"])>0)
            {
                foreach($_SESSION["carrito"] as $indice => $arreglo)
                {
                    $tabla .= "<tr>";
                    $tabla .= "<td>" . $indice . "</td>";
                    foreach($arreglo as $key => $valor)
                    {
                        if($key!="idPromocion")
                        {
                            if($key=="precio")
                            {
                                $tabla .= '<td><center style="font-family: Arial, Helvetica, sans-serif;">$' . $valor . "</center></td>";
                            } 
                            else
                            {
                                $tabla .= '<td><center style="font-family: Arial, Helvetica, sans-serif;">' . $valor . "</center></td>";
                            }
                        }
                    }
                    $tabla .= "</tr>";
                }

                $total = 0;
                    if(isset($_SESSION["carrito"]))
                    {
                        if(count($_SESSION["carrito"])>0)
                        {
                            
                            foreach($_SESSION["carrito"] as $indice => $valor)
                            {
                                $total = $total + ($valor["cantidad"] * $valor["precio"]);
                            }
                            $tabla.= "<h5>Total: $ $total </h5>";
                        }
                        else
                        {
                            echo "Los productos han sido eliminados del carrito";
                        }
                    }
                    else
                    {
                        echo  "No hay productos registrados en el carrito";
                    }
                    
                /*$tabla .= "</table></center>";*/
            }
            else
            {
                $tabla .= "<div class='alert alert-primary' role='alert'>
                La lista de productos se ha actualizado
                </div>";
            }
        }
        else
        {
            $tabla = "<div class='alert alert-primary' role='alert'>No hay productos agregados</div>";
        }
        $tabla;
        $html = '
            <html>      
                <body
                <div style= "border-color:blue; padding: 10; ">                    
                    <center style = "font-family: Smack Boom; font-size: 30px; font-weight: bold;">LaCuponera</center>
                    <center style = "font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: bold;">Cupón de promoción</center>
                    <center style = "font-family: Arial, Helvetica, sans-serif; font-size: 15px">Fecha de creación: '.$fechaActual.'</center>
                    <center style = "font-family: Arial, Helvetica, sans-serif; font-size: 15px">Hora de creación: '.$horaActual.'</center>
                    <center style = "font-family: Arial, Helvetica, sans-serif; font-size: 15px">Cliente: '.$cliente.'</center>
                </div>
                <div style = "margin-top: 10px">
                    <table style = "width: 100%; border-style: solid;>
                    <thead style = "background-color: black;">
                    <tr style = "border-style:solid; background-color: black; color: white; font-weight: bold">
                        <th style="font-family: Arial, Helvetica, sans-serif;">Promoción</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Cantidad Cupones</th>
                        <th style="font-family: Arial, Helvetica, sans-serif;">Precio</th>                  
                    </tr>
                    </thead>			
                    <tbody>'.$tabla;                    
                    $html.=' 			
                    </tbody>
                    </table>
                        <hr>
                        
                    </div>
                    </body>
                </html>';


            //Creando instancia de Dompdf
            $dompdf = new Dompdf();
            
            //Cargar el html en Dompdf
            $dompdf->loadHtml($html);
            
            //Renderizar el html como pdf
            $dompdf->render();

            $pdf = $dompdf->output();
            if (file_exists('pdf/factura.pdf')) 
            {
                unlink('pdf\factura.pdf');
            }
            
            file_put_contents('pdf/factura.pdf',$pdf);    
            
            //Abrir PDF
	}
