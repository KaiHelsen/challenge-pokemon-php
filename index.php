<?php

//echo file_get_contents('./public_html/pokedex.html');
//$pokeQuery = '';


//config.php handles initial setup of everything needed for the page to be composed
require_once("./resources/config.php");

//set up head and header parts of page
require_once("./resources/templates/header.php");
//header ends with an open body tag

//the body of the page.
require_once("./resources/templates/body.php");

//footer sets up the final part of the page
//footer includes and closes the open body tag
require_once("./resources/templates/footer.php");

