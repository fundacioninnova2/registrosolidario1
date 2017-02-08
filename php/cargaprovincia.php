<?php
/**
 * Created by PhpStorm.
 * User: Camilo Orellana
 * Date: 06-02-2017
 * Time: 17:24
 */

require_once '../include/conn.php';


function getlistaprovincia(){
    $mysqli = getConn();
    $id = $_POST['id'];
    $query2 = "SELECT * FROM provincias WHERE region_id='".$id."'";
    $resultado = $mysqli->query($query2);



$listas = '<option value="-1">SELECCIONAR PROVINCIAS</option>';
while ($rows = $resultado->fetch_assoc()) {
    $listas .=  '<option value="'.$rows['provincia_id'].'">'.$rows['provincia_nombre'].'</option>';
}
return $listas;
}
echo getlistaprovincia();
