const canvas = document.getElementById('formaciones');
const ctx = canvas.getContext('2d');

document.addEventListener("DOMContentLoaded", function () {
    dibujarFormacion();
});

//dibuja en una posición concreta
function dibujarJugador(x, y) {
    ctx.beginPath();
    ctx.arc(x, y, 15, 0, Math.PI * 2);
    ctx.fillStyle = 'blue';
    ctx.fill();
    ctx.closePath();
}

function dibujarPortero(x, y) {
    ctx.beginPath();
    ctx.arc(x, y, 15, 0, Math.PI * 2);
    ctx.fillStyle = 'red';
    ctx.fill();
    ctx.closePath();
}

//dibuja las formaciones
function dibujarFormacion() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    dibujarFondoRayado();
    dibujarLineasCampo();
    var formacion = document.getElementById('seleccionarFormacion').value;
    if (formacion === '4-3-3') {
        dibujarPortero(300, 480); //portero
        dibujarJugador(540, 350); //ld
        dibujarJugador(60, 350); //li
        dibujarJugador(200, 370); //central
        dibujarJugador(400, 370); //central
        dibujarJugador(100, 230); //mc
        dibujarJugador(300, 230); //mc
        dibujarJugador(500, 230); //mc
        dibujarJugador(80, 100); //ei
        dibujarJugador(520, 100); //ed
        dibujarJugador(300, 80); //dc
    } else if (formacion === '3-5-2') {
        dibujarPortero(300, 480); //portero
        dibujarJugador(150, 370); //central
        dibujarJugador(300, 370); //central
        dibujarJugador(450, 370); //central
        dibujarJugador(100, 230); //mc
        dibujarJugador(200, 250); //mc
        dibujarJugador(300, 200); //mc
        dibujarJugador(400, 250); //mc
        dibujarJugador(500, 230); //mc
        dibujarJugador(200, 80); //dc
        dibujarJugador(400, 80); //dc
    } else if (formacion == '4-4-2') {
        dibujarPortero(300, 480); //portero
        dibujarJugador(540, 350); //ld
        dibujarJugador(60, 350); //li
        dibujarJugador(200, 370); //central
        dibujarJugador(400, 370); //central
        dibujarJugador(60, 230); //mc
        dibujarJugador(200, 230); //mc
        dibujarJugador(400, 230); //mc
        dibujarJugador(540, 230); //mc
        dibujarJugador(200, 80); //dc
        dibujarJugador(400, 80); //dc
    } else if (formacion === '4-2-3-1') {
        dibujarPortero(300, 480); //portero
        dibujarJugador(540, 350); //ld
        dibujarJugador(60, 350); //li
        dibujarJugador(200, 370); //central
        dibujarJugador(400, 370); //central
        dibujarJugador(200, 260); //mcd
        dibujarJugador(400, 260); //mcd
        dibujarJugador(300, 180); //mco
        dibujarJugador(80, 180); //ei
        dibujarJugador(520, 180); //ed
        dibujarJugador(300, 80); //dc
    } else if (formacion === '4-3-2-1') {
        dibujarPortero(300, 480); //portero
        dibujarJugador(540, 350); //ld
        dibujarJugador(60, 350); //li
        dibujarJugador(200, 370); //central
        dibujarJugador(400, 370); //central
        dibujarJugador(100, 260); //mc
        dibujarJugador(300, 280); //mcd
        dibujarJugador(500, 260); //mc
        dibujarJugador(200, 180); //sdi
        dibujarJugador(400, 180); //sdd
        dibujarJugador(300, 80); //dc
    } else if (formacion === '5-4-1') {
        dibujarPortero(300, 480); //portero
        dibujarJugador(540, 350); //ld
        dibujarJugador(60, 350); //li
        dibujarJugador(180, 370); //central
        dibujarJugador(420, 370); //central
        dibujarJugador(300, 380); //central
        dibujarJugador(200, 230); //mc
        dibujarJugador(400, 230); //mc
        dibujarJugador(80, 230); //mi
        dibujarJugador(520, 230); //md
        dibujarJugador(300, 80); //dc
    } else if (formacion === '4-1-2-1-2') {
        dibujarPortero(300, 480); //portero
        dibujarJugador(540, 350); //ld
        dibujarJugador(60, 350); //li
        dibujarJugador(200, 370); //central
        dibujarJugador(400, 370); //central
        dibujarJugador(300, 300); //mcd
        dibujarJugador(150, 240); //mc
        dibujarJugador(450, 240); //mc
        dibujarJugador(300, 180); //mco
        dibujarJugador(200, 100); //dc
        dibujarJugador(400, 100); //dc
    }
}

function dibujarFondoRayado() {
    ctx.lineWidth = 60;

    var anchoLinea = 60;

    var colorActual = '#75c55a';

    for (var x = 0; x < 620; x += anchoLinea) {
        ctx.beginPath();
        ctx.moveTo(x, 0);
        ctx.lineTo(x, canvas.height);
        ctx.strokeStyle = colorActual;
        ctx.stroke();
    }
}

function dibujarLineasCampo() {
    ctx.lineWidth = 2;
    ctx.strokeStyle = "white";
    //bordes (aunque casi no se ven pero los dejo)
    ctx.beginPath();
    ctx.moveTo(0, 0);
    ctx.lineTo(600, 0);
    ctx.lineTo(600, canvas.height);
    ctx.lineTo(0, canvas.height);
    ctx.closePath();
    ctx.stroke();

    //el centro (que esta a la derecha porque tecnicamente en la mitad del campo solo)
    ctx.beginPath();
    ctx.arc(300, 0, 50, 5, 3 * Math.PI / 2);
    ctx.stroke();

    //el area
    ctx.beginPath();
    ctx.rect(200, 400, 200, 100);
    ctx.stroke();

    //penalti
    ctx.beginPath();
    ctx.arc(300, 435, 5, 0, 2 * Math.PI);
    ctx.fillStyle = "white";
    ctx.fill();


    //puntito del centro
    ctx.beginPath();
    ctx.arc(300, 0, 3, 0, 2 * Math.PI);
    ctx.fillStyle = "white";
    ctx.fill();

    //area pequeña
    ctx.beginPath();
    ctx.rect(250, 460, 100, 40);
    ctx.stroke();

    //area de fuera (el medio circulo)
    ctx.beginPath();
    ctx.arc(300, 400, 40, 3.15, 2 * Math.PI);
    ctx.stroke();
}
