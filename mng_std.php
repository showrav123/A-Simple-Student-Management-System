
<?php
    ob_start();
    session_start();
    if($_SESSION['name']!="ashik"){
        header('location: login.php');
    }
?>
<?php
    include('config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script>
            function confirm_delete(){
                return confirm("Are you sure to delete this data?");
            }
        
        </script>
    </head>
    <body>
        <form>
            <table cellpadding="10">
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Department</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                
                    
                </tr>
                <?php
                    $query="select * from tbl_studemt";
                    $result=  mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>
                        <td><?php echo $row['std_name']?></td>
                        <td><?php echo $row['std_id']?></td>
                        <td><?php echo $row['std_age']?></td>
                        <td><?php echo $row['gender']?></td>
                        <td><?php echo $row['std_dept']?></td>
                        <td><?php echo $row['std_phone']?></td>
                        <td><?php echo $row['email']?></td>
                        <td>
                            <a href="edit_std.php?id=<?php echo $row['std_id'];?>">Edit</a> |
                            <a href="delete_std.php?id=<?php echo $row['std_id'];?>">Delete</a> 
                        </td>
                       </tr>
                <?php
                    }
                ?>
               
            </table>
        </form>
        <p><a href="after_admin_login.php">Back to previous page</a></p>
        <a href="logout.php">logout</a>
    </body>
</html>

