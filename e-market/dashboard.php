<?php 
include_once("session.php"); 
include_once('dbconn.php');


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
     <style>
         body {
             display:flex;
             flex-direction: column;
         }
         main{
             display:flex;
             flex-direction:row;
             flex: auto;
         }
         article{
             display: grid;
             grid-template-columns: repeat(4, 1fr);
             padding-left:20px;
             margin-right: 100px;
         }
         article .product{
             margin-left: 20px;
         }
         
         article, aside {
             overflow-y: auto;
         }
     </style>
</head>  
<body>
    
<main>
    <?php
    $sql = "SELECT * FROM Products";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    ?>
        <article>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <div classname='product'>
            <p><?php echo $row['title']; ?></p>
            <p><?php echo $row['price']; ?></p>
            <p> <img src="images/<?php echo $row['img']; ?>" > </p>
           <?php 
            if($userID === $row['userID']){
           ?>
            <p>
                <span>You created this product</span>
                <span><a href="/sidehustle-internship/e-market/edit.php?edit=<?php echo $row['prodID']; ?>">Edit</a></span>
               <span><a href="dashboard.php?delete=<?php echo $row['prodID']; ?>">Delete</a></span>
              
            </p>
              
               <?php } ?> 
              
                 
            </div>
     <?php   } ?>
        </article>
   <?php } ?>

   <aside>
       <p><?php echo "<h3>Welcome ".$email; ?> </p>
   <p><a href="/sidehustle-internship/e-market/addproduct.php">Add Product</a></p>
    <p><a href="/sidehustle-internship/e-market/reset-password.php?edit=<?php echo $userID?>">Reset Password</a></p>
    <p><a href="/sidehustle-internship/e-market/signout.php">Signout</a></p>
   </aside>

            </main>
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