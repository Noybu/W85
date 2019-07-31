<?php

require_once 'DAL.php';
require_once 'Project.php';


//session_start();



function addProject($userID, $projectType, $description, $locCity, $locStreet, $locNum)
{
    $sql = "INSERT INTO projects (projecttype, description , loccity, locstreet , locnum, projectstatus, projectcurrentprice, userid) VALUES ('$projectType', '$description', '$locCity','$locStreet','$locNum','0','0','$userID')";
    insert($sql);
}


function getAllProjects()
{
    
    $sql = "SELECT projecttype, description , loccity, locstreet , locnum, projectstatus, projectcurrentprice, userid FROM projects";
    $dbProjects = select($sql);
    $rows = [];
    while($row = mysqli_fetch_array($dbProjects))
    {
        $rows[] = $row;
    }


   // foreach ($dbProjects as $P) {
     //   $oopProjects[] = new Project($P->projecttype, $P->description , $P->loccity, $P->locstreet , $P->locnum, $P->projectstatus, $P->projectcurrentprice, $P->userid);
  //  }

    return $rows;
}

// Show all Videos by ID:
function getVideosByUser($userID)
{

    $sql = "SELECT videoID, videoTitle, categoryName, description, link FROM videos V JOIN categories C ON V.categoryID = C.categoryID where userID = '$userID' ";
    echo $sql;

    $dbVideos = select($sql);

    foreach ($dbVideos as $V) {
        $oopVideos[] = new Videos($V->videoID, $V->videoTitle, $V->categoryName, $V->description, $V->link);
    }

    return $oopVideos;
}

//function getVideosByID($videoID) {
//    $sql = "SELECT videoTitle, categoryID, description, link FROM videos WHERE VideoID = '$videoID'";
//
//    $video = get_object($sql);
//
//    return $video;
//}



// Delete Video:
function deleteVideo($videoID)
{


    $sql = "delete from videos where videoID = " . "$videoID";
    delete($sql);
}


function editVideo($videoID, $categoryID, $videoTitle, $description, $link)
{
    if (isset($_GET['edit'])) {
        $videoID = $_GET['edit'];
        $update = true;

        $result = "SELECT * FROM videos WHERE videoID=$videoID";
    }
    $sql = "UPDATE Videos SET videoTitle='$videoTitle',categoryID='$categoryID', description='$description', link='$link' where videoID ='$videoID'";
    update($sql);
}

//מקבל את ה ID של המשתמש 
function get_user_id($userName)
{
    $userName = addslashes($userName);
    $sql = "select id from users where userName = '$userName'";
    return get_object($sql)->id;
}

//מקבל את שם משתמש של המשתמש
function get_user_name($id)
{
    $sql = "select firstname from users where id = '$id'";
    return get_object($sql)->firstname;
}

//מקבל את הסוג של המשתמש
function get_user_type($id)
{
    $sql = "select type from users where id = '$id'";
    return get_object($sql)->type;
}

//בודק אם משתמש קיים כבר במערכת
function is_username_exist($userName)
{
    $userName = addslashes($userName);
    $sql = "select count(*) as total_rows from users where userName = '$userName'";
    $count = get_object($sql)->total_rows;
    return $count > 0;
}


//מכניס משתמש רגיל למערכת 
function registerUser($id, $firstName, $lastName, $password, $email, $type)
{

    $firstName = $firstName;
    $lastName = $lastName;
    $password = $password;
    $type = $type;
    $id = $id;
    $email = $email;

    $password = crypt($password, "Assaf Ido Noy"); // Salt the password.
    $password = sha1($password);

    $sql = "insert into users(id, firstName, lastName, password, email, type, approved) values( '$id','$firstName','$lastName','$password', '$email','$type','1')";

    insert($sql);
}

//מכניס נותן שירות למערכת
function registerServiceMan($id, $firstName, $lastName,  $password, $email, $idservice, $proftype, $numofyears, $idfile, $proffile, $type)
{

    $firstName = $firstName;
    $lastName = $lastName;
    $password = $password;
    $type = $type;
    $id = $id;
    $email = $email;
    $idservice = $idservice;
    $proftype = $proftype;
    $numofyears = $numofyears;
    $idfile = $idfile;
    $proffile = $proffile;


    $password = crypt($password, "Assaf Ido Noy"); // Salt the password.
    $password = sha1($password);

    $sql = "insert into users(id, firstName, lastName, password, email, idservice,proftype,numofyears, idfile,proffile, type, approved) values('$id','$firstName','$lastName','$password' ,'$email','$idservice', '$proftype', '$numofyears', '$idfile','$proffile' ,'$type','0')";
    insert($sql);
}


//בודק אם משתמש קיים במערכת 
function is_user_exist($userID, $password)
{
    $password = crypt($password, "Assaf Ido Noy"); // Salt the password.
    $password = sha1($password);

    $sql = "select count(*) as total_rows from users where id = '$userID' and password = '$password'";
    $count = get_object($sql)->total_rows;
    return $count;
}
