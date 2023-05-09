<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once 'model.php';
class Correo extends Model
{
    
    public function enviarCorreo($usuario=array())
    {
        //Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try 
		{
			//Server settings
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';    					//Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'lacuponera2023@gmail.com';                     //SMTP username
			$mail->Password   = 'dcbqecfjtivtqrbo';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('lacuponera2023@gmail.com', 'LA CUPONERA');
			$mail->addAddress($usuario['usuario']); 


			//Attachments
			/*$mail->addAttachment('pdf/factura_compra.pdf'); */        //Add attachments

            //GENERAMOS TOKEN
            $token = self::generarToken($usuario['dui']);
            self::insertarToken($usuario,$token);


			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'VALIDACION DE CORREO';
			/*$mail->Body    = '<b>Para validar su correo debe ingresar el siguiente token:'. $token.'</b>';*/
            $mail->Body    = '<b>Para validar su correo debe ingresar el siguiente token: '. $token .'</b>';

			$mail->send();
			/*echo "
				<div class='container-fluid' style = 'margin-top: 20px'>
					<div class='alert alert-success' role='alert'>
					Se ha enviado el correo
					</div>
				</div>
			";	*/
		} 
			catch (Exception $e) 
			{
				echo "<div class='container-fluid' style = 'margin-top: 20px'>
							<div class='alert alert-danger' role='alert'>
							Message could not be sent. Mailer Error: {$mail->ErrorInfo}
							</div>
						</div>
					";
			}
    }

	public function enviarFactura()
    {
        //Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try 
		{
			//Server settings
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';    					//Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'lacuponera2023@gmail.com';                     //SMTP username
			$mail->Password   = 'dcbqecfjtivtqrbo';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('lacuponera2023@gmail.com', 'LA CUPONERA');
			$mail->addAddress($_SESSION["user"]["usuario"]); 


			//Attachments
			$mail->addAttachment('pdf/factura.pdf');        //Add attachments


			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'FACTURA';
			/*$mail->Body    = '<b>Para validar su correo debe ingresar el siguiente token:'. $token.'</b>';*/
            $mail->Body    = '<b>Su compra ha sido realizada con exito.<br> Su factura ha sido adjuntada</br>';

			$mail->send();
		} 
			catch (Exception $e) 
			{
				echo "<div class='container-fluid' style = 'margin-top: 20px'>
							<div class='alert alert-danger' role='alert'>
							Message could not be sent. Mailer Error: {$mail->ErrorInfo}
							</div>
						</div>
					";
			}
    }


	public function enviarNewContra($nuevaContra,$correo)
    {
        //Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try 
		{
			//Server settings
			//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';    					//Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'lacuponera2023@gmail.com';                     //SMTP username
			$mail->Password   = 'dcbqecfjtivtqrbo';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('lacuponera2023@gmail.com', 'LA CUPONERA');
			$mail->addAddress($correo); 


			//Attachments


			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'RESTAURACION DE CLAVE - LA CUPONERA';
            $mail->Body    = '<h3>Nueva contraseña: '. $nuevaContra . '</h3>';

			$mail->send();
		} 
		catch (Exception $e) 
		{
			echo "<div class='container-fluid' style = 'margin-top: 20px'>
							<div class='alert alert-danger' role='alert'>
							Message could not be sent. Mailer Error: {$mail->ErrorInfo}
							</div>
						</div>
					";
		}
    }

    public function generarToken($dui)
    {
        //alimentamos el generador de aleatorios
        srand (time());
        //generamos un número aleatorio
        $numero_aleatorio = rand(1,10000);
        $token = $numero_aleatorio . substr($dui,0,4);
        return $token;
    }

    public function insertarToken($usuario=array(),$token)
    {
        $usuarioToken = array();
        $usuarioToken['token'] = $token;
        $usuarioToken['correo'] = $usuario['usuario'];

        $query = "INSERT INTO token VALUES (NULL, :token, :correo)";
        return $this->setQuery($query,$usuarioToken);
    }

}
