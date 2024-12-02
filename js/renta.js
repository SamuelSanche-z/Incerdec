let mostrador = document.getElementById("mostrador");
let seleccion = document.getElementById("seleccion");
let imgSeleccionada = document.getElementById("img");
let modeloSeleccionado = document.getElementById("modelo");
let descripSeleccionada = document.getElementById("descripcion");
let precioSeleccionado = document.getElementById("precio");

function cargar(item){
    // Esto será redundante si ya estás usando la redirección en el HTML
    // Pero se puede dejar si lo deseas para un futuro uso
    var nombreCancha = item.getElementsByTagName("p")[0].innerHTML;
    
    // Aquí podrías almacenar la URL de la página a la que quieres redirigir
    let url = ''; // Aquí puedes agregar la lógica para determinar la URL según el ítem
    if (nombreCancha === 'CANCHA 1') {
        url = 'pagina_canchas/cancha1.html';
    } else if (nombreCancha === 'CANCHA 2') {
        url = 'pagina_canchas/cancha2.html';
    } // Agregar más condiciones para otras canchas

    // Redirigir a la URL correspondiente
    window.location.href = url;
}

function cerrar(){
    mostrador.style.width = "100%";
    seleccion.style.width = "0%";
    seleccion.style.opacity = "0";
    quitarBordes();
}

function quitarBordes(){
    var items = document.getElementsByClassName("item");
    for(let i = 0; i < items.length; i++){
        items[i].style.border = "none";
    }
}
