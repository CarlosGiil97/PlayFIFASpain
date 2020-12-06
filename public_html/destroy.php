<?php
session_start();
// Eliminar todas las sesiones:
session_unset();
header('Location: index.php');


?>