<?php
require_once('conex.php');
require_once('site_url.php');
use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
 // require '../vendor/autoload.php';
 require './phpmailer/src/Exception.php';
 require './phpmailer/src/SMTP.php';
 require './phpmailer/src/PHPMailer.php';
$miDB = conexion();

if (isset($_POST["butsave"])) {

}


    
    $email     = trim($_POST['email']);
    $username = trim($_POST['username']);
    $fechadenacimiento = trim($_POST['fechadenacimiento']);
    $contrasena  = trim($_POST['contrasena']);
      

    $sql = "SELECT COUNT(*) AS count from usuarios where email = :email";
    try {
        $stmt = $miDB->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result[0]["count"] > 0) {
            echo json_encode(array("clave"=>'Repetido'));

                }
                 else {
            $sql = "INSERT INTO usuarios (email, username, fechadenacimiento, contrasena) VALUES " . "( :email, :username, :fechadenacimiento, :contrasena)";
            $stmt = $miDB->prepare($sql);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":username", $username);
            $stmt->bindValue(":fechadenacimiento", $fechadenacimiento);
            $stmt->bindValue(":contrasena", md5($contrasena));
            
            $stmt->execute();
            $result = $stmt->rowCount();

            if ($result > 0) {
                $lastID =  $miDB->lastInsertId();
                $mail = new PHPMailer;

                try {
                  $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                  $mail->isSMTP();  
                  $mail->Host = 'smtp.gmail.com';
                  $mail->SMTPAuth = true;
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                  $mail->Port = 587;
                  $mail->Username = 'playfifaspain@gmail.com';
                  $mail->Password = 'Usuario1.';
              
                  // Mensaje
                  $mail->setFrom('playfifaspain@gmail.com', 'PlayFIFASpain');
                  //Set an alternative reply-to address
                  // $mail->addReplyTo('betygol2019@gmail.com', 'Abonados Granada.C.F');
                  //Set who the message is to be sent to
                  $mail->addAddress($email, $username);
                  $mail->Subject = 'Completa tu registro en PlayFIFASpain';
                  // $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
                  // $tit = "Su pago se ha realizado con exito";
                  $parra='<b>Hola'.$username.' 
                  <p><a href="http://fifacompetitivo.000webhostapp.com/activate.php?id=' . base64_encode($lastID) . '">Haga click para activar su cuenta</a>
                  Un cordial saludo desde PlayFIFASpain';
                  $mail->Body=$parra;
                  // $mail->addAttachment('../images/banner_correo.png');
                  $mail->send();
              
              } catch (Exception $th) {
                  echo "Mensaje no Enviado $mail->ErrorInfo";
              }

            } else {
                echo json_encode(array("clave"=>'ErrorDistinto'));

               
              }
            }
          } catch (Exception $ex) {
            echo $ex->getMessage();
          }
        

   


  
//playfifaspain@gmail.com Usuario1 https://www.thesoftwareguy.in/user-registration-email-verification-using-php-mysql/


?>