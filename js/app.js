$(document).ready(function () {

    $('select').on('change', function () {
        // alert(id_archivo + "->" + documento_tipo);
        var data = new FormData();//ogeto con datos
        var url = './vistaDocumento.php';
        var documento_tipo = this.options[this.selectedIndex].text;
        var id_archivo = this.value;
        data.append('documento_tipo', documento_tipo);
        data.append('id_archivo', id_archivo);

        var notify = $.notify('<strong>Actualizando</strong> No cierre ésta página...', {
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
            success: function (msg) {
                if (msg == 1) {
                    setTimeout(function () {
                        notify.update({'type': 'success', 'message': '<strong>Update</strong>  Correct!..', 'progress': 100});
                    }, 10);
                } else {
                    setTimeout(function () {
                        notify.update({'type': 'error', 'message': '<strong>Update</strong> Error in DB!..', 'progress': 100});
                    }, 10);
                }
            }
        });
    });

    $('#id_archivo_edit').click(function () {
        $('.ventana').css({"display": "inline"});
    });
    $('#salir').click(function () {
        $('.ventana').css({"display": "none"});
    });
});
