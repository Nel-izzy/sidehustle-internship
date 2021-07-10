<?php
   
$servername = "localhost";
$username = "admin";
$password = "admin123";
$database = "todo";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
    die("Connection failed:".mysqli_connect_error());
}else{
    //echo "Database Connected succesfully". "<br>";
}

function test_input($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    
}

$error =''; 
$title;
$message ="";

if(isset($_POST['add'])){

    if(empty($_POST['title'])){
      $error = "Please Enter a Title";
    }else{
        test_input($_POST['title']);
        if(!preg_match("/^[a-zA-Z ]*$/", $_POST['title'])){
            $error = "Please enter only Letters and spaces";
        }else{
          $title = $_POST['title'];      
           $sql = "INSERT INTO todos (title) VALUES ('$title')";
           if(mysqli_query($conn, $sql)){
               $message ="Todo created";
               
           }else{
               $error = "Error creating todo: ".mysqli_error($conn);
           }
        }
        
    }
}

# ******CREATE DATABASE***********

// $sql = "CREATE DATABASE todo";

// if(mysqli_query($conn, $sql)){
//     echo "Database Created succesfully";
// }else{
//     echo "Error creating Database ".myqli_error($conn);
// }

# **********CREATE TABLE************


// $sql = "CREATE TABLE todos (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     title VARCHAR(100) NOT NULL,
//     created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//     )";
//  if(mysqli_query($conn, $sql)){
//      echo "Table todos created";
//  }else{
//      echo "Error creating table: ".mysqli_error($conn);
//  }
 

 if(isset($_GET['delete'])){
     $id = $_GET['delete'];
     $sql = "DELETE FROM todos WHERE id = $id";
     if(mysqli_query($conn, $sql)){
         $message = "Todo Deleted";
     }else{
         $error = "Error deleting todo: ".mysqli_error($conn);
     }
 }

 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <style>
    
     #add {
         margin-left:-10px;
     
     }
     #title {
         margin-bottom:10px;
     }
     button{

     }
     a, #add {
         cursor: pointer;
     }
     
    .edit {
        padding-left: 10px;
    }
    </style>
</head>
<body>
    <section>
    <h2>MY TO-DO LIST</h2>
    <form id="title" action="" method="post">
    <input type="text" name="title" placeholder="Title" >
    <input type="submit" value="Add" name="add" id="add"><?php echo $error ? $error : $message; ?>
    </form>
    <?php
    $sql = "SELECT id, title FROM todos";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
    ?>
        <table><tr><th>ID</th><th>TODO</th><th colspan='2'>ACTION</th></tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
            <tr><td><?php echo $row['id']; ?></td><td><?php echo $row['title']; ?></td>
            <td class="edit"><a href="/sidehustle-internship/todolist/edit.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
            <td class="edit"><a href="index.php?delete=<?php echo $row['id']; ?>">Delete</a></td></tr>
     <?php   } ?>
        </table>
   <?php } ?>
   
    </section>
</body>
</html>



