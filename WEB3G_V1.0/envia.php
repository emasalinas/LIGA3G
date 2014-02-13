<?php
$remitente = $_POST['email'];
$destinatario = 'info@liga3g.com.ar'; // en esta línea va el mail del destinatario, puede ser una cuenta de hotmail, yahoo, gmail, etc
$asunto = 'Consulta'; // acá se puede modificar el asunto del mail
if (!$_POST){
?>

<?php
}
else
{
	 
    $cuerpo = "Nombre: " . $_POST["name"] . "\r \n"; 
    $cuerpo .= "Tel: " . $_POST["phone"] . "\r \n"; 
    $cuerpo .= "Email: " . $_POST["email"] . "\r \n";
//	$cuerpo .= "Opciones: " . $_POST["opcion"] . "\r\n" 
	$cuerpo .= "Consulta: " . $_POST["message"] . "\r\n";
	//las líneas de arriba definen el contenido del mail. Las palabras que están dentro de $_POST[""] deben coincidir con el "name" de cada campo. 
	// Si se agrega un campo al formulario, hay que agregarlo acá.

    $headers  = "MIME-Version: 1.0\n";
    $headers .= "Content-type: text/plain; charset=utf-8\n";
    $headers .= "X-Priority: 3\n";
    $headers .= "X-MSMail-Priority: Normal\n";
    $headers .= "X-Mailer: php\n";
    $headers .= "From: \"".$_POST['name']." ".$_POST['phone']."\" <".$remitente.">\n"; 

    mail($destinatario, $asunto, $cuerpo, $headers);
    
    include 'confirma.html'; //se debe crear un html que confirma el envío
}
?>
