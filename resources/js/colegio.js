function lista_colegios(valor,circuito,cantidad){
              var cantidad = cantidad;
              if(cantidad==1){
                cantidad = 0;
              }else{
                cantidad = ((cantidad-1)*10);
              }
              $.ajax({
                url:'../controllers/colegios.php',
                type: 'POST',
                data:'valor='+valor+'&circuito='+circuito+'&cantidad='+cantidad+'&boton=buscar'
              }).done(function(resp){
                //alert(resp);
                var valores = eval(resp);
                html="<table class='table table-bordered'><thead><tr><th><center>Nombre del Colegio</center></th><th><center>Direccion</center></th><th><center>Parroquia</center></th><th><center>Opciones</center></th></tr></thead><tbody>";
                if(valores.length==0){
                  html+="</tbody></table>";
                  html+="<center>No se encontraron resultados</center>";
                }else{
	                for(i=0;i<valores.length;i++){
			  			datos=valores[i][0]+"*"+valores[i][1]+"*"+valores[i][2]+"*"+valores[i][5];
			            html+="<tr><td><center>"+valores[i][1]+"</center></td><td><center>"+valores[i][2]+"</center></td><td><center>"+valores[i][3]+"</center></td><td><center><button class='btn btn-primary' data-toggle='modal' data-target='#editcolegio' onclick='mostrar("+'"'+datos+'"'+");'><span class='glyphicon glyphicon-edit'></span></button>&nbsp;&nbsp;|&nbsp;&nbsp;<button class='btn btn-danger' onclick='eliminar("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-trash'></span></button></center></td></tr>";
	                }
	                html+="</tbody></table>"
                }
                $("#lista").html(html);
              });
        }

function guardar(){

	var datosform=$("#editcolegioform").serialize();
	$.ajax({
		url:'../controllers/colegios.php',
		type:'POST',
		data:datosform+"&boton=actualizar"
	}).done(function(resp){
		if(resp==='exito'){
			$('#exito').show();
			$('#actualizar').hide();
			$('#nombre').hide();
			$('#direccion').hide();
			$('#parroquia').hide();
			$('#circuito').hide();
			//lista_colegios('');
			alert("Colegio actualizado con éxito");
			window.location.href = "colegios.php";
		}
		else{
			alert(resp);
		}
		
	});}

function cantidadcole(valor,circuito){
  $.ajax({
    url:'../controllers/colegios.php',
    type: 'POST',
    data:'valor='+valor+'&circuito='+circuito+'&boton=cantidad'
  }).done(function(resp){
    //alert(resp);
    var valores = eval(resp);
    $("#cantidadtotal").val(valores.length/10);
    botones();
  });
}

function mostrar(datos){
	var d=datos.split("*");
	$("#id").val(d[0]);
	$("#nombrecole").val(d[1]);
	$("#direccioncole").val(d[2]);
	$("#parroquiacole").val(d[3]);
    $('#noexito').hide();
    $('#exito').hide();
    $('#actualizar').show();
    $('#nombrecole').show();
    $('#direccioncole').show();
    $('#parroquiacole').show();            
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
		window.location.href = "colegios.php";
	});
	}	
}
