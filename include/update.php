<?php
require_once 'DAL.php';
require_once 'BLL.php';


$type = $_REQUEST["type"];


switch ($type) {

    case "serviceman":
    {
        updateServiceManApproved($_GET['serviceid'],$_GET['status']);
        header("Location: ../Admin/listOfService.php");
        break;
    }
    case "project":
    {
        updateProjectStatus($_GET['id'],$_GET['status']);
        header("Location: ../Admin/listOfProjects.php");
        break;
    }
    case "winbid":
    {
        updateServiceManBid($_GET['serviceid'],$_GET['status'],$_GET['projectid']);
        updateProjectStatus($_GET['projectid'],2);
        updateProjectCost($_GET['projectid'],$_GET['price']);
        header("Location: ../Admin/listOfBid.php");
        break;
    }
    case "doneProject":
    {
        updateProjectStatus($_GET['id'],4);
        updateProjectFinalDate($_GET['id']);
        header("Location:../myBids.php");
        break;
    }
    

}
?>