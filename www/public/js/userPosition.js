navigator.geolocation.getCurrentPosition(function (position) {
  
  //Creamos las variables para la latitud y la longitud de la posición del usuario
  var userLat = position.coords.latitude.toFixed(6);
  var userLng = position.coords.longitude.toFixed(6);
  //Guardamos su ubicación en localStorage
  localStorage.setItem("lat", userLat);
  localStorage.setItem("lng", userLng);
});
