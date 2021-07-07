<?php

class Quiz {
    /* name of quiz = name of web page */
    var $quizname;
    /* no of current question */
    var $currentQuestion;

/*constructor for data from outside */

    function __construct($name, $no) {
        $this->quizname = $name;
        $this->currentQuestion = $no;
    }


    function getQuestionID(){
        return $this->currentQuestion;
    }
}

?>