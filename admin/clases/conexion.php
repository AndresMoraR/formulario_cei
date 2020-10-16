<?php

function conectar_db(){
    try {
        $conexion = new PDO('mysql:host=127.0.0.1;dbname=;charset=UTF8;','root','');
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}
