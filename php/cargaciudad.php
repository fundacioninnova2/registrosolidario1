<?php
/**
 * Created by PhpStorm.
 * User: Camilo Orellana
 * Date: 06-02-2017
 * Time: 17:24
 */

require_once '../include/conn.php';


function getlistacomuna()
{
    $mysqli = getConn();
    $id = $_POST['id'];

    $listas = '<option value="-1">SELECCIONAR COMUNAS</option>';

    $query1 = "SELECT * FROM comunas WHERE provincia_id ='".$id."'";
    $result=$mysqli->query($query1);
    while ($rows = $result->fetch_assoc()) {

        $listas .= '<option value="' . $rows['comuna_id'] . '">' . $rows['comuna_nombre'] . '</option>';
    }
    return $listas;
}

echo getlistacomuna();
