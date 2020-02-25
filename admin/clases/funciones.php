<?php 

// CONSULTA PARA LOGUEO
function select_user($usuario, $pass, $conexion)
{
    $statement = $conexion->prepare('SELECT * FROM inv_user WHERE user_login = :usuario AND user_password = :pass AND user_estado = 1');
    $statement->execute([
        ':usuario' => $usuario, 
        ':pass' => $pass
    ]);
    return $statement->fetch();
}

// CONSULTA DE PROYECTOS PARA TABLA FILTRADO POR FECHA DE CREACIÓN
function select_projects_by_date($fecha_inicial, $fecha_final, $conexion, $csv)
{
    $statement = $conexion->prepare('select * from inv_proyecto where `fecha_creacion` between :fecha_ini and :fecha_fin order by fecha_creacion desc');
    $statement->execute([
        'fecha_ini' => $fecha_inicial.' 00:00:00',
        'fecha_fin' => $fecha_final.' 23:59:59'
    ]);
    if($csv){        
        return $statement;        
    }else {
        return $statement->fetchAll();        
    }
    
}

// CONSULTA DE TODOS LOS PROYECTOS
function select_all_projects($conexion)
{
    $statement = $conexion->prepare('select * from inv_proyecto order by fecha_creacion desc');
    $statement->execute();
    return $statement->fetchAll();
}

// CONSULTA DE UNICO PROYECTO POR ID
function select_only_project($cod_pr,$conexion)
{
    $statement = $conexion->prepare('SELECT * FROM inv_proyecto WHERE id = :id_pr');
    $statement->execute([
        'id_pr' => $cod_pr
    ]);
    return $statement->fetch();
}

// CONSULTA DE GRUPOS POR PROYECTO
function select_grupo_proyecto($proyecto, $conexion)
{
    $statement = $conexion->prepare('SELECT * FROM inv_grupo_proyecto gpr
                                     INNER JOIN inv_grupo gr ON gpr.grupo = gr.id
                                     WHERE gpr.proyecto = :proyecto');
    $statement->execute([
        'proyecto' => $proyecto
    ]);
    return $statement->fetchAll();
}

// CONSULTA DE LUGARES POR PROYECTO
function select_lugar_proyecto($proyecto, $conexion)
{
    $statement = $conexion->prepare('SELECT * FROM inv_lugar_proyecto lpr
                                     INNER JOIN inv_lugar lg ON lpr.lugar = lg.id
                                     WHERE lpr.proyecto = :proyecto');
    $statement->execute([
        'proyecto' => $proyecto
    ]);
    return $statement->fetchAll();                                     
}

// CONSULTA DE AUTORES POR PROYECTO
function select_autor_proyecto($proyecto, $conexion)
{
    $statement = $conexion->prepare('SELECT * FROM inv_autor_proyecto apr
                                     INNER JOIN inv_autor aut on apr.autor = aut.id
                                     WHERE apr.proyecto = :proyecto');
    $statement->execute([
        'proyecto' => $proyecto
    ]);
    return $statement->fetchAll();
}

// CONSULTA DE DATOS DE FINANCIAMIENTO X PROYECTO
function select_financiamiento($proyecto, $conexion)
{
    $statement = $conexion->prepare('SELECT * FROM inv_financiacion WHERE id_proyecto = :proyecto;');
    $statement->execute([
        'proyecto' => $proyecto
    ]);
    return $statement->fetch();
}

// GUARDAR DATOS DE PROYECTO
function guardar_proyecto($data,$conexion)
{   
    $statement = $conexion->prepare('INSERT INTO inv_proyecto'.
    '(
        titulo, tipo_estudio, tipo_trabajo, pregunta_inv, objetivo_general, objetivo_especifico, 
        poblacion_participante, tratamiento_intervencion, analisis_datos, resultado, duracion_estudio, 
        consideraciones_eticas, industria_farmaceutica, patrocinador, financiacion, convocatoria,
        presupuesto_total 
     )'.
    ' VALUES (
        :titulo, :tipo_estudio, :tipo_trabajo, :pregunta_inv, :objetivo_general, :objetivo_especifico, 
        :poblacion_participante, :tratamiento_intervencion, :analisis_datos, :resultado, :duracion_estudio,
        :consideraciones_eticas, :industria_farmaceutica, :patrocinador, :financiacion, :convocatoria,
        :presupuesto_total
     )');
    $statement->execute([
        'titulo' => strtoupper($data['frmTitulo']),
        'tipo_estudio'  => strtoupper($data['frmEstudio']),
        'tipo_trabajo'  => strtoupper($data['frmTipoTrabajo']),
        'pregunta_inv'  => strtoupper($data['frmPregunta']),
        'objetivo_general'  => strtoupper($data['frmObjetivo']),
        'objetivo_especifico'  => strtoupper($data['frmObjetivoEsp']),
        'poblacion_participante' => strtoupper($data['frmPoblacion']),
        'tratamiento_intervencion' => strtoupper($data['frmTratamiento']),
        'analisis_datos' => strtoupper($data['frmAnalisis']),        
        'resultado' => strtoupper($data['frmResultados']),
        'duracion_estudio'  => strtoupper($data['frmDuracion']),
        'consideraciones_eticas' => strtoupper($data['frmConsideraciones']),
        'industria_farmaceutica' => strtoupper($data['frmProtocolo']),
        'patrocinador' => strtoupper($data['frmPatrocinador']),
        'financiacion' => strtoupper($data['frmFinanciacion']),
        'convocatoria' => strtoupper($data['frmConvocatoria']),
        'presupuesto_total' => strtoupper($data['frmPresupuestoTotal'])
    ]);
    $statement->fetch();
    return $conexion->lastInsertId();
}

// GUARDAR LUGARES X PROYECTO
function guardar_proyecto_lugar($data, $conexion)
{           
    $statement = $conexion->prepare('INSERT INTO inv_lugar_proyecto(lugar,proyecto,otra) VALUES(:lugar, :proyecto, :otra)');
    $statement->execute([
        'lugar' => $data['lugar'],
        'proyecto' => $data['proyecto'],
        'otra' => strtoupper($data['otra'])
    ]);
    return $statement->fetch();
}

// GUARDAR GRUPOS X PROYECTO
function guardar_proyecto_grupo($data, $conexion)
{
    $statement = $conexion->prepare('INSERT INTO inv_grupo_proyecto(grupo, proyecto) VALUES(:grupo, :proyecto, :otro)');
    $statement->execute([
        'grupo' => $data['grupo'],
        'proyecto' => $data['proyecto'],
        'otro' => strtoupper($data['otro'])
    ]);
    return $statement->fetch();
}

// GUARDAR AUTORES
function guardar_autor($data, $key, $conexion)
{
    if(!empty($data['frmNomautor'.$key])){
        $statement = $conexion->prepare('
        INSERT INTO inv_autor (nombre, tipo_documento, num_documento, 
                        nivel_estudio_maximo, num_celular, correo, rol_investigador, 
                        especialidad, otra_especialidad, vinculado_keralty, nombre_empresa, pais_residencia, otra_empresa)
                    VALUES(
                        :nombre, :tipo_documento, :num_documento, 
                        :nivel_estudio_maximo, :num_celular, :correo, :rol_investigador, 
                        :especialidad, :otra_especialidad, :vinculado_keralty, :nombre_empresa, :pais_residencia, :otra_empresa
                        )   
        ');
        $statement->execute([
            'nombre' => strtoupper($data['frmNomautor'.$key]), 
            'tipo_documento' => strtoupper($data['frmTipo'.$key]), 
            'num_documento' => strtoupper($data['frmNumdoc'.$key]),  
            'nivel_estudio_maximo' => strtoupper($data['frmNivelEst'.$key]), 
            'num_celular' => strtoupper($data['frmTeleph'.$key]), 
            'correo' => strtoupper($data['frmCorreo'.$key]), 
            'rol_investigador' => strtoupper($data['frmRol'.$key]), 
            'especialidad' => strtoupper($data['frmEspecialidad'.$key]),
            'otra_especialidad' => strtoupper($data['otra_especialidad'].$key),
            'vinculado_keralty' => strtoupper($data['frmKeralty'.$key]),
            'nombre_empresa' => strtoupper($data['frmEmpresaVin'.$key]), 
            'pais_residencia' => strtoupper($data['frmPaisRes'.$key]),
            'otra_empresa' => strtoupper($data['frmOtraEmpresaVin'.$key])
        ]);
        $statement->fetch();
        return $conexion->lastInsertId();
    }
}

// GUARDAR AUTORES X PROYECTO
function guardar_autor_proyecto($data, $conexion)
{
    $statement = $conexion->prepare('INSERT INTO inv_autor_proyecto(autor,proyecto) VALUES(:autor,:proyecto)');
    $statement->execute([
        'autor' => $data['autor'],
        'proyecto' => $data['proyecto']
    ]);
    return $statement->fetch();
}

// GUARDAR DATOS DE FINANCIACIÓN X PROYECTO
function guardar_financiar_proyecto($data, $proyecto, $conexion)
{
    $statement = $conexion->prepare(
        'INSERT INTO inv_financiacion
        (rec_inst_valor_financiado, rec_inst_rel_institucion_involucrada, rec_pubn_valor_financiado,
         rec_pubn_rel_institucion_involucrada, rec_pubd_valor_financiado, rec_pubd_rel_institucion_involucrada, 
         rec_instp_valor_financiado, rec_instp_rel_institucion_involucrada, rec_otros_valor_financiado, 
         rec_otros_rel_institucion_involucrada, rec_per_valor_financiado, rec_per_rel_institucion_involucrada, 
         rec_intr_valor_financiado, rec_intr_rel_institucion_involucrada, rec_pais_fin_institucion_involucrada, id_proyecto)
        VALUES(:rec_inst_valor_financiado, :rec_inst_rel_institucion_involucrada, :rec_pubn_valor_financiado,
         :rec_pubn_rel_institucion_involucrada, :rec_pubd_valor_financiado, :rec_pubd_rel_institucion_involucrada, 
         :rec_instp_valor_financiado, :rec_instp_rel_institucion_involucrada, :rec_otros_valor_financiado, 
         :rec_otros_rel_institucion_involucrada, :rec_per_valor_financiado, :rec_per_rel_institucion_involucrada, 
         :rec_intr_valor_financiado, :rec_intr_rel_institucion_involucrada, :rec_pais_fin_institucion_involucrada, :id_proyecto)
    ');
    $statement->execute([
        'rec_inst_valor_financiado' => strtoupper($data['frmValorFin0']), 
        'rec_inst_rel_institucion_involucrada' => strtoupper($data['frmRelIns0']), 
        'rec_pubn_valor_financiado' => strtoupper($data['frmValorFin1']),
        'rec_pubn_rel_institucion_involucrada' => strtoupper($data['frmRelIns1']), 
        'rec_pubd_valor_financiado' => strtoupper($data['frmValorFin2']), 
        'rec_pubd_rel_institucion_involucrada' => strtoupper($data['frmRelIns2']), 
        'rec_instp_valor_financiado' => strtoupper($data['frmValorFin3']), 
        'rec_instp_rel_institucion_involucrada' => strtoupper($data['frmRelIns3']), 
        'rec_otros_valor_financiado' => strtoupper($data['frmValorFin4']), 
        'rec_otros_rel_institucion_involucrada' => strtoupper($data['frmRelIns4']), 
        'rec_per_valor_financiado' => strtoupper($data['frmValorFin5']), 
        'rec_per_rel_institucion_involucrada' => strtoupper($data['frmRelIns5']), 
        'rec_intr_valor_financiado' => strtoupper($data['frmValorFin6']), 
        'rec_intr_rel_institucion_involucrada' => strtoupper($data['frmRelIns6']), 
        'rec_pais_fin_institucion_involucrada' => strtoupper($data['frmPaisFin7']), 
        'id_proyecto'  => $proyecto
    ]);
    return $statement->fetch();
}