function lista_circuitos(valor,cantidad){
              var cantidad = cantidad;
              if(cantidad==1){
                cantidad = 0;
              }else{
                cantidad = ((cantidad-1)*10);
              }
              $.ajax({
                url:'../controllers/circuitos.php',
                type: 'POST',
                data:'valor='+valor+'&cantidad='+cantidad+'&boton=buscar'
              }).done(function(resp){
                //alert(resp);
                var valores = eval(resp);
                html="<table class='table table-bordered'><thead><tr><th><center>Nombre del Circuito</center></th><th><center>Estado</center></th><th><center>Facilitador</center></th><th><center>Opciones</center></th></tr></thead><tbody>";
                if(valores.length==0){
                  html+="</tbody></table>";
                  html+="<center>No se encontraron resultados</center>";
                }else{
	                for(i=0;i<valores.length;i++){
		  				datos = valores[i][0]+"*"+valores[i][1]+"*"+valores[i][5];
		  				nombre = "No Posee Facilitador";
		  				if(valores[i][3]!=null&&valores[i][4]!=null){
		  					nombre=valores[i][3]+" "+valores[i][4];
		  				}
		                html+="<tr><td><center>"+valores[i][1]+"</center></td><td><center>"+valores[i][2]+"</center></td><td><center>"+nombre+"</center></td><td><center><button class='btn btn-primary' data-toggle='modal' data-target='#editcircuito' onclick='mostrar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-edit'></span></button>&nbsp;&nbsp;|&nbsp;&nbsp;<button class='btn btn-danger' onclick='eliminar("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-trash'></span></button></center></td></tr>";
	                }
	                html+="</tbody></table>"
                }
                $("#lista").html(html);
              });
        }

function guardar(){
	var datosform=$("#editcircuitoform").serialize();
	$.ajax({
		url:'../controllers/circuitos.php',
		type:'POST',
		data:datosform+"&boton=actualizar"
	}).done(function(resp){
		if(resp==='exito'){
			$('#exito').show();
			$('#actualizar').hide();
			$('#nombres').hide();
			$('#estado').hide();
			//lista_circuitos('');
			alert("Circuito actualizado con éxito");
			window.location.href = "circuitos.php";
		}
		else{
			alert(resp);
		}
		
	});}

function cantidadcir(valor){
  $.ajax({
    url:'../controllers/circuitos.php',
    type: 'POST',
    data:'valor='+valor+'&boton=cantidad'
  }).done(function(resp){
    var valores = eval(resp);
    $("#cantidadtotal").val(valores.length/10);
    botones();
  });
}

function mostrar(datos){
	var d=datos.split("*");
	$("#id").val(d[0]);
	$("#nombrescire").val(d[1]);
	$("#estadocire").val(d[2]);
    $('#noexito').hide();
    $('#exito').hide();
    $('#actualizar').show();
    $('#nombrescire').show();
    $('#estadocire').show();              
}


function eliminar(id){
    var r = confirm("¿Seguro deseas eliminar el circuito?");
    if (r == true) {
        $.ajax({
		url:'../controllers/circuitos.php',
		type:'POST',
		data:'id='+id+'&boton=eliminar'
	}).done(function(resp){
		alert(resp);
		//lista_circuitos('');
		window.location.href = "circuitos.php";
	});
    }	
}
