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
    <?php include_once("../include/BLL.php"); ?>
    <?php
    if($_GET['id'])
    {
        $projectid=$_GET['id'];
        $arrProjects=Array();
        $arrProjects=getProjectById($projectid);
        $arrBids=Array();
        $arrBids=getAllBids($projectid);
    }
    ?>
        <h1>בחירת נותן שירות למכרז</h1>
        <h3>שם הפרויקט:<?php echo getProjectType($arrProjects[0]->projecttype); ?></h3>
        
            <?php
            if($arrBids==null){
              ?>
              <p class="errors">נותני שירות טרם הגישו הצעה למכרז</p>
              <?php
            }
            else{
              ?>
              <table>
            <tr id="firstLine">
                <td class="tdFirstLine" style="width: 20%;">נותן שירות</td>
                <td class="tdFirstLine" style="width: 15%;">הצעת מחיר</td>
                <td class="tdFirstLine" style="width: 15%;">הצעת תאריך סיום</td>
                <td class="tdFirstLine" style="width: 15%;">תחום עיסוק</td>
                <td class="tdFirstLine" style="width: 15%;">ותק</td>
                <td class="tdFirstLine" style="width: 20%;">בחירת נותן שירות</td>
            </tr>
              <?php
              for ($i =0; $i< sizeof($arrBids);$i++)
              {
                  ?>
             <tr class="trRow">
                 <td><?php echo $arrBids[$i]->firstname." ".$arrBids[$i]->lastname;?></td>
                 <td><?php echo $arrBids[$i]->offerprice;?></td>
                 <td><?php echo $arrBids[$i]->offerdate;?></td>
                 <td><?php echo getProfType($arrBids[$i]->proftype);?></td>
                 <td><?php echo $arrBids[$i]->numofyears;?></td>
                 <td style="text-align:center;">  
                 <button onclick="window.location.href='../include/update.php?type=winbid&projectid=<?php echo $projectid; ?>&serviceid=<?php echo $arrBids[$i]->serviceid; ?>&status=1'" style="color:green;"><i class="far fa-thumbs-up"></i></button>
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