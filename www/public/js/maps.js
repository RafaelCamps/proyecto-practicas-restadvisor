var icono = "public/img/logos/icono-mapa.png";

var input_range = document.getElementById("distancia");

if (input_range) {
  var zoom = 10;
  //console.log("zoom inicial", zoom);
  document.getElementById("distancia").addEventListener("change", function () {
    var valor = document.getElementById("distancia").value;
    //console.log("valor range", valor);
    zoom = 22 - valor;

    initMap();
    //console.log("valor zoom", zoom);
  });
}

function initMap() {
  //Comprobamos si existe un elemento con ID="nombre" eso significará que estamos en la ficha de un restaurante
  if (document.getElementById("nombre")) {
    // Guardamos el valor del elemento en un variable.
    var nombre = document.getElementById("nombre").innerText;
    //console.log(nombre);
    //Recogemos las coordenadas del restaurante
    var lat = parseFloat(
      document.getElementById("map").attributes["lat"].value
    );
    // console.log(lat);
    var long = parseFloat(
      document.getElementById("map").attributes["long"].value
    );
    // console.log(long);
    // Creamos una variable "restaurante" con los valores de latitud y longitud.
    var restaurante = { lat: lat, lng: long };
    // console.log(restaurante);
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
  } else if (document.getElementById("contacto")) {
    var restAdvisor = { lat: 39.552192, lng: 2.692828 };

    var map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: restAdvisor,
    });

    // Creamos un marcador, posicionado en el restaurante
    var marker = new google.maps.Marker({
      position: restAdvisor,
      map: map,
      icon: icono,
      title: "RestAdvisor",
    });
    var infowindow = new google.maps.InfoWindow({
      content:
        '<div class="text-center"><img src="public/img/logos/logo-redondo.png" width="80px"></div><div><a href="#"><h4 class="text-success text-center"> RestAdvisor.es</h4></a></div>',
    });

    marker.addListener("click", function () {
      infowindow.open(map, marker);
    });
  } else {
    // Recuperamos los datos del localStorage, que hemos guardado si el usuario permite acceder a su ubicación
    var latitud = localStorage.getItem("lat");
    var longitud = localStorage.getItem("lng");

    //Creamos la variable userPosition, que le va a indicar el centro al mapa
    var userPosition = { lat: 0, lng: 0 };
    // console.log("userPosition al ser declarado : ", userPosition);

    //Comprobamos si tenemos los datos de la ubicación en el localStorage
    if (latitud) {
      //Si tenemos los datos, los asignamos a las propiedades del objeto userPosition
      userPosition.lat = parseFloat(latitud);
      userPosition.lng = parseFloat(longitud);
    } else {
      //Si no tenemos datos, le asignamos unas coordenadas por defecto (centro de Mallorca)
      userPosition.lat = 39.642306;
      userPosition.lng = 3.006223;
    }

    // En el caso de que no tengamos un restaurante seleccionado, crearemos un mapa mostrando todos los restaurantes del listado centrado en la ubicación del usuario.
    var map = new google.maps.Map(document.getElementById("map"), {
      //zoom: 10,
      zoom: zoom,
      center: userPosition,
    });
    // console.log("userPosition después de crear el mapa", userPosition);

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
          "' width='200px'><a href='index.php?restaurante=" +
          restaurantes[i].id_restaurante +
          "'><h2 class='text-center h5 p-2 mt-3'>" +
          restaurantes[i].nombre +
          "</h2></a>",
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

      if (props.content) {
        var infowindow = new google.maps.InfoWindow({
          content: props.content,
        });

        marker.addListener("click", function () {
          infowindow.open(map, marker);
        });
      }
    }
  }
}
