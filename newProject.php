<?php include_once("header.php"); ?>
<link rel="stylesheet" type="text/css" href="CSS\newProject.css">
<section>
    <h3>יזמים? גייסו השקעה ! </h3>
    <p>דרך המערכת תוכלו לגייס כסף עבור כל פרויקט עירוני.</p>
    <p>כל שתצטרך לעשות הוא לפתוח את הפנייה עכשיו, לחכות לאישורה,</p>
    <p>וכל הכבוד! הצלחת לשפר את פני העיר</p>
</section>
<main >
	<div id="mainDiv">
        <form>
            <div id="divForm">
                <p class="textForm"><i class="fas fa-signature"></i><label>שם פרטי </label></p>
                <p><input type="text" name="fname" maxlength="20" autocomplete="on"></p>
                <p class="textForm"><i class="fas fa-signature"></i><label>שם משפחה </label></p>		
                <p><input type="text" name="lname" maxlength="20" autocomplete="on"></p>
                <p class="textForm"><i class="fas fa-question"></i><label>מה תרצו לחדש </label>
                    <p>   
                        <select name="whatNew">
                            <option value="1">ספסל</option>
                            <option value="2">פחי אשפה</option>
                            <option value="3">שבילי אופניים</option>
                            <option value="4">גני שעשועים</option>
                            <option value="5">תאורה</option>
                        </select>
                    </p>
                </p>
                <p class="textForm"><i class="fas fa-info"></i><label>תאור הדרישה </label></p>
                <p><textarea name="description"></textarea></p>
                <p class="textForm"><i class="fas fa-thumbtack"></i><label>מיקום</label></p>
                <p>
                    <input type="text" name="locationCity" autocomplete="on" placeholder="עיר">
                    <input type="text" name="locationStreet" autocomplete="on" placeholder="רחוב">
                    <input type="text" name="locationNumber" autocomplete="on"placeholder="מספר">
            
                </p>
                <p>
                    <input type="submit" name="sent" id="send" value="שלח"> <input type="reset" name="zero" value="איפוס" id="zero">
                </p>
            </div>
        </form>
	</div>

</main>
<?php include_once("footer.php"); ?>