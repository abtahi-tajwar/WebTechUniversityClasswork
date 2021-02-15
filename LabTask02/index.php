<?php 
    $usernameV = $emailV = $passV = $cpassV = "";
    $generalError = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_REQUEST["username"];
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $cpassword = $_REQUEST["cpassword"];

        if(empty($username) || empty($email) || empty($password) || empty($cpassword)) {
            $generalError = "Please fill up all the fields";
        } else {
            if(!preg_match("/[a-zA-Z0-9._]+/", $username)) {
                $usernameV = "<li>Username can only have alphanumeric characters/period/underscore</li>";
            }
            if(strlen($username) < 5) {
                $usernameV .= "<li>Username must contain atleast 5 characters</li>";
            }

            if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/i", $email)) {
                $emailV = "<li>Please enter a valid email</li>";
            }

            if(!preg_match("/(?=.*[@#$%]).*$/", $password)) {
                $passV = "<li>Password atleast contain 1 special character</li>";
            } 
            if(strlen($password) < 6) {
                $passV .= "<li>Password must contain atleast 6 characters</li>";
            }
            if($password != $cpassword) {
                $cpassV = "<li>Both password have to match</li>";
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
    <title>Document</title>
</head>
<body>
    <h1>Change Password</h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <table>
        <tr>
            <td><label for="username">Username: </label></td>
            <td><input type="text" name="username"></td>
            <td><?php echo $usernameV ?></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="text" name="email"></td>
            <td><?php echo $emailV ?></td>
        </tr>
        <tr>
            <td><label for="password">Password: </label></td>
            <td><input type="password" name="password"></td>
            <td><?php echo $passV ?></td>
        </tr>
        <tr>
            <td><label for="cpassword">Confirm Password</label></td>
            <td><input type="password" name="cpassword"></td>
            <td><?php echo $cpassV ?></td>
        </tr>
        <input type="submit" value="submit">
        
    </table>
    </form>
</body>
</html>