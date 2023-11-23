$(document).ready(function () {

    $("#formCrearCuenta").validate({
        rules: {
            usnombre: {
                required: true,
                //nombre            //valor que debe tener
                //nombreNoRepetido: {nombreNoRepetido: true}
            },
            usmail: {
                required: true,
                mailValido: {mailValido: true}
            }
        },
        messages: {
            usnombre: {
                required: "Ingrese su usuario"
            },
            usmail: {
                required: "Ingrese su dirección de mail"
            }
        },
        errorElement: "span",

        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".contenedor-dato").append(error);
        },
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid").addClass("is-valid");
        },

        submitHandler: function(form){
            console.log("Aqui esta el formData")
            var nombre = document.getElementById('usnombre').value;
            var mail = document.getElementById('usmail').value;
            var formData = {
                'usnombre': nombre,
                'usmail': mail
            };
            console.log(formData)
            
            $.ajax({ 
                url: "action/validacionCrearCuenta.php",
                type: "POST",
                dataType: "json",
                data: formData,
                async: false,

                complete: function(xhr, textStatus) {
                    //se llama cuando se recibe la respuesta (no importa si es error o éxito)
                    console.log("La respuesta regreso");
                },
                success: function(respuesta, textStatus, xhr) {
                    //se llama cuando tiene éxito la respuesta
                    if (respuesta.resultado == "exito"){
                        console.log("El resultado de la consulta es: " + respuesta.resultado);

                    } else {
                        console.log(respuesta.resultado);
                    }

                    $(form).find('.is-valid').removeClass('is-valid');
                    $("#formCrearCuenta")[0].reset();
                    
                    alert(respuesta.mensaje);
                    //$("#modalCrearCuenta").modal("hide");

                },
                error: function(xhr, textStatus, errorThrown) {
                    //called when there is an error
                    console.error("Error en la solicitud Ajax: " + textStatus + " - " + errorThrown)
                    console.log(xhr.responseText);//muestra en la consola del navegador todos los errores
                }
            });
        }
    });

    
});



jQuery.validator.addMethod("mailValido", function (value, element) {
    return this.optional(element) || (/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(value));
}, "Mail ingresado no válido");











/*
console.log("Este es un mensaje de registro normal");
Se utiliza para imprimir mensajes de registro normales. 
Los mensajes aparecerán en la consola sin ningún resaltado especial y 
se consideran información general o mensajes de depuración.

console.error("Esto es un mensaje de error");
Se utiliza para imprimir mensajes de error. En muchas consolas de desarrollo, 
los mensajes de error se resaltan en rojo o de alguna manera diferente para indicar que hay un problema.

console.warn("Esto es una advertencia");
Se utiliza para imprimir advertencias. Similar a console.error, 
pero suele tener un resaltado amarillo en algunas consolas.

console.info("Esto es un mensaje informativo");
Se utiliza para imprimir mensajes informativos. Similar a console.log, 
pero puede tener un formato o resaltado específico en algunas consolas.

console.debug("Esto es un mensaje de depuración");
Se utiliza para imprimir mensajes de depuración. No todos los navegadores lo admiten, 
y su comportamiento puede variar.
*/

/**
 * GUARDAR ESTA FUNCIÓN, DEVUELVE LOS ERRORES
 *
function nombreNoRepetido2(value) {

    var formData = {'usnombreCrearCuenta': value};
    var ruta = "../../Control/Ajax/nombreNoRepetido.php";

    console.log("Previo al Ajax");

    return $.ajax({
        url: ruta,
        type: "POST",
        data: formData,
        dataType: "json"
    }).then(function(respuesta) {
        console.log("Hubo éxito en la consulta Ajax");
        console.log(respuesta.validacion);
        return respuesta.validacion === "exito";
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud Ajax: " + textStatus + " - " + errorThrown);
        return false;
    });
}

// Ejemplo de uso
nombreNoRepetido("nombreUsuario").then(function(resultado) {
    console.log(resultado);
});*/

/*
Manejo de Promesas vs. Devoluciones de llamada:
La primera estructura utiliza promesas (then y fail), lo que facilita 
el manejo de código asíncrono y encadenamiento de operaciones.
La segunda estructura utiliza devoluciones de llamada directas (complete, success, error), 
que es un enfoque más antiguo y puede llevar a un código más anidado en situaciones complejas.
*/