<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'public/plugins/PHPMailer/src/Exception.php';
require_once 'public/plugins/PHPMailer/src/PHPMailer.php';
require_once 'public/plugins/PHPMailer/src/SMTP.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();

//Configuracion servidor mail

$mail->setFrom('restadvisor@gmail.com', 'RestAdvisor'); // Estableciendo como quién se va a enviar el mail
// $mail->From = "restadvisor.es@gmail.com"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto 465?
$mail->Username = 'restadvisor.es@gmail.com'; //nombre usuario
$mail->Password = 'buscadorderestaurantes'; //contraseña

/* === MUY IMPORTANTE === */
//Hay que configurar en la cuenta de gmail de google que estemos usando, que permita el acceso de aplicaciones poco seguras.


/* === Recoger los datos del $_POST y preparlos para el email === */
//$destinatario = $restaurante['email']; Descomentar esta línea cuando esté funcionando!!
$destinatario = $_POST['email']; // Se enviará al email puesto en el formulario de reserva, para hacer pruebas!!
$asunto = "Solicitud para reservar una mesa el " . date('d-m-Y', strtotime($_POST['fecha'])) . " a las " . $_POST['hora'] . "";
$mensaje = "Nombre: " . $_POST['nombre'] . "<br>Teléfono: " . $_POST['telefono'] . "<br>Email: " . $_POST['email'] . "<br>Comensales: " . $_POST['pax'] . "<br><br>Reserva recibida desde RestAdvisor.es";

// Agregando compatibilidad con HTML
$mail->Debugoutput = 'html';

// Adjuntando una imagen
$mail->addAttachment('public/img/logos/logo-redondo.png');

//Agregar destinatario
$mail->AddAddress($destinatario);
//Agregar el asunto
$mail->Subject = $asunto;
// Estableciendo el mensaje a enviar
$mail->MsgHTML($mensaje);
//$mail->Body = $mensaje; Esta opcion es par enviar un mensaje en texto plano

// Para comprobar cual es el error, si nos da un fallo, debemos cambiar el valor a "2", cuando funcione, dejar el valor en "0"
$mail->SMTPDebug = 0;


//$notificacion = "En breve el restaurante " . $restaurante['nombre'] . " se pondrá en contacto contigo para confirmar la reserva";

// Enviando el mensaje y controlando los errores, avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo '<script>

    document.addEventListener("DOMContentLoaded", function(event) {
        
        console.log("DOM fully loaded and parsed");
        Notifier.success("El restaurante te confirmará la reserva en breve","Solicitud enviada");
  });
     
        </script>';
} else {
    echo '<script>
           Notifier.error("El email no se ha podido enviar, ¡vuelve a intentarlo más tarde!", "Error al enviar el email");
        </script>';
}

// function info(){Notifier.success("El restaurante te confirmará la reserva en breve","Solicitud enviada")}
//             setInterval(info,2000);   
//if(document.readyState == "complete"){}


// var_dump($mail);
// echo "<br><br>";
// echo "$destinatario <br>";
// echo "$asunto <br>";
// echo "$mensaje <br>";
// echo "$fechaReserva <br>";
// var_dump($_POST);
