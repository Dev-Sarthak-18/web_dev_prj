
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up to BCUJ</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
  integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="web_file_.css">
</head>
<body>
<h2>
<img src="Jammu-University-1.jpg"
    alt="JU logo" />
     <br>Sign up </h2>
    <div class="container">
        <?php
         if(isset($_POST["Signup"])){
            $Username=$_POST["Username"];
            $Password=$_POST["Password"];
            $confirmPassword=$_POST["C_Password"];

            $PasswordHash = Password_hash($Password, PASSWORD_DEFAULT);
            $errors=array();

            if(empty($Username) OR empty($Password) OR empty($confirmPassword)){
                array_push($errors,"All fields are required");
            }
            if($Password!==$confirmPassword){
                array_push($errors,"Password does not match");
            }
            require_once "DB_.php";
            $sql = "SELECT * FROM std_data WHERE Username = '$Username'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if($rowCount>0){
                array_push($errors,"Username already exists!!");
            }
            if(count($errors)>0){
                foreach($errors as $error){
                    echo"<div class='alert alert-danger'>$error</div>";
                }
            }else{
                
                $sql = "INSERT INTO std_data (Username, Password) VALUES (?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt,"ss",$Username,$PasswordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class = 'alert alert-success'> You are Signed Up, you can now log in</div>";
                }else{
                    die("Something went Wrong");
                }
            }
         }
        ?>
        <form action="sign_up_.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control "name="Username" placeholder="Username:">
            </div> 
            <div class="form-group">
                <input type="password" class="form-control" name="Password" placeholder="Password:">
            </div> 
            <div class="form-group">
                <input type="password" class="form-control" name="C_Password" placeholder="Confirm Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Signup" name="Signup">
            </div>
        </form>
        <p> Already have an account?? <a href="log_in_.php" target="_blank"> Log in </a></p>
    </div> 
</body>
</html>
