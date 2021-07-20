<?php 

include_once('dbconn.php');
include_once("session.php"); 

?>


<?php
$userID;

  $sql = "SELECT userID from users WHERE email='$email'";
              $result = mysqli_query($conn, $sql);
              if(mysqli_num_rows($result) == 1){
                  $record = mysqli_fetch_assoc($result);
                  $userID = $record['userID'];
              }  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-MARKET | DASHBOARD</title>
    <link rel="stylesheet" href="style.css">
</head>  
<body>
    <p><a href="/sidehustle-internship/e-market/addproduct.php">Add Product</a></p>
    <p><a href="/sidehustle-internship/e-market/reset-password.php?edit=<?php echo $userID?>">Reset Password</a></p>
    <p><a href="/sidehustle-internship/e-market">Signout</a></p>
<section classname="product">
    <?php
    $sql = "SELECT * FROM Products";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    ?>
        <article>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <table class='product'>
            <tr><td><?php echo $row['title']; ?></td></tr>
            <tr><td><?php echo $row['price']; ?></td></tr>
            <tr><td> <img src="images/<?php echo $row['img']; ?>" > </td></tr>
           <?php 
            if($userID === $row['userID']){
           ?>
            <tr>
                <td>You created this product</td>
                <td><a href="/sidehustle-internship/e-market/edit.php?edit=<?php echo $row['prodID']; ?>">Edit</a></td>
               <td><a href="dashboard.php?delete=<?php echo $row['prodID']; ?>">Delete</a></td>
              
              </tr>
              
               <?php } ?> 
              
                 
            </table>
     <?php   } ?>
        </article>
   <?php } ?>

   </section>
</body>
</html>

<?php

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM Products WHERE prodID = $id";
    if(mysqli_query($conn, $sql)){
        echo "<p style='color: green'>Product Deleted. Redirecting...</p>";
        header("refresh:3; url=/sidehustle-internship/e-market/dashboard.php");
    }else{
        $error = "Error deleting todo: ".mysqli_error($conn);
    }
}
?>