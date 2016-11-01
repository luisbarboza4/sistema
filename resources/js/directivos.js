function lista_directivos(valor,circuito,cantidad,pag){
              var cantidad = cantidad;
              if(cantidad==1){
                cantidad = 0;
              }else{
                cantidad = ((cantidad-1)*pag);
              }
              $.ajax({
                url:'../controllers/directivos.php',
                type: 'POST',
                data:'valor='+valor+'&circuito='+circuito+'&cantidad='+cantidad+'&pag='+pag+'&boton=buscar'
              }).done(function(resp){
                //alert(resp);
                var valores = eval(resp);
                html="<table class='table table-bordered'><thead><tr><th><center>Nombres</center></th><th><center>Apellidos</center></th><th><center>E-mail</center></th><th><center>Username</center></th><th><center>Colegio</center></th></tr></thead><tbody>";
                if(valores.length==0){
                  html+="</tbody></table>";
                  html+="<center>No se encontraron resultados</center>";
                }else{
                  for(i=0;i<valores.length;i++){
                  	var colegio = "Colegio "+valores[i][6];
  	                  	html+="<tr><td><center>"+valores[i][1]+"</center></td><td><center>"+valores[i][2]+"</center></td><td><center>"+valores[i][3]+"</center></td><td><center>"+valores[i][4]+"</center></td><td><center>"+colegio+"</center></td></tr>";

  	           			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][3]+"*"+valores[i][4]+"*"+valores[i][5];	              
                  }
                  html+="</tbody></table>"
                }
                $("#listadir").html(html);
              });
        }

function guardar(){
	var datosform=$("#edituserform").serialize();
	$.ajax({
		url:'../controllers/usuario.php',
		type:'POST',
		data:datosform+"&boton=actualizar"
	}).done(function(resp){
		if(resp==='exito'){
			$('#exito').show();
			$('#actualizar').hide();
			$('#nombre').hide();
			$('#apellido').hide();
			$('#email').hide();
			$('#tipo').hide();
			lista_users('');
		}
		else{
			alert(resp);
		}
		
	});}

function cantidaddir(valor,circuito){
  $.ajax({
    url:'../controllers/directivos.php',
    type: 'POST',
    data:'valor='+valor+'&circuito='+circuito+'&boton=cantidad'
  }).done(function(resp){
    //alert(resp);
    var valores = eval(resp);
    $("#cantidadtotal").val(valores.length/$('#paginator').val());
    botones();
  });
}

function mostrar(datos){
	var d=datos.split("*");
	$("#id").val(d[0]);
	$("#nombres").val(d[1]);
	$("#apellidos").val(d[2]);
	$("#email2").val(d[3]);
	$("#level").val(d[5]);
    $('#noexito').hide();
    $('#exito').hide();
    $('#actualizar').show();
    $('#nombre').show();
    $('#apellido').show();
    $('#email').show();
    $('#tipo').show();                
}

function eliminar(id){
	$.ajax({
		url:'../controllers/usuario.php',
		type:'POST',
		data:'id='+id+'&boton=eliminar'
	}).done(function(resp){
		alert(resp);
		lista_users('');
	});
	
}
