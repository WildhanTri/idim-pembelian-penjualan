<?php
if(isset($_GET['page'])){
	$page=$_GET['page'];
    $subpage=$_GET['subpage'];
	$file="view/admin-$page/$subpage.php";
	
	if (!file_exists($file)){
		include ("view/admin-$page/$subpage.php");
	}else{
		include ($file);
	}
}else{
	include ("view/admin-home/dashboard.php");
}
// include ("view/admin-home/dashboard.php");
?>