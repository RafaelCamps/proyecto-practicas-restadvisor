<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'public/plugins/PHPMailer/src/Exception.php';
require_once 'public/plugins/PHPMailer/src/PHPMailer.php';
require_once 'public/plugins/PHPMailer/src/SMTP.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->IsSMTP();

//Configuracion servidor mail

$mail->setFrom('restadvisor@gmail.com', 'Formulario de Contacto'); // Estableciendo como quién se va a enviar el mail
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto 465?
$mail->Username = 'restadvisor.es@gmail.com'; //nombre usuario
$mail->Password = 'buscadorderestaurantes'; //contraseña

/* === MUY IMPORTANTE === */
//Hay que configurar en la cuenta de gmail de google que estemos usando, que permita el acceso de aplicaciones poco seguras.


/* === Recoger los datos del $_POST y preparlos para el email === */

$destinatario = "restadvisor.es@gmail.com"; // Nos lo enviamos a nosotros mismos
$asunto = "Formulario de contacto RestAdvisor.es";
$contenido = "Nombre: " . $_POST['nombre'] . " " . $_POST['apellidos'] . "<br>Teléfono: " . $_POST['telefono'] . "<br>Email: " . $_POST['email'] . "<br>Mensaje: " . $_POST['mensaje'];

// Agregando compatibilidad con HTML
$mail->Debugoutput = 'html';

// Adjuntando una imagen
$mail->addAttachment('public/img/logos/logo-redondo.png');

//Agregar destinatario
$mail->AddAddress($destinatario);
//Agregar el asunto
$mail->Subject = $asunto;
// Estableciendo el mensaje a enviar
$mail->MsgHTML($contenido);

// Para comprobar cual es el error, si nos da un fallo, debemos cambiar el valor a "2", cuando funcione, dejar el valor en "0"
$mail->SMTPDebug = 0;

// Enviando el mensaje y controlando los errores, avisar si fue enviado o no y dirigir al index
if ($mail->Send()) {
    echo '<script>

    document.addEventListener("DOMContentLoaded", function(event) {
        
        Notifier.success("¡Muchas gracias por tu consulta!","¡Consulta enviada!");

        
  });
     
        </script>';
} else {
    echo '<script>
           Notifier.error("El email no se ha podido enviar, ¡vuelve a intentarlo más tarde!", "Error al enviar el email");
        </script>';
}
