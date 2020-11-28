<?php
// session_start();

function conexion(){
    $usuario = "id15424712_databasa_username";
    $password = "Usuario1.?--";
    $dbname = "id15424712_database_fifa";
    $dsn='mysql:dbname='.$dbname.';host=localhost';
    $array_atributos = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8' COLLATE 'utf8_spanish_ci'");
    try {
        $conexDB = new PDO($dsn, $usuario, $password, $array_atributos);
        // echo "Conexión establecida";
        $res = $conexDB->query("SELECT COLLATION('$dbname')");
        //  var_dump($res);
        // echo "<br>";
        // echo $res->fetch(PDO::FETCH_NUM)[0];
        // echo "<br>";
        // echo $conexDB->getAttribute(PDO::ATTR_SERVER_INFO);
        

    } catch (PDOException $th) {
        $th->getMesssage();
        exit();
        //throw $th;
    }
    return $conexDB;
}
$con = conexion();


function sacarUltimoID($con){
    $sql = "SELECT MAX(id) as 'ultimo_id_añadido' FROM usuarios";
    $resultado = $con->query($sql);
    foreach ($con->query($sql) as $row){
        return ($row['ultimo_id_añadido']);
    }
    }

    // $ultimoID = sacarUltimoID($con);
    // echo base64_encode($ultimoID);

    // echo base64_decode('NDE=');
// function añadirJugadoraBD($email,$username,$fechadenacimiento,$contrasena,$con){
//     $total =$con->prepare("INSERT INTO usuarios(email,username,fechadenacimiento,contrasena)
//     VALUES (:email,:username,:fechadenacimiento,:contrasena)");

//     $total->execute(array(':email'=>$email,':username'=>$username,':fechadenacimiento'=>$fechadenacimiento,':contrasena'=>$contrasena));
//     $arr = $total->errorInfo();
// }

// function añadirJugadoraBD($con,$email,$username,$fechadenacimiento,$contrasena){
//     $total = $con->prepare("INSERT INTO usuarios(email,username,fechadenacimiento,contrasena)
//     VALUES (:email,:username,:fechadenacimiento,:contrasena)");

//     $total->execute(array(':email'=>$email,':username'=>$username,':fechadenacimiento'=>$fechadenacimiento,':contrasena'=>$contrasena));
//     $arr = $total->errorInfo();
// }
// ?>
