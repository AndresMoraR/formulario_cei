$(function() {                
    getDatatable();

    //Buscar datos de proyectos de investigación
    $('#btn_search').click(function(){
        var date_init = $('#inp_date_init').val();
        var date_end = $('#inp_date_end').val();                
        getDatatable(date_init, date_end);
    })

    $('#btn_clean').click(function (){
        $('#inp_date_init').val('');
        $('#inp_date_end').val('');
        getDatatable('','');
    })

    //Filtrar entre fechas, por medio de plugin datepicker
    from = $("#inp_date_init")
        .datepicker({
        defaultDate: "+1w",
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1
        })
        .on("change", function() {
        to.datepicker( "option", "minDate", getDate(this) );
        }),
    to = $("#inp_date_end").datepicker({
        defaultDate: "+1w",
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        numberOfMonths: 1
        })
        .on("change", function() {
            from.datepicker( "option", "maxDate", getDate(this) );
        });

    //Obtener datos de proyectos de investigación
    function getDatatable(date_init, date_end){
        $('#tbl_data').DataTable({
            destroy: true,
            lengthChange: false,
            processing: true,
            ajax: {
                url: "buscar.php",
                type: 'POST',
                dataSrc: "",
                data: {
                    inp_date_init: date_init,
                    inp_date_end: date_end,
                }           
            },
            columnDefs: [
                { className: 'text-center', targets: [0, 3] },
                { className: "text-center", targets: 1 }
            ],
            columns: [
                {data: 'id', orderable: false, searchable: true,
                    "render": function (data, type, row) {
                        return '<b>'+data+'</b>';
                    }
                },
                {data: 'fecha_creacion'},
                {data: 'titulo'},
                {orderable: false, searchable: false,
                    "render": function (data, type, row) {
                        return  '<button title="Detalle" type="button" class="btn_detalle" data-toggle="modal" value="'+row.id+'" >'+                                
                                '<span class="ui-icon ui-icon-info"></span>'+
                                '</button>';
                    }
                }
            ],
            order: [[0, 'desc']],
            language: {
                "sSearch": "Buscar",
                "info": "Mostrando _START_ a _END_ de _TOTAL_",
                "oPaginate": {
                    "sPrevious": "Siguiente",
                    "sNext": "Anterior",
                }
            }
        });
    }
    
    //Recargar datos de proyectos de investigación
    setInterval(function(){
        $('#tbl_data').DataTable().ajax.reload();
    }, 30000);

    //Abrir detalle de datos de proyectos de investigación
    $('#tbl_data').on('click', '.btn_detalle', function () {
        loadModal(this.value);
    });

    //Cargar detalle de datos de proyectos de investigación
    function loadModal(id_proyecto){
        $.ajax({
            type: 'POST',
            data: { 'proyecto': id_proyecto },
            url: 'detalle.php',
        }).done(function(resp) {
            $('#table_reload').empty().html(resp);              
            $('#modal_detalle').modal('show');            
            $('#proyecto').val(id_proyecto);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus + ': ' + errorThrown);
        });
    }

    //Formato de fechas para campos datepicker
    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value );
        } catch( error ) {
            date = null;
        }        
        return date;
    }
});
