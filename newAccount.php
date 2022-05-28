
<?php
    session_start();
    
    if (isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["username"]) && isset($_POST["email"]) && 
      isset($_POST["password"]))
    {
        $error = array();
        $conn = mysqli_connect("localhost", "root", "", "motorline");
        
      
        
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "- Username non valido (deve contenere una minuscola, una maiscuola, uno numero -";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM users WHERE username = '".$_POST['username']."'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "-Username già utilizzato-";
            }
        }
        
        if (strlen($_POST["password"]) < 8) {
            $error[] = "-Caratteri password insufficienti-";
        } 
        
        
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "-Email non valida-";
        } else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $query = "SELECT * FROM USERS WHERE EMAIL = '".$_POST['email']."'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "-Email già utilizzata-";
            }
        }


        if (count($error) == 0) {
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            
            $query = "INSERT INTO users VALUES('$nome', '$cognome', '$username', '$email', '$password')";
            
            if (mysqli_query($conn, $query)) {
                $_SESSION["username"] = $_POST["username"];
                mysqli_close($conn);
                header("Location: pagina.php");
                exit;
            } else {
                $error[] = "-Errore di connessione al Database-";
            }
        }

        mysqli_close($conn);
    }
    else {
        $error[] = "Riempi tutti i campi";
    }

?>


<html>
<head>
    <link rel="stylesheet" href="login.css"/>
    <script src='newAccount.js' defer></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Account</title>
    
</head>
<body>
    <main>
        <div class="all">
            <div class="contenitore">
                <div id='error'></div>
            <form class="contenitore_interno" name='login' method='post' id='form' >
                    <p class="nome_sito">MotorLine</p>
                    
                    
                    <div><input type="text" name="nome" id="contatto_nome" placeholder="Nome" onkeyup="validazione_nome()" <?php if(isset($_POST["nome"])){echo "value=".$_POST["nome"];} ?>>
                    <span id='errore_nome'></span>
                    </div>
                    <div><input type="text" name="cognome" id='contatto_cognome' placeholder="Cognome" onkeyup="validazione_cognome()" <?php if(isset($_POST["cognome"])){echo "value=".$_POST["cognome"];} ?>>
                    <span id='errore_cognome'></span>
                    </div>
                    <div><input type="text" name="username" id='contatto_username' placeholder="Username (1maiusc. 1minusc. 1numero)" onkeyup="validazione_username()" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                    <span id='errore_username'></span>
                    </div>
                    <div><input type="text" name="email" id='contatto_email' placeholder="Email" onkeyup="validazione_email()" <?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                    <span id='errore_email'></span>
                    </div>
                    <div><input type="text" name="password" id='contatto_password' placeholder="Password" onkeyup="validazione_password()" <?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    <span id='errore_password'></span>
                    </div>
                    <input class="bottone_login "type='submit' value="Sign up" />  
                </form>
            </div>
        </div>
    </main>
</body>
</html>