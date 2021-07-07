<?php

include ("env.php"); // environmental variables
include("function.php"); // class-independent functions


include("classes/model.php"); // parent-page for model classes
include("classes/controller.php"); //controller => here is where stuff happens
include("classes/view.php"); // parent page for output 

$quiz = new Quiz("Das superduper Quiz", 0); // instanciates ocject Quiz with name an currentno
$question = new Catalogue($quiz->currentQuestion); //instanciates question Cataloge and passes current question
$view = new View($quiz); //instaciates view

/* output of page start with variables quiz name and version*/

$view->vars["quizname"] = $quiz->name;
$view->vars["quizversion"] = $quiz_version;
echo $view->load("views/pagestart.php");

/*output of page header */
echo $view->load("views/header.php");


/* output of form with question and answers */
$view->vars["topic"] = $question->getQuestion();
$view->vars["answers"] = $question->getAnswers();
$view->vars["currentpage"] = $quiz->getQuestionID() + 1;
$view->vars["countquestions"] = $question->countQuestions();
$view->vars["scriptname"] = $m_sScriptname;

echo $view->load("views/content.php");

echo $view->load("views/footer.php");
echo $view->load("views/pageend.php");









?>

