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
  <?php include_once("side-bar.php"); ?>
    <main class="main">
        <h1>פרויקטים שמחכים לאישור</h1>
        <?php include_once("../include/BLL.php"); ?>
                <?php
                $arrProjects = array();
                $arrProjects = getAllNewProjects();
                ?>
            <?php
            if($arrProjects==null){
              ?>
              <p class="errors">אין פרויקטים שמחכים לאישור</p>
              <?php
            }
            else{
              ?>
               <table>
               <tr id="firstLine">
                 <td class="tdFirstLine" style="width:15%";>שם הפרויקט</td>
                 <td class="tdFirstLine" style="width:40%";>תאור</td>
                 <td class="tdFirstLine" style="width:30%";>מיקום</td>
                 <td class="tdFirstLine" style="width:15%";>אישור / דחייה</td>
             </tr>
             <?php
              for ($i =0; $i< sizeof($arrProjects);$i++)
              {
                  ?>
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