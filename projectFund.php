<?php include_once("header.php"); ?>
<link rel="stylesheet" type="text/css" href="CSS\projectFund.css">
<?php include_once("include/BLL.php"); ?>
<?php
    if($_GET['projectid'])
    {
        $projectid=$_GET['projectid'];
        $project=getProjectById($projectid);
    }
?>

<main>


    <div class="container">

        <div class="row sm">
            <div id="allStatus2">
                <div class="poly2 status-c">ממתין לאישור</div>
                <div class="poly2 status-b">ממתין למכרז</div>
                <div class="poly2 status-a">ממתין למימון</div>
                <div class="poly2 status-short status-a ">בביצוע</div>
                <div class="poly2 status-short status-a">הושלם</div>
            </div>

        </div>

        <section>
            <div class="row sm">
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">
                    <?php echo $project; ?>
                    <h3><?php echo $project->projecttype;?></h3>
                    <p>jhhhhhhjhjhfdsjdsf dfjdshfjdsfhjdshf dfhjdsfhjdsf hjfhdsjf dsjfhjdfhjh</p>
                    <div class="bar2">
                        <p style="text-align:right; font-size:14px; margin-bottom:0px; color:#36ba2f">1000<i class="fas fa-shekel-sign"></i></p>
                        <div id="mainBar2">
                            <div style="width:40%;background-color:red;border-radius: 20px; ">
                                40
                            </div>
                        </div>
                    </div>

                    <div class="pictureCard2">
                        <img src="images/donate_count.png">
                        <b>
                            <p>כמה כבר תרמו?</p>
                        </b>
                        <p style="margin-top: -17px;">100 אנשים</p>
                    </div>
                    <div class="pictureCard2">
                        <img src="images/count_price.png">
                        <b>
                            <p>כמה נשאר?</p>
                        </b>
                        <p style="margin-top: -17px;">100 ש"ח</p>
                    </div>

                    <div style="clear:both;">
                        <button id="buttonFund"><a href=#>להשקעה</a></button>
                    </div>


                </div>
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">

                    <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=tel%20aviv&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>






                </div>
            </div>
        </section>



        <div class="row sm">
            <section class="tabs">


                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">פרטם נוספים</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-updates" role="tab" aria-controls="nav-updates" aria-selected="false">עדכונים שוטפים</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="false">דירוג הפרויקט</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-pic" role="tab" aria-controls="nav-pic" aria-selected="false">תמונות מהשטח</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                        <p>111111</p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>

                    </div>
                    <div class="tab-pane fade" id="nav-updates" role="tabpanel" aria-labelledby="nav-updates-tab">
                        <p>222222</p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                    </div>
                    <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                        <p>33333</p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                    </div>
                    <div class="tab-pane fade" id="nav-pic" role="tabpanel" aria-labelledby="nav-pic-tab">
                        <p>4444444 </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                        <p>dgfdgdgdgdg dfdfd dfdf </p>
                    </div>
                </div>


            </section>
        </div>
    </div>






</main>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCK1iswODlN7nZQbJTB2viQH03KTUomNiE&callback=initiateMap" async defer></script>

<script>
    function initiateMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 0,
                lng: 0
            },
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
        for (i = 0; i < locations.length; i++) {

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
        map.setZoom(map.getZoom() - 1);
    };
</script>

<?php include_once("footer.php"); ?>