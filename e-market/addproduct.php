<?php 
include_once('dbconn.php');
include_once("session.php"); 
include_once('test_input.php');

?>

<?php

if(isset($_POST['addproduct'])){
    
    $sql = "SELECT userID from users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $userID = $row['userID'];
        if(empty($_POST['title']) or empty($_POST['price'])){
            echo "<p style='color: orange'>Fields cannot be blank</p>";
           }
           else{
               $title = $_POST['title'];
               $price = $_POST['price'];
               $image = $_FILES['image']['name'];
               $target = "images/".basename($image);
               
              $sql = "INSERT INTO Products (title, price, img, userID) VALUES ('$title', '$price', '$image', '$userID')";
              if(mysqli_query($conn, $sql)){
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
               echo "<p style='color: green'>Product Added. Redirecting...</p>";
               header("Refresh:4; url=/sidehustle-internship/e-market/dashboard.php");
                  
              }else{
                  echo "Error creating product: ".mysqli_error($conn);
              }

             
      
           }
    }else{
        echo "Please Login to Continue ".mysqli_error($conn);
    }

    
    }  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-MARKET | ADD PRODUCT</title>
</head>
<body>
    <form action="" method='post'  enctype="multipart/form-data">
    <table>
    <tr><td>Title: </td><td><input type="text" name='title'></td></tr>
    <tr><td>Price: </td><td><input type="number" name='price'></td></tr>
    <tr><td>Image: </td><td><input type="file" name='image'></td></tr>
    <tr><td><input type="submit" value='Add Product' name='addproduct'></td></tr>
    </table>
    </form>
</body>
</html>