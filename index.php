<?php
echo 'Requested URL="'.$_SERVER['QUERY_STRING'].'"';
include 'apps/view/header.php';
$server=$_SERVER['REQUEST_URI'];
switch($server)
{

 case"/available":
    include 'apps/view/available.html';
    break;
    case "/generate":
        include 'apps/view/generate.html';
        break;
    case"/release";
    include 'apps/view/release.html';
    break;
    case"/tickets";
    include 'apps/view/tickets.html';
    break;
}
?>





