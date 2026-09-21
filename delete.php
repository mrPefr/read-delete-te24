<?php
require("func.php");


if(empty($_GET['id'])){
        // Redirect tillbaka till startsidan med felmeddelande
    header("Location:/?error=no_ID");
}

else{

    deleteCar($_GET['id']);
    // Redirect tillbaka till startsidan
    header("Location:/");
}