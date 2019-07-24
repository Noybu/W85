<?php include_once("header.php"); ?>


<main >
<section>
<div class="row" style="padding-top:unset; width:100vw; height:10vh;">
    <div style="width:50%;margin: 0 auto; font-size: 14px; color:#4fa1ba;">שינוי תצוגה:
        <a href="AllProjectList.php" id="list"><i class="fas fa-list-ul fa-rotate-180" style="color:#4fa1ba; margin-right:14px;font-size:36px; vertical-align: middle;"></i></a>  
    </div>
</div>
<div id="map" style="width:100vw; height:73vh; margin: 0 auto;"></div>
</section>
</main>



    
   
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCK1iswODlN7nZQbJTB2viQH03KTUomNiE&callback=initiateMap"
async defer></script>

<script>
    function initiateMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 0, lng: 0},
        zoom: 8
    });
//    
    var locations = [
                        [31.5546, 74.3572],
                        [34.0150, 71.5805],
                        [30.1830, 66.9987],
                        [33.7294, 73.0931],
                        [24.8615, 67.0099],
                        [30.1984, 71.4687],
                        [31.8424, 70.8952],
                        [25.1987, 62.3213],
                        [27.8120, 66.6117]
                    ];
//    
    var bounds = new google.maps.LatLngBounds();
//    
    for(i=0; i<locations.length; i++){
        
        var lat = locations[i][0];
        var lng = locations[i][1];
        
        var infoWindow = new google.maps.InfoWindow();
        
        var position = new google.maps.LatLng(lat, lng);
        
        bounds.extend(position);

        var marker = new google.maps.Marker({
            position: position,
            map: map,
          });

        // set infoWindow (popup) content which will popup when we click on a marker
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent('<div><strong>Marker#' + i + '</strong>');
                    infoWindow.open(map, marker);
                }
            })(marker, i));
        
    };
    
    
    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
        var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
            google.maps.event.removeListener(boundsListener);
        });
        
        
    // Automatically center the map fitting all markers on the screen
        map.setCenter(bounds.getCenter());
        map.fitBounds(bounds);
        map.setZoom(map.getZoom()-1);
};
    </script>
        


<?php include_once("footer.php"); ?>