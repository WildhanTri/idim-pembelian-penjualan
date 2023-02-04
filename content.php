<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $subpage = $_GET['subpage'];
        
        $file = "view/$page/$subpage.php";
        if(file_exists($file)){
            include ($file); 
        }
        else{
            include 'view/home/home.php';    
        }
    }
    else{
        include 'view/home/home.php';
    }
?>