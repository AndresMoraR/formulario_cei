<?php session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}

require 'clases/funciones.php';
require 'clases/conexion.php';

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// LISTADO DE PROYECTOS GUARDADOS
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $conexion = conectar_db();
        if(!empty($_POST['inp_date_init']) && !empty($_POST['inp_date_end'])){
            $resultados = select_projects_by_date($_POST['inp_date_init'], $_POST['inp_date_end'], $conexion, false); 
        }else{
            $resultados = select_all_projects($conexion);
        }                
        echo json_encode($resultados);           
    } catch (PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
}