<?php
##############################################################################################
#
#class dealing with the catalogue of questions for the current round of questions
#currently, questions are defined as the array $catalogue in this class
#
#
##############################################################################################
class Catalogue{


var $question = array();
var $catalogue = array(
    array("Wieviel sind 1+2?", 3,           7, 5, 3),
    array("Welche Farbe hat eine Zitrone?", 1, "gelb", "blau", "rot", "braun", "schwarz"),
    array("Wieviel sind 2*3?", 2,           7, 6, 1, 5, 9),
    array("In der Nacht ist es ...", 2, "hell", "dunkel"),
    );

/* constructor to pass id of the current question and generate array for current question*/

function __construct(){
    if (Session::get("currentQuestion") !== null) {
          $this->question = $this->catalogue[Session::get("currentQuestion")];
    }else {
        $this->question = $this->catalogue[0];
      }
    }

function getQuestion(){
    return $this->question[0]; //position 0 in question array = Question text
}

function getSolution (){
    return $this->question[1]; // position 1 in question array = No of correct answer
}

/* create array with all possible answers */

function getAnswers(){
    $a = array();
    for ($i = 2; $i < count($this->question);$i++){
        $a[] = $this->question[$i];
    }
    return $a;
}

/*count all possible answers */
function countAnswers(){
    return count($this->getAnswers());

    }

/* Count questions in catalogue*/

function countQuestions(){
    return count($this->catalogue);
}


}
?>