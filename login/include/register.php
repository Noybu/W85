<?php

//require_once 'DAL.php';
require_once 'BLL.php';

session_start();


$command = $_REQUEST["type"];


switch ($command) {

    case "1":
        // הרשמה יזם משקיע


        register(
            $_POST["id"],
            $_POST["firstName"] ,
             $_POST["lastName"],
            $_POST["password"],
            $_POST["email"],
            $_POST["type"]
        );
        header("Location: index.php");

        break;

    case "2":
        // הרשמה נותן שירות
        register(
            $_POST["id"],
            $_POST["firstName"] ,
             $_POST["lastName"],
            $_POST["password"],
            $_POST["email"],
            $_POST["idService"],
            $_POST["profType"],
            $_POST["numOfYears"],
            $_POST["idFile"],
            $_POST["profFile"],
            $_POST["type"]
        );
        header("Location: index.php");

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