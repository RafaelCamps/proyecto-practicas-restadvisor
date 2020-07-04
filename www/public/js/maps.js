var icono = "public/img/logos/icono-mapa.png";

function initMap() {
  //Comprobamos si existe un elemento con ID="nombre" eso significará que estamos en la ficha de un restaurante
  if (document.getElementById("nombre")) {
    // Guardamos el valor del elemento en un variable.
    var nombre = document.getElementById("nombre").innerText;
    console.log(nombre);
    //Recogemos las coordenadas del restaurante
    var lat = parseFloat(
      document.getElementById("map").attributes["lat"].value
    );
    console.log(lat);
    var long = parseFloat(
      document.getElementById("map").attributes["long"].value
    );
    console.log(long);
    // Creamos una variable "restaurante" con los valores de latitud y longitud.
    var restaurante = { lat: lat, lng: long };
    console.log(restaurante);
    // Creamos el mapa, centrado en el restaurante
    var map = new google.maps.Map(document.getElementById("map"), {
      zoom: 18,
      center: restaurante,
    });

    // Creamos un marcador, posicionado en el restaurante
    var marker = new google.maps.Marker({
      position: restaurante,
      map: map,
      icon: icono,
      title: nombre,
    });
  } else {
    // En el caso de que no tengamos un restaurante seleccionado, mostramos el mapa general
    var map = new google.maps.Map(document.getElementById("map"), {
      zoom: 10,
      center: { lat: 39.642306, lng: 3.006223 },
    });

    // Cogemos el listado de restaurantes y mediante un bucle creamos un array de markers
    var markers = [];

    for (var i = 0; i < restaurantes.length; i++) {
      var rest = {
        coords: {
          lat: parseFloat(restaurantes[i].coordenadas.lat),
          lng: parseFloat(restaurantes[i].coordenadas.lng),
        },
        title: restaurantes[i].nombre,
        content:
          "<img src='public/img/" +
          restaurantes[i].id_restaurante +
          "/" +
          restaurantes[i].imagen +
          "'><h2>" +
          restaurantes[i].nombre +
          "</h2><a href='index.php?restaurante=" +
          restaurantes[i].id_restaurante +
          "'>Ver ficha restaurante</a>",
      };
      //console.log(restaurantes[i]);
      markers.push(rest);
    }

    //console.log(markers);

    // Creamos un bucle para mostrar los markers

    for (var i = 0; i < markers.length; i++) {
      addMarker(markers[i]);
    }

    function addMarker(props) {
      var marker = new google.maps.Marker({
        position: props.coords,
        map: map,
        icon: icono,
        title: props.title,

      });

      // if (props.content) {
      //   var infoWindow = new google.maps.infoWindow({
      //     content: props.content,
      //   });

      //   marker.addListener("click", function () {
      //     infoWindow.open(map, marker);
      //   });
      // }
    }
  }

  //   var marker = new google.maps.Marker({
  //     position: myLatLng,
  //     map: map,
  //     icon: "../img/logos/icono-verde.png",
  //     title: "Hello World!",
  //   });
}
