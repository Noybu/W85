<?php
$active = $_GET['active'];

if($active='bids')
{
    ?>
<aside>
      <div id="logo">
        <img src="..\images\logo.png">
      </div>
      <div id="AdminLogin">
        <p>ברוך הבא</p>
        <button>התנתק</button>
      </div>
      <div class="component">
        <a href="listOfService.php">נותני שירות שממתינים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfProjects.php">פרוייקטים שמחכים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfBid.php" id="active">מכרזים פתוחים</a>
      </div>
    </aside>  
    <?php

}

if($active='project')
{
    ?>
<aside>
      <div id="logo">
        <img src="..\images\logo.png">
      </div>
      <div id="AdminLogin">
        <p>ברוך הבא</p>
        <button>התנתק</button>
      </div>
      <div class="component">
        <a href="listOfService.php">נותני שירות שממתינים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfProjects.php" id="active">פרוייקטים שמחכים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfBid.php" >מכרזים פתוחים</a>
      </div>
    </aside>  
    <?php

}

if($active='service')
{
    ?>
<aside>
      <div id="logo">
        <img src="..\images\logo.png">
      </div>
      <div id="AdminLogin">
        <p>ברוך הבא</p>
        <button>התנתק</button>
      </div>
      <div class="component">
        <a href="listOfService.php" id="active"> נותני שירות שממתינים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfProjects.php">פרוייקטים שמחכים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfBid.php" >מכרזים פתוחים</a>
      </div>
    </aside>  
    <?php

}

?>
