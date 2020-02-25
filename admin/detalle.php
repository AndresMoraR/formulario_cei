<?php 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
}

require 'clases/funciones.php';
require 'clases/conexion.php';
require 'clases/config.php';

// OBTENER DATOS DE UN PROYECTO GUARDADO PARA MOSTRAR EN MODAL DE DETALLE
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    try {        
        $resultados = select_only_project($_POST['proyecto'], conectar_db());
        $resultados['tipo_estudio'] = array_search($resultados['tipo_estudio'], $tipo_estudio);
        $resultados['tipo_trabajo'] = array_search($resultados['tipo_trabajo'], $tipo_trabajo);
                    
        $resultados_grupo = select_grupo_proyecto($_POST['proyecto'], conectar_db());
        $resultados_lugar = select_lugar_proyecto($_POST['proyecto'], conectar_db());
        $resultados_autor = select_autor_proyecto($_POST['proyecto'], conectar_db());
        $resultados_fincto = select_financiamiento($_POST['proyecto'], conectar_db());
        foreach ($resultados_autor as $key => $resultado_autor) {
            $resultados_autor[$key]['tipo_documento'] =  array_search($resultado_autor['tipo_documento'], $tipo_documento);                
            $resultados_autor[$key]['nivel_estudio_maximo'] = array_search($resultado_autor['nivel_estudio_maximo'], $max_nivel_estudio);
            $resultados_autor[$key]['rol_investigador'] = array_search($resultado_autor['rol_investigador'], $rol_investigador);
            $resultados_autor[$key]['especialidad'] = array_search($resultado_autor['especialidad'], $especialidad);
        }            
        if(isset($_POST['proyecto'])){       
            header('Content-type: application/vnd.ms-excel;charset=utf-8');
            header('Content-Disposition: attachment; filename=detalle_proyecto_'.$_POST['proyecto'].'.xls');
        }
    } catch (\Exception $e) {
        echo "Error: ". $e->getMessage();
    }
}

require 'views/detalle.view.php';