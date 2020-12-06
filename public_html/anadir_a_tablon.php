<?php
session_start();
include("php/conex.php");
$miDB = conexion();
$hora_partido=$_POST['hora_partido'];
$fecha_actual=$_POST['fecha_actual'];
$id_local=$_SESSION['sesion']['id'];
echo $hora_partido.$fecha_actual.$id_local;
$sql = "INSERT INTO partidos_entrenamiento (id_local, hora_partido) VALUES " . "( :id_local, :hora_partido)"; 
$stmt = $miDB->prepare($sql);
$stmt->bindValue(":id_local", $id_local);
$stmt->bindValue(":hora_partido", "$hora_partido");
$stmt->execute();
$result = $stmt->rowCount();
if($result>0){
    echo json_encode(array("clave"=>'OK'));
}
?>