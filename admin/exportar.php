<?php session_start();

require 'clases/funciones.php';
require 'clases/conexion.php';
require 'clases/config.php';

// EXPORTAR DATOS A ARCHIVO CSV CON NATIVO DE PHP.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $conexion = conectar_db();
        if(!empty($_POST['inp_date_init']) && !empty($_POST['inp_date_end'])){
            $resultados = select_projects_by_date($_POST['inp_date_init'], $_POST['inp_date_end'], $conexion, true);         
        }else{
            $resultados = select_all_projects($conexion);
        }             
        $headers = array();
        for ($i = 0; $i < $resultados->columnCount(); $i++) {
            $col = $resultados->getColumnMeta($i);
            $headers[] = $col['name'];
        }
        $fp = fopen('php://output', 'w');
        if ($fp && $resultados) {
            header('Content-Type: text/csv;charset=UTF-8');
            header('Content-Disposition: attachment; filename="archivo-plano-'.date("Y-m-d H:i:s").'.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');
            fputcsv($fp, $headers);
            foreach ($resultados->fetchAll(PDO::FETCH_ASSOC) as $value) {
                $value['tipo_estudio'] = array_search($value['tipo_estudio'], $tipo_estudio);
                $value['tipo_trabajo'] = array_search($value['tipo_trabajo'], $tipo_trabajo);
                $value['estado'] = ($value['estado'] == 1) ? 'Activo' : 'Inactivo';
                fputcsv($fp, array_values($value));
            }   
            fclose($fp);
            exit();
        }   
    } catch (PDOException $e) {
        echo "Error: ". $e->getMessage();
    }
}