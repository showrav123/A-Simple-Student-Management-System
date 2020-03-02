<?php

    ob_start();
    session_start();
    if($_SESSION['name']!="ashik"){
        header('location: login.php');
    }
?>
    
<?php
    include('config.php');
    
    
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
            if(empty($_POST['gender'])){
                throw new Exception("Undefined gender");
            }
            if(empty($_POST['std_dept'])){
                throw new Exception("Dept cannot be empty");
            }
            if(empty($_POST['std_phone'])){
                throw new Exception("Phone cannot be empty");
            }
            if(empty($_POST['email'])){
                throw new Exception("Email field can not be empty");
            }
            if(empty($_POST['password'])){
                throw new Exception("Password field can not be empty");
            }
            
            
            $uploaded_file=$_FILES['imglink']['name'];
            
            $file_basename=  substr($uploaded_file,0,  strripos($uploaded_file, '.'));//rename file
            $file_ext=  substr($uploaded_file,  strripos($uploaded_file, '.'));
            $f1=$_POST['std_id'].$file_ext;
            
            move_uploaded_file($_FILES['imglink']['tmp_name'], 'student/'.$f1);
            $target_file='student/'.$f1;
          
            if(!$uploaded_file){
                throw new Exception("Please upload image");
            }
            $result=("INSERT INTO tbl_studemt (std_name,std_id,std_age,gender,std_dept,std_phone,email,password,imglink,l1t1,l1t2,l2t1,l2t2,l3t1,l3t2,l4t1,l4t2) VALUES ('$_POST[std_name]','$_POST[std_id]','$_POST[std_age]','$_POST[gender]','$_POST[std_dept]','$_POST[std_phone]','$_POST[email]','$_POST[password]','$target_file','--','--','--','--','--','--','--','--')");
            if(mysqli_query($connection, $result)){
                
                $success_mesege="Data has been saved succesfully";
            }
            else{
               die('query problem'.mysqli_error($connection)); 
            }
           
        }
        catch(Exception $e){
            $error_messege=$e->getMessage();
     
 }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/insert_student.css">
        <script type="text/javascript">
            function PreviewImage(){
                var oFReader=new FileReader();
                oFReader.readAsDataURL(document.getElementById("imglink").files[0]);
                
                oFReader.onload=function (oFREvent){
                    document.getElementById("uploadPreview").src=oFREvent.target.result;
                };
            };
        </script>
    </head>
    <body>
        <div class="header">
                <div class="logo">
                    <img src="img/logo.gif">
                </div>
                <div class="name">
                    <h1>Bangladesh Army International University of Science & Technology</h1>
                    <p>Comilla Cantonment, Comilla.</p>
                    
                </div>
        </div>
        <div class="content">
            <div class="header_content">
                <h1>Add a new student</h1>
                <hr>
                <?php
                if(isset($error_messege)){
                    echo $error_messege;
                }
                if(isset($success_mesege)){
                    echo $success_mesege;
                }
                ?>
            </div>
            <div class="form">
                <form action="" method="post" enctype="multipart/form-data" >
                    <img id="uploadPreview" src="img/user.png" width="150" height="150"> <br>
                    <table>
                        <input type="file" accept=".jpg,.jpeg,.pnp" id="imglink" name="imglink" onchange="PreviewImage();">


                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="std_name"></td>
                        </tr>
                        <tr>
                            <td>Student ID: </td>
                            <td><input type="text" name="std_id"></td>
                        </tr>
                        <tr>
                            <td>Age: </td>
                            <td><input type="text" name="std_age"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>
                                <select name="gender">
                                    <option>----Select Gender-----</option>
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Department: </td>
                            <td><input type="text" name="std_dept"></td>

                        </tr>
                        <tr>
                            <td>Phone Number: </td>
                            <td><input type="text" name="std_phone"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email"></td>
                        </tr>
                        <tr>
                            <td>Give a password</td>
                            <td><input type="password" name="password"></td>
                        </tr>
                        
                        
                            <td></td>
                            <td><input type="submit" name="insert" value="Submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <p><a href="after_admin_login.php">Back to previous page</a></p><br>
            <a href="logout.php">logout</a>
        </div>
    </body>
</html>


