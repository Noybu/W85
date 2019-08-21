<?php include_once("header.php"); ?>
<?php include_once("include/BLL.php"); ?>
<?php
   
       
    $arrProjects=Array();
    $arrProjects=getAllProjects();
    $address = Array();
    for($i=0;$i<sizeof($arrProjects);$i++)
    {
        $tempAdress=$arrProjects[$i]->loccity. ',' . $arrProjects[$i]->locstreet .' ' . $arrProjects[$i]->locnum;
        array_push($address,$tempAdress);


    }






    
?>

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



    <script>
      function initiateMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: -34.397, lng: 150.644}
        });
        var geocoder = new google.maps.Geocoder();

        
        var icons={
          1:{
              icon:'https://img.icons8.com/ios-filled/50/000000/city-bench.png'
          },
          2:{
              icon:'https://img.icons8.com/ios/50/000000/playground.png'
          },
          3:{
              icon:'https://img.icons8.com/wired/64/000000/trash.png'
          },
          4:{
              icon:'https://img.icons8.com/material/24/000000/bike-path--v2.png'
          },
          5:{
              icon:'https://img.icons8.com/ios-filled/50/000000/street-lamp.png'
          }
        };
          geocodeAddress(geocoder, map);
     
    }

      function geocodeAddress(geocoder, resultsMap) {
        //document.getElementById('address').value;
        //var address = ["תל אביב, רוטשילד 5", "חיפה, 2 בנובמבר 7"];
            <?php
                for($j=0;$j<sizeof($address);$j++)
                {
           ?>
                    var x= "<?php echo $address[$j]; ?>";
                    geocoder.geocode({'address': x}, function(results, status) {
                    if (status === 'OK') {
                        resultsMap.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location,
                        icon: icons[<?php echo $arrProjects[$j]->projecttype;?>].icon
                        });

                        
                    
                    else 
                    {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                    });
                    <?php
                  }
        ?>
      }
    </script>



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCK1iswODlN7nZQbJTB2viQH03KTUomNiE&callback=initiateMap"
async defer></script>


        


<?php include_once("footer.php"); ?>