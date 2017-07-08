$(document).ready(function () {
    var documento_id;
    var documento_directorio;

    $('select').on('change', function () {
        var data = new FormData();//ogeto con datos
        var url = './vistaDocumento.php';
        var documento_tipo = this.options[this.selectedIndex].text;
        var id_archivo = this.value;
        data.append('documento_tipo', documento_tipo);
        data.append('id_archivo', id_archivo);
        var notify = $.notify('Updating Do not close this page...', {
            allow_dismiss: false,
            showProgressbar: true
        });


        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            cache: false,
            //si sale correcto
            success: function (msg) {
                //esto se ejecuta si el ajax se realizo correctamente y se devolvio algo 
                mostrarCorrectNofity(msg, notify);
            },
            //si existe error
            error: function (jqXHR, exception) {
                //cuando hubo error al realizar el ajax
                mostrarErroresNotify(jqXHR, notify)
            }
        });
    });
//muestra la pantalla de dialogo para subir el archivo
    $('.id_archivo_edit').click(function () {
        $('.ventana').css({"display": "inline"});
        var nombre_archivo = $(this).val();//optiene nombre del archivvo
       var elem= nombre_archivo.split(':');
        documento_directorio=elem[1];
        documento_id=elem[0];
       
        
                
        $('#viewArchivo').attr('src', 'documentos/' + documento_directorio);//muestra
        //muestra nombre de archivo
        $("#archivoNombreView").text("  " + documento_directorio);
        $('#viewArchivo').css({"display": "inline"});
        //añade el imput para subir el archivo
        


    });
    $('#salir').click(function () {
        $('.ventana').css({"display": "none"});
        $("#inputarchivo").val('');

    });
    //si se lececciona un archivo oculta la vista previa del archivo y pone el seleccionado
    $('#inputarchivo').change(function () {

        readURL(this);
        $("#archivoNombreView").text("");

    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#viewArchivo').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    //btn para subir subirArchivo
    $('#updatefilenow').click(function () {
        var data = new FormData();//ogeto con datos
        var inputFileImage = document.getElementById("inputarchivo");
        var file = inputFileImage.files[0];
        var url = './UploadFiles.php';
        var Nume_Documento = documento_id;
         data.append('archivo',file);//para el 
        data.append('Nume_Documento', Nume_Documento);
        
        var notify = $.notify('Updating Do not close this page...', {
            allow_dismiss: false,
            showProgressbar: true
        });


        $.ajax({
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            cache: false,
            //si sale correcto
            success: function (msg) {
                //esto se ejecuta si el ajax se realizo correctamente y se devolvio algo 
                mostrarCorrectNofity(msg, notify);
            },
            //si existe error
            error: function (jqXHR, exception) {
                //cuando hubo error al realizar el ajax
                mostrarErroresNotify(jqXHR, notify)
            }
        });

    });



    //notificaciones

    function mostrarErroresNotify(jqXHR, notify) {
        //si existio cualquier error durante el ajax verifica el tipo y muestra en la notificacion
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        setTimeout(function () {
            notify.update({'type': 'danger', 'message': '<strong>Update</strong> Error in ' + msg, 'progress': 100});
        }, 10);
    }
    //mostrar Notificacion Correcto
    function mostrarCorrectNofity(msg, notify) {
        //si la respuesta de msg es 1 fue correcto si no hubo un error 
       
        if (msg == 1) {
            setTimeout(function () {
                notify.update({'type': 'success', 'message': '<strong>Update</strong>  Correct!..', 'progress': 100});
            }, 10);
        } else {
            setTimeout(function () {                
                notify.update({'type': 'danger', 'message': '<strong>Update</strong> Error in DB!..', 'progress': 100});
            }, 10);
        }
    }
});
