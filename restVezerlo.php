<?php

require_once("OscarrestKezelo.php");

$view = "";
if(isset($_GET["view"]))
$view = $_GET["view"];

switch($view)
{
    case "all":
        $Oscarrest = new OscarrestKezelo();
        $Oscarrest->getAllOscars();
        break;

    case "single":
        $Oscarrest = new OscarrestKezelo();
        $Oscarrest->getOscarById($_GET["id"]);
        break;

    case "tipus":
        $Oscarrest = new OscarrestKezelo();
        $Oscarrest->getOscarById($_GET["tid"]);
        break;

    default:
    $Oscarrest = new OscarrestKezelo();
    $Oscarrest->getFault();    
}

?>