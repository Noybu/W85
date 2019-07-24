<?php include_once("header.php"); ?>
<link rel="stylesheet" type="text/css" href="CSS\projectFund.css">
<main >
    <div class="container">
        <div id="allStatus2">
            <div class="poly2 status-c">ממתין לאישור</div>
            <div class="poly2 status-b">ממתין למכרז</div>
            <div class="poly2 status-a">ממתין למימון</div>
            <div class="poly2 status-short status-a ">בביצוע</div>
            <div class="poly2 status-short status-a">הושלם</div>
        </div>
        <div>
            <div id="map" style="width:30vw; height:50vh; margin: 0 auto;"></div>
        </div>
        <div id="desc">
            <h3>פרויקט</h3>
            jhhhhhhjhjhfdsjdsf dfjdshfjdsfhjdshf dfhjdsfhjdsf hjfhdsjf dsjfhjdfhjh
            <div class="bar2">
                <p style="text-align:right; font-size:14px; margin-bottom:0px; color:#36ba2f">1000<i class="fas fa-shekel-sign"></i></p>
                <div id="mainBar2">
                    <div style="width:40%;background-color:red;border-radius: 20px; ">
                        40
                    </div>
                </div>
            </div>
        </div>
        <div class="pictureCard2" style="background-image:url('https://idona.mtacloud.co.il/Includes/img/box2.jpg');"></div>
        <div class="pictureCard2" style="background-image:url('https://idona.mtacloud.co.il/Includes/img/box2.jpg');"></div>
        <div class="tabs-page">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="page1" aria-controls="home" role="tab" data-toggle="tab">פרטים נוספים
                <li role="presentation"><a href="#page2" aria-controls="profile" role="tab" data-toggle="tab">עדכונים שוטפים
                <li role="presentation"><a href="#page3" aria-controls="messages" role="tab" data-toggle="tab">דירוג הפרויקט</a></li>
                <li role="presentation"><a href="#page4" aria-controls="settings" role="tab" data-toggle="tab">תמונות מהשטח</a></li>
            </ul>	
        </div>
        <div class="tabs-page">
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="page1">
                            עדכונים נוספים
                </div>
                <div role="tabpanel" class="tab-pane" id="page2">
                        עדכונים שוטפים
                </div>
                <div role="tabpanel" class="tab-pane" id="page3">
                    דירוג הפרויקט
                </div>
                <div role="tabpanel" class="tab-pane" id="page4">
                    תמונות מהשטח
                </div>
            </div>		
        </div>
    </div>
    
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