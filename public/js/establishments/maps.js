var marker;          //variable del marcador
var coords = {};    //coordenadas obtenidas con la geolocalización
let coordenadas = $('#coords').attr('value').split(",")
let lng = parseFloat(coordenadas[1]), lat = parseFloat(coordenadas[0]);

//Funcion principal
initMap = function () 
{
 
    //usamos la API para geolocalizar el usuario
        navigator.geolocation.getCurrentPosition(
          function (position){
            if(lng){
              coords =  {
                lng: lng,
                lat: lat
              }
            } else {
              coords =  {
                lng: position.coords.longitude,
                lat: position.coords.latitude
              }
            }

            setMapa(coords);  //pasamos las coordenadas al metodo para crear el mapa
            console.log(lng)
          },function(error){console.log(error);});
    
}
 
 
 
function setMapa (coords)
{   
      //Se crea una nueva instancia del objeto mapa
      var map = new google.maps.Map(document.getElementById('map'),
      {
        zoom: 16,
        center:new google.maps.LatLng(coords.lat,coords.lng),
 
      });
 
      //Creamos el marcador en el mapa con sus propiedades
      //para nuestro obetivo tenemos que poner el atributo draggable en true
      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
      marker = new google.maps.Marker({
        map: map,
        draggable: true,
        animation: google.maps.Animation.DROP,
        position: new google.maps.LatLng(coords.lat,coords.lng),
      });
      //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
      //cuando el usuario a soltado el marcador
      marker.addListener('click', toggleBounce);
	  
	   map.addListener('click', function(event) {
         // console.log(event.latLng);
		 // console.log('lat:'+event.latLng.lat());
		 // console.log('lng:'+event.latLng.lng());
		  
		marker.setPosition(event.latLng);
		document.getElementById("coords").value   = event.latLng.lat()+","+ event.latLng.lng();
        });
		
	 var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

		var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      
      marker.addListener( 'dragend', function (event)
      {
        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
        document.getElementById("coords").value   = this.getPosition().lat()+","+ this.getPosition().lng();
      });
}

//callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

