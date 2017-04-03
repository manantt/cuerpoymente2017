/**/
function distance(x, y, objX, objY){
    var x = x - objX;
    var y = y - objY;
    return Math.sqrt(x * x + y * y);   
}
function getAbsoluteElementPosition(element, pos) {
    if (typeof element == "string")
        element = document.getElementById(element)
    if (!element) return 0;
    var y = 0;
	var x = 0;
	while (element.offsetParent) {
		x += element.offsetLeft;
		y += element.offsetTop;
		element = element.offsetParent;
	}
	if(pos == "top"){
		return y;
	}else{
		return x;
	}
}
function calculaAlto(){
  if (document.layers){
    alto = window.innerHeight;
  } else {
    alto = document.body.clientHeight;
  }
  return alto;
}

function calculaAncho(){
  if (document.layers){
    ancho = window.innerWidth;
  } else {
    ancho = document.body.clientWidth;
  }
  return ancho;
}