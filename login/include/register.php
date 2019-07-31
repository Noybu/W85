<?php

//require_once 'DAL.php';
require_once '../../include/BLL.php';

session_start();


$command = $_REQUEST["type"];


switch ($command) {

    case "1":
        // הרשמה יזם משקיע


        registerUser(
            $_POST["id"],
            $_POST["firstName"],
            $_POST["lastName"],
            $_POST["password"],
            $_POST["email"],
            $_POST["type"]
        );
        header("Location: ../../index.php");

        break;

    case "2":
        // הרשמה נותן שירות
        if(isset($_FILES['idFile'])){
            $errors= array();
            $file_name = $_FILES['idFile']['name'];
            $file_size = $_FILES['idFile']['size'];
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
   

        registerServiceMan(
            $_POST["id"],
            $_POST["firstName"],
            $_POST["lastName"],
            $_POST["password"],
            $_POST["email"],
            $_POST["idService"],
            $_POST["profType"],
            $_POST["numOfYears"],
            $_FILES["idFile"]["name"],
            $_POST["profFile"],
            $_POST["type"]
        );
        header("Location: ../../index.php");

        break;

    case "login":
        if (!isset($_POST["userName"]) || ($_POST["userName"]) == "") {
            header("Location: login.php?error=Missing Username.");
        } elseif (!isset($_POST["password"]) || ($_POST["password"]) == "") {
            header("Location: login.php?error=Missing Password.");
        } elseif (is_user_exist($_POST["userName"], $_POST["password"])) {
            $_SESSION["userID"] = get_user_id($_POST["userName"]);
            header("Location: index.php");
        } else
            header("Location: login.php?error=Incorrect Username or Password");
        break;



    case "logout":
        session_destroy();
        header("Location: login.php");
        break;
}
