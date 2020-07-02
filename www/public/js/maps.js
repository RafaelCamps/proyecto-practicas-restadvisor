let lat = parseFloat(document.getElementById("map").attributes["lat"].value);
let long = parseFloat(document.getElementById("map").attributes["long"].value);

let nombre = document.getElementById("nombre").innerText;

let restaurante = { lat: lat, lng: long };

console.log(restaurante);
console.log(nombre);

function initMap() {
  // The map, centered at rte.
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: restaurante,
  });
  // The marker, positioned at restaurante
  var marker = new google.maps.Marker({
    position: restaurante,
    map: map,
    icon: "public/img/logos/icono-mapa.png",
    title: nombre,
  });

  //   var marker = new google.maps.Marker({
  //     position: myLatLng,
  //     map: map,
  //     icon: "../img/logos/icono-verde.png",
  //     title: "Hello World!",
  //   });
}
