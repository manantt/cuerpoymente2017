var img = new Image(100,100);
img.src = "/svg/bacteria.svg";
var img2 = new Image(50,50);
img2.src = "/svg/bacteria2.svg";
var img3 = new Image(76,76);
img3.src = "/svg/bacteria3.svg";

var mousex = 10;
var mousey = 10;

function paint() { 
    ctx.clearRect(0, 0, 2000, 2000);//limpia el canvas
	pintaGRojos();
    drawBacteria(ctx, mousex, mousey, 10, 99, true);
	//Personaje.paint();
	ctx.fillStyle = "#f00";
    ctx.font = 'bold 40px Gloria Hallelujah';
	time = "00:"+(tiemp/60>=10?"":"0")+parseInt(tiemp/60);
	ctx.fillText(time, 30, 40);
	ctx.fillStyle = "#000";
    ctx.font = 'bold 30px Gloria Hallelujah';
	ctx.fillText("Puntuación: "+puntuacion, 250, 40);
}

function pintaIni(){
    /*Fondo*/
    ctx.fillStyle = 'rgba(86, 3, 87, 1.0)';
    ctx.beginPath();
	ctx.rect(0, 0, tPantallaX, tPantallaY);
    ctx.closePath();
    ctx.fill();
    /**/
    ctx.fillStyle = "#fff";
    ctx.lineWidth = 1;
    ctx.strokeStyle = "#fff";
    ctx.font = 'bold 64px Gloria Hallelujah';
	ctx.fillText("Bacteriófago", tPantallaX/2-200, tPantallaY/3);
    ctx.font = 'bold 25px sans-serif';
    ctx.lineWidth = 1;
    ctx.strokeStyle = "#813EA5";
	ctx.fillStyle = "#b984cE";
	var texto2 = "clic para iniciar";
	ctx.fillText(texto2, tPantallaX/3, tPantallaY/2);
	ctx.strokeText(texto2, tPantallaX/3, tPantallaY/2);
}
function pintaFin(){
    /*Fondo*/
    ctx.fillStyle = 'rgba(86, 3, 87, 1.0)';
    ctx.beginPath();
	ctx.rect(0, 0, tPantallaX, tPantallaY);
    ctx.closePath();
    ctx.fill();
    /**/
    ctx.fillStyle = "#fff";
    ctx.lineWidth = 1;
    ctx.strokeStyle = "#fff";
    ctx.font = 'bold 64px Gloria Hallelujah';
	ctx.fillText("Fin del tiempo", tPantallaX/2-200, tPantallaY/3);
    ctx.font = 'bold 25px sans-serif';
    ctx.lineWidth = 1;
    ctx.strokeStyle = "#813EA5";
	ctx.fillStyle = "#b984cE";
	var texto2 = "Puntuación final: "+puntuacion;
	ctx.fillText(texto2, tPantallaX/3, tPantallaY/2);
	ctx.strokeText(texto2, tPantallaX/3, tPantallaY/2);
}

function drawRectangle(ctx, x, y, w, h, color) { 
    ctx.fillStyle = 'rgba(86, 0, 0, 1.0)';
    ctx.beginPath();
	ctx.rect(0, 0, tPantallaX, tPantallaY);
    ctx.closePath();
    ctx.fill();
}

function drawBacteria(ctx, x, y, tam, id, fallo) { 
    x = x - camaraX + tPantallaX/2;
    y = y - camaraY +tPantallaY/2;
	if(tam == 50){
		ctx.drawImage(img, x-tam, y-tam);
	}if(tam == 25){
		ctx.drawImage(img2, x-tam, y-tam);
	}if(tam == 38){
		ctx.drawImage(img3, x-tam, y-tam);
	}
    ctx.lineWidth = tam/10;
	ctx.fillStyle = 'rgba(220, 220, 220, 0.5)';
	if(fallo){
		ctx.fillStyle = 'rgba(220, 120, 120, 0.5)';
	}
    ctx.strokeStyle = '#560357';//borde
    ctx.beginPath();
    ctx.arc(x, y, tam, 0, Math.PI*2, true);
    ctx.closePath();
    ctx.fill();
    ctx.stroke();
    ctx.lineWidth = 1;
    ctx.setLineDash([5,2]);
    ctx.fillStyle = 'rgba(255, 255, 255, 0.2)';
    ctx.beginPath();
    ctx.arc(x, y, tam-tam/5, 0, Math.PI*2, true);
    ctx.closePath();
    ctx.fill();
    ctx.stroke();
    ctx.setLineDash([0]);//dejo los bordes como estaban
	ctx.fillStyle = "#560357";
    ctx.lineWidth = 4;
    ctx.font = 'bold '+tam/1.5+'px sans-serif';
	a = tam/6;
	if(id >= 10 || id < 0) a = tam/6*2;
	if(id >= 100 || id <= -10) a = tam/6*3;
    ctx.fillText(id, x-a, y+tam/6);
}
