<?php session_start();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require 'funciones.php';
require 'conexion.php';

// GUARDAR DATOS INGRESADOS SOBRE UN PROYECTO
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $resultado_1 = guardar_proyecto($_POST, conectar_db());        
        foreach ($_POST['frmLugarRecc'] as $lugar) {
            $otra_institucion = ($lugar == 6) ? $_POST['frmOtraInstitucion'] : null;
            $data_1 = ['lugar' => $lugar, 'otra' => $otra_institucion, 'proyecto' => $resultado_1];
            $resultado_2 = guardar_proyecto_lugar($data_1, conectar_db());
        }
        $resultado_6 = guardar_financiar_proyecto($_POST, $resultado_1, conectar_db());
        foreach ($_POST['frmGrupo'] as $grupo) {
            $otro_grupo = ($grupo == 26) ? $_POST['frmOtroGrupo'] : null;
            $data_2 = ['grupo' => $grupo, 'proyecto' => $resultado_1, 'otro' => $otro_grupo];
            $resultado_3 = guardar_proyecto_grupo($data_2, conectar_db());   
        }
        foreach ($_POST['autores'] as $key => $autor) {
            $resultado_4 = guardar_autor($autor, $key, conectar_db());
            $data_3 = ['autor' => $resultado_4, 'proyecto' => $resultado_1];
            $resultado_5 = guardar_autor_proyecto($data_3, conectar_db());             
        }
        $resp_array = ['codigo_proyecto' => $resultado_1];
        echo json_encode($resp_array);
    } catch (\Exception $e) {
        echo "Error: ". $e->getMessage();
    }
}