let map;
  var pines=[];
  function addMarcador(location){
    var pin = new google.maps.Marker({
    position:location,
    map:map,
    animation:google.maps.Animation.DROP
    });
    document.getElementById("latitud").value=location.lat();
    document.getElementById("longitud").value=location.lng();
    console.log("latitud",location.lat());
    console.log("longitud",location.lng());
    for(var i in pines){
      pines[i].setMap(null);
    }

    pines.push(pin);
  }
  function initMap() {
    var myOptions = {
        zoom:14,
        center:new google.maps.LatLng(-17.7817528,-63.1810015),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map'),myOptions)
    map.addListener('click',function(event){
      addMarcador(event.latLng);
    });
    var pin = new google.maps.Marker({
    position:new google.maps.LatLng(-17.7817528,-63.1810015),
    map:map,
    title: "Hola Mundo"
    });
    pines.push(pin);
  }