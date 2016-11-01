$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
function validar(e) {
	tecla = (document.all) ? e.keyCode : e.which;
		if (tecla==13||tecla==10){ 
			confirmar();
		}
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	if(codigo==32){
		e.preventDefault();
	}	
}
function kuser(e){
	var evento = e || window.event;
	var codigo = evento.charCode || evento.keyCode;
	var regexp = RegExp("^[a-zA-Z0-9]");
	var caracter = String.fromCharCode(codigo);
	if(regexp.test(caracter)){
	}else{
		if(codigo!=8&&codigo!=9){
			e.preventDefault();
		}
	}
}