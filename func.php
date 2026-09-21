<?php

function render($content){

    $html = file_get_contents("template.html");
    $html2 = str_replace("%content%",$content, $html);
    echo $html2;

}

function saveCars($cars){

    file_put_contents("cars.json", json_encode($cars));

}

function getCars(){

    $cars = file_get_contents('cars.json');
    return json_decode($cars, true);
    
}

function genCars(){

    $cars = getCars();
    $html = "";
    foreach($cars as $c){

        // konvertera $c till array och extrahera
        extract((array) $c);
       
        $html =  $html .
        "<div class = 'car'>" . 
        "<h3> $brand - $model </h3>" .
        "<h4> $price </h4>" .
        "<a href='delete.php?id=$id'>delete</a>" .
        "</div>";
    
    }


    return $html;

}


function deleteCar($id){
    $cars = getCars();

    $newCars = [];

    foreach($cars as $c){

        if($c['id'] != $id){

            // append / push
            $newCars[] = $c;
  
        }

    }
    saveCars($newCars);

}