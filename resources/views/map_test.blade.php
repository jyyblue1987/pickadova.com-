<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Pickadova  Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

<html>
  <body>
    <div id="map"></div>



  </body>
</html>
    <script>
      var db_lat =parseFloat('{{$lat}}');
      var db_lang =parseFloat('{{$lang}}');
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };
       var iconBase =
            'https://developers.google.com/maps/documentation/javascript/examples/full/images/';

        var icons = {
          parking: {
            icon: iconBase + 'parking_lot_maps.png'
          },
          library: {
            icon: iconBase + 'library_maps.png'
          },
          info: {
            icon: iconBase + 'info-i_maps.png'
          }
        };


        function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(db_lat, db_lang),
          zoom: 4
        });

          var spiderConfig = {
              keepSpiderfied: true,
              event: 'mouseover',
              circleFootSeparation:50,
          };
        var infoWindow = new google.maps.InfoWindow;
       
          // Change this depending on the name of your PHP or XML file
          downloadUrl('{{url("get_map_user.xml")}}', function(data) {
            var xml = data.responseXML;
            var new_mark = [];
            var markers = xml.documentElement.getElementsByTagName('marker');
           var markerSpiderfier = new OverlappingMarkerSpiderfier(map, spiderConfig);
           Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var icon = markerElem.getAttribute('icon');

              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
              var infowincontent = document.createElement('div');
              var anchor = document.createElement('a');

              anchor.setAttribute('href','{{url("view_profile")}}/'+id); 
              anchor.setAttribute('target','_blank'); 
              var strong = document.createElement('strong');
              strong.textContent = name
              anchor.appendChild(strong);
              infowincontent.appendChild(anchor);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              // var icon = customLabel[type] || {};
             
               
              
               var cityCircle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.35,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: point,
                radius: 100 
              });

               var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: icon
              });
                 
              marker.addListener('click', function(ts) {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            
           new_mark.push(marker);

           markerSpiderfier.addMarker(marker); 
    
            });
          console.log(new_mark);  
     
           
             
            var markerCluster = new MarkerClusterer(map, new_mark,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
            markerCluster.setMaxZoom(10);


            markerSpiderfier.addListener('click', function(marker, e) {
                  // console.log("click:-"+JSON.stringify(marker));
                  // infoWindow.setContent(marker.title);
                  // infoWindow.open(map, marker);
              
              });

              markerSpiderfier.addListener('spiderfy', function(markers) {
             
                  console.log('spuid:-'+markers);
                  // infoWindow.close();
              
              });

          });

        }




      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing(e) {
        console.log(e);
      }

 function markerOpen(markerid) {

       map.setZoom(22);
      map.panTo(markers[markerid].getPosition());
      google.maps.event.trigger(markers[markerid],'click');
      switchView('map');
  }

    </script>

    <script src="{{URL::ASSET('plugins/markerclusterer/markerclusterer.js')}}">
    </script>

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OverlappingMarkerSpiderfier/1.0.3/oms.min.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACWUZ9OL8BQVQC-4cSsSFmEo71SLDzvlk&callback=initMap">
    </script>