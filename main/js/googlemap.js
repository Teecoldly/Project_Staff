var map;
var position={lat: 13.847860, lng: 100.604274};
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center:  position,
    zoom:10
  })
}