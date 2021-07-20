<?php
include_once('dbconn.php');
include_once("session.php"); 
?>


<?php
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
  
    $sql = "SELECT * FROM Products WHERE prodID=$id";
    $result = mysqli_query($conn, $sql);
   
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);   
    }
    ?>
        <form action="" method="post" enctype='multipart/form-data'>
        <table>
        <tr><td><input type="hidden" name="prodID" value="<?php echo $row['prodID']; ?>"></td></tr>
        <tr><td>New Title: </td><td><input type="text" name="title" value="<?php echo $row['title']; ?>"></td></tr>
        <tr><td>New Price: </td><td><input type="number" name="price" value="<?php echo $row['price']; ?>"></td></tr>
        <tr><td>Image: </td><td><input type="file" name='image'></td></tr>
        <tr><td> <img src="images/<?php echo $row['img']; ?>" > </td></tr>
        <tr><td><input type="submit" value="Save" name="update"></td></tr>
        </table>
        </form>
  <?php  } ?>

  <?php
if(isset($_POST['update'])){
    $id = $_POST['prodID'];
    if(empty($_POST['title']) or empty($_POST['price'])){
        echo "<p style='color: orange'>Fields cannot be blank</p>";
       }
       else{
           $title = $_POST['title'];
           $price = $_POST['price'];
           $image = $_FILES['image']['name'];
          $target = "images/".basename($image);
           $sql = "UPDATE  Products SET title = '$title', price = '$price', img='$image' WHERE prodID=$id";
             if(mysqli_query($conn, $sql)){
                move_uploaded_file($_FILES['image']['tmp_name'], $target);
                 echo "<p style='color: green'>Product updated. Redirecting...</p>";
                 header("refresh:3; url=/sidehustle-internship/e-market/dashboard.php");
                 
             }else{
                 echo "Error Updating todo: ".mysqli_error($conn);
             }
       }       
}

?>
