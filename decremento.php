<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "motorline");
$titolo = mysqli_real_escape_string($conn, $_GET["titolo"]);

$nomeutente = $_SESSION['username'];
$query2= "DELETE FROM collegamento where username='$nomeutente' and titolo='$titolo'";
$res1 = mysqli_query($conn, $query2);


mysqli_close($conn);
?>
