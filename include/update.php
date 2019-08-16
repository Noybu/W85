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
            updateServiceManApproved($_GET['serviceid'],2);
            header("Location: ../Admin/listOfBid.php");
            break;
        }
        




}
?>