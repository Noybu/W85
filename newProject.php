<?php include_once("header.php"); ?>
<link rel="stylesheet" type="text/css" href="CSS\newProject.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="JS\newProject.js"></script>
<?php
    require_once'include/BLL.php';
    if(isset($_POST['submit'])){
        addProject($_POST["userID"],$_POST["projectType"],$_POST["description"],$_POST["locCity"],$_POST["locStreet"],$_POST["locNum"]);
        echo "הפרויקט עלה בהצלחה";
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
<main >
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
                    <textarea required name="description" class="form-style"></textarea>
                </div>
                <div class="form-item">
                    <p class="formLabel">עיר</p>
                    <input required type="text" name="locCity" class="form-style"/>
                </div>
                <div class="form-item">
                    <p class="formLabel">רחוב</p>
                    <input required type="text" name="locStreet" class="form-style"/>
                </div>
                <div class="form-item">
                    <p class="formLabel">מספר</p>
                    <input required type="text" name="locNum" class="form-style"/>
                </div>
                <div class="form-item">
                    <input type="hidden" name="userID" value="1111"/>
                </div>
                <div class="form-item">
                    <input type="submit" class="login" name="submit" value="שלח">
                </div>
            </div>
        </form>
	</div>

</main>
<?php include_once("footer.php"); ?>