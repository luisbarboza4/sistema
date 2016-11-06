function validarperfil(){
	if(sololetrasp($("#nombres").val()) && sololetrasp($("#apellidos").val()) && emailp($("#email2").val()) && telefp($("#telefono").val()) && pregresp($("#pregunta").val()) && pregresp($("#respuesta").val())){
		validaremailp($("#email2").val());
	}else{
		$("#aceptar").prop("disabled",true);
	}
}
function sololetrasp(texto){
	var regexp = RegExp("[a-zA-Z]{3,25}");
	if(regexp.test(texto.replace(" ",""))){
		return true;
	}else{
		return false;
	}
}
function nombrecir(texto){
	var regexp = RegExp("[a-zA-Z0-9]{5,25}");
	if(regexp.test(texto.replace(" ",""))){
		return true;
	}else{
		return false;
	}
}
function nombrecol(texto){
	var regexp = RegExp("[a-zA-Z0-9\.]{5,25}");
	if(regexp.test(texto.replace(" ",""))){
		return true;
	}else{
		return false;
	}
}
function nombrearch(texto){
	var regexp = RegExp("[a-zA-Z0-9]{5,25}");
	if(regexp.test(texto.replace(" ",""))){
		return true;
	}else{
		return false;
	}
}
function descripcion(texto){
	var regexp = RegExp("[a-zA-Z0-9]{5,45}");
	if(regexp.test(texto.replace(" ",""))){
		return true;
	}else{
		return false;
	}
}
function descripcionevt(texto){
	if(texto.length>4&&texto.length<251){
		return true;
	}else{
		return false;
	}
}
function pregresp(texto){
	var numeroLetras = texto.length;
	if(numeroLetras >3){
		return true;
	}else{
		return false;
	}
}
function direccion(texto){
	var regexp = RegExp("[a-zA-Z0-9\-\.\#\-\° ]{5,50}");
	if(regexp.test(texto.replace(" ",""))){
		return true;
	}else{
		return false;
	}
}
function emailk(e){
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	var regexp = RegExp("^[a-zA-Z0-9\-_\.\@]");
	var caracter = String.fromCharCode(codigo);
	if(regexp.test(caracter)){
	}else{
		if(codigo!=8&&codigo!=9){
			e.preventDefault();
		}
	}
}
function ncir(e){
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	var regexp = RegExp("^[a-zA-Z0-9\. ]");
	var caracter = String.fromCharCode(codigo);
	if(regexp.test(caracter)){
	}else{
		if(codigo!=8&&codigo!=9){
			e.preventDefault();
		}
	}
}
function kuser(e){
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	var regexp = RegExp("^[a-zA-Z0-9]");
	var caracter = String.fromCharCode(codigo);
	if(regexp.test(caracter)){
	}else{
		if(e.which){
			if(codigo!=8&&codigo!=9){
				e.preventDefault();
			}
		}else{
			e.preventDefault();
		}
	}
}
function vdireccion(e){
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	var regexp = RegExp("^[a-zA-Z0-9\-\.\#\-\° ]");
	var caracter = String.fromCharCode(codigo);
	if(regexp.test(caracter)){
	}else{
		if(codigo!=8&&codigo!=9){
			e.preventDefault();
		}
	}
}
function ncol(e){
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	var regexp = RegExp("^[a-zA-Z\. ]");
	var caracter = String.fromCharCode(codigo);
	if(regexp.test(caracter)){
	}else{
		if(codigo!=8&&codigo!=9){
			e.preventDefault();
		}
	}
}
function letras(e){
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	var regexp = RegExp("[a-zA-Z ]");
	var caracter = String.fromCharCode(codigo);
	if(regexp.test(caracter)){
	}else{
		if(codigo!=8&&codigo!=9){
			e.preventDefault();
		}
	}
}
function narch(e){
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	var regexp = RegExp("[a-zA-Z0-9 ]");
	var caracter = String.fromCharCode(codigo);
	if(regexp.test(caracter)){
	}else{
		if(codigo!=8&&codigo!=9){
			e.preventDefault();
		}
	}
}
function numeros(e){
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	var regexp = RegExp("[0-9]");
	var caracter = String.fromCharCode(codigo);
	if(regexp.test(caracter)){
	}else{
		if(codigo!=8&&codigo!=9){
			e.preventDefault();
		}
	}
}
function kpass(e){
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	if(codigo==32){
		e.preventDefault();
	}
}
function telefp(texto){
	var regexp = RegExp("[0-9]{11}");
	if(regexp.test(texto)){
		return true;
	}else{
		return false;
	}
}
function emailp(texto){
	var regexp = RegExp("^[a-zA-Z0-9\-_\.]{2,}[@][a-zA-Z0-9\-_]+([.][a-zA-Z]{2,5})+");
	if(regexp.test(texto)){
		return true;
	}else{
		return false;
	}
}
function validarupload(){
	var fileSize = $('#archivo').get(0).files[0].size; // in bytes
    if(fileSize>20971520){
    	$('#falseFile').show();
    }else{
    	$('#falseFile').hide();
    }
	if(nombrearch($("#nombrea").val()) && descripcion($("#descripciona").val()) && ($("#archivo").val()!=""&&fileSize<20971520)){
		$("#subo").prop("disabled",false);
	}else{
		$("#subo").prop("disabled",true);
	}
}
function validarpass(){
	if(pass($("#clave1").val()) && pass($("#clave2").val())){
		$("#actualizar").prop("disabled",false);
	}else{
		$("#actualizar").prop("disabled",true);
	}
}
function pass(texto){
	var regexp = RegExp("[a-zA-Z0-9]{6,16}");
	if(regexp.test(texto)){
		return true;
	}else{
		return false;
	}
}
function user(texto){
	var regexp = RegExp("[a-zA-Z0-9]{4,16}");
	if(regexp.test(texto)){
		return true;
	}else{
		return false;
	}
}
function validarcir(){
	if(nombrecir($("#nombrescire").val())){
		validarnombrecir2();
	}else{
		$("#actualizar").prop("disabled",true);
	}
}
function validarcir2(){
	if(nombrecir($("#nombrescir").val())){
		validarnombrecir();
	}else{
		$("#actualizar2").prop("disabled",true);
	}
}
function validarcole(){
	if(nombrecol($("#nombrecole").val()) && direccion($("#direccioncole").val())){
		validarnombrecole2();
	}else{
		$("#actualizar").prop("disabled",true);
	}
	
}
function validarcole2(){
	if(nombrecol($("#nombrecol").val()) && direccion($("#direccioncol").val())){
		validarnombrecole();
	}else{
		$("#actualizar2").prop("disabled",true);
	}
}
function validardirectivo(){
	if(sololetrasp($("#nombresdir").val()) && sololetrasp($("#apellidosdir").val()) &&  telefp($("#telefonodir").val()) && user($("#usernamedir").val()) && emailp($("#email2dir").val()) && $("#colegiodir").val()!=null){
		$("#actualizardir").prop("disabled",false);
		validaremail($("#email2dir").val());
		validaruser($("#usernamedir").val());
	}else{
		$("#actualizardir").prop("disabled",true);
	}
}
function validarfacilitador(){
	if(sololetrasp($("#nombresfac").val()) && sololetrasp($("#apellidosfac").val()) &&  telefp($("#telefonofac").val()) && user($("#usernamefac").val()) && emailp($("#email2fac").val()) && $("#circuitofac").val()!=null){
		$("#actualizarfac").prop("disabled",false);
		validaremail($("#email2fac").val());
		validaruser($("#usernamefac").val());
	}else{
		$("#actualizarfac").prop("disabled",true);
	}
}
function validaruser(valor){
	$.ajax({
	    url:'../controllers/validar.php',
	    type: 'POST',
	    data:'valor='+valor+'&boton=username'
    }).done(function(resp){
        if(resp=="exito"){
        	$('#falseUser').show();
        	$('#falseUser2').show();
        	$("#actualizardir").prop("disabled",true);
        	$("#actualizarfac").prop("disabled",true);
        }else{
        	$('#falseUser').hide();
        	$('#falseUser2').hide();
        }
    });
}
function validaremailp(valor){
	var id = $('#iduser').val();
	$.ajax({
	    url:'../controllers/validar.php',
	    type: 'POST',
	    data:'valor='+valor+'&id='+id+'&boton=emailp'
    }).done(function(resp){
       if(resp=="exito"){
        	$('#falseEmailp').show();
        	$("#aceptar").prop("disabled",true);
        }else{
        	$('#falseEmailp').hide();
        	$("#aceptar").prop("disabled",false);
        	validarperfil();
        }
    });
}
function validaremail(valor){
	$.ajax({
	    url:'../controllers/validar.php',
	    type: 'POST',
	    data:'valor='+valor+'&boton=email'
    }).done(function(resp){
        if(resp=="exito"){
        	$('#falseEmail').show();
        	$('#falseEmail2').show();
        	$("#actualizardir").prop("disabled",true);
        	$("#actualizarfac").prop("disabled",true);
        }else{
        	$('#falseEmail').hide();
        	$('#falseEmail2').hide();
        }
    });
}
function validarnombrecole(){
	var valor = $('#nombrecol').val();
	$.ajax({
	    url:'../controllers/validar.php',
	    type: 'POST',
	    data:'valor='+valor+'&boton=nombrecole'
    }).done(function(resp){
        if(resp=="exito"){
        	$('#falseColegio').show();
        	$("#actualizar2").prop("disabled",true);
        }else{
        	$('#falseColegio').hide();
        	$("#actualizar2").prop("disabled",false);
        	validarcole2();
        }
    });
}
function validarnombrecole2(){
	var id = $('#id').val();
	var valor = $('#nombrecole').val();
	$.ajax({
	    url:'../controllers/validar.php',
	    type: 'POST',
	    data:'valor='+valor+'&id='+id+'&boton=nombrecole2'
    }).done(function(resp){
        if(resp=="exito"){
        	$('#falseColegio2').show();
        	$("#actualizar").prop("disabled",true);
        }else{
        	$('#falseColegio2').hide();
        	$("#actualizar").prop("disabled",false);
        	validarcole();
        }
    });
}
function validarnombrecir(){
	var valor = $('#nombrescir').val();
	$.ajax({
	    url:'../controllers/validar.php',
	    type: 'POST',
	    data:'valor='+valor+'&boton=nombrecir'
    }).done(function(resp){
        if(resp=="exito"){
        	$('#falseCircuito').show();
        	$("#actualizar2").prop("disabled",true);
        }else{
        	$('#falseCircuito').hide();
        	$("#actualizar2").prop("disabled",false);
        	validarcir2();
        }
    });
}

function validarnombrecir2(){
	var id = $('#id').val();
	var valor = $('#nombrescire').val();
	$.ajax({
	    url:'../controllers/validar.php',
	    type: 'POST',
	    data:'valor='+valor+'&id='+id+'&boton=nombrecir2'
    }).done(function(resp){
        if(resp=="exito"){
        	$('#falseCircuito2').show();
        	$("#actualizar").prop("disabled",true);
        }else{
        	$('#falseCircuito2').hide();
        	$("#actualizar").prop("disabled",false);
        	validarcir();
        }
    });
}
function limpiarnewcir(){
	$('#nombrescir').val("");
	$('#noexitocir').hide();
	$('#exitocir').hide();
	$('#falseCircuito').hide();
}
function limpiareditcir(){
	$('#nombrecire').val("");
	$('#noexito').hide();
	$('#exito').hide();
	$('#falseCircuito2').hide();
}
function limpiarnewcole(){
	$('#nombrecol').val("");
	$('#direccioncol').val("");
	$('#noexitocol').hide();
    $('#exitocol').hide();
    $('#falseColegio').hide();
}
function limpiareditcole(){
	$('#nombrecole').val("");
	$('#direccioncole').val("");
	$('#noexito').hide();
    $('#exito').hide();
    $('#falseColegio2').hide();
}
function limpiarnewfac(){
	$('#nombresfac').val("");
	$('#apellidosfac').val("");
	$('#usernamefac').val("");
	$('#email2fac').val("");
	$('#telefonofac').val("");
	$('#noexitofac').hide();
    $('#exitofac').hide();
    $('#falseUser').hide();
    $('#falseEmail').hide();
}
function limpiarnewdir(){
	$('#nombresdir').val("");
	$('#apellidosdir').val("");
	$('#usernamedir').val("");
	$('#email2dir').val("");
	$('#telefonodir').val("");
	$('#noexitodir').hide();
    $('#exitodir').hide();
    $('#falseUser2').hide();
    $('#falseEmail2').hide();
}
function validarevento(){
	if(descripcion($('#title').val()) && descripcionevt($('#body').val())){
		validarfecha();
	}
	else{
		$("#guarda").prop("disabled",true);
	}
}
function limpiarnewevent(){
	$('#title').val("");
	$('#body').val("");
	document.getElementsByName("from")[0].value="";
	document.getElementsByName("to")[0].value="";
	$('#tipo').val("event-info");
}
function validarfecha(){
	var desdestring =document.getElementsByName("from")[0].value;
	var hastastring =document.getElementsByName("to")[0].value;
	var x = desdestring.split("/");
    var z = hastastring.split("/");
    var fecha1= x[1] + "/" + x[0] + "/" + x[2];
    var fecha2= z[1] + "/" + z[0] + "/" + z[2];
	var desde = Date.parse(fecha1);
	var hasta = Date.parse(fecha2);
	if(isNaN(desde)|isNaN(hasta)){
		$("#guarda").prop("disabled",true);
	}else{
		if(desde<=hasta){
			$("#guarda").prop("disabled",false);
		}else{
			document.getElementsByName("to")[0].value=desdestring;
			alert("El evento no puede finalizar antes de empezar")
		}
	}

}