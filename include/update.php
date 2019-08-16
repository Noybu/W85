<?php
require_once 'DAL.php';
require_once 'BLL.php';


$type = $_REQUEST["type"];


switch ($type) {

    case "serviceman":
        {
            updateServiceManApproved($_GET['serviceid'],$_GET['status']);
            header("Location: Admin/listOfService.php");
            break;
        }
    case "project":
        {
            
            break;
        }
    case "winbid":
        {
            
            break;
        }
        




}
?>