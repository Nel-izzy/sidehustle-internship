<?php

$servername = "localhost";
$username = "admin";
$password = "admin123";
$database = "todo";


$conn = mysqli_connect($servername, $username, $password, $database);

function test_input($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    
}


if(isset($_GET['edit'])){
    $id = $_GET['edit'];
  
    $sql = "SELECT id, title FROM todos WHERE id=$id";
    $result = mysqli_query($conn, $sql);
   
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        
        
    }?>
        <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="title" value="<?php echo $row['title']; ?>">
        <input type="submit" value="Save" name="update">
        </form>
  <?php  } ?>

<?php
if(isset($_POST['update'])){
    $id = $_POST['id'];
    if(empty($_POST['title'])){
        echo "Please Enter a Title";
      }else{
          test_input($_POST['title']);
          if(!preg_match("/^[a-zA-Z ]*$/", $_POST['title'])){
              echo "Please enter only Letters and spaces";
          }else{
            $title = $_POST['title'];      
             $sql = "UPDATE  todos SET title = '$title' WHERE id=$id";
             if(mysqli_query($conn, $sql)){
                 echo "Todo Updated. Redirecting...";
                 header("refresh:2; url=/sidehustle-internship/todolist");
                 
             }else{
                 echo "Error Updating todo: ".mysqli_error($conn);
             }
          }
          
      }
}
?>