<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="..\CSS\newProject.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="..\JS\newProject.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
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
            <h3>התחברות למערכת</h3>
            <p>נא להזין תעודת זהות המכילה 9 ספרות
            וסיסמא כפי שנמסרו בעת הרישום</p>
            <p>אלפי פרויקטים מחכים לכם במערכת !!!</p>
        </div>
    </section>
      <div id="mainDiv">
            <div id="form">
                    
                <div class="form-item">
                    <p class="formLabel">תעודת זהות</p>
                    <input required type="text" name="id" class="form-style" maxlength="9"/>
                </div>
                <div class="form-item">
                    <p class="formLabel">סיסמא</p>
                    <input required type="password" name="password" class="form-style"/>
                </div>
                <div class="form-item">
                    <input type="submit" class="login" value="שלח">
                </div>
            </div>
      </div>
</main>
<?php include_once("../footer.php"); ?>
