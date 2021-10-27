<?php

function conectar_db(){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=virtual_dbcei;charset=UTF8;','root','root');
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}
