<?php 
 
    session_start();  
    if(isset($_SESSION["username"])) 
    {
        header("Location: pagina.php"); 
        exit; 
    }
    if(isset($_POST["username"]) && isset($_POST["password"])) 
    { 
        $conn = mysqli_connect("localhost", "root", "", "motorline"); 
        $query = "SELECT * FROM users WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'"; 
        $res = mysqli_query($conn, $query); 
        if(mysqli_num_rows($res) > 0) 
        { 
            $_SESSION["username"] = $_POST["username"]; 
            header("Location: pagina.php"); 
            exit; 
        } 
        else 
        {  
            $errore = true; 
        } 
    } 
 
?>

<html>
<head>
    <link rel="stylesheet" href="login.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
</head>
<body>
    <main>
        <?php
            if (isset($error)) {
                echo "<span class='error'>$error</span>";
            }
                
        ?>  
        <div class="all">
            <div class="contenitore">
                <form class="contenitore_interno" name='login' method='POST'>
                    <p class="nome_sito">MotorLine</p>
                    <div class="username">
                    <div><input type="text" name="username" placeholder="Username" ></div>
                    </div>
                    <div class="password">
                    <div><input type="text" name="password" placeholder="Password" ></div>
                    </div>
                    <input class="bottone_login" type='submit' value="Login"/>
                    <div class="domanda"> Non hai un account? <a href="newAccount.php">Registrati</a></div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>