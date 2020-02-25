<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table class="table table-sm" rules="all" style="border:1px solid black; border-collapse: collapse;">
    <tbody>                    
        <tr>
            <td colspan="1" scope="col" style="background-color:#A4A4A4; text-align: right;"><strong>TITULO</strong></td>
            <td colspan="19" id="titulo"><?php echo $resultados['titulo']; ?></td>
            <td colspan="1" scope="col" style="background-color:#A4A4A4; text-align: right;"><strong>CÓDIGO</strong></td>
            <td colspan="19" id="codigo"><?php echo $resultados['id']; ?></td>
        </tr>        		
        <tr>
            <td colspan="1" align="right" scope="col"><strong>Tipo de Estudio</strong></td>
            <td colspan="19" align="left"><?php echo $resultados['tipo_estudio']; ?></td>
            <td colspan="1" align="right" scope="col"><strong>Tipo de Trabajo</strong></td>
            <td colspan="19" align="left"><?php echo $resultados['tipo_trabajo']; ?></td>
        </tr>
		<tr>
            <td colspan="1" align="right" scope="col"><strong>Lugar en donde se realiza la Recolección/Reclutamiento de sujetos</strong></td>
            <td colspan="19" align="left">
                <?php foreach ($resultados_lugar as $resultado_lugar): ?>
                    <li><?php echo $resultado_lugar['nombre'] . ' '. $resultado_lugar['otra']; ?></li>
                <?php endforeach; ?>
            </td>
            <td colspan="1" align="right" scope="col"><strong>Duración del estudio</strong></td>
            <td colspan="19" align="left"><?php echo $resultados['duracion_estudio']; ?></td>
        </tr>
        <tr>
            <td colspan="40" style="background-color:#A4A4A4; text-align: center;"></td>
        </tr>
		<tr>
            <td colspan="1" align="right" ><strong>Objetivo General</strong></td>
            <td colspan="12"><?php echo $resultados['objetivo_general']; ?></td>
            <td colspan="1" align="right" ><strong>Población Participante</strong></td>
            <td colspan="12"><?php echo $resultados['poblacion_participante']; ?></td>
            <td colspan="1" align="right" ><strong>Resultados Esperados</strong></td>
            <td colspan="13"><?php echo $resultados['resultado']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" ><strong>¿El protocolo es patrocinado por la industria farmacéutica?</strong></td>
            <td colspan="12"><?php echo $resultados['industria_farmaceutica']; ?></td>
            <td colspan="1" align="right" ><strong>Patrocinador/CRO del Proyecto</strong></td>
            <td colspan="12"><?php echo $resultados['patrocinador']; ?></td>
            <td rowspan="2" colspan="1" align="right" style="vertical-align: middle;"><strong>Grupos</strong></td>
            <td rowspan="2" colspan="13">
                <?php foreach ($resultados_grupo as $resultado_grupo): ?>
                    <li><?php echo $resultado_grupo['nombre']; ?></li>
                <?php endforeach; ?>
            </td>
        </tr>
            <td colspan="1" align="right" ><strong>¿El trabajo será presentado a convocatoria para financiación?</strong></td>
            <td colspan="12"><?php echo $resultados['financiacion']; ?></td>
            <td colspan="1" align="right" ><strong>Convocatoria</strong></td>
            <td colspan="12"><?php echo $resultados['convocatoria']; ?></td>
        </tr>
    </tbody>
</table>

<table class="table table-sm" rules="all" style="border:1px solid black; border-collapse: collapse;">
	<tbody>
        <tr>
            <td colspan="40" style="background-color:#A4A4A4; text-align: center;"><strong>DATOS DE FINANCIAMIENTO</strong></td>
        </tr>
		<tr>
			<td colspan="14" align="center"><strong>FINANCIACIÓN</strong></td>
			<td colspan="13" align="center"><strong>VALOR FINANCIADO</strong></td>
			<td colspan="13" align="center"><strong>INSTITUCIONES INVOLUCRADAS</strong></td>
		</tr>
		<tr>
			<td colspan="14" align="center"><strong>Recursos de instituciones de educación superior</strong></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_inst_valor_financiado']; ?></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_inst_rel_institucion_involucrada']; ?></td>
		</tr>
		<tr>
			<td colspan="14" align="center"><strong>Recursos públicos nacionales</strong></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_pubn_valor_financiado']; ?></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_pubn_rel_institucion_involucrada']; ?></td>
		</tr>
		<tr>
			<td colspan="14" align="center"><strong>Recursos públicos departamentales o municipales</strong></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_pubd_valor_financiado']; ?></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_pubd_rel_institucion_involucrada']; ?></td>
		</tr>
		<tr>
			<td colspan="14" align="center"><strong>Recursos de instituciones privadas</strong></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_instp_valor_financiado']; ?></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_instp_rel_institucion_involucrada']; ?></td>
		</tr>
		<tr>
			<td colspan="14" align="center"><strong>Otras entidades</strong></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_otros_valor_financiado']; ?></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_otros_rel_institucion_involucrada']; ?></td>
		</tr>
		<tr>
			<td colspan="14" align="center"><strong>Recursos personales</strong></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_per_valor_financiado']; ?></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_per_rel_institucion_involucrada']; ?></td>
		</tr>
		<tr>
			<td colspan="14" align="center"><strong>Recursos internacionales</strong></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_intr_valor_financiado']; ?></td>
			<td colspan="13" align="center"><?php echo $resultados_fincto['rec_intr_rel_institucion_involucrada']; ?></td>
		</tr>
	</tbody>
</table>


<table class="table table-sm" rules="all" style="border:1px solid black; border-collapse: collapse;">
    <tbody>             
        <tr>
            <td colspan="40" style="background-color:#A4A4A4; text-align: center;"><strong>A U T O R E S</strong></td>
        </tr>
        <tr>
            <td colspan="10" style="background-color:#AABBCC; text-align: center;"><strong>Autor 1</strong></td>
            <td colspan="10" style="background-color:#AABBCC; text-align: center;"><strong>Autor 2</strong></td>
            <td colspan="10" style="background-color:#AABBCC; text-align: center;"><strong>Autor 3</strong></td>
            <td colspan="10" style="background-color:#AABBCC; text-align: center;"><strong>Autor 4</strong></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Nombre</strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['nombre']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Nombre</strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['nombre']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Nombre</strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['nombre']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Nombre</strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['nombre']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Tipo de Documento</strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['tipo_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Tipo de Documento</strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['tipo_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Tipo de Documento</strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['tipo_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Tipo de Documento</strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['tipo_documento']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número de Documento<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['num_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número de Documento<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['num_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número de Documento<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['num_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número de Documento<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['num_documento']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Máximo nivel de estudio<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['nivel_estudio_maximo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Máximo nivel de estudio<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['nivel_estudio_maximo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Máximo nivel de estudio<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['nivel_estudio_maximo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Máximo nivel de estudio<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['nivel_estudio_maximo']; ?></td>
        </tr>

        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número Celular<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['num_celular']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número Celular<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['num_celular']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número Celular<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['num_celular']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número Celular<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['num_celular']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Correo<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['correo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Correo<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['correo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Correo<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['correo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Correo<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['correo']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Rol Investigador<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['rol_investigador']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Rol Investigador<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['rol_investigador']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Rol Investigador<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['rol_investigador']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Rol Investigador<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['rol_investigador']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Especialidad<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['especialidad']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Especialidad<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['especialidad']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Especialidad<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['especialidad']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Especialidad<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['especialidad']; ?></td>
        </tr>

        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Vinculado a Keralty<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['vinculado_keralty']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Vinculado a Keralty<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['vinculado_keralty']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Vinculado a Keralty<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['vinculado_keralty']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Vinculado a Keralty<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['vinculado_keralty']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Empresa Vinculación<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['nombre_empresa']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Empresa Vinculación<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['nombre_empresa']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Empresa Vinculación<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['nombre_empresa']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Empresa Vinculación<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['nombre_empresa']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong> País de residencia<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[0]['pais_residencia']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong> País de residencia<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[1]['pais_residencia']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong> País de residencia<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[2]['pais_residencia']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong> País de residencia<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[3]['pais_residencia']; ?></td>
        </tr>
        <tr>
            <td colspan="40" style="background-color:#A4A4A4;">.</td>
        </tr>
        <tr>
            <td colspan="10" style="background-color:#AABBCC; text-align: center;"><strong>Autor 5</strong></td>
            <td colspan="10" style="background-color:#AABBCC; text-align: center;"><strong>Autor 6</strong></td>
            <td colspan="10" style="background-color:#AABBCC; text-align: center;"><strong>Autor 7</strong></td>
            <td colspan="10" style="background-color:#AABBCC; text-align: center;"><strong>Autor 8</strong></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Nombre</strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['nombre']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Nombre</strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['nombre']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Nombre</strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['nombre']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Nombre</strong></td>
            <td colspan="9"><?php echo $resultados_autor[7]['nombre']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Tipo de Documento</strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['tipo_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Tipo de Documento</strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['tipo_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Tipo de Documento</strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['tipo_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Tipo de Documento</strong></td>
            <td colspan="9"><?php echo $resultados_autor[7]['tipo_documento']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número de Documento<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['num_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número de Documento<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['num_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número de Documento<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['num_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número de Documento<strong></strong></strong></td>
             <td colspan="9"><?php echo $resultados_autor[7]['num_documento']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Máximo nivel de estudio<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['nivel_estudio_maximo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Máximo nivel de estudio<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['nivel_estudio_maximo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Máximo nivel de estudio<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['nivel_estudio_maximo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Máximo nivel de estudio<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[7]['nivel_estudio_maximo']; ?></td>
        </tr>

        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número Celular<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['num_celular']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número Celular<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['num_celular']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número Celular<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['num_celular']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número Celular<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[7]['num_celular']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Correo<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['correo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Correo<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['correo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Correo<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['correo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Correo<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[7]['correo']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Rol Investigador<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['rol_investigador']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Rol Investigador<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['rol_investigador']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Rol Investigador<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['rol_investigador']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Rol Investigador<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[7]['rol_investigador']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Especialidad<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['especialidad']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Especialidad<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['especialidad']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Especialidad<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['especialidad']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Especialidad<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[7]['especialidad']; ?></td>
        </tr>

        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Vinculado a Keralty<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['vinculado_keralty']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Vinculado a Keralty<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['vinculado_keralty']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Vinculado a Keralty<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['vinculado_keralty']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Vinculado a Keralty<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[7]['vinculado_keralty']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Empresa Vinculación<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['nombre_empresa']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Empresa Vinculación<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['nombre_empresa']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Empresa Vinculación<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['nombre_empresa']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Empresa Vinculación<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[7]['nombre_empresa']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong> País de residencia<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[4]['pais_residencia']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong> País de residencia<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[5]['pais_residencia'];; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong> País de residencia<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[6]['pais_residencia']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong> País de residencia<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[7]['pais_residencia']; ?></td>
        </tr>
        <tr>
            <td colspan="40" style="background-color:#A4A4A4;">.</td>
        </tr>
        <tr>
            <td colspan="10" style="background-color:#AABBCC; text-align: center;"><strong>Autor 9</strong></td>
            <td colspan="10" style="background-color:#AABBCC; text-align: center;"><strong>Autor 10</strong></td>
            <td colspan="20" style="background-color:#AABBCC; text-align: center;"></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Nombre</strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['nombre']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Nombre</strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['nombre']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Tipo de Documento</strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['tipo_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Tipo de Documento</strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['tipo_documento']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número de Documento<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['num_documento']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número de Documento<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['num_documento']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Máximo nivel de estudio<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['nivel_estudio_maximo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Máximo nivel de estudio<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['nivel_estudio_maximo']; ?></td>
        </tr>

        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número Celular<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['num_celular']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Número Celular<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['num_celular']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Correo<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['correo']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Correo<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['correo']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Rol Investigador<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['rol_investigador']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Rol Investigador<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['rol_investigador']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Especialidad<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['especialidad']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Especialidad<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['especialidad']; ?></td>
        </tr>

        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Vinculado a Keralty<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['vinculado_keralty']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Vinculado a Keralty<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['vinculado_keralty']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Empresa Vinculación<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['nombre_empresa']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong>Empresa Vinculación<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['nombre_empresa']; ?></td>
        </tr>
        <tr>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong> País de residencia<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[8]['pais_residencia']; ?></td>
            <td colspan="1" align="right" style="background-color:#AABBCC;  "><strong> País de residencia<strong></strong></strong></td>
            <td colspan="9"><?php echo $resultados_autor[9]['pais_residencia']; ?></td>
        </tr>
    </tbody>
</table>