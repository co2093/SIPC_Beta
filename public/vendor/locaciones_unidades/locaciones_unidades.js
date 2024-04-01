
$(document).ready(function() {
   // refresh_select("#proyecto",$("#proyecto").val());
   if($("#proyecto").attr("data-oldproject")!=null)
   refresh_select($("#proyecto"),$("#proyecto").attr("data-oldproject")); 

  if($("#tipo_infraestructura").attr("data-oldinfra")!=null)
    refresh_select($("#tipo_infraestructura"),$("#tipo_infraestructura").attr("data-oldinfra")); 
} );
function refresh_select(objeto,elemento){
    objeto.val(elemento)
}