<?php
 // ~/php/tp1/model/cities.php
 $cities = []; // Initialize the cities array
 if (($handle = fopen("cities.csv", "r", true)) !== FALSE) { // Open file handle if the file exists
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { // Read each life of the file until there is no more
        $item = explode(';', $data[0]); // Sepearate data into an array 
        array_push($cities, [ 'name' => $item[0], 'country' => $item[1], 'life' => $item[2]]); // Reconstruct the table and push to the citites array
    }
    fclose($handle); // Once there is nothing more to read, close the file handle
}

sort($cities); // Sort element in the array, By default the first property of the associative array