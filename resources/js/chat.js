function validar(e) {
	tecla = (document.all) ? e.keyCode : e.which;
		if ((tecla==13|tecla==10)&&($("#message").val()!="")){ 
			if($("#message").val()=="" | $("#message").val().startsWith(" ")){
				e.preventDefault();
			}else{
				$("#send").click();
			}
		}
		if((tecla==13|tecla==10)){
			e.preventDefault();
		}
}
function validarnovacio(){
	//$("#message").val($("#message").val().replace("\n",""))
	if($("#message").val()==""| $("#message").val().startsWith(" ")){
		$("#send").prop("disabled",true);
	}else{
		$("#send").prop("disabled",false);
	}
}