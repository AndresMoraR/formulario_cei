<?php session_start();

require 'clases/conexion.php';
require 'clases/funciones.php';

if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
}
$errores = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['inp_user']), FILTER_SANITIZE_STRING);
    $password = $_POST['inp_pass'];
    $password = hash('md5', $password);

    try {
        $conexion = conectar_db();
        $resultado = select_user($usuario,$password,$conexion);
        if($resultado <> false){
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
        } else {
            $errores .= 'DATOS INGRESADOS INCORRECTOS';
        }
        
    } catch (PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
}

require 'views/login.view.php' ;