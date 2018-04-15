var map;
var marker;
var infowindow ;
var messagewindow ;

function initMap() {
    var Agadir = {lat : 30.4278 , lng : -9.5981  } ;
    map = new google.maps.Map ( document.getElementById('map'), {
        center : Agadir,
        zoom : 12 , 
        disableDoubleClickZoom : true, 
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }) ;

   
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
    
    //Code below assigns a click listener to the map with addListener()
    //callback function that creates a marker when user clicks the map
    google.maps.event.addListener(map, 'dblclick' , function(event){
        var marker = new google.maps.Marker({
            position : event.latLng,
            map : map
        });

        google.maps.event.addListener(marker , 'dblclick' , function() {
            infowindow.open(map , marker ) ;
        });
    });

}// end function initMap



function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4 ) {
        request.onreadystatechange = doNothing;
        callback(request.responseText, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
}// end function download url








function saveData() {
    var CodeClient = escape(getElementById("CodeClient").value ) ;
    var NomPrenom  = escape(getElementById("NomPrenom").value ) ;
    var Adresse    = escape(getElementById("Adresse").value ) ;
    var Statut     = escape(getElementById("Statut").value ) ;
    var TypePv     = escape(getElementById("TypePv").value ) ;
    var Agence     = escape(getElementById("Agence").value ) ;
    var Region     = escape(getElementById("Region").value ) ;
    var Secteur    = escape(getElementById("Secteur").value ) ;
    var Tournee    = escape(getElementById("Tournee").value ) ;
    var Cluster    = escape(getElementById("Cluster").value ) ;
    var Ordre      = escape(getElementById("Ordre").value ) ;
    var Lat        = escape(getElementById("inputLat_dblclick").value ) ;
    var Lng        = escape(getElementById("inputLng_dblclick").value ) ;
    var url        = "AddForm.php?CodeClient=" + CodeClient + "&NomPrenom=" + NomPrenom + "&Adresse=" + Adresse +
                     "&Statut=" + Statut + "&TypePv=" + TypePv + "&Agence=" + Agence + "&Region=" + Region + "&Secteur=" + Secteur +
                     "&Tournee=" + Tournee + "&Cluster=" + Cluster + "&Ordre=" + Ordre + "&inputLat_dblclick=" + Lat +
                     "&inputLng_dblclick=" + Lng ;

    downloadUrl( url , function(data, responseCode) {

        if (responseCode == 200 && data.lenght <= 1 ) {
            messagewindow.open(map, marker);
        }
    } );
} // end function saveData 


  function doNothing () {
  }




  downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
    var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName('marker');
    Array.prototype.forEach.call(markers, function(markerElem) {
      var id = markerElem.getAttribute('id');
      var name = markerElem.getAttribute('name');
      var address = markerElem.getAttribute('address');
      var type = markerElem.getAttribute('type');
      var point = new google.maps.LatLng(
          parseFloat(markerElem.getAttribute('lat')),
          parseFloat(markerElem.getAttribute('lng')));

      var infowincontent = document.createElement('div');
      var strong = document.createElement('strong');
      strong.textContent = name
      infowincontent.appendChild(strong);
      infowincontent.appendChild(document.createElement('br'));

      var text = document.createElement('text');
      text.textContent = address
      infowincontent.appendChild(text);
      var icon = customLabel[type] || {};
      var marker = new google.maps.Marker({
        map: map,
        position: point,
        label: icon.label
      });
      marker.addListener('click', function() {
        infoWindow.setContent(infowincontent);
        infoWindow.open(map, marker);
      });
    });
  });





  ///////////////// form


  /////////////////////////////////

// function GetAddress(){
//     google.maps.event.addListener(map, 'dblclick' , function(event){
//         var dblclickLat = event.latLng.lat() ;
//         var dblclickLng = event.latLng.lng() ; 
        
//     }) ;
    
//     var latlng = new google.maps.latLng(dblclickLat , dblclickLng) ;
//     var geocoder = new google.maps.geocoder() ;

//     geocoder.geocode({ 'latLng' : latLng } , function(results , status) {
//         if(status == google.maps.Geocoder.status.OK) {
//             if (results[1]) {
//                 alert("Location: " + results[1].formatted_address);
//             }
//         }
//     }) ; 
// }




// var map;
// var marker;
// var infowindow ;
// var messagewindow ;

// function initMap() {
//     var Agadir = {lat : 30.4278 , lng : -9.5981  } ;
//     map = new google.maps.Map ( document.getElementById('map'), {
//         center : Agadir,
//         zoom : 13
//     }) ;
    
//     //New info window Object that retrieves THE FORM element on Clicking a marker
//     infowindow = new google.maps.infowindow({
//         content : document.getElementById('form')
//     }) ;

//     //New info window object that retrieves THE MESSAGE element on saving the info window form
//     messagewindow = new google.maps.infowindow({
//         content : document.getElementById('message')
//     }) ;

//     //Code below assigns a click listener to the map with addListener()
//     //callback function that creates a marker when user clicks the map
    // google.map.event.addListener (map, "click" , function(event) {
    //     marker = new google.maps.Marker({
    //         position : event.latLng, 
    //         map : map 
    //     }) ;
    // }) ;

//     //code below assign a click listener to the marker
//     //which displays an info windows when the user clicks the marker
//     google.maps.event.addListener (marker, "click" , function() {
//         infowindow.open(map, marker) ;
//     }) ;
// } // end function initMap

// function saveData() {
//     var codeClient  = escape(document.getElementById("CodeClient").value);
//     var NomPrenom   = escape(document.getElementById("NomPrenom").value);
//     var Statut      = escape(document.getElementById("Statut").value);
//     var typePV      = escape(document.getElementById("typePV").value);
//     var Agence      = escape(document.getElementById("Agence").value);
//     var Region      = escape(document.getElementById("Region").value);
//     var Secteur     = escape(document.getElementById("Secteur").value);
//     var Tournee     = escape(document.getElementById("Tournee").value);
//     var Cluster     = escape(document.getElementById("cluster").value);
//     var Ordre       = escape(document.getElementById("Ordre").value);
//     var latLng      = marker.getPosition() ;
//     var url         = "phpsqlinfo_addrow.php?CodeClien=" + codeClient + "&NomPrenom=" + NomPrenom +
//                       "&Statut=" + Statut + "&typePV=" + typePV + "&Agence=" + Agence + "&Region=" + Region +
//                       "&Secteur" + Secteur + "&Tournee=" + Tournee + "&Cluster=" + Cluster + "&Ordre" + Ordre +
//                       "&lat=" + latLng.lat() + "&lng" + latLng.lng() ;
    
//     downloadUrl(url, function(data, responseCode) {
//         if(responseCode == 200 && data.length <= 1 ){
//             infowindow.close() ;
//             messagewindow.open(map, marker) ;
//         }
//     }) ;
// }// end function saveData



