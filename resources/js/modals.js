$(document).ready(function(){
    // Cuando se hace clic en el enlace para abrir el modal
    $(".abrirModal").click(function(){
        alert("Este es un mensaje de alerta");
        // Obtener el valor del td
        //var nombretd = $(this).closest('tr').find('.nombretd').text();
        
        var nombreUsuario = $(this).data('idu');
        $("#nombreUsuario").val(nombreUsuario);
        // Establecer el nombretd en el campo de entrada del modal
        //$("#nombreModal").val(nombretd);
        // Mostrar el modal
        $("#editarModalUser").css("display", "block");
    });

    // Cuando se hace clic en el botón de cerrar el modal
    $(".close").click(function(){
        $("#editarModalUser").css("display", "none");
    });
});