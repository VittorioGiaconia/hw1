<?php
session_start();
   $conn = mysqli_connect("localhost", "root", "", "motorline") or die(mysqli_error($conn));
   $nomeutente = $_SESSION['username'];
   $query = "SELECT p.autore,p.titolo,p.url_img,p.contenuto from posts p join collegamento c where p.titolo=c.titolo and c.username='$nomeutente'";
   $res = mysqli_query($conn, $query);
   

    $risultati= [];
    while($row = mysqli_fetch_assoc($res)){
      $risultati[]=$row;
    }
    echo json_encode($risultati);

?>