/* CELULA */
function Celula(x, y, tipo, id, tam, velocidad, vidaMax, ataque){
	this.x = x;
	this.y = y;
	this.tipo = tipo;
	this.id = id;
	this.tam = tam;
	this.velocidad = velocidad;
	this.vida = vidaMax;
	this.vidaMax = vidaMax;
	this.ataque = ataque;
	this.objX = x;
	this.objY = y;
}
Celula.prototype.mueveObj = function(){
	distancia = distance(this.x, this.y, this.objX, this.objY);//distancia hasta el punto objetivo
	if(distancia < this.velocidad){//esta en su destino
		this.x = this.objX;
		this.y = this.objY;
		return false;
	}else{//se mueve hacia su destino
		veces = 10000;
		if(this.velocidad){
			veces = distancia/this.velocidad;
		}
		movX = (this.objX - this.x)/veces;//lo que se desplaza
		movY = (this.objY - this.y)/veces;
		this.x += movX;
		this.y += movY;
		this.noSalirMapa();
	}
	return true;
};
Celula.prototype.move = function(){
	if(!this.mueveObj()){
		this.nuevoObj();
	}
};
Celula.prototype.paint = function(){
	drawCircleRela(ctx, this.x, this.y, this.tam, '50, 50, 50');
};
Celula.prototype.tocaCel = function(cel){//comprueba si toca otra celula
	if(distance(this.x, this.y, cel.x, cel.y) < this.tam + cel.tam){
		return true;
	}
	return false;
};
Celula.prototype.tocaGrupo = function(grup){//comprueba si toca otras celulas
	for(n = 0; n < grup.length; n++){
		if(this.tocaCel(grup[n])){
			return n;
		}
	}
	return -1;
};
Celula.prototype.nuevoObj = function(){
	this.objX = parseInt(Math.random() * (tMapaX - 4*this.tam) + this.tam*2);
	this.objY = parseInt(Math.random() * (tMapaY - 4*this.tam) + this.tam*2);
};
Celula.prototype.noSalirMapa = function(){
	if(this.x < 50) this.x = 50;
	if(this.x > tMapaX-50) this.x = tMapaX-50;
	if(this.y < 50) this.y = 50;
	if(this.y > tMapaY-50) this.y = tMapaY-50;
};
Celula.prototype.colisionarCon = function(grupo){
	factorDeEmpuje = 0.25;
	factorDeEmpuje = 1;
	toca = this.tocaGrupo(grupo);//colision profunda
	if(toca != -1){
		if(grupo[toca].id != this.id){
			dx = (this.x - grupo[toca].x) / this.tam * factorDeEmpuje;
			dy = (this.y - grupo[toca].y) / this.tam * factorDeEmpuje;
			this.x += dx;
			this.y += dy;
			this.noSalirMapa();
		}
	}	
	return false;
};

/* PERSONAJE */
function Personaje(x, y) {
	Celula.call(this);
	this.x = x;
	this.y = y;
	this.tam = 12;
	this.id = -1;
	this.objX = x;
	this.objY = y;
	this.velocidad = 999;
	//personaje
}
Personaje.prototype = new Celula();
Personaje.prototype.constructor = Personaje;
Personaje.prototype.mouseClick = function(ev){
	if(!comenzado){
		comenzado = true;
	}else{
		this.objX = ev.x - absX;
		this.objY = ev.y - absY + $(window).scrollTop();
	}
};

Personaje.prototype.move = function(){
	this.x = this.objX;
	this.y = this.objY;
	toca = this.tocaGrupo(bacterias);
	if(toca != -1){
		this.combate(toca);
	}else{
		this.objX = 0;
		this.objY = 0;
	}
};
Personaje.prototype.matar = function(){
	this.objX = 0;
	this.objY = 0;
};
Personaje.prototype.combate = function(id){
	if(bacterias[id].id != 0){
		bacterias[id].fallo = true;
		puntuacion -= 5-bacterias.length;
		init(5);
		this.matar();
	}else{
		destruyeBacteria(id);
		puntuacion++;
		this.matar();
	}
		
};
/* bacterias */
function Bacteria(x, y, id, tipo, vidaMax, membranaMax, infectado) {
	Celula.call(this);
	this.x = x;
	this.y = y;
	this.objX = x;
	this.objY = y;
	this.id = id;
	this.tam = 70;
	if(Math.random() > 0.5) this.tam = 45;
	if(Math.random() > 0.66) this.tam = 58;
    this.objX = x;
    this.objY = y;
    this.velocidad = 1;
	this.fallo = false;
	var anterior = parseInt(Math.random()* 40) - 25;
	if(this.id > 0){
		anterior = bacterias[id-1].numero;
	}
	this.numero = anterior + parseInt(Math.random()*20) + 1;
}
Bacteria.prototype = new Celula();
Bacteria.prototype.constructor = Bacteria;
Bacteria.prototype.paint = function(){
	drawBacteria(ctx, this.x, this.y, this.tam, this.numero, this.fallo);
};
Bacteria.prototype.move = function(){
	this.colisionarCon(bacterias);
    if(!this.mueveObj()){//se mueve hacia el objetivo
		this.nuevoObj();//si llega a su destino cambia de objetivo
	}
};

