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
        <a href="listOfService.php">נותני שירות שממתינים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfProjects.php" id="active">פרוייקטים שמחכים לאישור</a>
      </div>
      <div class="component">
        <a href="listOfBid.php">מכרזים פתוחים</a>
      </div>
    </aside>  
    <main>
        <h1>פרויקטים שמחכים לאישור</h1>
        <table>
        <?php include_once("../include/BLL.php"); ?>
                <?php
                $arrProjects = array();
                $arrProjects = getAllNewProjects();
                ?>
            <?php
            if($arrProjects==null){
              ?>
              <p>אין פרויקטים שמחכים לאישור</p>
              <?php
            }
            else{
              for ($i =0; $i< sizeof($arrProjects);$i++)
              {
                  ?>
              <tr id="firstLine">
                 <td class="tdFirstLine" style="width:15%";>שם הפרויקט</td>
                 <td class="tdFirstLine" style="width:40%";>תאור</td>
                 <td class="tdFirstLine" style="width:30%";>מיקום</td>
                 <td class="tdFirstLine" style="width:15%";>אישור / דחייה</td>
             </tr>
             <tr class="trRow">
                 <td><?php echo getProjectType($arrProjects[$i]->projecttype); ?></td>
                 <td><?php echo $arrProjects[$i]->description; ?></td>
                 <td><?php echo $arrProjects[$i]->loccity." ".$arrProjects[$i]->locstreet." ".$arrProjects[$i]->locnum;?></td>
                 <td style="text-align:center;">  
                 <button onclick="window.location.href='../include/update.php?type=project&id=<?php echo $arrProjects[$i]->projectid; ?>&status=1'" style="color:green;"><i class="far fa-thumbs-up"></i></button>
                          <button onclick="window.location.href='../include/update.php?type=project&id=<?php echo $arrProjects[$i]->projectid; ?>&status=10'" style="color:red;"><i class="far fa-window-close"></i></button>
                 </td>
             </tr>
             <?php
               }
             }
             ?>
        </table>

    </main>

  </body>
</html>