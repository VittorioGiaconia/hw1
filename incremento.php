<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "motorline");
$autore = mysqli_real_escape_string($conn, $_GET["autore"]);
$titolo = mysqli_real_escape_string($conn, $_GET["titolo"]);
$descrizione = mysqli_real_escape_string($conn, $_GET["descrizione"]);
$immagine = mysqli_real_escape_string($conn,$_GET["immagine"]);



$query = "INSERT INTO posts VALUES('$autore','$titolo','$descrizione','$immagine')";
$res = mysqli_query($conn, $query);
$nomeutente = $_SESSION['username'];
$query2= "INSERT INTO collegamento VALUES('$nomeutente','$titolo')";
$res1 = mysqli_query($conn, $query2);


mysqli_close($conn);
?>
