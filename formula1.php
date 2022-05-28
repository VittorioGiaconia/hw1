<?php
session_start();
?>
<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="homepage.css"/>
    <script src="formula1.js" defer="true"></script>
    
        <title>
            MotorLine
        </title>
    </head>
    <body>
    
    <p><a class="logout" href="logout.php">Logout</a></p>
    
    <nav>
    <a href="Preferiti.php">Preferiti</a>
    <a href="pagina.php">Moto GP</a>
    <a href="moto3.php">Motocross</a>
    <a href="bike.php">Bike</a>
    <a href="formula1.php">Formula 1</a>
    <a href="cercatu.php">Cerca tu</a>
  </nav>
        <img class="copertina" src="Motorline-4.png" />
 

        <div>
      <span class='nome_username' ><?php echo ($_SESSION['username']); ?> </span>
    </div>
    <div>
      <span class='titolo_news' >Le news degli ultimi giorni</span>
    </div>
      <section id="library">
      </section>
      <div>  
      <footer>
        <h5 class='foot'>Vittorio Giaconia <br>
        1000001633 </h5>
      </footer> 
    </div>
    </body>
</html>