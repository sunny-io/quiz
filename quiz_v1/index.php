<?php



include ("env.php"); // environmental variables
include("function.php"); // class-independent functions

include("classes/controller.php"); //controller => here is where stuff happens
include("classes/model.php"); // parent-page for model classes
include("classes/view.php"); // parent page for output 

Session::init();


//$_GET
//$_POST
//$_SESSION
//$_COOKIE
//zusammen $_REQUEST
$requests = array_merge($_GET, $_POST);


//this calls the actual output
$controller = new Controller ($requests);


$quiz = new Quiz("Das superduper Quiz"); // instanciates ocject Quiz with name an currentno
$question = new Catalogue(); //instanciates question Cataloge and passes current question



echo $controller->display($quiz, $question);





?>

