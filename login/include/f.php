<?php
   if(isset($_FILES['idFile'])){
      $errors= array();
      $file_name = $_FILES['idFile']['name'];
      $file_size = $_FILES['imidFileage']['size'];
      $file_tmp = $_FILES['idFile']['tmp_name'];
      $file_type = $_FILES['idFile']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['idFile']['name'])));
      
      $extensions= array("jpeg","jpg","png","gif");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../uploadFiles/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
   <form action="" method="post" enctype = "multipart/form-data">
        <h3 style="margin-right:5%;">פרטים אישיים</h3>
        <div class="formService">
          <div class="form-item">
            <p class="formLabel">תעודת זהות</p>
            <input required type="text" name="id" class="form-style" maxlength="9" />
          </div>
          <div class="form-item">
            <p class="formLabel">שם פרטי</p>
            <input required type="text" name="firstName" class="form-style" />
          </div>
          <div class="form-item">
            <p class="formLabel">שם משפחה</p>
            <input required type="text" name="lastName" class="form-style" />
          </div>
          <div class="form-item">
            <p class="formLabel">סיסמא</p>
            <input required type="password" name="password" class="form-style" />
          </div>
          <div class="form-item">
            <p class="formLabel">אימייל</p>
            <input required type="email" name="email" class="form-style" />
          </div>
          <div class="form-item">
            <input type="hidden" name="type" value="2" />
          </div>
        </div>
    </div>
    <div class="mainDiv MainDivService">
      <h3 style="margin-right:5%;">פרטים מקצועיים</h3>
      <div class="formService">
        <div class="form-item">
          <p class="formLabel">מספר ח"פ</p>
          <input required type="text" name="idService" class="form-style" maxlength="9" />
        </div>
        <div class="form-item">
          <p class="formLabel formTop">מקצוע</p>
          <select required class="form-style" name="ProfType">
            <option value="1">ספסל</option>
            <option value="2">גני שעשועים</option>
            <option value="3">פחי אשפה</option>
            <option value="4">אופניים</option>
            <option value="5">תאורה</option>
          </select>
        </div>
        <div class="form-item">
          <p class="formLabel">ותק</p>
          <input required type="text" name="numOfYears" class="form-style" maxlength="2" />
        </div>
        <div class="form-item">
          <p class="formLabel formTop">העלאת תעודת זהות</p>
          <input required type="file" name="idFile" class="form-style fileStyle" />
        </div>
        <div class="form-item">
          <p class="formLabel formTop">העלאת תעודת עוסק</p>
          <input required type="file" name="profFile" class="form-style fileStyle" />
        </div>
        <div>
          <input type="submit" class="login" value="שלח">
        </div>
      </div>
      </form>
            
         
      
      
   </body>
</html>