<?php include_once("header.php"); ?>
<link rel="stylesheet" type="text/css" href="CSS\newProject.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="JS\newProject.js"></script>
<?php
require_once 'include/BLL.php';
if(!isset($_SESSION["userID"])){
    header("Location:login/signIn.php");
}
if (isset($_POST['submit'])) {
    if($_POST["locCity"] && $_POST["locStreet"] && $_POST["locNum"])
    {
        addProject($_POST["userID"], $_POST["projectType"], $_POST["description"], $_POST["locCity"], $_POST["locStreet"], $_POST["locNum"]);

    }
    else
    {
        ?>
        <script>alert("כדי להשלים את הפעולה יש להזין כתובת תקינה ומלאה");</script>

        <?php
   }


    

    ?>
        <p style="color:green; text-align:center; font-size: 24px; font-weight: bold"> הפרויקט עלה בהצלחה</p>
    <?php
}
?>


<section>
    <div>
        <h3>יזמים? גייסו השקעה ! </h3>
        <p>דרך המערכת תוכלו לגייס כסף עבור כל פרויקט עירוני.</p>
        <p>כל שתצטרך לעשות הוא לפתוח את הפנייה עכשיו, לחכות לאישורה,</p>
        <p>וכל הכבוד! הצלחת לשפר את פני העיר 🏆</p>
    </div>
</section>
<main>
    <div id="mainDiv">
        <form action="" method="POST">
            <div id="form">
                <div class="form-item">
                    <p class="formLabel formTop">נושא הדרישה</p>
                    <select required class="form-style" name="projectType">
                        <option value="1">ספסל</option>
                        <option value="2">גני שעשועים</option>
                        <option value="3">פחי אשפה</option>
                        <option value="4">אופניים</option>
                        <option value="5">תאורה</option>
                    </select>
                </div>
                <div class="form-item">
                    <p class="formLabel">תאור הדרישה</p>
                    <textarea required name="description" class="form-style" maxlength="250"></textarea>
                </div>
                <div id="locationField">
                    <div class="form-item">
                        <p class="formLabel formTop">כתובת מלאה</p>
                        <input required type="text" name="longloc" class="form-style" id="autocomplete" onChange="geolocate()" onFocus="geolocate()" onfocusout="check()" />
                    </div>
                </div>
                <div class="form-item">
                <p class="formLabel formTop">עיר</p>
                    <input required type="text" name="locCity" class="form-style" id="locality" disabled="true"/></p>
                </div>
                <div class="form-item">
                <p class="formLabel formTop">רחוב</p>
                    <input required type="text" name="locNum" class="form-style" id="street_number" disabled="true"/></p>
                </div>
                <div class="form-item">
                <p class="formLabel formTop">מספר</p>
                    <input required type="text" name="locStreet" class="form-style" id="route" disabled="true"/></p>
                </div>
     
                <div class="form-item">
                    <input type="hidden" name="userID" value="<?php echo $_SESSION['userID'];?>" />
                </div>
                <div class="form-item">
                    <input type="submit" class="loginoff" id="send" name="submit" value="שלח" onsubmit="check()" disabled>
                </div>
            </div>
        </form>
    </div>


</main>
<script>
    function check() {
        var street_num = document.getElementById("street_number").value;
        var street = document.getElementById("route").value;
        var city = document.getElementById("locality").value;
        var send = document.getElementById("send");

        if (street_num || street || city) {
            alert("כדי להשלים את הפעולה יש להזין כתובת תקינה ומלאה");
          
            return false;
        }

        send.removeAttribute('disabled');
        send.classList.remove("loginoff");
        send.classList.add("login");
     


        return true;
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCK1iswODlN7nZQbJTB2viQH03KTUomNiE&&libraries=places&callback=initAutocomplete" async defer></script>
<script>
    // This sample uses the Autocomplete widget to help the user select a
    // place, then it retrieves the address components associated with that
    // place, and then it populates the form fields with those details.
    // This sample requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script
    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;

    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search predictions to
        // geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('autocomplete'), {
                types: ['geocode']
            });

        // Avoid paying for data that you don't need by restricting the set of
        // place fields that are returned to just the address components.
        autocomplete.setFields(['address_component']);

        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();





        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>
<?php include_once("footer.php"); ?>