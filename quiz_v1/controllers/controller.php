<?php

class Controller {

    private $request; //this variable exists only in this class
    private $view; 
    

    function __construct ($r){
       $this->request = $r;
       if (!isset($this->request["view"])) $this->request["view"] = "login"; //if no view set, set default
             $this->view = new View; //instanciates view;
       if (isset ($this->request["form"])){
            switch ($this->request["form"]){
                case "login": $this->login(); break;
                case "quiz": $this->quiz(); break;
            }
       }
       
    }

    /*sets parameter on login */
    function login (){
        Session::destroy();
        Session::init();

        Session::assign("username", $this->request["username"]);
        Session::assign("currentQuestion", 0);
        
        Session::assign("useranswer", array());
    }

    function quiz (){
       if (isset($this->request["next"])){
           Session::set("currentQuestion", Session::get("currentQuestion") + 1);
       }
       if (isset($this->request["prev"])){
           
             Session::set("currentQuestion", Session::get("currentQuestion") - 1);}

        if (isset($this->request["useranswer"])){
            Session::assign_array ("useranswer", Session::get("currentQuestion"), $this->request["useranswer"]);
           // Session::set("antworten", Session::get("currentQuestion"));

        }
    }
    



    function display ($quiz, $question){
        //* output of page start with variables quiz name and version
        $this->view->vars["quizname"] = $quiz->quizname;
        $this->view->vars["quizversion"] = QUIZ_VERSION; //QUIZ_VERSION is a global constant, therefor no $
        $this->view->setPath("views/pagestart.php");
        $buffer = $this->view->load();
            
        //output of page header 
        $this->view->setPath("views/header.php");
        $buffer .= $this->view->load();



        $buffer .= $this->content($quiz, $question);
        
        
        $this->view->setPath("views/footer.php");
        $buffer .= $this->view->load();

        $this->view->setPath("views/pageend.php");
        $buffer .= $this->view->load();
        return $buffer;
    }

    function view_login ($quiz, $question) {
        $this->view->vars["scriptname"] = SCRIPTNAME;
        $this->view->setPath("views/login.php");
        $buffer = $this->view->load();
        return $buffer;
    }

    function view_quiz ($quiz, $question){
    
        // output of form with question and answers 
    
        $this->view->vars["topic"] = $question->getQuestion();
    $this->view->vars["answers"] = $question->getAnswers();
    $this->view->vars["currentpage"] = Session::get("currentQuestion"); + 1;
    $this->view->vars["countanswers"] = $question->countAnswers();
    $this->view->vars["countquestions"] = $question->countQuestions();
    $this->view->vars["scriptname"] = SCRIPTNAME;
    $this->view->setPath("views/content.php");
    $buffer = $this->view->load();
    return $buffer;

    }

    function view_results ($quiz, $question){
    
        // output of form with question and answers 
    
        $this->view->vars["topic"] = $question->getQuestion();
    $this->view->vars["answers"] = $question->getAnswers();
    $this->view->vars["currentpage"] =Session::get("currentQuestion") + 1;
    $this->view->vars["countanswers"] = $question->countAnswers();
    $this->view->vars["countquestions"] = $question->countQuestions();
    $this->view->vars["scriptname"] = SCRIPTNAME;
    $this->view->setPath("views/results.php");
    $buffer = $this->view->load();
    return $buffer;

    }

    function view_logout (){
        $this->view->setPath("views/logout.php");
        $buffer = $this->view->load();
        return $buffer;
    
    }

    function content($quiz, $question){ 
    
        switch($this->request["view"]){
            case "login": $c = $this->view_login($quiz, $question); break;
            case "quiz": $c = $this->view_quiz($quiz, $question); break;
            case "results" : $c = $this->view_results($quiz, $question);break;
            case "logout" :  $c = $this->view_logout($quiz, $question);break;
            default: $c = $this->view_login($quiz, $question); break;

            }
            return $c;
        }
  
    
    
    
   

    
    
    

}