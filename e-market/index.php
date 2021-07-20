<?php
include_once("test_input.php");

$error ="";

include_once("dbconn.php");

if(isset($_POST["signin"])){
    session_start();
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["pword"]);
    if(empty($email) or empty($password)){
        echo "<p style='color: red'>Please enter username and password</p>";
    }else{
        $sql = "SELECT email, passwd  FROM Users WHERE email ='$email' AND passwd = '$password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1){
               $_SESSION['email'] = $email;
                header("Location:/sidehustle-internship/e-market/dashboard.php");
        }else{
            $error = "<small style='color: red'>Wrong Email or Password </small>";
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
    <title>E-MARKET | SIGN IN</title>
</head>
<body>
<h3>SIGN IN FORM</h3>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
<table>
<tr><td>Email:</td> <td><input type="text" name="email"></td></tr><?php echo $error; ?>
<tr><td>Password:</td> <td><input type="password" name="pword"></td></tr>
<tr><td><input type="submit" name="signin" value="Sign In"></td></tr>
</table>
</form>

<p>Don't have an Account? <a href="/sidehustle-internship/e-market/signup.php">Sign Up Here</a>
</body>
</html>