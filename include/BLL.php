<?php

require_once 'DAL.php';


//session_start();



function addProject($userID , $projectType, $description, $locCity, $locStreet, $locNum) {
//    if (isset($_GET['addVideo'])) {
//        $name = $_POST['name'];
//        $color = $_POST['color'];
//        $age = $_POST['age'];

    $sql = "INSERT INTO `project` (`userID`,`projectType`, `description` , `locCity`, `locStreet` , `locNum`) VALUES ('$userID','$projectType', '$description', '$link')";
    insert($sql);
}

// Show all Videos:
function getAllVideos() {
//    $userName = $_SESSION["userName"];
    $sql = "SELECT c.videoID, c.videoTitle, o.categoryName, c.description, c.link FROM videos c JOIN categories o ON c.categoryID = o.categoryID ";
    $dbVideos = select($sql);
    
    
    foreach ($dbVideos as $V) {
        $oopVideos[] = new Videos($V->videoID, $V->videoTitle, $V->categoryName, $V->description, $V->link);
    }

    return $oopVideos;
}

// Show all Videos by ID:
function getVideosByUser($userID) {
    
    $sql = "SELECT videoID, videoTitle, categoryName, description, link FROM videos V JOIN categories C ON V.categoryID = C.categoryID where userID = '$userID' ";
    echo $sql ;
    
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
function deleteVideo($videoID) {
    
    
    $sql = "delete from videos where videoID = " . "$videoID";
    delete($sql);
}


function editVideo($videoID, $categoryID, $videoTitle, $description, $link) {
    if (isset($_GET['edit'])) {
        $videoID = $_GET['edit'];
        $update = true;
        
       $result = "SELECT * FROM videos WHERE videoID=$videoID";
        
    }
    $sql = "UPDATE Videos SET videoTitle='$videoTitle',categoryID='$categoryID', description='$description', link='$link' where videoID ='$videoID'";
    update($sql);
}

//מקבל את ה ID של המשתמש 
function get_user_id($userName) {
	$userName = addslashes($userName);
	$sql = "select id from users where userName = '$userName'";
	return get_object($sql)->id;
}

//מקבל את שם משתמש של המשתמש
function get_user_name($id) {
	$id = addslashes($id);
	$sql = "select firstName,lastname from users where id = '$id'";
	return get_object($sql)->name;
}


//בודק אם משתמש קיים כבר במערכת
function is_username_exist($userName) {
	$userName = addslashes($userName);
	$sql = "select count(*) as total_rows from users where userName = '$userName'";
	$count = get_object($sql)->total_rows;
	return $count > 0;
}


//בודק אם זה סוג משתמש רגיל או נותן שירות ומפעיל פונקצית הוספה בהתאם
function register($id, $firstName, $lastName, $userName, $password, $type, $file, $idPhoto)
{
    if($type==1)
    {
        registerUser($id, $firstName, $lastName, $userName, $password, $type);
    }
    else{
        registerServiceMan($id, $firstName, $lastName, $userName, $password, $type, $file, $idPhoto);
    }
}


//מכניס משתמש רגיל למערכת 
function registerUser($id, $firstName, $lastName,$email, $password, $type) {
	
    $firstName = addslashes($firstName);
    $lastName = addslashes($lastName);
    $password = addslashes($password);
    $type = addslashes($type);
    $id = addslashes($id);
    $email = addslashes($email);
    
    $password = crypt($password, "Assaf Ido Noy"); // Salt the password.
    $password = sha1($password);

    $sql = "insert into users(id, firstName, lastName, password, email, type) values( '$id','$firstName','$lastName','$password', '$email','$type')";
    insert($sql);
}

//מכניס נותן שירות למערכת
function registerServiceMan($id, $firstName, $lastName,  $password, $type, $file, $idPhoto) {
	
    $firstName = addslashes($firstName);
    $lastName = addslashes($lastName);
    $password = addslashes($password);
    $type = addslashes($type);
    $id = addslashes($id);
    $file = $idPhoto;
    $idPhoto = $idPhoto;
    
    $password = crypt($password, "Assaf Ido Noy"); // Salt the password.
    $password = sha1($password);

    $sql = "insert into users(id, firstName, lastName, password, type, file, idPhoto) values('$id','$firstName','$lastName','$password' ,'$type' ,'$file','$idPhoto')";
    insert($sql);
}


//בודק אם משתמש קיים במערכת 
function is_user_exist($userName, $password ) {
    $userName = addslashes($userName);
    $password = addslashes($password);

    $password = crypt($password, "Assaf Ido Noy"); // Salt the password.
    $password = sha1($password);
    
    $sql = "select count(*) as total_rows from users where userName = '$userName' and password = '$password'";
    $count = get_object($sql)->total_rows;
    return $count > 0;	
}




