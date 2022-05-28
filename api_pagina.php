<?php
    header("Location: https://newsapi.org/v2/everything?q=motoGP&language=it&sortBy=publishedAt&apiKey=2fa3182f41284b2088b306e771799ebc");

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://newsapi.org/v2/everything?q=motoGP&language=it&sortBy=publishedAt&apiKey=2fa3182f41284b2088b306e771799ebc"); 
    curl_setopt($ch, CURLOPT_POST,0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($ch); 
    $json = json_decode($result, true);
    echo json_encode($json);
    console.log($json);
 
    curl_close($ch); 
    

?>
   