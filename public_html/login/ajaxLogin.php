<?php
include("../php/conex.php");
$miDB=conexion();

if(isset($_POST['username']) && isset($_POST['password']))
{
// username and password sent from Form
$username=$_POST['username']; 
//Here converting passsword into MD5 encryption. 
$password=md5($_POST['password']); 
// echo $password;
$resultado_obtenido = $miDB->query("SELECT id,username,email,contrasena FROM usuarios WHERE username='$username' and contrasena='$password'",PDO::FETCH_ASSOC);

// $sql = "SELECT id FROM usuarios WHERE username=$username and contrasena=$password";
//        $result_usuarios = $miDB->query($sql);
        // var_dump($resultado_obtenido);
        $cuenta = $resultado_obtenido->rowCount();
        foreach ($resultado_obtenido as $row) {
        //      var_dump($row);
            }
      
            if($cuenta){
                session_start();
                
                    $_SESSION['sesion']['id']=$row['id'];
                    $_SESSION['sesion']['username']=$row['username'];
                    $_SESSION['sesion']['email']=$row['email'];
                    $_SESSION['sesion']['contrasena']=$row['contrasena'];
                    echo $cuenta;
            }
        $resultado_obtenido1 = $miDB->query("SELECT usuario_psn FROM usuario_psn WHERE id=".$_SESSION['sesion']['id']."",PDO::FETCH_ASSOC);
        $cuenta1 = $resultado_obtenido1->rowCount();
        foreach ($resultado_obtenido1 as $row1) {
            //      var_dump($row);
                }
                if($cuenta1){
                    $_SESSION['sesion']['usuario_psn']=$row1['usuario_psn'];
                }
}
?>