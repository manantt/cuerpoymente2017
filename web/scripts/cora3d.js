var ancho = 200;
var alto = 110;

var container;
var camera, scene, renderer;
var corazon;

var escala = 1;
var tiempo = 0;

var debug = "";

$( document ).ready(function() {
  	init();
	animate();
});

function init() {

    container = document.getElementById("logo");
    
	scene = new THREE.Scene();

    camera = new THREE.PerspectiveCamera( 70, ancho / alto, 1, 1000 );
    camera.position.x = 0;
    camera.position.y = -10;
    camera.position.z = 210;
    camera.lookAt(scene.position);

    scene.add( new THREE.AmbientLight(0xffffff ) );
    
    // corazon
    var geometry = new THREE.Geometry();
    var tamX = 2;
    var tamY = 2;
    var tamZ = 2;
    geometry.vertices.push(
        //Cora grande
        new THREE.Vector3( tamX*0,  tamY*25, 0 ),//0
        new THREE.Vector3( tamX*20, tamY*35, 0 ),//1
        new THREE.Vector3(  tamX*40, tamY*35, 0 ),//2
        new THREE.Vector3( tamX*55,  tamY*25, 0 ),//3
        new THREE.Vector3( tamX*65,  tamY*10, 0 ),//4
        new THREE.Vector3( tamX*60, tamY*-20, 0 ),//5
        new THREE.Vector3(  tamX*0, tamY*-80, 0 ),//6

        new THREE.Vector3( tamX*-60, tamY*-20, 0 ),//7
        new THREE.Vector3( tamX*-65, tamY*10, 0 ),//8
        new THREE.Vector3( tamX*-55,  tamY*25, 0 ),//9
        new THREE.Vector3(  tamX*-40, tamY*35, 0 ),//10
        new THREE.Vector3( tamX*-20, tamY*35, 0 ),//11
        //cora peq1
        new THREE.Vector3( tamX*0,  tamY*15, tamZ*10),//12
        new THREE.Vector3( tamX*20, tamY*30, tamZ*10),//13
        new THREE.Vector3(  tamX*40, tamY*30, tamZ*10),//14
        new THREE.Vector3( tamX*50,  tamY*20, tamZ*10),//15
        new THREE.Vector3( tamX*50, tamY*-10, tamZ*10),//16
        new THREE.Vector3( 0, tamY*-30, tamZ*10),//17

        new THREE.Vector3(  tamX*-50, tamY*-10, tamZ*10),//18
        new THREE.Vector3( tamX*-50,  tamY*20, tamZ*10),//19
        new THREE.Vector3( tamX*-40, tamY*30, tamZ*10),//20
        new THREE.Vector3( tamX*-20, tamY*30, tamZ*10),//21
        //cora peq2
        new THREE.Vector3( tamX*0,  tamY*15, tamZ*-10),//22
        new THREE.Vector3( tamX*20, tamY*30, tamZ*-10),//23
        new THREE.Vector3(  tamX*40, tamY*30, tamZ*-10),//24
        new THREE.Vector3( tamX*50,  tamY*20, tamZ*-10),//25
        new THREE.Vector3( tamX*50, tamY*-10, tamZ*-10),//26
        new THREE.Vector3( 0, tamY*-30, tamZ*-10),//27

        new THREE.Vector3(  tamX*-50, tamY*-10, tamZ*-10),//28
        new THREE.Vector3( tamX*-50,  tamY*20, tamZ*-10),//29
        new THREE.Vector3( tamX*-40, tamY*30, tamZ*-10),//30
        new THREE.Vector3( tamX*-20, tamY*30, tamZ*-10)//31
    );
    //borde1
    geometry.faces.push( new THREE.Face3(0,12,1) );
    geometry.faces.push( new THREE.Face3(1,12,13) );
    geometry.faces.push( new THREE.Face3(1,13,2) );
    geometry.faces.push( new THREE.Face3(2,13,14) );
    geometry.faces.push( new THREE.Face3(2,14,3) );
    geometry.faces.push( new THREE.Face3(3,14,15) );
    geometry.faces.push( new THREE.Face3(3,15,4) );
    geometry.faces.push( new THREE.Face3(4,15,16) );
    geometry.faces.push( new THREE.Face3(4,16,5) );
    geometry.faces.push( new THREE.Face3(5,16,6) );

    geometry.faces.push( new THREE.Face3(6,18,7) );
    geometry.faces.push( new THREE.Face3(7,18,8) );
    geometry.faces.push( new THREE.Face3(8,18,19) );
    geometry.faces.push( new THREE.Face3(8,19,9) );
    geometry.faces.push( new THREE.Face3(9,19,20) );
    geometry.faces.push( new THREE.Face3(9,20,10) );
    geometry.faces.push( new THREE.Face3(10,20,21) );
    geometry.faces.push( new THREE.Face3(10,21,11) );
    geometry.faces.push( new THREE.Face3(11,21,12) );
    geometry.faces.push( new THREE.Face3(11,12,0) );
    //cara1
    geometry.faces.push( new THREE.Face3(12,14,13) );
    geometry.faces.push( new THREE.Face3(12,15,14) );
    geometry.faces.push( new THREE.Face3(12,16,15) );
    geometry.faces.push( new THREE.Face3(12,17,16) );
    geometry.faces.push( new THREE.Face3(16,17,6) );

    geometry.faces.push( new THREE.Face3(18,6,17) );
    geometry.faces.push( new THREE.Face3(12,18,17) );
    geometry.faces.push( new THREE.Face3(12,19,18) );
    geometry.faces.push( new THREE.Face3(12,20,19) );
    geometry.faces.push( new THREE.Face3(12,21,20) );
    //borde2
    geometry.faces.push( new THREE.Face3(0,1,22) );
    geometry.faces.push( new THREE.Face3(1,23,22) );
    geometry.faces.push( new THREE.Face3(1,2,23) );
    geometry.faces.push( new THREE.Face3(2,24,23) );
    geometry.faces.push( new THREE.Face3(2,3,24) );
    geometry.faces.push( new THREE.Face3(3,25,24) );
    geometry.faces.push( new THREE.Face3(3,4,25) );
    geometry.faces.push( new THREE.Face3(4,26,25) );
    geometry.faces.push( new THREE.Face3(4,5,26) );
    geometry.faces.push( new THREE.Face3(5,6,26) );

    geometry.faces.push( new THREE.Face3(6,7,28) );
    geometry.faces.push( new THREE.Face3(7,8,28) );
    geometry.faces.push( new THREE.Face3(8,29,28) );
    geometry.faces.push( new THREE.Face3(8,9,29) );
    geometry.faces.push( new THREE.Face3(9,30,29) );
    geometry.faces.push( new THREE.Face3(9,10,30) );
    geometry.faces.push( new THREE.Face3(10,31,30) );
    geometry.faces.push( new THREE.Face3(10,11,31) );
    geometry.faces.push( new THREE.Face3(11,22,31) );
    geometry.faces.push( new THREE.Face3(11,0,22) );
    //cara2
    geometry.faces.push( new THREE.Face3(24,22,23) );
    geometry.faces.push( new THREE.Face3(22,24,25) );
    geometry.faces.push( new THREE.Face3(22,25,26) );
    geometry.faces.push( new THREE.Face3(22,26,27) );
    geometry.faces.push( new THREE.Face3(26,6,27) );

    geometry.faces.push( new THREE.Face3(28,27,6) );
    geometry.faces.push( new THREE.Face3(22,27,28) );
    geometry.faces.push( new THREE.Face3(22,28,29) );
    geometry.faces.push( new THREE.Face3(22,29,30) );
    geometry.faces.push( new THREE.Face3(22,30,31) );
    //
    geometry.computeBoundingSphere();

    var material = new THREE.MeshBasicMaterial ( { color: 0xc994dE, wireframe: false, overdraw: 0.5, transparent:true, opacity:0.8 } );
    material.opacity = 0.4;
    
    corazon = new THREE.Mesh( geometry, material );
    corazon.position.y = 25;
    corazon.castShadow = true;
    scene.add( corazon );

    renderer = new THREE.CanvasRenderer();
    //renderer = new THREE.WebGLRenderer( { alpha: true } );
    renderer.setClearColor( 0x560357/*, 0*/);
    renderer.setPixelRatio( window.devicePixelRatio );
    renderer.setSize( ancho, alto );
    container.appendChild( renderer.domElement );
}
//

function animate() {
    requestAnimationFrame( animate );

    var variacionTamaño = 1.1;
    tiempo+=0.1;

    if (tiempo > 35) {
        tiempo = 0;
    }//1
    if(tiempo > 13 && tiempo < 14 && escala < variacionTamaño){
        escala += 0.05;
    }
    if(tiempo > 14 && tiempo < 15 && escala >= 1){
        escala -= 0.05;
    }//2
    if(tiempo > 15 && tiempo < 16 && escala < variacionTamaño){
        escala += 0.1;
    }
    if(tiempo > 16 && tiempo < 17 && escala >= 1){
        escala -= 0.1;
    }
    debug += tiempo+"";
    corazon.scale.set(escala,escala,escala);

    //corazon.rotation.x = tiempo;
    corazon.rotation.y -= 0.02;

    renderer.render( scene, camera );

}

