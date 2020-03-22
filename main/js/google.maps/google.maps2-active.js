
	var map ={lat: 13.847860, lng: 100.604274}
function initMap() {
		 
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
          var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          showmap(pos);
          
          }, function() {
          handleLocationError(true, infoWindow, map.getCenter());
          });
        }
       
      }
	  
     
 

      function showmap(pos) {
        map2 = new google.maps.Map(document.getElementById('map2'), {
          center: pos,
          zoom: 15
        });
        var marker = new google.maps.Marker({
          position: pos,
          map:map2,
          title:"ตำแหน่งบ้าน"
        });
      }
      