<?php
//require_once("/include/addPayment.php");
//$paypal = new paypal();

//use NSL\Persistent\Storage\Session;

include_once("header.php"); ?>
<link rel="stylesheet" type="text/css" href="CSS\projectFund.css">
<?php include_once("include/BLL.php"); ?>
<?php
    if($_GET['projectid'])
    {
        $projectid=$_GET['projectid'];
        $arrProjects=Array();
        $arrProjects=getProjectById($projectid);
        $userid=$_GET['projectid'];
    }
?>

<main>
    <div class="container">

        <div class="row sm">
            <div id="allStatus2">
                <?php echo getStatusBarColors($arrProjects[0]->projectstatus,2);?>
            </div>

        </div>

        <section>
            <div class="row sm">
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">
                    <h3><?php echo getProjectType($arrProjects[0]->projecttype);?></h3>
                    <p class="descriptionproject"><?php echo $arrProjects[0]->description; ?></p>
                    <div class="bar2">
                        <p style="text-align:right; font-size:14px; margin-bottom:0px; color:#36ba2f"><?php echo $arrProjects[0]->projectcost;?><i class="fas fa-shekel-sign"></i></p>
                        <div id="mainBar2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="max-width:100%; width:<?php echo ($arrProjects[0]->projectcurrentprice/$arrProjects[0]->projectcost)*100;?>%;border-radius: 20px; ">
                                <?php echo $arrProjects[0]->projectcurrentprice?>
                            </div>
                        </div>
                    </div>

                    <div class="pictureCard2">
                        <img src="images/donate_count.png">
                        <b>
                            <p>כמה כבר תרמו?</p>
                        </b>
                        <p style="margin-top: -17px;"><?php echo $arrProjects[0]->peoples; ?> אנשים</p>
                    </div>
                    <div class="pictureCard2">
                        <img src="images/count_price.png">
                        <b>
                            <p>כמה נשאר?</p>
                        </b>
                        <?php
                            $left = $arrProjects[0]->projectcost-$arrProjects[0]->projectcurrentprice;

                            if($left<0)
                                 $left=0;
                        ?>

                        <p style="margin-top: -17px;"><?php echo $left; ?><i class="fas fa-shekel-sign"></i></p>
                    </div>
                    <?php
                      if(isset($_SESSION["userID"])){

                    ?>
                    <div style="clear:both;">
                    <?php
                     if($arrProjects[0]->projectstatus == 2)
                     {
                         ?>

                        <button id="buttonFund"><a href=#>להשקעה</a></button>

                        <?php
                     }
                     ?>

                    </div>
                    <?php
                    }
                    ?>

                </div>
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">

                    <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $arrProjects[0]->loccity.','.$arrProjects[0]->locstreet.','.$arrProjects[0]->locnum; ?>&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                </div>
            </div>
        </section>

        <?php
        if(isset($_SESSION["userID"])){

            $flag=0;

            ?>
        <div class="row sm">
            <section class="tabs">
                <nav>
                 <div class="nav nav-tabs" id="nav-tab" role="tablist">
                     <?php
                 if($arrProjects[0]->projectstatus == 2)
                         {
                            $flag=1;
                             ?>
                 <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-updates" role="tab" aria-controls="nav-updates" aria-selected="true">השקעה בפרויקט</a>
                   <?php
                    }
                    ?>
                   <?php
                     $type=get_user_type($_SESSION["userID"]);
                     if($type==2)
                     {
                         $approved=getServiceApproved($_SESSION["userID"]);
                         if($approved==1 && $arrProjects[0]->projectstatus == 1)
                         {
                            $flag=2;
                             ?>
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">הרשמה למכרז</a>
                        <?php
                         }
                     }
                         ?>
                        <a class="nav-item nav-link <?php if($flag==0){ echo 'active';} ?>" id="nav-contact-tab" data-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="<?php if($flag==0){ echo 'true';}else {echo 'false';} ?>">דירוג הפרויקט</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-pic" role="tab" aria-controls="nav-pic" aria-selected="false">תמונות מהשטח</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">

                <?php
                 if($arrProjects[0]->projectstatus == 2)
                         {
                             ?>
                <div class="tab-pane fade show active" id="nav-updates" role="tabpanel" aria-labelledby="nav-updates-tab">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
               <input type="text" name="amount" value="60.00">
                <input type="hidden" name="cmd" value="_xclick">
                <input type="hidden" name="business" value="3YME47AUPJNWN">
                <input type="hidden" name="lc" value="IL">
                <input type="hidden" name="item_name" value="URBANF"> 
                <input type="hidden" name="currency_code" value="ILS">
                <input type="hidden" name="button_subtype" value="services">
                <input type="hidden" name="no_note" value="1">
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="rm" value="1">
                <input type="hidden" name="on0" value="projectid">
                <input type="hidden" name="os0" value="<?php echo $projectid;?>">
                <input type="hidden" name="on1" value="userid">
                <input type="hidden" name="os1" value="<?php echo $_SESSION["userID"];?>">
                <input type="hidden" name="return" value="https://noybu.mtacloud.co.il/W85/AllProjectList.php">
                <input type="hidden" name="cancel_return" value="https://noybu.mtacloud.co.il/W85/AllProjectList.php">
                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynowCC_LG.gif:NonHosted">
                <input type="hidden" name="notify_url" value="https://noybu.mtacloud.co.il/W85/include/addPayment.php">
                <input type="image" src="https://www.paypalobjects.com/he_IL/IL/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - הדרך הקלה והבטוחה יותר לשלם באינטרנט!">
                <img alt="" border="0" src="https://www.paypalobjects.com/he_IL/i/scr/pixel.gif" width="1" height="1">
                
                </form>
                </div>

                <?php
                         }
                         ?>
                <?php
                        if($approved==1 && $arrProjects[0]->projectstatus == 1)
                        {
                            ?>
                            <div class="tab-pane fade <?php if($flag==2){ echo 'show active';} ?>" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                            <form action="include/register-bid.php" method="POST">
                                <div>
                                    <p>הצעת מחיר</p>
                                    <input type="text" required name="offerprice"/>
                                </div>
                                <div>
                                    <p>תארין אחרון לביצוע</p>
                                    <input type="date" required name="offerdate"/>
                                </div>
                                <div>
                                    <input type="submit"  name="submit" value="שלח">
                                </div>
                                <input type="hidden" name="projectid" value=<?php echo $projectid;?>>
                                <input type="hidden" name="service" value=<?php echo $_SESSION["userID"];?>>
                            </form>
                        </div>
                        <?php
                        }
                   ?>
                    
                    <div class="tab-pane fade <?php if($flag==0){ echo 'show active';} ?>" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                        <p>דרגו את הפרויקט לפי שביעות רצונכם</p>
                            <?php
                                $avg=getAvgRate($projectid);
                                if($avg==null)
                                {
                                    ?>
                                    <p>עדין מחכים לדירוג שלכם!! מהרו להצביע</p>
                                    <?php
                                }
                                else
                                {
                                ?>
                                  <p><?php echo $avg; ?></p>  
                                <?php
                                }
                            ?>
                        </p>
                        <form class="rating">
                            <label>
                                <input type="radio" name="stars" value="1" />
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="2" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="3" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>   
                            </label>
                            <label>
                                <input type="radio" name="stars" value="4" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            <label>
                                <input type="radio" name="stars" value="5" />
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                                <span class="icon">★</span>
                            </label>
                            </form>

                    <script>
                        $(':radio').change(function() {
                            <?php $star = "<script>document.write(this.value)</script>" ;
                            insertRate($projectid,$userid, 4);
                            ?>
                    });
                    </script>
                    </div>
                    <div class="tab-pane fade" id="nav-pic" role="tabpanel" aria-labelledby="nav-pic-tab">
                        <p>צילמתם תמונות של הפרויקט ? מוזמנים לשתף </p>
                        

                    </div>
                </div>
            </section>
        </div>
    <?php    
    }
    ?>
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