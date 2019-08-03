<?php

require_once 'DAL.php';
require_once 'project.php';


//session_start();



function addProject($userID, $projectType, $description, $locCity, $locStreet, $locNum)
{
    $sql = "INSERT INTO projects (projecttype, description , loccity, locstreet , locnum, projectstatus, projectcurrentprice, userid) VALUES ('$projectType', '$description', '$locCity','$locStreet','$locNum','0','0','$userID')";
    insert($sql);
}


function getAllProjects()
{
   
    $sql = "SELECT projecttype, description , loccity, locstreet , locnum, projectstatus,projectcost, projectcurrentprice, userid, projectid FROM projects";
    $dbProjects = select($sql);

   foreach ($dbProjects as $P) {
       $oopProjects[] = new Project($P->projecttype, $P->description , $P->loccity, $P->locstreet , $P->locnum, $P->projectstatus, $P->projectcost, $P->projectcurrentprice, $P->userid, $P->projectid);
   }

    return $oopProjects;
}

function getProjectType($num)
{
    switch($num)
    {
        case 1:
        {
            return "ספסל";
        }
        case 2:
        {
            return "גן-שעשועים";
        }
        case 3:
        {
            return "פח אשפה";
        }
        case 4:
        {
            return "שביל אופניים";
        }
        case 5:
        {
            return "תאורה";
        }
    }
}
function getProjectStatus($num)
{
    switch($num)
    {
        case 0:
        {
            return "ממתין לאישור";
        }
        case 1:
        {
            return "ממתין למכרז";
        }
        case 2:
        {
            return "ממתין למימון";
        }
        case 3:
        {
            return "בביצוע";
        }
        case 4:
        {
            return "הושלם";
        }
    }
}

function getStatusColor($num){
    if($num==4)
        return "status-c";
    else{
        return "status-b";
    }
}

function getProjectById($id)
{
    $sql = "SELECT projecttype, description , loccity, locstreet , locnum, projectstatus,projectcost, projectcurrentprice, userid, projectid FROM projects WHERE projectid='$id'";
    $dbProjects = select($sql);

   foreach ($dbProjects as $P) {
    $oopProject[]=new Project($P->projecttype, $P->description , $P->loccity, $P->locstreet , $P->locnum, $P->projectstatus, $P->projectcost, $P->projectcurrentprice, $P->userid, $P->projectid);
   }
   return $oopProject;
}

function getColors($id){
    switch($id){
        case 0:
        {   return "
                <div class='poly2 status-b'>ממתין לאישור</div>
                <div class='poly2 status-a'>ממתין למכרז</div>
                <div class='poly2 status-a'>ממתין למימון</div>
                <div class='poly2 status-short status-a'>בביצוע</div>
                <div class='poly2 status-short status-a'>הושלם</div>";
        }
        case 1:
        {   return "
                <div class='poly2 status-c'>ממתין לאישור</div>
                <div class='poly2 status-b'>ממתין למכרז</div>
                <div class='poly2 status-a'>ממתין למימון</div>
                <div class='poly2 status-short status-a'>בביצוע</div>
                <div class='poly2 status-short status-a'>הושלם</div>";
        }
        case 2:
        {   return "
                <div class='poly2 status-c'>ממתין לאישור</div>
                <div class='poly2 status-c'>ממתין למכרז</div>
                <div class='poly2 status-b'>ממתין למימון</div>
                <div class='poly2 status-short status-a'>בביצוע</div>
                <div class='poly2 status-short status-a'>הושלם</div>";
        }
        case 3:
        {   return "
                <div class='poly2 status-c'>ממתין לאישור</div>
                <div class='poly2 status-c'>ממתין למכרז</div>
                <div class='poly2 status-c'>ממתין למימון</div>
                <div class='poly2 status-short status-b'>בביצוע</div>
                <div class='poly2 status-short status-a'>הושלם</div>";
        }
        case 4:
        {   return "
                <div class='poly2 status-c'>ממתין לאישור</div>
                <div class='poly2 status-c'>ממתין למכרז</div>
                <div class='poly2 status-c'>ממתין למימון</div>
                <div class='poly2 status-short status-c'>בביצוע</div>
                <div class='poly2 status-short status-c'>הושלם</div>";
        }
    }
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
