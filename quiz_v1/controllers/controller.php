<?php

class Controller {

    private $request; //this variable exists only in this class
    private $view; 
    public $nameErr;
    public $ansErr;
    

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

        //on validation fail, redirect to login
        $this->validate_name($this->request["username"]);
        if ($this->nameErr != ""){
         
            header ("Location:index.php");
        }
           
        else {
         //validation ok, set session variables  

        Session::assign("username", $this->request["username"]);
        Session::assign("currentQuestion", 0);
        
        Session::assign("useranswer", array());
        }
        
    }


/* do the actual name validation */    
function validate_name (){
    echo "<!-- validating name -->";
   //initialising error-array and message

    $error_array = array();
    $msg = '';

   //check if username is set 
   if ( isset($this->request["username"])) {
         $name = $this->request["username"];
        
        // check for min-lenght
        if (strlen($name) < 3 ){
            
            $error_array['lenght'] = 1;
            echo ("<!-- too short -->");
        }

        //check for letters and numbers only 

        if (!preg_match("/^[a-z0-9]+$/i", $name)){
            $error_array['charmismatch'] = 1;
            echo ("<!--character mismatch -->");
        }

        // check if first char is a letter
        if (!ctype_alpha($name[0]) ){
            $error_array['nofirstletter'] = 1;
            echo ("<!-- doesn't start with a letter -->");
        }

        //evaluate checks. if error occured, array_sum > 0 set nameErr-message
        if (array_sum($error_array) > 0){
            $msg = "Dein Name muss mit einem Buchstaben beginnen, darf nur Buchstaben und Zahlen enthalten, und muss mindestens 3 Zeichen haben.";
            $this->nameErr = $msg;
            echo ("<!-- $this->nameErr -->");
        } 
    }
   
    
   
}


//is the answer coming in my post a) a number and b) a number for which an answer exists
function answerinrange($a){
    $answer = $a;
  
    $error_array = array();

    //is numeric?
    if (!is_numeric($answer)){
        $error_array['NAN'] = 1;
    }
    /* else {
        $max = $question->countAnswers() ; // should call function countAnswers() from class catalogue ($questions = new catalog in index.php) but paresed as undefined variable $question
        // is valid counter for answer array?
        if (!(($answer < $max) && ($answer >= 0))) {
            $error_array['outofrange'] = 1;
        }
    }*/

    if ((array_sum($error_array) > 0)){
        $this-> $ansErr = "Bitte geben Sie eine Zahl zwischen 1 und $question->countAnswers() ein.";
        return (false);
    }else {
        return(true);
    }
    
   

}




   

    function quiz (){


        if (isset($this->request["useranswer"]) 
           ){
            if ($this->answerinrange($this->request["useranswer"]) === true){

                Session::assign_array ("useranswer", Session::get("currentQuestion"), $this->request["useranswer"]);
           // Session::set("antworten", Session::get("currentQuestion"));
             }
             
             else  {
              //hier sollte hin, wie ich den fehler anzeige;
          }
        }
        if (isset($this->request["next"])){
             // if ( Session::get("currentQuestion") < ( $question->countQuestions() -1 )) {
                Session::set("currentQuestion", Session::get("currentQuestion") + 1);
             //  }
           }
           if (isset($this->request["prev"])){
            if ( Session::get("currentQuestion") > 0) {
                  Session::set("currentQuestion", Session::get("currentQuestion") - 1);}
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
        $this->view->vars["nameErr"] = $this->nameErr;
        $this->view->setPath("views/login.php");
        $buffer = $this->view->load();
        return $buffer;
    }

    function view_quiz ($quiz, $question){
    
        // output of form with question and answers 
    
        $this->view->vars["topic"] = $question->getQuestion();
    $this->view->vars["answers"] = $question->getAnswers();
    $this->view->vars["currentpage"] = Session::get("currentQuestion") + 1;
    $this->view->vars["countanswers"] = $question->countAnswers();
    $this->view->vars["ansErr"] = $this->ansErr;
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