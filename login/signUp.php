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
            <h3>הרשמה למערכת</h3>
            <p>מה הולך להיות תפקידך במערכת?</p>
            <p>יזם/משקיע או נותן שירות?</p>
        </div>
    </section>
  
    <div id="selectUser">
      <a href="signInService.php"><img src="..\images\undercons.png"></a>
      <a href="signInCiv.php"><img src="..\images\undercons.png"></a>
    </div>

    
</main>
<?php include_once("../footer.php"); ?>
