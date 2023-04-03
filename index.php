<?php
// access page using request
echo 'Requested URL="'.$_SERVER['QUERY_STRING'].'"';
include 'apps/view/header.php';
$server=$_SERVER['REQUEST_URI'];
switch($server)
{

    // locate to available
 case"/available":
    include 'apps/view/available.html';
    break;

    // locate to genrate 
    case "/generate":
        include 'apps/view/generate.html';
        break;

    // locate to release
    case"/release";

    include 'apps/view/release.html';
    break;

    // locate to ticket
    case"/tickets";
    include 'apps/view/tickets.html';
    break;
}
?>





