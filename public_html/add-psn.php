<?php
session_start();
include("php/conex.php");
$miDB = conexion();
$psn=$_POST['psn'];
$id=$_SESSION['sesion']['id'];
$sql = "INSERT INTO usuario_psn (id, usuario_psn) VALUES " . "( :id, :psn)";

$stmt = $miDB->prepare($sql);
$stmt->bindValue(":id", $id);
$stmt->bindValue(":psn", $psn);
$stmt->execute();
$result = $stmt->rowCount();
if($result>0){
    // Aquí tengo que volver a vincular la sesión del ID con lo que acaba de añadir el usuario ya que esta sesión se establecía con el login del usuario, pero si aún no habia
    // registrado ningun id , no existia esa sesión
    $resultado_obtenido1 = $miDB->query("SELECT usuario_psn FROM usuario_psn WHERE id=".$_SESSION['sesion']['id']."",PDO::FETCH_ASSOC);
        $cuenta1 = $resultado_obtenido1->rowCount();
        foreach ($resultado_obtenido1 as $row1) {
            //      var_dump($row);
                }
                if($cuenta1){
                    $_SESSION['sesion']['usuario_psn']=$row1['usuario_psn'];
                }
    echo json_encode(array("clave"=>'OK'));
}
?>