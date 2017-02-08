<?php
/**
 * Created by PhpStorm.
 * User: Camilo Orellana
 * Date: 06-02-2017
 * Time: 11:44
 */

function getConn()
{
    $hostname = "104.154.202.104";
    $database = "registrosolidario";
    $username = "root";
    $password = "";

    $mysqli = new mysqli($hostname, $username, $password, $database);
    if (mysqli_connect_errno($mysqli)) {
        echo "Fallo al conectar a MySQL" . mysqli_connect_error();

    }else{

    $mysqli->set_charset('utf8');
    return $mysqli;

    }


}

