<?php
session_start();
  if(isset($_GET['logout']))
  {
    if($_GET['logout']=='yes')
    {
      session_destroy();
      header("Location: loginAdmin.php");
    } 
  }
  if($_SESSION["type"] != 3){
    header("Location: loginAdmin.php");
}
  ?>
<aside>
      <div id="logo">
        <img src="..\images\logo.png">
      </div>
      <div id="AdminLogin">
        <p>ברוך הבא</p>
        <a href="index.php?logout=yes"><button>התנתק</button></a>
      </div>
      <div class="component">
        <a href="listOfService.php">נותני שירות שממתינים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfProjects.php" >פרוייקטים שמחכים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfBid.php" >מכרזים פתוחים</a>
      </div>
    </aside>  
