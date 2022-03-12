<?php 
include_once 'session.php';
if(($_SESSION['msg']) != null){
	echo "<script> alert('".$_SESSION['msg']."') </script>";
	$_SESSION['msg'] = null; 
    echo "<script>location.href = ('./')</script>";
}