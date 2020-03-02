<?php
    
    ob_start();
    session_start();
    if($_SESSION['name']!="ashik"){
        header('location: login.php');
    }
?>
<?php
   include('config.php');
    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $del=  mysqli_query($connection, "delete from tbl_studemt where std_id='$id'");
        header('location: mng_std.php');
    }
    else{
        header('location: mng_std.php');
    }
?>
