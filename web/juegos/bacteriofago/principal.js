const enablePause = false;
//Variables globales
var canvas;
var ctx;
var absX, absY; //coordenadas de la posición absoluta del canvas
var tMapaX, tMapaY, tPantallaX, tPantallaY; //dimensiones del mapa y cel canvas
var comenzado = false; //indica si el juego esta en pausa, si el juego se ha iniciado
var camaraX = 500,
    camaraY = 500; //coordenadas en las que estara centrada la camara
var Personaje;
var bacterias = []; //array para almacenar las bacterias
var tiemp;
var puntuacion;

/******** Inicializar el juego ****************
Inicia una nueva partida. Debe haberse ejecutado loadGame previamente
*/
function iniciar(reset) {/*reset indica si es un reinicio o si es un nuevo nivel*/
    if (reset) {
        iniciado = false;
        puntuacion = 0;
        tMapaX = tPantallaX; //ajusta el mapa segun el tamaño del canvas
        tMapaY = tPantallaY;
        tiemp = 360;
        Personaje.x = 0; //mueve al personaje a su posicion de inicio
        Personaje.y = 0;
        Personaje.objX = 0;
        Personaje.objY = 0;
        Personaje.tam = 12;
        Personaje.velocidad = 999;
        camaraX = tPantallaX / 2; //centra la camara
        camaraY = tPantallaY / 2;
    }
    bacterias = [];
    //crea las bacterias
    creaBacteria1(200, 200);
    creaBacteria1(400, 200);
    creaBacteria1(300, 400);
    creaBacteria1(500, 400);
    creaBacteria1(200, 300);
}

/** Carga el juego. Sólo debe llamarse una vez cada vez que se recargue la página */
function loadGame() {
    canvas = document.getElementById('canvas'); //cargo el canvas
    canvas.width = 700; //le doy las dimensiones dependiendo de la resolucion
    canvas.height = 400;
    ctx = canvas.getContext('2d'); //cargo el contexto del canvas
    tPantallaX = canvas.width; //almaceno las dimensiones del canvas
    tPantallaY = canvas.height;
    Personaje = new Personaje(tMapaX / 2, 200); //creao un personaje
    absX = getAbsoluteElementPosition("canvas", "left"); //calculo la posicion absoluta del canvas 
    absY = getAbsoluteElementPosition("canvas", "top"); //(para calcular la posicion del cursor en el canvas)
    //crea los objetos
    iniciar(true);
    //eventos
    canvas.onclick = function() { //al hacer clic sobre el canvas
        Personaje.mouseClick(event);
    }
    //
    canvas.onmousemove = function(){
        Personaje.mouseMove(event);
    }
    //comienzo el bucle de juego
    var i = setInterval("bucle()", "18"); //aprox 60fps
}

/** BUCLE DE JUEGO*/
//ejecuta el bucle move-paint 60 veces por segundo
var redirigiendo = false;

function bucle() {
    if (!comenzado) { //pantalla de inicio
        pintaIni();
    } else { //bucle de juego
        tiemp--;
        if (tiemp > 0) {
            move(); //recalcula la posicion de cada objeto en el juego
            paint(); //repinta todos los objetos
        } else {
            if (!redirigiendo) {/*fin del juego*/
                pintaFin();
                redirigiendo = true;
                setTimeout(function() {//redirige tras unos segundos
                    window.location.replace("/?id=4&puntuacion="+puntuacion);
                }, 1500);
            }
            clearInterval(i);//termina el bucle de juego
        }
    }
}

/** Realiza todos los cambios que se producen en el juego en cada fotograma*/
function move() {
    Personaje.move();
    mueveBacterias();
    //la camara esta centrada
    if (bacterias.length == 0) {
        iniciar();
    }
    //terminar
    if (0) {
        comenzado = false;
    }
}
/* Funciones para crear personajes */
function creaBacteria1(x, y) {
    bacterias.push(new Bacteria(x, y, bacterias.length, 1, 500, 50));
}
/** Funciones de movimiento*/
function mueveBacterias() {
    for (var i = 0; i < bacterias.length; i++) {
        bacterias[i].move();
    }
}
/** Funciones de dibujado*/
function pintaGRojos(){
    for(var i=0; i<bacterias.length; i++){     
        bacterias[i].paint();  
    }
}
/* Funciones para destruir personajes */
function destruyeBacteria(id) {
    bacterias.splice(id, 1);
    for (i = 0; i < bacterias.length; i++) {
        bacterias[i].id = i;
    }
}