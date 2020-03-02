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
    }
    else{
        header('location: mng_std.php');
    }
     if(isset($_POST['insert'])){
        try{
            if(empty($_POST['std_name'])){
                throw new Exception("Name cannot be empty");
            }
            if(empty($_POST['std_id'])){
                throw new Exception("ID cannot be empty");
            }
            if(empty($_POST['std_age'])){
                throw new Exception("Age cannot be empty");
            }
            if(empty($_POST['std_dept'])){
                throw new Exception("Dept cannot be empty");
            }
            if(empty($_POST['std_phone'])){
                throw new Exception("Phone cannot be empty");
            }
            if(empty($_POST['password'])){
                throw new Exception("Password field can not be empty");
            }
            $result=("update tbl_studemt set std_name='$_POST[std_name]',std_id='$_POST[std_id]',std_age='$_POST[std_age]',std_dept='$_POST[std_dept]',std_phone='$_POST[std_phone]',email='$_POST[email]',password='$_POST[password]',l1t1='$_POST[l1t1]',l1t2='$_POST[l1t2]',l2t1='$_POST[l2t1]',l2t2='$_POST[l2t2]',l3t1='$_POST[l3t1]',l3t2='$_POST[l3t2]',l4t1='$_POST[l4t1]',l4t2='$_POST[l4t2]' where std_id='$id'");
            if(mysqli_query($connection, $result)){
                
                $success_mesege="Data has been update succesfully";
            }
            else{
               die('query problem'.  mysqli_error($connection)); 
            }
           
        }
        
        catch (Exception $e){
            $error_messege=$e->getMessage();
        }
     }
?>

<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Update information</h1>
        <a href="after_admin_login.php">Back </a>
        <hr>
        <?php
        if(isset($error_messege)){
            echo $error_messege;
        }
        if(isset($success_mesege)){
            echo $success_mesege;
        }
        ?>
        <?php
            $r=  mysqli_query($connection, "select * from tbl_studemt where std_id='$id'");
            $rw=  mysqli_fetch_assoc($r);
        ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="std_name" value="<?php echo $rw['std_name']?>"></td>
                </tr>
                <tr>
                    <td>Student ID: </td>
                    <td><input type="text" name="std_id" value="<?php echo $rw['std_id']?>"></td>
                </tr>
                <tr>
                    <td>Age: </td>
                    <td><input type="text" name="std_age" value="<?php echo $rw['std_age']?>"></td>
                </tr>
               
                <tr>
                    <td>Department: </td>
                    <td><input type="text" name="std_dept" value="<?php echo $rw['std_dept']?>"></td>
                    
                </tr>
                <tr>
                    <td>Phone Number: </td>
                    <td><input type="text" name="std_phone" value="<?php echo $rw['std_phone']?>"></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" value="<?php echo $rw['email']?>"></td>
                </tr>
                <tr>
                    <td>Give a password</td>
                    <td><input type="password" name="password" value="<?php echo $rw['password']?>"></td>
                </tr>
                <tr>
                    <td>
                        <h1>Result</h1>
                    </td>
                </tr>
                <tr>
                    <td>Level-1,Term-1: </td>
                    <td><input type="text" name="l1t1" value="<?php echo $rw['l1t1']?>"></td>
                </tr>
                <tr>
                    <td>Level-1,Term-2: </td>
                    <td><input type="text" name="l1t2" value="<?php echo $rw['l1t2']?>"></td>
                </tr>
                <tr>
                    <td>Level-2,Term-1: </td>
                    <td><input type="text" name="l2t1" value="<?php echo $rw['l2t1']?>"></td>
                </tr>
                <tr>
                    <td>Level-2,Term-2: </td>
                    <td><input type="text" name="l2t2" value="<?php echo $rw['l2t2']?>"></td>
                </tr>
                <tr>
                    <td>Level-3,Term-1: </td>
                    <td><input type="text" name="l3t1" value="<?php echo $rw['l3t1']?>"></td>
                </tr>
                <tr>
                    <td>Level-3,Term-2: </td>
                    <td><input type="text" name="l3t2" value="<?php echo $rw['l3t2']?>"></td>
                </tr>
                <tr>
                    <td>Level-4,Term-1: </td>
                    <td><input type="text" name="l4t1" value="<?php echo $rw['l4t1']?>"></td>
                </tr>
                <tr>
                    <td>Level-4,Term-2: </td>
                    <td><input type="text" name="l4t2" value="<?php echo $rw['l4t2']?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="insert" value="Update"></td>
                </tr>
            </table>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
        <p><a href="mng_std.php">Back to previous page</a></p><br>
        <a href="logout.php">logout</a>
    </body>
    
</html>
