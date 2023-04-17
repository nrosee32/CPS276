<?php

if($_SESSION['access'] !== "accessGranted"){
  header('Location: index.php');
}

function init(){
    $msg = "";
    $output = "<p>Welcome " .$_SESSION['name'] ."</p>";

    return [$msg, $output];
}

?>