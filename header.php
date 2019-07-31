<!DOCTYPE html>
<html dir="rtl" lang="en">
<?php
  session_start();
  if(isset($_GET['logout']))
  {
    if($_GET['logout']=='yes')
    {
      session_destroy();
    } 
  }
?>
<head>
	<title>Urban Re-Development</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="CSS\project.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-right">
    <a class="navbar-brand" href="index.php"><img src="images\logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ">
        <li class="nav-item active">
          <a class="nav-link navA" href="index.php">דף הבית</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navA" href="newProject.php">הוספת פרויקט</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navA" href="MyProjects.php">הפרויקטים שלי</a>
        </li>
        <li class="nav-item">
          <a class="nav-link navA" href="AllProjectList.php">כל הפרויקטים</a>
        </li>
        <?php
          if(!isset($_SESSION["userID"])){
            ?>
            <li class="nav-item">
            <a class="nav-link navA loginMobile" href="login\signIn.php">התחברות</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navA loginMobile" href="login\signUp.php">הרשמה</a>
          </li>
          <?php
          }
          else {
            ?>
            <li class="nav-item">
            <a class="nav-link navA loginMobile" href="login\signIn.php?logout=yes">התנתקות</a>
           </li>
           <?php
          }
        ?>
      </ul>
    </div>
    <div>
    <?php
          if(!isset($_SESSION["userID"])){
            ?>
            <button class="loginMobile2">    
              <a class="nav-link navButtons" href="login\signIn.php">התחברות</a>
           </button>
          <button class="loginMobile2">
              <a class="nav-link navButtons" href="login\signUp.php">הרשמה</a>
          </button>
          <?php
          }
          else {
            ?>
            <div class="loginMobile2" style="display:inline-block; font-weight:bold;font-size:20px;">
              <a class="nav-link navButtons"><?php echo "שלום ".$_SESSION["firstName"]; ?></a>
          </div>
            <button class="loginMobile2">
              <a class="nav-link navButtons" href="index.php?logout=yes">התנתקות</a>
            </button>
           <?php
          }
        ?>
    </div>
   
  </nav>
