<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = new mysqli('localhost','root','','projectconnect');
    $sql = sprintf("SELECT * FROM users WHERE EmailID = '%s' OR username = '%s' ", $mysqli->real_escape_string($_POST["username"]),$mysqli->real_escape_string($_POST['username']));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
 
    if ($user) {
        
        if (password_verify($_POST["password"], $user["PasswordHash"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["ID"];
            header("Location: homepage.html");
            exit;
        }
        else{
            header("Location: login_signup.html");
            echo(
                "<script>
                alert('Incorrect Password');
                </script>"
            );
                
            
        }
        
    }

    else{
        
        echo(
        "<script>
        
        alert('User Does not Exist');
        windows.location = 'login_signup.html';
        </script>");
        header("Location: login_signup.html");
        
    }
}


?>





