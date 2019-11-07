<?php
session_start();
 


require 'koneksi.php';

if (isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];


   $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

   //cek username euy

    if(mysqli_num_rows($result) === 1){
        
        //cek password euy
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])){
                 $_SESSION["id"] = $row["id"];


                 $_SESSION["login"] = true;
                 header("Location: dashboard.php");
            exit;

            }
            

    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dektra Log In</title>
    <link rel="stylesheet" href="css/uikit.min.css">
    <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
</head>
<body>



<div class=" uk-position-center uk-section uk-section-default uk-flex uk-animation-fade "  uk-height-viewport>
        <div class="uk-width-1-1">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid>
                    <div class="uk-width-1-1@m">
                        <div class="uk-margin uk-width-large uk-margin-auto uk-card uk-card-default uk-card-body uk-box-shadow-large">
                            <h3 class="uk-card-title uk-text-center">Log In</h3>

                            <?php if(isset($error)) : ?>
                                    <p style="color: red; font-style: italic;">Incorrect username or password!</p>
                            <?php endif; ?>

                            <form action=" " method="post">
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="user"></span>
                                        <input class="uk-input uk-form-large" type="text" name="username" id="username" placeholder="Enter Username">
                                       
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <div class="uk-inline uk-width-1-1">
                                        <span class="uk-form-icon" uk-icon="lock"></span>
                                        <input class="uk-input uk-form-large" type="password" name="password" id="password" placeholder="Enter Password" minlength="6" maxlength="25">	
                                    </div>
                                </div>
                                <div class="uk-margin">
                                    <button type="submit" name="login" class="uk-button uk-button-secondary uk-button-large uk-width-1-1">Login</button>
                                </div>
                                <div class="uk-text-small  uk-text-center">
                                    Not registered? <a href="register.php" class="uk-text-muted">Create an account</a>
                                </div>
                            </form>
                        </div>
                    </div> 
                    
                </div>  
            </div>
        </div>
    </div>
</body>
</html>