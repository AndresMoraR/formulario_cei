<?php

function conectar_db(){
    try {
        $conexion = new PDO('mysql:host=;dbname=;charset=UTF8;','','');
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}
