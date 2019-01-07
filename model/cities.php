<?php
 // ~/php/tp1/model/cities.php
 $cities = [];
 if (($handle = fopen("cities.csv", "r", true)) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $item = explode(';', $data[0]);
        array_push($cities, [ 'name' => $item[0], 'country' => $item[1], 'life' => $item[2]]);
    }
    fclose($handle);
}

sort($cities); // Sort element in the array, By default the first property of the associative array