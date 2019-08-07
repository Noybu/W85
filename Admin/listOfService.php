<html>
  <head>
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css\Admin_SidebarNav.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
   
  </head> 
  <body>
    <aside>
      <div id="logo">
        <img src="..\images\logo.png">
      </div>
      <div id="AdminLogin">
        <p>ברוך הבא</p>
        <button>התנתק</button>
      </div>
      <div class="component">
        <a href="listOfService.php" id="active">נותני שירות שממתינים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfProjects.php">פרוייקטים שמחכים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfBid.php">מכרזים פתוחים</a>
      </div>
    </aside>  
    <main>
        <h1>נותני שירות שמחכים לאישור</h1>
        <table>
            <tr id="firstLine">
                <td class="tdFirstLine" style="width: 20%;">שם מלא</td>
                <td class="tdFirstLine" style="width:30%;">תחום עיסוק</td>
                <td class="tdFirstLine" style="width:15%;">ותק</td>
                <td class="tdFirstLine" style="width:20%;">מסמכים שצורפו</td>
                <td class="tdFirstLine" style="width:15%;">אישור / דחייה</td>
            </tr>
            <?php include_once("../include/BLL.php"); ?>
                <?php
                $arrServiceMan = array();
                $arrServiceMan = getAllServiceManNotApproved();
                ?>
                 <?php
             for ($i =0; $i< sizeof($arrServiceMan);$i++)
             {
                 ?>
            <tr class="trRow">
                <td><?php echo $arrServiceMan[$i]->firstName." ".$arrServiceMan[$i]->lastName; ?></td>
                <td><?php echo $arrServiceMan[$i]->proftype; ?></td>
                <td><?php echo $arrServiceMan[$i]->numofyears;?></td>
                <td style="text-align:center;">  
                    <button onclick="window.location.href='<?php echo $arrServiceMan[$i]->idfile;?>'">ת.ז</button>
                    <button onclick="window.location.href='<?php echo $arrServiceMan[$i]->proffile;?>'">ת.עוסק</button>
                </td>
                <td style="text-align:center;">  
                    <button style="color:green;"><i class="far fa-thumbs-up"></i></button>
                    <button style="color:red;"><i class="far fa-window-close"></i></button>
                </td>
            </tr>
            <?php
             }
             ?>
        </table>

    </main>

  </body>
</html>