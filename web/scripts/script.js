/**
* Comprueba si el usuario está logueado
* Si no lo está redirige a la página de login
* Si sí lo está desactiva la pantalla de vista
* de una ficha y activa la de edición
*/
function habilitarEdicion(ficha){
	if(true){//auth){
		document.getElementById("tablaVista").style.display = "none";
		document.getElementById("tablaEdicion").style.display = "table";
	}else	
		window.location.href = 'login.php?ficha=' + ficha;
}
/**
* Desactiva la pantalla de edición
* Activa la pantalla de vista
* Llama al php por AJAX para guardar los datos introducidos en el formulario
* Confirma que los datos se hayan guardado y actualiza la vista
*/
function guardar(ficha){
	document.getElementById("tablaEdicion").style.display = "none";
	document.getElementById("tablaVista").style.display = "table";
	//envia los parámetros al php

	var calle = $("#inputcalle").val();
	var cp = $("#inputcp").val();
	var ciudad = $("#inputciudad").val();
	var provincia = $("#inputprovincia").val();
	var descripcion = $("#tadesc").val();
	var tipo = $("#inputtipo").val();
	if(tipo == "1ficha_avanzada" || tipo == "0ficha_minisite"){
		var ca = $("#inputca").val();
		var pais = $("#inputpais").val();
		var contacto = $("#inputcontacto").val();
		var telefono = $("#inputtelefono").val();
		var fax = $("#inputfax").val();
		var longitud = $("#inputlongitud").val();
		var latitud = $("#inputlatitud").val();
		var poblacion = $("#inputpoblacion").val();
		var cif = $("#inputcif").val();
		if(tipo == "0ficha_minisite"){
			var email = $("#inputemail").val();
			var web = $("#inputweb").val();
			var hotline = $("#inputhotline").val();
			var desc2 = $("#tadesc2").val();
			var rrss = $("#inputrrss").val();
		}
	}
	//actualiza los datos en la vista actual
	//alert(hotline);
	var parametros = {
		"id" : ficha,

        "calle" : calle,
        "cp" : cp,
        "ciudad" : ciudad,
        "provincia" : provincia,
        "descripcion" : descripcion,
        "tipo" : tipo,
        "ca" : ca,
        "pais" : pais,
        "contacto" : contacto,
        "telefono" : telefono,
        "fax" : fax,
        "longitud" : longitud,
        "latitud" : latitud,
        "poblacion" : poblacion,
        "cif" : cif,
        "email" : email,
        "web" : web,
        "hotline" : hotline,
        "desc2" : desc2,
        "rrss" : rrss,
    };
    $.ajax({
		data:  parametros,
		//data:  {id: 2},
		url: "{{ path('ajax') }}",
		type:  'POST',
		success: function(result){
			alert(result);
			var obj = jQuery.parseJSON(result);
			
			$("#tdcalle").html(obj.calle);
			$("#tdcp").html(obj.cp);
			$("#tdciudad").html(obj.ciudad);
			$("#tdprovincia").html(obj.provincia);
			$("#tddescripcion").html(obj.descripcion);
			$("#tdtipo").html(obj.tipo);
			if(obj.ca){
				$("#tdca").html(obj.ca);
				$("#tdpais").html(obj.pais);
				$("#tdcontacto").html(obj.contacto);
				$("#tdtelefono").html(obj.telefono);
				$("#tdfax").html(obj.fax);
				$("#tdlongitud").html(obj.longitud);
				$("#tdlatitud").html(obj.latitud);
				$("#tdpoblacion").html(obj.poblacion);
				$("#tdcif").html(obj.cif);
				if(obj.email){
					$("#tdemail").html(obj.email);
					$("#tdweb").html(obj.web);
					$("#tdhotline").html(obj.hotline);
					$("#tddesc2").html(obj.desc2);
					$("#tdrrss").html(obj.rrss);
				}
			}
		}
	});
}
