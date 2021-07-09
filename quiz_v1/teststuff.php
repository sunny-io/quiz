<?php
$requests = array_merge($_GET, $_POST);

$test = new testing  ($requests);

class testing {
    private $request; //this variable exists only in this class
    public $nameErr;

    function __construct ($r){
        $this->request = $r;
        if (isset ($this->request["username"])){
           $this->validate_name();
           echo "$this->nameErr";
            
        }
        /*
        if (!isset($this->request["view"])) $this->request["view"] = "login"; //if no view set, set default
              $this->view = new View; //instanciates view;
        if (isset ($this->request["form"])){
             switch ($this->request["form"]){
                 case "login": $this->login(); break;
                 case "quiz": $this->quiz(); break;
             }
        }*/
        
     }
function validate_name (){
    echo "<!-- validating name -->";
   
    $error_array = array();
    $nameErr = '';

   if ( isset($this->request["username"])) {
         $name = $this->request["username"];
        
        
        if (strlen($name) < 3 ){
            
            $error_array['lenght'] = 1;
            echo ("<!-- too short -->");
        }
        if (!preg_match("/^[a-z0-9]+$/i", $name)){
            $error_array['charmismatch'] = 1;
            echo ("<!--character mismatch -->");
        }
        if (!ctype_alpha($name[0]) ){
            $error_array['nofirstletter'] = 1;
            echo ("<!-- doesn't start with a letter -->");
        }

        if (array_sum($error_array) > 0){
            $nameErr = "Dein Name muss mit einem Buchstaben beginnen, darf nur Buchstaben und Zahlen enthalten, und muss mindestens 3 Zeichen haben.";
            $this->nameErr = $nameErr;
            echo ("<!-- $nameErr -->");
        } 
    }
   
    
   
}

}