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
  <?php include_once("side-bar.php?active=bids"); ?>
    <main>
        <h1>מכרזים פתוחים</h1>
        <table>
        <?php include_once("../include/BLL.php"); ?>
                <?php
                $arrProjects = array();
                $arrProjects = getAllBidProjects();
                ?>
            <tr id="firstLine">
                <td class="tdFirstLine" style="width: 20%;">המכרז</td>
                <td class="tdFirstLine" style="width: 20%;">תאור</td>
                <td class="tdFirstLine" style="width: 20%;">מיקום</td>
                <td class="tdFirstLine" style="width: 20%;">עדכון הזוכה</td>
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
                    <button onclick="window.location.href='selectService.php?id=<?php echo $arrProjects[$i]->projectid;?>'">להחלטה</button>
                </td>
            </tr>
            <?php
             }
             ?>
        </table>

    </main>

  </body>
</html>