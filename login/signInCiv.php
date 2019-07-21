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
            <li class="nav-item active">
              <a class="nav-link navA" href="..\index.php">דף הבית</a>
            </li>
        </div>   
      </nav>
  <main>
      <section>
        <div id="headerLogin">
            <h3>הרשמה למערכת - יזם / משקיע</h3>
            <p>מאות משתמשים כבר שינו את פני העיר ! </p>
            <p>הצטרפו גם אתם למהפיכת העיריות</p>
            <p>כל שתצטרכו לעשות הוא להזין את הפרטים המופיעים בטופס</p>
        </div>
    </section>
      <div id="mainDiv">
            <div id="form">
                    
                <div class="form-item">
                    <p class="formLabel">תעודת זהות</p>
                    <input required type="text" name="id" class="form-style" maxlength="9"/>
                </div>
                <div class="form-item">
                    <p class="formLabel">שם פרטי</p>
                    <input required type="text" name="firstName" class="form-style"/>
                </div>
                <div class="form-item">
                    <p class="formLabel">שם משפחה</p>
                    <input required type="text" name="lastName" class="form-style"/>
                </div>
                <div class="form-item">
                    <p class="formLabel">סיסמא</p>
                    <input required type="password" name="password" class="form-style"/>
                </div>
                <div class="form-item">
                    <p class="formLabel">אימייל</p>
                    <input required type="email" name="email" class="form-style"/>
                </div>
                <div class="form-item">
                    <input type="hidden" name="type" value="1"/>
                </div>
                <div class="form-item">
                    <input type="submit" class="login pull-right" value="שלח">
                </div>
            </div>
      </div>
</main>
<?php include_once("../footer.php"); ?>
