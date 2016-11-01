function lista_coladmin(valor,cantidad,pag){
              var cantidad = cantidad;
              if(cantidad==1){
                cantidad = 0;
              }else{
                cantidad = ((cantidad-1)*pag);
              }
              $.ajax({
                url:'../controllers/colegios.php',
                type: 'POST',
                data:'valor='+valor+'&cantidad='+cantidad+'&pag='+pag+'&boton=buscarcol'
              }).done(function(resp){
                //alert(resp);
                var valores = eval(resp);
                html="<table class='table table-bordered'><thead><tr><th><center>Nombre del Colegio</center></th><th><center>Direccion</center></th><th><center>Parroquia</center></th><th><center>Circuito</center></th><th><center>Opciones</center></th></tr></thead><tbody>";
                if(valores.length==0){
                  html+="</tbody></table>";
                  html+="<center>No se encontraron resultados</center>";
                }else{
	                for(i=0;i<valores.length;i++){
			            html+="<tr><td><center>"+valores[i][1]+"</center></td><td><center>"+valores[i][2]+"</center></td><td><center>"+valores[i][3]+"</center></td><td><center>"+valores[i][4]+"</center></td><td><center><button class='btn btn-danger' onclick='eliminar("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-trash'></span></button></center></td></tr>";
	                }
	                html+="</tbody></table>"
                }
                $("#listacol").html(html);
              });
        }

function cantidadcoladmin(valor){
  $.ajax({
    url:'../controllers/colegios.php',
    type: 'POST',
    data:'valor='+valor+'&boton=cantidadcol'
  }).done(function(resp){
    //alert(resp);
    var valores = eval(resp);
    $("#cantidadtotal").val(valores.length/$('#paginator').val());
    botones();
  });
}

function eliminar(id){
	var r = confirm("¿Seguro deseas eliminar el colegio?");
    if (r == true) {
	$.ajax({
		url:'../controllers/colegios.php',
		type:'POST',
		data:'id='+id+'&boton=eliminar'
	}).done(function(resp){
		alert(resp);
		window.location.href = "colegiosadmin.php";
	});
	}	
}
