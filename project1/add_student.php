<?php
echo '<pre>';
print_r($_POST);

if(isset($_POST['btn']))
{
    $connection = mysqli_connect('localhost','root','');
    if($connection){
        echo 'Server connected';
        $select_db = mysqli_select_db($connection,'db_seip_php19');
        if($select_db){
            echo 'database selected';
        }
        else{
            die('database selection error'.mysqli_error($select_db));
        }
    }else{
        die('server no connected'.mysqli_error($connection));
    }
    $sql = "INSERT INTO tbl_student(student_name,email_address,phone_number)VALUES('$_POST[student_name]','$_POST[email_address]','$_POST[password]')";

    if(mysqli_query($connection,$sql)){
        echo 'data save successfully';
    }
    else{
        die('data not saved'.mysqli_error($connection));
    }

}
?>

<form action="add_student.php" method="post">    
    <table align="center" color="#333">
    
    <tr>
    <td>Student Name</td>
    <td><input type="text" name="student_name"></td>
    </tr>

    <tr>
    <td>Email Address</td>
    <td><input type="email" name="email_address"></td>
    </tr>

    <tr>
    <td>Phone Number</td>
    <td><input type="password" name="password" id=""></td>
    </tr>

    <tr>
    <td></td>
    <td><input type="submit" name="btn" id="n" value="Save Student" label="save" method="post"></td>
    </tr>
    
    </table>
</form>