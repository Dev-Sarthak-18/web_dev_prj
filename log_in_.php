
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to BCUJ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="web_file_.css">
</head>
<body>
<h2>
<img src="Jammu-University-1.jpg"
    alt="JU logo" />
     <br>Log in </h2>

    <div class="container">
        <?php
        if(isset($_POST["login"])){
            $Username = $_POST["Username"];
            $Password = $_POST["Password"];
            require_once "DB_.php";
            $sql = "SELECT * FROM std_data WHERE Username = '$Username'";
            $result = mysqli_query($conn, $sql);
            $User = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($User){
                if(password_verify($Password, $User["Password"])){
                    session_start();
                    $_SESSION["std_data"]="yes";
                    header("Location: web_file.html");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>username does not match</div>";
            }
        }
        ?>
    
    <form action="log_in_.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control "name="Username" placeholder="Enter Username:">
            </div> 
            <div class="form-group">
                <input type="password" class="form-control" name="Password" placeholder="Enter Password:">
            </div> 
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="login" name="login">
            </div>
        </form>
        <p> Did'nt Have an account?? <a href="sign_up_.php" target="_blank"> Sign up </a></p>
</body>
</html>