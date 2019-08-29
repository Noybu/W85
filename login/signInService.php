<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="..\CSS\newProject.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="..\JS\newProject.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Urban Re-Development</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-right">
    <a class="navbar-brand" href="..\index.php"><img src="..\images\logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ">
        <li class="nav-item active" style="text-align:right;">
          <a class="nav-link navA" href="..\index.php">דף הבית</a>
        </li>
    </div>
  </nav>
  <main>
    <section>
      <div id="headerLogin">
        <h3>הרשמה למערכת - נותן שירות</h3>
        <p>עשרות נותני שירות לקחו חלק בפרויקטים השונים ! </p>
        <p>הצטרפו גם אתם למהפיכת העיר</p>
        <p>כל שתצטרכו לעשות הוא להזין את הפרטים המופיעים בטופס</p>
      </div>
    </section>
    <?php
      $Error=$_GET["Error"];
    ?>
    <div class="mainDiv MainDivService">
      <form action="include/register.php" method="post" enctype = "multipart/form-data">
        <h3 style="margin-right:5%;">פרטים אישיים</h3>
        <div class="formService">
          <div class="form-item">
            <p class="formLabel">תעודת זהות</p>
            <?php
              if($Error=="UserExist")
              {
              ?>
                <span style="color:red;">תעודת זהות קיימת במערכת</span>
              <?php
              }
            ?>
            <input required type="text" name="id" class="form-style" pattern="[0-9]+" minlength="9" maxlength="9" oninvalid = "setCustomValidity('יש להכניס ת.ז המכילה 9 ספרות בלבד')" />
          </div>
          <div class="form-item">
            <p class="formLabel">שם פרטי</p>
            <input required type="text" name="firstName" class="form-style" />
          </div>
          <div class="form-item">
            <p class="formLabel">שם משפחה</p>
            <input required type="text" name="lastName" class="form-style" />
          </div>
          <div class="form-item">
            <p class="formLabel">סיסמא</p>
            <input required type="password" name="password" class="form-style" />
          </div>
          <div class="form-item">
            <p class="formLabel">אימייל</p>
            <input required type="email" name="email" class="form-style" />
          </div>
          <div class="form-item">
            <input type="hidden" name="type" value="2" />
          </div>
        </div>
    </div>
    <div class="mainDiv MainDivService">
      <h3 style="margin-right:5%;">פרטים מקצועיים</h3>
      <div class="formService">
        <div class="form-item">
          <p class="formLabel">מספר ח"פ</p>
          <input required type="text" name="idService" class="form-style" maxlength="9" />
        </div>
        <div class="form-item">
          <p class="formLabel formTop">מקצוע</p>
          <select required class="form-style" name="profType">
            <option value="1">גנן</option>
            <option value="2">נגר</option>
            <option value="3">חשמלאי</option>
            <option value="4">רתך</option>
            <option value="5">בנאי</option>
          </select>
        </div>
        <div class="form-item">
          <p class="formLabel">ותק</p>
          <input required type="text" name="numOfYears" class="form-style" maxlength="2" />
        </div>
        <div class="form-item" >
          <p class="formLabel formTop">העלאת תעודת זהות</p>
          <input required type="file" name="idFile" class="form-style fileStyle" id="file-upload1" />
          <div class="file-upload-filename1"></div>
        </div>
        <div class="form-item">
          <p class="formLabel formTop">העלאת תעודת עוסק</p>
          <input required type="file" name="profFile" class="form-style fileStyle" id="file-upload2" />
          <div class="file-upload-filename2"></div>
        </div>
        <div>
          <input type="submit" class="login" value="שלח">
        </div>
      </div>
      </form>
    </div>
  </main>

  <script>
    //הוספת שם קובץ
  var input = document.getElementById('file-upload1'); 
	var infoArea = document.getElementById('file-upload-filename1');

	input.addEventListener( 'change', showFileName );

	function showFileName( event ) {
			
      // the change event gives us the input it occurred in 
      var input = event.srcElement;
      
      // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
      var fileName = input.files[0].name;
      alert(fileName);
      
      // use fileName however fits your app best, i.e. add it into a div
      infoArea.textContent =  fileName;
	}
  </script>
     
        
        

  <?php include_once("../footer.php"); ?>