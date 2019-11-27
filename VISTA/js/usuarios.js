//------------------------------------------------
//----------- NOTE SUBIR FOTO DEL USUARIO --------
//------------------------------------------------

$(".nuevaFoto").change(function () {

    var imagen = this.files[0];

    /*  NOTE VALIDAOS LA IMAGEN */

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        /* Si no es Archivo de imagen, Vaciamos el File.. */
        $(".nuevaFoto").val("");

        /* tomamos la clase previsualizar y cambiamos el atributo src */
        $(".previsualizar").attr("src", "vista/img/usuarios/default/anonymous.png");

        /* Mandamos una Alerta suave */
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

        /* Validamos el Tamaño Máximo de la imagen a 2Mb */
    } else if (imagen["size"] > 2000000) {

        /* Si es mayor, Vaciamos el File.. */
        $(".nuevaFoto").val("");

        /* tomamos la clase previsualizar y cambiamos el atributo src */
        $(".previsualizar").attr("src", "vista/img/usuarios/default/anonymous.png");

        /* Mandamos una Alerta suave */
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar mas de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });


        /* NOTE si logra pasaar los filtros entonces... */

    } else {
        /* Realizamos la lectura del Archivo */
        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        /* Al cargar, creamos una Ruta para la imagen */
        $(datosImagen).on("load", function (event) {

            var rutaImaen = event.target.result;

            /* Reemplazamos la imagen default por la Tomada */
            /* tomamos la clase previsualizar y cambiamos el atributo src */
            $(".previsualizar").attr("src", rutaImaen);

        })


    }



})



//------------------------------------------------
//----------- NOTE VALIDAR USUARIO REPETIDO-------
//------------------------------------------------

$("#nuevoUsuario").change(function () {

    /* si cambia el input, se remueven las alertas */
    $(".alert").remove();
    /* Tomamos el valor del input con ID nuevoUsuario */
    var usuario = $(this).val();
    /* creamos los valores a enviar con AJAX */
    var datos = new FormData();
    datos.append("validarUsuario", usuario);
    /* Creamos AJAX */
    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            if (respuesta) {
                $("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este Usuario ya existe en la base de datos</div>');
                $("#nuevoUsuario").val("");
            }

        }
    })

})


//------------------------------------------------
//----------- NOTE ELIMINAR USUARIO -------
//------------------------------------------------
/* $(document).on("click",".btnEliminarUsuario", function(){ */ //ESTA MODIFICICACION SE HACE CUANDO AUN NO SE GENERA EL HTML AL SER MOBIL
/* $(".btnEliminarUsuario").click(function(){ */
$(document).on("click", ".btnEliminarUsuario", function () {

    /* mostramos una alerta suave para evitar errores */
    swal({
        title: "¿Desea Borrar el Usuario?",
        text: "¡Recuerde que se eliminara toda su Informacion!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, borrar Usuario!",
        cancelButtonText: "No, cancelar!"
    }).then((result) => {

        if (result.value) {

            /* Capturamos los Valores Necesarios para la Eliminacion */
            var idUsuario = $(this).attr("idUsuario");
            var fotoUsuario = $(this).attr("fotoUsuario");
            var usuario = $(this).attr("usuario");

            /* Redireccionamos a la ruta para eliminacion */
            window.location = "index.php?ruta=usuarios&idUsuario=" + idUsuario + "&usuario=" + usuario + "&fotoUsuario=" + fotoUsuario;

        } else {
            swal("Cancelado", "Usuario a salvo", "error");
        }
    })

})



//------------------------------------------------
//----------- NOTE TIMELINE DEL USUARIO -------
//------------------------------------------------
/* $(document).on("click",".btnEliminarUsuario", function(){ */ //ESTA MODIFICICACION SE HACE CUANDO AUN NO SE GENERA EL HTML AL SER MOBIL
/* $(".btnEliminarUsuario").click(function(){ */
$(document).on("click", ".btnTimeline", function () {


    /* Capturamos los Valores Necesarios para la linea */
    var idUsuario = $(this).attr("idUsuario");
    var fotoUsuario = $(this).attr("fotoUsuario");
    var usuario = $(this).attr("usuario");
    var nombre = $(this).attr("nombreUsuario");

    /* Redireccionamos a la ruta para eliminacion */
    window.location = "index.php?ruta=timeline&idUsuario=" + idUsuario + "&usuario=" + usuario + "&fotoUsuario=" + fotoUsuario + "&nombreUsuario=" + nombre;


})
