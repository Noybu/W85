<?php include_once("header.php"); ?>

<main>

    <div class="container">
        <section>
            <div class="row sm">
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">
                    <h1 class="title">מימון המונים לתשתיות עירוניות</h1>
                    <p class="subtitle">ברוכים הבאים למיזם שיחולל מהפכה בתחום התשתיות העירוניות</p>
                    <p class="subtitle">חולמים על ספסל ברחוב? רוצים מגרש ציבורי חדש?</p>
                    <p class="subtitle">מהיום זה אפשרי! </p>
                    <button class="actionButton">התחילו להשפיע על העיר שלכם</button>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">
                    <img src="images/undraw_having_fun_iais.svg" alt="" width="100%">
                </div>
            </div>
        </section>

        <section>
            <div class="row">
                <h1>איך זה עובד?</h1>
            </div>
            <div class="row sm">
                <div class="col-lg-2 col-md-2 col-sm-8 col-xs-8 mx-auto center works">
                    <img src="images\plus.png" alt="">
                    <h2>שלב 1</h2>
                    <p>מעלים רעיון חדש באתר</p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-8 col-xs-8 mx-auto center works">
                    <img src="images\credit.png" alt="">
                    <h2>שלב 2</h2>
                    <p>מחכים לגיוס הכסף הנדרש עבור הפרוייקט</p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-8 col-xs-8 mx-auto center works">
                    <img src="images\undercons.png" alt="">
                    <h2>שלב 3</h2>
                    <p>הרעיון מתחיל להתבצע בשטח</p>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-8 col-xs-8 mx-auto center works">
                    <img src="images\party.png" alt="">
                    <h2>שלב 4</h2>
                    <p>מזל טוב ! יש תשתית חדשה בזכותך !</p>
                </div>
            </div>
            <div class="row center sm">
                <div class="col-lg-12 col-md-12 col-sm-10 col-xs-10 mx-auto center">
                    <a href="newProject.php"><button class="actionButton">התחילו עכשיו</button><a>
                </div>

            </div>
        </section>
</div>
<div class="container-fluid">

        <section>
             <div class="row">
                <h1 style="margin-right: 4%;">פרויקטים אחרונים</h1>
            </div>

            <div class="row sm">




            <?php include_once("include/BLL.php"); ?>

            <?php
            $arrProjects = Array();
            $arrProjects = getAllProjects();

            for($i=0; $i<3; $i++)
            {
                ?>
                <div class="offset-lg-1 col-lg-3 col-md-4 col-sm-6 col-xs-10 mx-auto card">
                    <div class="pictureCard" style="background-image:url('images/project_types/1.png');"></div>      
                    <div class="descCard">
                        <h3><?php echo $arrProjects[i]->projecttype; echo $i; ?></h3>
                        <div class="status-c status"><?php echo $arrProjects[i]->projectstatus; ?></div>
                        <p><?php echo $arrProjects[i]->description; ?></p>
                        <div class="bar">
                            <p style="text-align:right; font-size:14px; margin-bottom:0px; color:#36ba2f"><?php echo $arrProjects[i]->projectcost;?><i class="fas fa-shekel-sign"></i></p>
                            <div id="mainBar"> 
                                <div style="width:40%;background-color:red;border-radius: 20px; ">
                                <?php echo $arrProjects[i]->projectcurrentprice/$arrProjects[i]->projectcost; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            
               
                
               
            </div>
    </section>


</main>
<?php include_once("footer.php"); ?>