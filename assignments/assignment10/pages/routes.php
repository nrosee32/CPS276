<?php

$path = "index.php?page=login";

session_start();
$adminNav = <<<HTML
HTML;
$adminNav2 = <<<HTML
HTML;
if(isset($_SESSION['status']) && $_SESSION['status'] == "admin"){
    $adminNav = <<<HTML
    <li class="nav-item"><a class="nav-link" href="index.php?page=addAdmin">Add Admin</a></li>
    HTML;
    $adminNav2 = <<<HTML
    <li class="nav-item"><a class="nav-link" href="index.php?page=deleteAdmins">Delete Admin(s)</a></li>
    HTML;
}

$nav=<<<HTML
    <ul class="nav justify-content-center">
            <!--<li class="nav-item"><a class="nav-link" href="index.php?page=login">Login</a></li>-->
            <li class="nav-item"><a class="nav-link" href="index.php?page=welcome">Welcome</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=addContact">Add Contact Information</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=deleteContacts">Delete contact(s)</a></li>
            $adminNav
            $adminNav2
            <li class="nav-item"><a class="nav-link" href="index.php?page=logout">Logout</a></li>
    </ul>
HTML;

if(isset($_GET)){
    if($_GET['page'] === "addContact"){
        require_once('pages/addContact.php');
        $result = init();
        $title = "<h1>Add Contact</h1>";
    }
    
    else if($_GET['page'] === "deleteContacts"){
        require_once('pages/deleteContacts.php');
        $result = init();
        $title = "<h1>Delete Contact(s)</h1>";
    }

    else if($_GET['page'] === "welcome"){
        require_once('pages/welcome.php');
        $result = init();
        $title = "<h1>Welcome</h1>";
    }

    else if($_GET['page'] === "addAdmin"){
        require_once('pages/addAdmin.php');
        $result = init();
        $title = "<h1>Add Admin</h1>";
    }

    else if($_GET['page'] === "deleteAdmins"){
        require_once('pages/deleteAdmins.php');
        $result = init();
        $title = "<h1>Delete Admin(s)</h1>";
    }
   
    else if($_GET['page'] === "login"){
        require_once('pages/login.php');
        $result = init();
        $title = "<h1>Login</h1>";
    }

    else if($_GET['page'] === "logout"){
        require_once('logout.php');
        $result = init();
        $title = "<h1>Logout</h1>";
    }

    else {
        header('location: '.$path);
    }
}

else {
    header('location: '.$path);
}



?>