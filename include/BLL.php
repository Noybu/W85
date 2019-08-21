<?php

require_once 'DAL.php';
require_once 'project.php';
require_once 'serviceMan.php';
require_once 'bid.php';
//session_start();



function addProject($userID, $projectType, $description, $locCity, $locStreet, $locNum)
{
    $sql = "INSERT INTO projects (projecttype, description , loccity, locstreet , locnum, projectstatus, projectcurrentprice, userid) VALUES ('$projectType', '$description', '$locCity','$locStreet','$locNum','0','0','$userID')";
    insert($sql);
}

function insertRate($projectid, $userid,$rate)
{
    $ifUserRate=checkIfUserRate($userid,$projectid);
    if($ifUserRate==0){
        $sql = "INSERT INTO rates (rate, projectid, userid) VALUES ('$rate', '$projectid','$userid')";
        insert($sql);
    }

    
}

function getAvgRate($projectid){
    $sql = "SELECT count(*) as total_row FROM rates WHERE projectid='$projectid'";
    $countPeoples= get_object($sql)->total_row;
    if($countPeoples==0)
        return null;

    $sql2="SELECT rate FROM rates WHERE projectid='$projectid'";
    $dbRates=select($sql2);
    $sum=0;
    for($i=0; $i<$countPeoples; $i++){
       $sum =+ $dbRates[$i]->rate;
    }
    $avg=$sum/$countPeoples;
    return ceil($avg);
}

function checkIfUserRate($userid,$projectid){
        $sql="SELECT count(*) as total_row FROM rates WHERE userid='$userid' AND projectid='$projectid' ";
        $count = get_object($sql)->total_rows;

        if($count>0)
            return 1;
        else
            return 0;

    }

function getUserRate($userid,$projectid){
    $sql="SELECT rate FROM rates WHERE userid='$userid' AND projectid='$projectid'";
    $rate=select($sql);

    return $rate->rate;

}

function getAllProjects()
{
   
    $sql = "SELECT * FROM projects WHERE projectstatus<>'10'";
    $dbProjects = select($sql);

   foreach ($dbProjects as $P) {
       $oopProjects[] = new Project($P->projecttype, $P->description , $P->loccity, $P->locstreet , $P->locnum, $P->projectstatus, $P->projectcost, $P->projectcurrentprice, $P->userid, $P->projectid, $P->peoples );
   }

    return $oopProjects;
}

function getAllNewProjects()
{
   
    $sql = "SELECT * FROM projects WHERE projectstatus=0";
    $dbProjects = select($sql);
    
    if ($dbProjects==null)
        {
            return null;
        }

   foreach ($dbProjects as $P) {
       $oopProjects[] = new Project($P->projecttype, $P->description , $P->loccity, $P->locstreet , $P->locnum, $P->projectstatus, $P->projectcost, $P->projectcurrentprice, $P->userid, $P->projectid, $P->peoples);
   }

    return $oopProjects;
}

function getAllBidProjects()
{
   
    $sql = "SELECT * FROM projects WHERE projectstatus=1";
    $dbProjects = select($sql);

    if($dbProjects==null)
    {
        return null;
    }

   foreach ($dbProjects as $P) {
       $oopProjects[] = new Project($P->projecttype, $P->description , $P->loccity, $P->locstreet , $P->locnum, $P->projectstatus, $P->projectcost, $P->projectcurrentprice, $P->userid, $P->projectid, $P->peoples);
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

function getProfType($num)
{
    switch($num)
    {
        case 1:
        {
            return "גנן";
        }
        case 2:
        {
            return "נגר";
        }
        case 3:
        {
            return "חשמלאי";
        }
        case 4:
        {
            return "רתך";
        }
        case 5:
        {
            return "בנאי";
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
    $sql = "SELECT * FROM projects WHERE projectid='$id'";
    $dbProjects = select($sql);

   foreach ($dbProjects as $P) {
    $oopProject[]=new Project($P->projecttype, $P->description , $P->loccity, $P->locstreet , $P->locnum, $P->projectstatus, $P->projectcost, $P->projectcurrentprice, $P->userid, $P->projectid, $P->peoples);
   }
   return $oopProject;
}

function getProjectByUser($id)
{
    $sql = "SELECT * FROM projects WHERE userid='$id'";
    $dbProjects = select($sql);
    if($dbProjects == null)
        return null;

   foreach ($dbProjects as $P) {
    $oopProject[]=new Project($P->projecttype, $P->description , $P->loccity, $P->locstreet , $P->locnum, $P->projectstatus, $P->projectcost, $P->projectcurrentprice, $P->userid, $P->projectid, $P->peoples);
   }
   return $oopProject;
}

function getFundsByUser($id){
    $sql= "SELECT * FROM projects as p INNER JOIN bids as b WHERE p.projectid=b.projectid AND b.serviceid='$id' AND b.win='1'";
    $dbFunds = select($sql);
    if($dbFunds==null)
    {
        return null;
    }
    foreach ($dbFunds as $P) {
        $oopProject[]=new Project($P->projecttype, $P->description , $P->loccity, $P->locstreet , $P->locnum, $P->projectstatus, $P->projectcost, $P->projectcurrentprice, $P->userid, $P->projectid, $P->peoples);
    }
    return $oopProject;
}

function checkIfFundDone($projectId)
{
    $sql = "SELECT * FROM projects WHERE projectid='$projectId'";
    $dbProjects = select($sql);

    $left = $dbProjects[0]->projectcost-$dbProjects[0]->projectcurrentprice;

    if($left<=0)
    {
        updateProjectStatus($projectId,3);

    }

}



function getStatusBarColors($status , $num){
    switch($status){
        case 0:
        {   return "
                <div class='poly".$num." status-b'>ממתין לאישור</div>
                <div class='poly".$num." status-a'>ממתין למכרז</div>
                <div class='poly".$num." status-a'>ממתין למימון</div>
                <div class='poly".$num." status-short status-a'>בביצוע</div>
                <div class='poly".$num." status-short status-a'>הושלם</div>";
        }
        case 1:
        {   return "
                <div class='poly".$num." status-c'>ממתין לאישור</div>
                <div class='poly".$num." status-b'>ממתין למכרז</div>
                <div class='poly".$num." status-a'>ממתין למימון</div>
                <div class='poly".$num." status-short status-a'>בביצוע</div>
                <div class='poly".$num." status-short status-a'>הושלם</div>";
        }
        case 2:
        {   return "
                <div class='poly".$num." status-c'>ממתין לאישור</div>
                <div class='poly".$num." status-c'>ממתין למכרז</div>
                <div class='poly".$num." status-b'>ממתין למימון</div>
                <div class='poly".$num." status-short status-a'>בביצוע</div>
                <div class='poly".$num." status-short status-a'>הושלם</div>";
        }
        case 3:
        {   return "
                <div class='poly".$num." status-c'>ממתין לאישור</div>
                <div class='poly".$num." status-c'>ממתין למכרז</div>
                <div class='poly".$num." status-c'>ממתין למימון</div>
                <div class='poly".$num." status-short status-b'>בביצוע</div>
                <div class='poly".$num." status-short status-a'>הושלם</div>";
        }
        case 4:
        {   return "
                <div class='poly".$num." status-c'>ממתין לאישור</div>
                <div class='poly".$num." status-c'>ממתין למכרז</div>
                <div class='poly".$num." status-c'>ממתין למימון</div>
                <div class='poly".$num." status-short status-c'>בביצוע</div>
                <div class='poly".$num." status-short status-c'>הושלם</div>";
        }
    }
}


// Delete Video:
function deleteVideo($videoID)
{


    $sql = "delete from videos where videoID = " . "$videoID";
    delete($sql);
}


function addNewBidOffer($price,$date, $projectID, $servicemanID){
    $sql="INSERT INTO bids (projectid, serviceid, offerprice, offerdate) VALUES ('$projectID','$servicemanID','$price','$date')";
    update($sql);
}

function updateServiceManApproved($serviceID, $status)
{

    $sql = "UPDATE users SET approved='$status' where id ='$serviceID'";
    update($sql);
}

function updateServiceManBid($serviceID, $status, $projectID)
{

    $sql = "UPDATE bids SET win='$status' where serviceid ='$serviceID' AND projectid='$projectID'";
    update($sql);
}

function updateProjectStatus($projectID, $status)
{

    $sql = "UPDATE projects SET projectstatus='$status' where projectid ='$projectID'";
    update($sql);
}

function updateNumOfFundPeople($projectId)
{
    $sql = "SELECT peoples FROM projects WHERE projectid='$projectId'";
    $dbProjects = select($sql);

    $count = $dbProjects[0]->peoples;
    $count=$count+1;

    $sql2 = "UPDATE projects SET peoples='$count' where projectid ='$projectId'";
    update($sql2);


}

function updateCurrentPrice($projectID, $price)
{
    $sqlSel="SELECT projectcurrentprice FROM projects WHERE projectid='$projectID'";
    $getCurrentPrice = select($sqlSel);

    $x=$getCurrentPrice[0]->projectcurrentprice;
    $finalPrice=(int)$x + (int)($price);
   
    $sql = "UPDATE projects SET projectcurrentprice=$finalPrice where projectid ='$projectID'";
    update($sql);
}


function getAllBids($projectId)
{
    //$id, $projectid, $serviceid, $offerprice, $offerdate, $win,$proftype,$numofyears,$firstname,$lastname
   
    $sql = "SELECT * FROM bids AS b inner join users As u WHERE b.serviceid=u.id AND b.projectid=$projectId";
    $dbBids = select($sql);

    if($dbBids==null)
        return null;

   foreach ($dbBids as $B) {
       $oopBids[] = new Bid($B->userid, $B->projectid,$B->serviceid,$B->offerprice,$B->offerdate,$B->win,$B->proftype,$B->numofyears,$B->firstname,$B->lastname);
   }

    return $oopBids;
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

//מקבל את האיימיל של המשתמש
function get_user_email($id)
{
    $sql = "select email from users where id = '$id'";
    return get_object($sql)->email;
}

//מקבל אם משתמש מאושר
function getServiceApproved($id)
{
    $sql = "select approved from users where id = '$id'";
    return get_object($sql)->approved;
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

function getAllServiceManNotApproved()
{
   
    $sql = "SELECT id, firstName, lastName, email, idservice,proftype,numofyears, idfile,proffile, type, approved FROM users WHERE type=2 AND approved=0";
    $dbServiceMan = select($sql);

    if($dbServiceMan==null){
        return null;
    }

   foreach ($dbServiceMan as $S) {
       $oopServiceMan[] = new serviceMan($S->id,$S->firstName,$S->lastName,$S->email,$S->idservice,$S->proftype,$S->numofyears,$S->idfile,$S->proffile,$S->type,$S->approved);
   }

    return $oopServiceMan;
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
