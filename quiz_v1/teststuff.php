<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?username=test" method="post">
        <input type="hidden" name="form" value="test">
        <label for="user">Bitte gibt Deinen Namen ein:</label>
        <input type="text" name="user" id="user">
        <br>
        <label for="number">Bitte gibt eine Zahl ein: </label>
        <input type="number" name="number" id="number">
        <button type="submit" name="login">Quiz starten</button>
    </form>
</body>
</html>


<?php
$requests = array_merge($_GET, $_POST);


$test = new testing  ($requests);

class testing {
    private $request; //this variable exists only in this class
    public $nameErr;

    function __construct ($r){
        $this->request = $r;
        $this->validatereq ();
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


    function validatereq (){
        echo "<!-- validating -->";
        $input = $this->request;
        var_dump($input);
        if (!empty($input)){
            foreach ($input as $key => $value){
                $tmp = $key;
                $key = htmlspecialchars($key);
                if (is_array ($value)){
                        foreach ($this->request[$key] as $key2 => $value2) {   
                            $tmp = $key2;
                            $key2 = htmlspecialchars($key2); 
                            if ($key2 == $tmp2){
                                $this->request[$key2] = $value2;
                            }

                        }
                } else {
                $value = htmlspecialchars(trim($value));
                    if ($key == $tmp){
                        $this->request[$key] = $value;
                    }
                    else {
                        echo "this shouldn't happen";
                    }
                }

            }
        }
        echo "<pre>".var_dump($this->request)."</pre>";
    }
}