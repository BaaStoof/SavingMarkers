var geocoder = new google.maps.Geocoder();
var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
var map ;


function initMap() {
    var Agadir = {lat : 30.4278 , lng : -9.5981  } ;
    map = new google.maps.Map ( document.getElementById('map'), {
        center : Agadir,
        zoom : 12 , 
        disableDoubleClickZoom : true, 
        mapTypeId: google.maps.MapTypeId.ROADMAP
       
    }) ;

    /////////////////////

    //show latitude and longitude when the user mouve the mouse
    google.maps.event.addListener(map, 'mousemove' , function(event) {
        var mouseMouveLat = event.latLng.lat();
        var mouseMouveLng = event.latLng.lng();
        document.getElementById('inputLat').value = mouseMouveLat ;
        document.getElementById('inputLng').value = mouseMouveLng ; 
    }) ;

    //save latitude and longitude when the user double click on the map
    google.maps.event.addListener(map, 'dblclick' , function(event){
        var dblclickLat = event.latLng.lat() ;
        var dblclickLng = event.latLng.lng() ; 
        document.getElementById('inputLat_dblclick').value = dblclickLat ; 
        document.getElementById('inputLng_dblclick').value = dblclickLng ; 
    }) ;



    makeRequest('jsonData.php', function(data) {
              
        var data = JSON.parse(data.responseText);
          
        for (var i = 0; i < data.length; i++) {
            displayLocation(data[i]);
        }
    });

   

    //Code below assigns a click listener to the map with addListener()
    //callback function that creates a marker when user clicks the map
    google.maps.event.addListener(map, 'dblclick' , function(event){
        var marker = new google.maps.Marker({
            position : event.latLng,
            map : map,
            icon : image
        });

        google.maps.event.addListener(marker , 'dblclick' , function() {
            InfoWindow.open(map , marker ) ;
        });
    });

}// end function initMap

function displayLocation(clients) {
          
    var contentString =   '<div class="infoWindow"><strong>Code : '  + clients.codeClient + '</strong>'
                    + '<hr/><h6>&#9679; '  + clients.nomPrenom + '</h6>'
                    + '<br/><h6>&#9656;'     + clients.adresse + '</h6></div>';
      
    if (parseInt(clients.lat) == 0) {
        geocoder.geocode( { 'adresse': clients.adresse }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                  
                var marker = new google.maps.Marker({
                    map: map, 
                    position: results[0].geometry.clients,
                    
                    
                });

                var InfoWindow = new google.maps.InfoWindow({
                    content: contentString
                  });
                  
                marker.addListener('click', function() {
                    InfoWindow.open(map, this);
                  });

            }
        });
    } else {
        var position = new google.maps.LatLng(parseFloat(clients.lat), parseFloat(clients.lng));

        var InfoWindow = new google.maps.InfoWindow({
            content: contentString
          });
        
        var marker = new google.maps.Marker({
            map: map, 
            position: position,
            title: clients.nomPrenom 
            
        });
          
        marker.addListener('click', function() {
          InfoWindow.open(map, this);
        });

    }
}


function makeRequest(url, callback) {
    var request;
    if (window.XMLHttpRequest) {
        request = new XMLHttpRequest(); // IE7+, Firefox, Chrome, Opera, Safari
    } else {
        request = new ActiveXObject("Microsoft.XMLHTTP"); // IE6, IE5
    }
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            callback(request);
        }
    }
    request.open("GET", url, true);
    request.send();
}