<?php  
include_once("dbconn.php");
include_once("test_input.php");
$error ="";

if(isset($_POST["signup"])){
    session_start();
  
    

    if(empty($_POST['email']) or empty($_POST["pword"]) or empty($_POST['phone']) or empty($_POST['lname']) or empty($_POST['fname'])){
        $error = "<small style='color: orange'>One or more fields cannot be empty</small>";
    }else{
        $email = test_input($_POST['email']);
        // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        //     $error = "<small style='color: orange'>Invalid Email Format</small>";
        // }
        $password = test_input($_POST['pword']);
        $firstname = test_input($_POST['fname']);
        $lastname = test_input($_POST['lname']);
        $phone = test_input($_POST['phone']);
        // Check if email already exists in Database
        $query = "SELECT email FROM Users WHERE email ='$email'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) > 0){
            $error = "<small style='color: orange'>This email is already registered</small>";
        }else{
        
        // Add User if email does not exist 
        $sql = "INSERT INTO Users (firstname, lastname, email, phone, passwd)
            VALUES ('$firstname', '$lastname', '$email', '$phone', '$password')";
        if(mysqli_query($conn, $sql)){
            //echo "Record inserted";
            $_SESSION["email"] = $email;
            echo "<p style='color: green'>Signup successful. Redirecting...</p>";
            header("Refresh:4; url=/sidehustle-internship/e-market/dashboard.php");
        }else{
            echo "Error Signing Up: ".mysqli_error($conn);
        }
        
    }
}
}
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-market | SIGN UP</title>
</head>
<body>
<h3>SIGN UP FORM</h3>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
<table>
<tr><td>Firstname:</td> <td><input type="text" name="fname"></td></tr><?php echo $error; ?>
<tr><td>Lastname:</td> <td><input type="text" name="lname"></td></tr>
<tr><td>Email:</td> <td><input type="email" name="email"></td></tr>
<tr><td>Phone:</td> <td><input type="number" name="phone"></td></tr>
<tr><td>Password:</td> <td><input type="password" name="pword"></td></tr>
<tr><td><input type="submit" name="signup" value="Sign Up"></td></tr>
</table>

</form>

<p>Already have an Account? <a href="/sidehustle-internship/e-market">Sign In here</a>

    
</body>
</html>