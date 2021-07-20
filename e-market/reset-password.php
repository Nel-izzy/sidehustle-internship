<?php
include_once('dbconn.php');
include_once("session.php");
?>

<?php
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
  
    $sql = "SELECT * FROM Users WHERE userID=$id";
    $result = mysqli_query($conn, $sql);
   
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);   
    }
    ?>
        <form action="" method="post">
        <table>
        <tr><td><input type="hidden" name="userID" value="<?php echo $row['userID']; ?>"></td></tr>
        <tr><td>Current Password: </td><td><input type="password" name="oldpass" ></td></tr>
        <tr><td>New Password: </td><td><input type="password" name="newpass"></td></tr>
        <tr><td><input type="submit" value="Save" name="update_pass"></td></tr>
        </table>
        </form>
  <?php  } ?>

  <?php
if(isset($_POST['update_pass'])){
    $id = $_POST['userID'];
    if(empty($_POST['oldpass']) or empty($_POST['newpass'])){
        echo "<p style='color: orange'>Fields cannot be blank</p>";
       }
       else{
           $sql = "SELECT passwd FROM Users WHERE userID=$id";
           $result = mysqli_query($conn, $sql);
           if(mysqli_num_rows($result) == 1){
            $record = mysqli_fetch_assoc($result);

           $oldpassword = $_POST['oldpass'];
           $newpassword = $_POST['newpass'];

           if($oldpassword === $record['passwd']){
            $sql = "UPDATE Users SET passwd = '$newpassword' WHERE userID=$id";
            if(mysqli_query($conn, $sql)){
                echo "<p style='color: green'>Password Updated. Redirecting...</p>";
                header("refresh:3; url=/sidehustle-internship/e-market/");
                
            }else{
                echo "<p style='color: orange'>Error Updating Password</p>" .mysqli_error($conn);
            }

           }else{
            echo "<p style='color: red'>Please check Current Password.</p>";
           }
           
           
           }
           
       }       
}

?>
