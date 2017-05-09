function initMap() {
        //todo: get order_id from url. 
        var bounds = new google.maps.LatLngBounds;
        var markersArray = [];
        //getAddress()
        var xmlhttp, jsonArray, x, txt ="";
        xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 jsonArray = JSON.parse(this.responseText);
                 txt = jsonArray[0].ticket_pickup_address;
                 sessionStorage.setItem("order",txt);
               
                 //document.getElementById('travel').innerHTML = 'Origin: <b>'+txt+'</b>';
                         //seller
            }
            //else{alert("uh oh");}
        };
        xmlhttp.open("GET", "../php/Address.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send();//in parens, enter order_id = orderId
        /*for(var i =0; i<sessionStorage.length;i++){
            console.log(sessionStorage.getItem(sessionStorage.key(i)));
        }*/
        var origin1 = sessionStorage.getItem("order");//"7000 Coliseum Way, Oakland, CA 94621, USA";
        //console.log(origin2);
        var destinationA;
        if(sessionStorage.getItem( "shipping-name" ) == null ){
            destinationA = sessionStorage.getItem("billing-address") +","+ sessionStorage.getItem("billing-city")+","+sessionStorage.getItem("billing-zip") + "," + sessionStorage.getItem("billing-country");
        }
        else{
            destinationA = sessionStorage.getItem("shipping-address") +","+ sessionStorage.getItem("shipping-city")+","+sessionStorage.getItem("shipping-zip") + "," + sessionStorage.getItem("shipping-country");
        }
        /*var origin1 = '1 Washington Sq,San Jose';
        //var origin2 = 'Greenwich, England';*/
        //var destinationA = '7000 Coliseum Way, Oakland, CA 94621';
        //var destinationB = {lat: 50.087, lng: 14.421};

    var destinationIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=A|9DE0AD|000000';
        var originIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=B|45ada8|000000';
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 55.53, lng: 9.4},
          zoom: 10
        });
        var geocoder = new google.maps.Geocoder;

        var service = new google.maps.DistanceMatrixService;
        service.getDistanceMatrix({
          origins: [origin1],
          destinations: [destinationA],
          travelMode: 'DRIVING',
          unitSystem: google.maps.UnitSystem.IMPERIAL,
          avoidHighways: false,
          avoidTolls: false
        }, function(response, status) {
          if (status !== 'OK') {
            alert('Error was: ' + status);
          } else {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            var travelDiv = document.getElementById('travel');
            var travel_TimeDiv = document.getElementById('travel_time');
            var directionsService = new google.maps.DirectionsService;
              
            var directionsDisplay = new google.maps.DirectionsRenderer({
                draggable: true,
                map: map,
                panel: document.getElementById('right-panel')
              });
              
            travelDiv.innerHTML = '';
            travel_TimeDiv.innerHTML = '';
            deleteMarkers(markersArray);
               displayRoute(origin1, destinationA, directionsService, directionsDisplay);

            var showGeocodedAddressOnMap = function(asDestination) {
              var icon = asDestination ? destinationIcon : originIcon;
              return function(results, status) {
                if (status === 'OK') {
                  map.fitBounds(bounds.extend(results[0].geometry.location));
                  markersArray.push(new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                  }));
                } else {
                  alert('Geocode was not successful due to: ' + status);
                }
              };
            };

            for (var i = 0; i < originList.length; i++) {
              var results = response.rows[i].elements;
              geocoder.geocode({'address': originList[i]}, showGeocodedAddressOnMap(false));
              for (var j = 0; j < results.length; j++) {
                geocoder.geocode({'address': destinationList[j]}, showGeocodedAddressOnMap(true));
                travelDiv.innerHTML += 'Origin: <b>'+originList[i]+'</b>'+'<br> Destination: ' + '<b>'+destinationList[j]+'</b>' +'<br>';
                travel_TimeDiv.innerHTML+= 'Distance to destination: ' + results[j].distance.text + '<br> Time to destination: ' +results[j].duration.text +'<br>';
              }
            }
          };
    
        }
    )
}

      function deleteMarkers(markersArray) {
        for (var i = 0; i < markersArray.length; i++) {
          markersArray[i].setMap(null);
        }
        markersArray = [];
      }

function displayRoute(origin, destination, service, display) {
  service.route({
    origin: origin,
    destination: destination,
    travelMode: 'DRIVING',
    avoidTolls: true
  }, function(response, status) {
    if (status === 'OK') {
      display.setDirections(response);
    } else {
      alert('Could not display directions due to: ' + status);
    }
  });
}