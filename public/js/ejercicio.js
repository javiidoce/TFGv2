var modoActivo = null;
var canvas = document.getElementById("pizarra");
var ctx = canvas.getContext("2d");
var jugadores = [];
var jugadoresRivales = [];
var conos = [];
var balones = [];
var lineas = [];
var dibujando = false;
var elementoSeleccionado = null;
var colorSeleccionado = "white";
var grosorSeleccionado = 1;


//VALORES NECESARIOS NO TOCAR NI UNOO

//exportar el contenido del canvas a una imagen
function exportarCanvas() {
    var url = canvas.toDataURL('image/png');
    var enlace = document.createElement('a');
    enlace.href = url;
    enlace.download = 'ejercicio.png';
    enlace.click();
};

//agrega un jugador
function agregarJugador() {
    var x = 765;
    var y = 100;
    var jugador = {
        x: x,
        y: y
    };
    jugadores.push(jugador);
    dibujarPizarra();
}
//agregar un jugador rival (o local, solo le cambio el color el usuario usa el que quiera claro)
function agregarJugadorRival() {
    var x = 765;
    var y = 75;
    var jugador = {
        x: x,
        y: y
    };
    jugadoresRivales.push(jugador);
    dibujarPizarra();
}

//dibuja un jugador
function dibujarJugador(jugador) {
    ctx.beginPath();
    ctx.arc(jugador.x, jugador.y, 10, 0, 2 * Math.PI);
    ctx.fillStyle = "blue";
    ctx.fill();
    if (jugador.numero) {
        ctx.fillStyle = "white";
        ctx.font = "bold 12px Arial";
        ctx.textAlign = "center";
        ctx.fillText(jugador.numero, jugador.x, jugador.y + 3);
    }
}

//dibujar un jugado rival
function dibujarJugadorRival(jugador) {
    ctx.beginPath();
    ctx.arc(jugador.x, jugador.y, 10, 0, 2 * Math.PI);
    ctx.fillStyle = "red";
    ctx.fill();
    if (jugador.numero) {
        ctx.fillStyle = "white";
        ctx.font = "bold 12px Arial";
        ctx.textAlign = "center";
        ctx.fillText(jugador.numero, jugador.x, jugador.y + 3);
    }
}

//agregar un balón
function agregarBalon() {
    var x = 765;
    var y = 50;
    var balon = {
        x: x,
        y: y
    };
    balones.push(balon);
    dibujarPizarra();
}

//dibuja un balón
function dibujarBalon(balon) {
    ctx.beginPath();
    ctx.arc(balon.x, balon.y, 7, 0, 2 * Math.PI);
    ctx.fillStyle = "black";
    ctx.fill();
}

//agregar un cono
function agregarCono() {
    var x = 765;
    var y = 25;
    var cono = {
        x: x,
        y: y
    };
    conos.push(cono);
    dibujarPizarra();
}

//dibuja un cono
function dibujarCono(cono) {
    ctx.beginPath();
    ctx.arc(cono.x, cono.y, 5, 0, 2 * Math.PI);
    ctx.fillStyle = "orange"; //igual hay que poner un texto indicando que es un cono?? aunque es naranja igual se puede intuir
    ctx.fill();
}

//activar el modo de movimiento
function activarMovimiento() {
    desactivarModo();
    modoActivo = "movimiento";
    canvas.style.cursor = "grab";
    document.getElementById("movimiento").classList.add("btn-secondary");
    document.getElementById("dibujo").classList.remove("btn-secondary");
}



//evento pa pillar el color cada vez que cambia
document.getElementById("colorPicker").addEventListener("input", function() {
    colorSeleccionado = this.value;
    ctx.strokeStyle = colorSeleccionado;
});

//lo mismo pero pal grosor
document.getElementById("grosor").addEventListener("input", function() {
    grosorSeleccionado = this.value;
    ctx.lineWidth = grosorSeleccionado;
});

//deshacer el último movimiento (la goma es imposible, me rindo y dejo esto qque es más o menos lo mismo)
function deshacerMovimiento() {
    if (lineas.length > 0) {
        lineas.pop();
        dibujarPizarra();
    }
}

//pilla todos los jugadores balones y conos y los pone en su posición principal (los borra y los crea otra vez)
function restablecerPosiciones() {
    jugadores = [];
    jugadoresRivales = [];
    conos = [];
    balones = [];

    for (var i = 0; i < 10; i++) {
        agregarJugador();
    }

    for (var i = 0; i < 20; i++) {
        agregarCono();
    }

    for (var i = 0; i < 11; i++) {
        agregarJugadorRival();
    }

    for (var i = 0; i < 10; i++) {
        agregarBalon();
    }

    dibujarPizarra();
}

//activa el modo de dibujo
function activarDibujo() {
    desactivarModo();
    modoActivo = "dibujo";
    canvas.style.cursor = "cell";
    colorSeleccionado = document.getElementById("colorPicker").value;
    grosorSeleccionado = document.getElementById("grosor").value;
    document.getElementById("dibujo").classList.add("btn-secondary");
    document.getElementById("movimiento").classList.remove("btn-secondary");
}

//desactiva el modo que este activo (dibujo o moviendo o lo que sea ya)
function desactivarModo() {
    modoActivo = null;
    canvas.style.cursor = "auto";
}

canvas.addEventListener("mousedown", function(event) {
    var canvasRect = canvas.getBoundingClientRect(); //esto que hace? //NO TOCAR FUNCIONA BIEN PERO BUSCAR INFO
    var canvasX = event.clientX - canvasRect.left;
    var canvasY = event.clientY - canvasRect.top;

    if (modoActivo === "movimiento") { //si es movimiento mueve los jugadores las bolas y los conos claro
        var elementoEncontrado = false;
        jugadores.forEach(function(jugador) {
            var distancia = Math.sqrt(Math.pow(canvasX - jugador.x, 2) + Math.pow(canvasY - jugador.y, 2)); //me he perdido //CALCULA LA DISTANCIA ENTRE EL RATON Y EL JUGADOR, Y SI EL JUGADOR ES LO MAS CERCANO AL RATON LO AGARRA TIENE SENTIDO SII
            if (distancia <= 10 && !elementoEncontrado) {
                elementoSeleccionado = jugador;
                elementoEncontrado = true;
                canvas.style.cursor = "grab";
            }
        });
        jugadoresRivales.forEach(function(jugador) {
            var distancia = Math.sqrt(Math.pow(canvasX - jugador.x, 2) + Math.pow(canvasY - jugador.y, 2));
            if (distancia <= 10 && !elementoEncontrado) {
                elementoSeleccionado = jugador;
                elementoEncontrado = true;
                canvas.style.cursor = "grab";
            }
        });

            conos.forEach(function(cono) {
                var distancia = Math.sqrt(Math.pow(canvasX - cono.x, 2) + Math.pow(canvasY - cono.y, 2));
                if (distancia <= 5 && !elementoEncontrado) {
                    elementoSeleccionado = cono;
                    elementoEncontrado = true;
                    canvas.style.cursor = "grab";
                }
            });
            balones.forEach(function(balon) {
                var distancia = Math.sqrt(Math.pow(canvasX - balon.x, 2) + Math.pow(canvasY - balon.y, 2));
                if (distancia <= 5 && !elementoEncontrado) {
                    elementoSeleccionado = balon;
                    elementoEncontrado = true;
                    canvas.style.cursor = "grab";
                }
            });
    } else if (modoActivo === "dibujo") {
        dibujando = true;
        lineas.push([]);
        agregarPunto(canvasX, canvasY);
        lineas[lineas.length - 1].color = colorSeleccionado;
        lineas[lineas.length - 1].grosor = grosorSeleccionado;
    }
});

canvas.addEventListener("mousemove", function(event) {  //que se actualize la pizarra cada vez que mueves el raton si estas moviendo algo o dibujando
    var canvasRect = canvas.getBoundingClientRect();
    var canvasX = event.clientX - canvasRect.left;
    var canvasY = event.clientY - canvasRect.top;

    if (modoActivo === "movimiento" && elementoSeleccionado) {
        elementoSeleccionado.x = canvasX;
        elementoSeleccionado.y = canvasY;
        dibujarPizarra();
        canvas.style.cursor = "grabbing";
    } else if (modoActivo === "dibujo" && dibujando) {
        agregarPunto(canvasX, canvasY);
        dibujarPizarra();
    }
});

canvas.addEventListener("mouseup", function() {
    if (modoActivo === "movimiento" && elementoSeleccionado) {
        canvas.style.cursor = "grab";
    } else if (modoActivo === "dibujo" && dibujando) {
        dibujando = false;
    }
    elementoSeleccionado = null;
});

//añadir un número o texto a los jugadores
canvas.addEventListener("dblclick", function(event) {
    var canvasRect = canvas.getBoundingClientRect();
    var canvasX = event.clientX - canvasRect.left;
    var canvasY = event.clientY - canvasRect.top;

    jugadores.forEach(function(jugador) {
        var distancia = Math.sqrt(Math.pow(canvasX - jugador.x, 2) + Math.pow(canvasY - jugador.y, 2));
        if (distancia <= 10) {
            var nuevoNumero = prompt("Ingrese el número para el jugador:");
            if (nuevoNumero !== null) {
                jugador.numero = nuevoNumero;
                dibujarPizarra();
            }
        }
    });
    jugadoresRivales.forEach(function(jugador) {
        var distancia = Math.sqrt(Math.pow(canvasX - jugador.x, 2) + Math.pow(canvasY - jugador.y, 2));
        if (distancia <= 10) {
            var nuevoNumero = prompt("Ingrese el número para el jugador:");
            if (nuevoNumero !== null) {
                jugador.numero = nuevoNumero;
                dibujarPizarra();
            }
        }
    });
});


//le mete un punto a una linea
function agregarPunto(x, y) {
    lineas[lineas.length - 1].push({
        x: x,
        y: y
    });
}

//dibuja una línea
function dibujarLinea(linea) {
    ctx.beginPath();
    ctx.moveTo(linea[0].x, linea[0].y);
    ctx.strokeStyle = linea.color;//pilla el color y el grosor que esten seleccionados en el html
    ctx.lineWidth = linea.grosor;
    for (var i = 1; i < linea.length; i++) {
        ctx.lineTo(linea[i].x, linea[i].y);
    }
    ctx.stroke();
}

//dibuja todos los elementos que hay guardados en los arrays
function dibujarPizarra() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    dibujarFondoRayado();
    dibujarLineasCampo();
    jugadores.forEach(dibujarJugador);
    jugadoresRivales.forEach(dibujarJugadorRival);
    conos.forEach(dibujarCono);
    balones.forEach(dibujarBalon);
    lineas.forEach(dibujarLinea);
}

//le damos al usuario unos jugadores balones y conos pa que pueda hacer cosas
document.addEventListener("DOMContentLoaded", function() {
    for (var i = 0; i < 10; i++) {
        agregarJugador();
    }

    for (var i = 0; i < 20; i++) {
        agregarCono();
    }

    for (var i = 0; i < 11; i++) {
        agregarJugadorRival();
    }

    for (var i = 0; i < 10; i++) {
        agregarBalon();
    }
});

//dibuja un fondo rayado //AL FINAL LO DEJO DE UN COLOR QUE QUEDA MUY RARO Y NO SE VE MUY BIEN CON EL VERDE OSCURO, DEJO LA FUNCION POR SI LO USO ALGUNA VEZ
function dibujarFondoRayado() {
    ctx.lineWidth = 60;

    var anchoLinea = 60;

    var colorActual = '#75c55a';

    for (var x = 0; x < 750; x += anchoLinea) {
        ctx.beginPath();
        ctx.moveTo(x, 0);
        ctx.lineTo(x, canvas.height);
        ctx.strokeStyle = colorActual;
        ctx.stroke();
        //aqui faltaria las lineas pa que una vez dibujada la raya cambie de color pa la siguiente
    }
}

function dibujarLineasCampo() {
    ctx.lineWidth = 2;
    ctx.strokeStyle = "white";
    //bordes (aunque casi no se ven pero los dejo)
    ctx.beginPath();
    ctx.moveTo(0, 0);
    ctx.lineTo(750, 0);
    ctx.lineTo(750, canvas.height);
    ctx.lineTo(0, canvas.height);
    ctx.closePath();
    ctx.stroke();

    //el centro (que esta a la derecha porque tecnicamente en la mitad del campo solo)
    ctx.beginPath();
    ctx.arc(750, canvas.height / 2, 50,Math.PI / 2, 3 * Math.PI / 2);
    ctx.stroke();

    //el area
    ctx.beginPath();
    ctx.rect(0, canvas.height / 4, 100, canvas.height / 2);
    ctx.stroke();

    //penalti
    ctx.beginPath();
    ctx.arc(65, canvas.height / 2, 5, 0, 2 * Math.PI);
    ctx.fillStyle = "white";
    ctx.fill();


    //puntito del centro
    ctx.beginPath();
    ctx.arc(750, canvas.height / 2, 3, 0, 2 * Math.PI);
    ctx.fillStyle = "white";
    ctx.fill();

    //area pequeña
    ctx.beginPath();
    ctx.rect(0, (canvas.height / 2) - 55, 40, 110);
    ctx.stroke();

    //area de fuera (el medio circulo)
    ctx.beginPath();
    ctx.arc(100, canvas.height / 2, 50, 3 * Math.PI / 2, Math.PI / 2);
    ctx.stroke();
}
//ODIO LAS MATEMATICAS