$(function () {
 
    
    var lat = $("#lat").val();
    var lng = $("#lng").val();
    var lclat = $("#lclat").val();
    var lclng = $("#lclng").val();
 
  
    initialize(lat, lng,"googleMap");
    initialize(lclat, lclng,"map2");
  
   
    function initialize(lat = 13.847860, long = 100.604274,nameid) {
        var myLatlng = new google.maps.LatLng(lat, long);
        var myOptions = {
            zoom: 15,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(document.getElementById(nameid), myOptions);
        addMarker(myLatlng, 'Default Marker', map);

    }

    function addMarker(latlng, title, map) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: title,
            draggable:false
        });
        
    }
 
     
});