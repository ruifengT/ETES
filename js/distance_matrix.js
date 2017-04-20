    function initMap() {
        var bounds = new google.maps.LatLngBounds;
        var markersArray = [];
        var storage = sessionStorage;
        var origin1 = '7000 Coliseum Way, Oakland, CA 94621'; //replace with ticket address information
        var destinationA;
        if(storage.getItem( "shipping-name" ) == null ){
            destinationA = storage.getItem("billing-address") +","+ storage.getItem("billing-city")+","+storage.getItem("billing-zip") + "," + storage.getItem("billing-country");
        }
        else{
            destinationA = storage.getItem("shipping-address") +","+ storage.getItem("shipping-city")+","+storage.getItem("shipping-zip") + "," + storage.getItem("shipping-country");
        }
        /*var origin1 = '1 Washington Sq,San Jose';
        //var origin2 = 'Greenwich, England';*/
        //var destinationA = '7000 Coliseum Way, Oakland, CA 94621';
        //var destinationB = {lat: 50.087, lng: 14.421};

        var destinationIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=D|FF0000|000000';
        var originIcon = 'https://chart.googleapis.com/chart?' +
            'chst=d_map_pin_letter&chld=O|FFFF00|000000';
        var map = new google.maps.Map(document.getElementById('map'), {
          //center: {lat: 55.53, lng: 9.4},
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
            travelDiv.innerHTML = '';
            travel_TimeDiv.innerHTML = '';
            deleteMarkers(markersArray);

            var showGeocodedAddressOnMap = function(asDestination) {
              var icon = asDestination ? destinationIcon : originIcon;
              return function(results, status) {
                if (status === 'OK') {
                  map.fitBounds(bounds.extend(results[0].geometry.location));
                  markersArray.push(new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    icon: icon
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
                travelDiv.innerHTML += 'Origin: <b>'+originList[i] +'</b>'+ '<br> Destination: ' + '<b>'+destinationList[j]+'</b>' +'<br>';
                travel_TimeDiv.innerHTML+= 'Distance to destination: ' + results[j].distance.text + '<br> Time to destination: ' +results[j].duration.text +'<br>';
              }
            }
          }
        });
      }

      function deleteMarkers(markersArray) {
        for (var i = 0; i < markersArray.length; i++) {
          markersArray[i].setMap(null);
        }
        markersArray = [];
      }