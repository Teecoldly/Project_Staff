$(document).ready(function () {
     
 
    function getlocaltion() { 
        var infoWindow;
        var pos = {
            lat: 13.847860, 
            lng: 100.604274
        }
        infoWindow = new google.maps.InfoWindow;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                pos = {
                    lat: position.coords.latitude, 
                    lng: position.coords.longitude
                }
                initialize(pos["lat"],pos["long"]);
           
      
            }, function() {
             
              handleLocationError(true, infoWindow, map.getCenter());
            });
          
          } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
            
          }
       
     }
    function initialize(lat=13.847860,long=100.604274) {
        var myLatlng = new google.maps.LatLng(lat,long);
        var myOptions = {
          zoom: 15, 
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
        addMarker(myLatlng, 'Default Marker', map);
    
    }
    function addMarker(latlng,title,map) {
        var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                title: title,
                draggable:true
        });
        marker.addListener('drag',function(event) {
             $('#lat').val(event.latLng.lat())  ;
            $('#lng').val(event.latLng.lng())  ;
        });
        marker.addListener('dragend',function(event) {
            $('#lat').val(event.latLng.lat())  ;
            $('#lng').val(event.latLng.lng())  ;
        });
    }

    getlocaltion();
 
});