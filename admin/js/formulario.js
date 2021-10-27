$(function (){
    $("#dialog-confirm").dialog({
        autoOpen : false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        close: function() {
            window.location.href = '../formulario/gracias.html';
        }
    });

    $('#enviar').click(function () {
        var resp_validate = validate_form();
        if(resp_validate == true){
            $.post("admin/clases/procesar.php", $("#form1").serialize()).done(function(data){
                var rta = JSON.parse(data);
                $('#text_dialgo').append("EL SIGUIENTE CÓDIGO ES EL GENERADO PARA EL PROYECTO DILIGENCIADO: <b>"+rta.codigo_proyecto+"</b>");
                $("#dialog-confirm").dialog("open");
            });
        }
    })  
})

// VALIDAR DATOS EN CADA TAB
// DE ACUERDO AL TAB SE APLICA UNA CLASE PARA SER VALIDADO,
// DE ACUERTO AL TIPO DE DATO QUE LLEVA EL CAMPO.
// DE ACUERDO A SI ES NECESARIO INGRESAR EL CAMPO.
function validate_form(){
    var validate = true;
    limpiar_campos();
    
    // VALIDAR CAMPOS DE AUTORES TAB 4
    $('.required_tab4_1').each(function(){
        var id = $(this).parent().parent().parent().attr('codigo');
        if($(this).parent().parent().parent().css('display') == 'inline'){
            if($("input[id='frmKeralty"+id+"']:checked").val() == 'si' && $('#frmEmpresaVin'+id).val() == ''){
                $('#mostrar_trat4').click();
                $('#frmEmpresaVin'+id).css('border-color','red').css('border-width','initial').focus();
                return validate = false;
            }else{
                if($(this).val() == '' && this.id !== 'frmOtraEspecialidad'+id && this.id !== 'frmEmpresaVin'+id && this.id !== 'frmOtraEmpresaVin'+id){
                    $('#mostrar_trat4').click();
                    $(this).css('border-color','red').css('border-width','initial').focus();
                    return validate = false;
                }else{
                    if(this.id == 'frmCorreo'+id){
                        if(validate_email($(this).val()) == false){                     
                            $('#msjCorreo'+id).show().html('<b>FORMATO DE CORREO INVALIDO</b>')
                            $('#mostrar_trat4').click();
                            $(this).css('border-color','red').css('border-width','initial').focus();
                            return validate = false;
                        }
                    }else if($(this).hasClass("str_on")){
                        if(validate_string($(this).val()) == false){
                            $('#mostrar_trat4').click();
                            var div_msj = $(this).data('msj');
                            $("#"+div_msj).show().html('<b>INGRESAR SOLO TEXTO</b>');
                            $(this).css('border-color','red').css('border-width','initial').focus();
                            return validate = false;
                        }
                    }else if($(this).hasClass("int_on")){
                        if(validate_integer($(this).val()) == false){
                            $('#mostrar_trat4').click();
                            var div_msj = $(this).data('msj');
                            $("#"+div_msj).show().html('<b>INGRESAR SOLO NÚMEROS</b>');
                            $(this).css('border-color','red').css('border-width','initial').focus();
                            return validate = false;
                        }
                    }else if(this.id == 'frmOtraEmpresaVin'+id){
                        if ($("#frmEmpresaVin"+id).val() == 5 && $(this).val() == ''){
                            $('#mostrar_trat4').click();
                            $(this).css('border-color','red').css('border-width','initial').focus();
                            return validate = false;
                        }
                    }else if(this.id == 'frmOtraEspecialidad'+id){
                        if ($("#frmEspecialidad"+id).val() == 19 && $(this).val() == ''){
                            $('#mostrar_trat4').click();
                            $(this).css('border-color','red').css('border-width','initial').focus();
                            return validate = false;
                        }
                    }
                }
            }
        }
    })

    // VALIDAR CAMPOS DE TAB 4
    $('.required_tab4').each(function(){        
        if($("input[id='frmKeralty1']:checked").val() == 'si' && $('#frmEmpresaVin1').val() == ''){
            $('#mostrar_trat4').click();
            $('#frmEmpresaVin1').css('border-color','red').css('border-width','initial').focus();
            return validate = false;                       
        }else{            
            if($(this).val() == '' && this.id !== 'frmOtraEspecialidad1' && this.id !== 'frmEmpresaVin1' && this.id !== 'frmOtraEmpresaVin1' && this.id !== 'frmOtroGrupo'){        
                $('#mostrar_trat4').click();
                $(this).css('border-color','red').css('border-width','initial').focus();
                return validate = false;
            }else{
                if($(this).hasClass("chk_val")){
                    if($("input[name='frmGrupo[]']:checked").length == 0){ 
                        $('#mostrar_trat4').click();
                        var div_msj = $(this).data('msj');
                        $("#"+div_msj).show().html('<b>NO SE HA SELECCIONADO NINGUNA DE LAS OPCIONES</b>');
                        $("input[name='frmGrupo[]']").css('outline', '3px solid #c00').focus();
                        return validate = false;
                    }             
                }else if(this.id == 'frmCorreo1'){    
                    if(validate_email($(this).val()) == false){
                        $('#msjCorreo1').show().html('<b>FORMATO DE CORREO INVALIDO</b>')
                        $('#mostrar_trat4').click();
                        $(this).css('border-color','red').css('border-width','initial').focus();
                        return validate = false;
                    }
                }else if($(this).hasClass("str_on")){
                    if(validate_string($(this).val()) == false){
                        $('#mostrar_trat4').click();
                        var div_msj = $(this).data('msj');
                        $("#"+div_msj).show().html('<b>INGRESAR SOLO TEXTO</b>');
                        $(this).css('border-color','red').css('border-width','initial').focus();
                        return validate = false;
                    }
                }else if($(this).hasClass("int_on")){
                    if(validate_integer($(this).val()) == false){
                        $('#mostrar_trat4').click();
                        var div_msj = $(this).data('msj');
                        $("#"+div_msj).show().html('<b>INGRESAR SOLO NÚMEROS</b>');
                        $(this).css('border-color','red').css('border-width','initial').focus();
                        return validate = false;
                    }                
                }else if(this.id == 'frmOtraEmpresaVin1'){
                    if ($("#frmEmpresaVin1").val() == 5 && $(this).val() == ''){
                        $('#mostrar_trat4').click();
                        $(this).css('border-color','red').css('border-width','initial').focus();
                        return validate = false;
                    }
                }else if(this.id == 'frmOtraEspecialidad1'){
                    if ($("#frmEspecialidad1").val() == 19 && $(this).val() == ''){
                        $('#mostrar_trat4').click();
                        $(this).css('border-color','red').css('border-width','initial').focus();
                        return validate = false;
                    }
                }else if(this.id == 'frmOtroGrupo'){
                    if($("input[name='frmGrupo[]'][value=26]:checked").length == 1 && $(this).val() == ''){
                        $('#mostrar_trat4').click();
                        $(this).css('border-color','red').css('border-width','initial').focus();
                        return validate = false;                       
                    }
                }
            }  
        }
    })
    
    // VALIDAR CAMPOS DE TAB 3
    $('.required_tab3').each(function(){
        $('#frmPatrocinador').css('border-color','').css('border-width','');
        $('#frmConvocatoria').css('border-color','').css('border-width','');
        if($("input[name='"+this.id+"']:checked").val() == 'si'){           
            if(this.id == 'frmProtocolo'){
                if($('#frmPatrocinador').val() == ''){
                    $('#mostrar_trat3').click();
                    $('#frmPatrocinador').css('border-color','red').css('border-width','initial').focus();      
                    return validate = false;      
                }else if(validate_string($('#frmPatrocinador').val()) == false){
                    $('#mostrar_trat3').click();
                    var div_msj = $('#frmPatrocinador').data('msj');
                    $("#"+div_msj).show().html('<b>INGRESAR SOLO TEXTO</b>');
                    $('#frmPatrocinador').css('border-color','red').css('border-width','initial').focus();
                    return validate = false;
                }
            }else if(this.id == 'frmFinanciacion'){ 
                if($('#frmConvocatoria').val() == ''){
                    $('#mostrar_trat3').click();
                    $('#frmConvocatoria').css('border-color','red').css('border-width','initial').focus();
                    return validate = false;
                }else if(validate_string($('#frmConvocatoria').val()) == false){
                    $('#mostrar_trat3').click();
                    var div_msj = $('#frmConvocatoria').data('msj');
                    $("#"+div_msj).show().html('<b>INGRESAR SOLO TEXTO</b>');
                    $('#frmConvocatoria').css('border-color','red').css('border-width','initial').focus();
                    return validate = false;
                }
            }          
        }else if($(this).val() == ''){
            $('#mostrar_trat3').click();
            $(this).css('border-color','red').css('border-width','initial').focus();
            return validate = false;
        }
    })

    // VALIDAR CAMPOS DE TAB 2
    $('.required_tab2').each(function(){
        if($(this).val() == ''){
            $('#mostrar_trat2').click();
            $(this).css('border-color','red').css('border-width','initial').focus();
            return validate = false;
        }else if($(this).hasClass("str_int_on")){
            if(validate_int_str($(this).val()) == false){  
                $('#mostrar_trat2').click();      
                var div_msj = $(this).data('msj');
                $("#"+div_msj).show().html('<b>INGRESAR SOLO TEXTO</b>');
                $(this).css('border-color','red').css('border-width','initial').focus();
                return validate = false;
            }
        }
    })


    // VALIDAR CAMPOS DE TAB 1
    $('.required_tab1').each(function(){
        if($(this).val() == '' && this.id !== 'frmOtraInstitucion'){
            $('#mostrar_trat1').click();
            $(this).css('border-color','red').css('border-width','initial').focus();
            return validate = false;
        }else{
            if($(this).hasClass("str_on")){
                if(validate_string($(this).val()) == false){
                    $('#mostrar_trat1').click();
                    var div_msj = $(this).data('msj');
                    $("#"+div_msj).show().html('<b>INGRESAR SOLO TEXTO</b>');
                    $(this).css('border-color','red').css('border-width','initial').focus();
                    return validate = false;
                }
            }else if($(this).hasClass("int_on")){
                if(validate_integer($(this).val()) == false){
                    $('#mostrar_trat1').click();
                    var div_msj = $(this).data('msj');
                    $("#"+div_msj).show().html('<b>INGRESAR SOLO NÚMEROS</b>');
                    $(this).css('border-color','red').css('border-width','initial').focus();
                    return validate = false;
                }
            }else if($(this).hasClass("str_int_on")){
                if(validate_int_str($(this).val()) == false){  
                    $('#mostrar_trat1').click();      
                    var div_msj = $(this).data('msj');
                    $("#"+div_msj).show().html('<b>INGRESAR SOLO TEXTO</b>');
                    $(this).css('border-color','red').css('border-width','initial').focus();
                    return validate = false;
                }
            }else if(this.id == 'frmOtraInstitucion'){                
                if ($("#otra_institucion").is(':checked') && $(this).val() == ''){
                    $('#mostrar_trat1').click();
                    $(this).css('border-color','red').css('border-width','initial').focus();
                    return validate = false;
                }else if($("input[name='frmLugarRecc[]']:checked").length == 0){ 
                    $('#mostrar_trat1').click();
                    var div_msj = $(this).data('msj');
                    $("#"+div_msj).show().html('<b>NO SE HA SELECCIONADO NINGUNA DE LAS OPCIONES</b>');
                    $("input[name='frmLugarRecc[]']").css('outline', '3px solid #c00').focus();
                    return validate = false;
                }
            }
        }  
    })

    return validate;
}

// VALIDAR INGRESO DE EMAIL
function validate_email(email){
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email)){
        return false;
    }
}

// VALIDAR INGRESO DE SOLO CARACTERES
function validate_string(str){
    var strReg = /^[a-zA-Z Á-ú]*$/;
    if(!strReg.test(str)){
        return false;
    }
}

// VALIDAR INGRESO DE SOLO NUMEROS
function validate_integer(int){
    var intReg = /^[0-9 -()+]+$/;
    if(!intReg.test(int)){
        return false;
    }
}

// VALIDAR INGRESO DE DATOS ALFANUMERICOS
function validate_int_str(str){
    var intStrReg = /^[A-Z a-z Á-ú 0-9 ]*$/;
    if(!intStrReg.test(str)){
        return false;
    }
}

// LIMPIAR CAMPOS LUEGO DE QUE SE VALIDA EL DATO INGRESADO
function limpiar_campos() {
    $(".required_tab1").css('border-color','').css('border-width','');
    $(".required_tab2").css('border-color','').css('border-width','');
    $(".required_tab3").css('border-color','').css('border-width','');
    $(".required_tab4").css('border-color','').css('border-width','');
    $(".required_tab4_1").css('border-color','').css('border-width','');
    $("input[name^='frmEmpresaVin']").css('border-color','').css('border-width','');
    $("div[id^='msj']").empty().hide();
    $("input[type='checkbox']").css('outline', '');
}