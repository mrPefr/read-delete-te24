<?php

render(genCars());

function render($content){

    $html = file_get_contents("template.html");
    $html2 = str_replace("%content%",$content, $html);
    echo $html2;

}

function getCars(){

    $cars = file_get_contents('cars.json');
    return json_decode($cars);
    
}

function genCars(){

    $cars = getCars();
    $html = "";
    foreach($cars as $c){

        // konvertera $c till array och extrahera
        extract((array) $c);
       
        $html .=
        "<div class = 'car'>" . 
        "<h3> $brand - $model </h3>" .
        "<h4> $price </h4>" .
        "<a href='delete.php?id=$id'>delete</a>" .
        "</div>";
    
    }


    return $html;

}