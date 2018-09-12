<?php
$response = "";
try {
	$email = $_POST[ 'email' ];
	$name=$_POST['name'];
	$message=$_POST['message'];
	$header = "From: " . $email . " \r\n";
	$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
	$header .= "Mime-Version: 1.0 \r\n";
	$header .= "Content-Type: text/plain";
	$mensaje = "Consulta de:,". $name. " ,dia :" . date( 'd/m/Y', time() ). " ,motivo:". $message;
	$para = "alaan_roodriguez@hotmail.com"; // IMPORTANTE!! Modificar
	$asunto = "Consulta";
	$result = mail( $para, $asunto, utf8_decode( $mensaje ), $header );
	switch ( $result ) {
		case true:
			$response = "{\"status\": 0, \"data\": \"success\"}";
			break;
		case false:
			$response = "{\"status\": -1, \"data\": \"no pudimos enviar tu mensaje\"}";
			break;
	}
} catch ( Exception $e ) {
	$response = "{\"status\": -1, \"data\": \"ocurrió algo extraño al enviar tu mensaje\"}";
}
echo $response;

?>