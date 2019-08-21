<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css\Admin_SidebarNav.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require_once'../include/BLL.php';
    session_start();
    if(isset($_POST['submit']))
    {
      $count=is_user_exist($_POST["userID"],$_POST["password"]);
      if($count>0)
      {
        $_SESSION["userID"]=$_POST["userID"];
        $_SESSION["type"]=get_user_type($_POST["userID"]);
        if($_SESSION["type"] == 3){
            header("Location:index.php");
        }
            
        else{
            ?>
                <div style="text-align:right;background-color: #fff;border-top: 5px solid red;text-align: center;">
                    <p style="font-size:18px;font-weight:bold;display: inline;"> אין לך הרשאה להכנס למערכת</p>
                    <a href="http://noybu.mtacloud.co.il/W85/" style="direction:rtl;">לחץ כאן לחזור לדף הבית</a>
                </div>
            <?php

        }
      }     
    }
  
   ?>
    
  </head> 
  <body style="background-size:cover; background-image:url('images/bgadmin.jpg');">
    <main id="mainLogin">
        <div>
            <div>
                <img src="..\images\logo.png">
            </div>
            <div id="mainDiv">
                <br>
                <form action="" method="POST">
                    <div>
                        <div>
                            <p style="font-size:18px; font-weight:bold;">תעודת זהות</p>
                            <input required type="text" name="userID" maxlength="9"/>
                        </div>
                        <div>
                            <p style="font-size:18px; font-weight:bold;">סיסמא</p>
                            <input required type="password" name="password"/>
                        </div>
                        <br>
                        <div>
                            <input type="submit" class="login" value="שלח" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    

  </body>
</html>