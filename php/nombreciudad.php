<?php
/**
 * Created by PhpStorm.
 * User: Camilo Orellana
 * Date: 07-02-2017
 * Time: 23:01
 */
require_once '../include/conn.php';
$id_ciudad = $_POST['id_ciudad'];
$mysqli = getConn();
$query1 = "SELECT * FROM comunas WHERE comuna_id ='".$id_ciudad."'";
$result=$mysqli->query($query1);
while ($rows = $result->fetch_assoc()) {
    $datos['nombre_ciudad'] = $rows['comuna_nombre'];
}
echo json_encode($datos);
