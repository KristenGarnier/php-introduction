<?php
 // ~/php/tp1/model/cities.php
$cities = array(
    [ "name" => "San Francisco", "country" => "USA", "life" =>  "A"],
    [ "name" => "Paris", "country" => "France", "life" =>  "A"],
    [ "name" => "New york", "country" => "USA", "life" =>  "A"],
    [ "name" => "Berlin", "country" => "Germany", "life" =>  "A"],
    [ "name" => "Bamako", "country" => "Malia" , "life" =>  "C"],
    [ "name" => "Buenos Aires",  "country" => "Argentina", "life" =>  "A" ],
    [ "name" => "Santiago", "country" => "Chile" , "life" =>  "C"],
    [ "name" => "Bombay", "country" => "India", "life" =>  "A" ],
    [ "name" => "Vancouver", "country" => "Canada", "life" =>  "A" ],
    [ "name" => "Le Puy en Velay", "country" => "France", "life" =>  "B" ], // Added
    [ "name" => "London", "country" => "England", "life" =>  "A"], // Added
    [ "name" => "Madrid", "country" => "Spain", "life" =>  "A"] // Added
);

sort($cities); // Sort element in the array, By default the first property of the associative array