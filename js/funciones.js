$( document ).ready(function() {

var map;
map = new google.maps.Map(document.getElementById("map") , {
   center: {lat: -35.4260164, lng: -71.7238981},
    zoom: 10
});
//map.data.addGeoJson(cities);

});

function cargacoord(){

    var ciudad = $("#ciudad").val();
    buscarnombre(ciudad);
}
function buscarnombre(ciudad) {
    if(ciudad == ""){
        alert('Seleccionar una comuna');
        return 0;
    }else{
        $.post(
            "php/nombreciudad.php",
            {'id_ciudad':ciudad},
            function (datos) {
                var nombre = datos.nombre_ciudad;

                var geocoder = new google.maps.Geocoder();
                var map = new google.maps.Map(document.getElementById("map") , {
                    center: {lat: -35.4260164, lng: -71.7238981},
                    zoom: 10
                });
                geocodeAddress(geocoder, map, nombre);

            },'json'
        );

    }



}
function geocodeAddress(geocoder, resultsMap, nombre) {
    geocoder.geocode({'address': nombre}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function cargaprovincia(){

var id = $('#region').val();
    $.ajax({
        type:'post',
        url: 'php/cargaprovincia.php',
        data: {'id':id}
    }).done(function (lista_provincia) {
        $('#provincia').html(lista_provincia);
    }).fail(function () {
        alert('Hubo un error al cargar la provincia');
    });


}

function cargaciudad(){

    var id = $('#provincia').val();
    $.ajax({
        type:'post',
        url: 'php/cargaciudad.php',
        data: {'id':id}
    }).done(function (lista_comuna) {
        $('#ciudad').html(lista_comuna);
    }).fail(function () {
        alert('Hubo un error al cargar la provincia');
    });


}


function initMap() {
   var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 0,
    center: {lat:-35.4260164, lng: -71.7238981},
    mapTypeControl: false
  });

  initGallPeters();
  map.mapTypes.set('gallPeters', gallPetersMapType);
  map.setMapTypeId('gallPeters');

  // Show the lat and lng under the mouse cursor.
  var coordsDiv = document.getElementById('coords');
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(coordsDiv);
  map.addListener('mousemove', function(event) {
    coordsDiv.textContent =
        'lat: ' + Math.round(event.latLng.lat()) + ', ' +
        'lng: ' + Math.round(event.latLng.lng());
  });

  // Add some markers to the map.
  map.data.setStyle(function(feature) {
    return {
      title: feature.getProperty('name'),
      optimized: false
    };
  });
  //map.data.addGeoJson(cities);
}


var gallPetersMapType;
function initGallPeters() {
  var GALL_PETERS_RANGE_X = 800;
  var GALL_PETERS_RANGE_Y = 512;

  // Fetch Gall-Peters tiles stored locally on our server.
  gallPetersMapType = new google.maps.ImageMapType({
    getTileUrl: function(coord, zoom) {
      var scale = 1 << zoom;

      // Wrap tiles horizontally.
      var x = ((coord.x % scale) + scale) % scale;

      // Don't wrap tiles vertically.
      var y = coord.y;
      if (y < 0 || y >= scale) return null;

      return 'images/gall-peters_' + zoom + '_' + x + '_' + y + '.png';
    },
    tileSize: new google.maps.Size(GALL_PETERS_RANGE_X, GALL_PETERS_RANGE_Y),
    isPng: true,
    minZoom: 0,
    maxZoom: 1,
    name: 'Gall-Peters'
  });

  // Describe the Gall-Peters projection used by these tiles.
  gallPetersMapType.projection = {
    fromLatLngToPoint: function(latLng) {
      var latRadians = latLng.lat() * Math.PI / 180;
      return new google.maps.Point(
          GALL_PETERS_RANGE_X * (0.5 + latLng.lng() / 360),
          GALL_PETERS_RANGE_Y * (0.5 - 0.5 * Math.sin(latRadians)));
    },
    fromPointToLatLng: function(point, noWrap) {
      var x = point.x / GALL_PETERS_RANGE_X;
      var y = Math.max(0, Math.min(1, point.y / GALL_PETERS_RANGE_Y));

      return new google.maps.LatLng(
          Math.asin(1 - 2 * y) * 180 / Math.PI,
          -180 + 360 * x,
          noWrap);
    }
  };
}

