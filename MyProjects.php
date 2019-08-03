<?php include_once("header.php"); ?>
<?php include_once("include/BLL.php"); ?>
<?php
   
    session_start();   
    $arrProjects=Array();
    $arrProjects=getProjectByUser( $_SESSION["userID"]);
    
?>
<link rel="stylesheet" type="text/css" href="CSS\myProject.css">
<main>

<section>
    <div class="row">
        <?php
        for($i=0;$i<sizeof($arrProjects);$i++)
        {
            ?>
        <div class="card2">
            <div class="pictureCard2" style="background-image:url('images/project_types/<?php echo $arrProjects[$i]->projecttype; ?>_s.png');"></div>
            <div class="descCard2">
                <h3><?php echo getProjectType($arrProjects[$i]->projecttype);?></h3>
                <p class="loc">מיקום: רחוב
                    <?php echo $arrProjects[$i]->loccity." ".$arrProjects[$i]->locstreet." ".$arrProjects[$i]->locnum;?>
                </p>
                <div id="statusBar">
                    <div id="allStatus">
                        <?php echo getStatusBarColors($arrProjects[$i]->projectstatus,1);?>
                    </div>
                    <div class="bar2">
                        <p style="text-align:right; font-size:14px; margin-bottom:0px; color:#36ba2f"><?php echo $arrProjects[$i]->projectcost;?><i class="fas fa-shekel-sign"></i></p>
                        <div id="mainBar2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width:<?php echo ($arrProjects[$i]->projectcurrentprice/$arrProjects[$i]->projectcost)*100;?>%;border-radius: 20px; ">
                                <?php echo $arrProjects[$i]->projectcurrentprice?>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
            <div id="cardFooter">
                <p id="share">שיתוף:</p>
                <a href="https://api.whatsapp.com/send?text=https://noybu.mtacloud.co.il/W85/projectFund.php%3Fprojectid=<?php echo $arrProjects[$i]->projectid; ?>">
                    <p class="icon" id="whatsapp">
                    <i class="fab fa-whatsapp"></i>
                    </p>
                </a>
                <a href="http://www.facebook.com/sharer.php?u=https://noybu.mtacloud.co.il/W85/projectFund.php%3Fprojectid=<?php echo $arrProjects[$i]->projectid; ?>">
                    <p class="icon" id="facebook">
                    <i class="fab fa-facebook-square"></i>
                    </p>
                </a>
                <a href="projectFund.php?projectid=<?php echo $arrProjects[$i]->projectid; ?>" style="color:black;"><p id="view">לצפייה<i class="far fa-eye"></i></p></a>
            </div>
        </div>
    </div>
         <?php
        }
          ?>
</section>


</main>
<?php include_once("footer.php"); ?>