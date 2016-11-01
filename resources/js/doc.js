function lista_doc(valor,id,level,circuito,cantidad,pag){
              var cantidad = cantidad;
              if(cantidad==1){
                cantidad = 0;
              }else{
                cantidad = ((cantidad-1)*pag);
              }
              $.ajax({
                url:'../controllers/documento.php',
                type: 'POST',
                data:'valor='+valor+'&level='+level+'&circuito='+circuito+'&cantidad='+cantidad+'&pag='+pag+'&boton=buscar'
              }).done(function(resp){
                //alert(resp);
                var valores = eval(resp);
                html="<table class='table table-bordered'><thead><tr><th><center>Nombre</center></th><th><center>Descripcion</center></th><th><center>Fecha</center></th><th><center>Autor</center></th><th><center>Opciones</center></th></tr></thead><tbody>";
                if(valores.length==0){
                  html+="</tbody></table>";
                  html+="<center>No se encontraron resultados</center>";
                }else{
                  for(i=0;i<valores.length;i++){
                    nombreu=valores[i][4]+" "+valores[i][5];
                    nombre=valores[i][1];
                    desc=valores[i][6];
                    if(valores[i][3]!=""){
                      nombre+="."+valores[i][3];
                    }
                      html+="<tr><td><center>"+nombre+"</center></td><td><center>"+desc+"</center></td><td><center>"+valores[i][2]+"</center></td><td><center>"+nombreu+"</center></td><td><center><button class='btn btn-primary' id='descarga' onclick='descargar("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-save'></span></button>";
                      if(id==valores[i][7] || level<valores[i][8]){
                        html+="&nbsp;&nbsp;|&nbsp;&nbsp;<button class='btn btn-danger' onclick='eliminar("+'"'+valores[i][0]+'"'+")'><span class='glyphicon glyphicon-trash'></span></button>";
                      }
                      html+="</center></td></tr>";
                  }
                  html+="</tbody></table>";
                }
                $("#listadoc").html(html);
              });
        }

function descargar(id){
  location.href=("descargar.php?id="+id);
}

function cantidaddoc(valor,id,level,circuito){
  $.ajax({
    url:'../controllers/documento.php',
    type: 'POST',
    data:'valor='+valor+'&level='+level+'&circuito='+circuito+'&boton=cantidad'
  }).done(function(resp){
    var valores = eval(resp);
    $("#cantidadtotal").val(valores.length/$('#paginator').val());
    botones();
  });
}

function eliminar(id){
  var r = confirm("¿Seguro deseas eliminar el documento?");
    if (r == true) {
  $.ajax({
    url:'../controllers/documento.php',
    type:'POST',
    data:'id='+id+'&boton=eliminar'
  }).done(function(resp){
    alert(resp);
    location.reload();
  });
}
  
}