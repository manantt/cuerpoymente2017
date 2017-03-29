var secActual = 1;//seccion que está mostrando actualmente
var numSec = 4;//número de secciones

var tiempo = 4;//segundos que se muestra cada seccion
var contador = 0;

var interval;//almacenará el intervalo que ejecuta el bucle
var pausado = false;

$().ready(function() {
	$("#banner1").css('opacity','1');
	interval = setInterval(function(){siguiente()}, 1000);//llamo al método siguiente cada segundo
});
function siguiente(){
	if(contador < tiempo){
		contador++;
	}else{//si el contador es igual al tiempo cambia a la siguiente seccion
		contador = 0;
		if(secActual == numSec){
			secActual = 1;
		}else{
			secActual++;
		}
		mostrar(secActual);
	}
}
function mostrar(n){
	for(a = 1; a <= numSec; a++){
		$("#banner"+a).css('opacity','0');
	}
	$("#contenidoSl").css('-webkit-transform','rotateY('+((n-1)*-90)+'deg)');
	$("#banner"+n).css('opacity','1');
	contador = 0;
	secActual = n;
}