<?php include("includes/pagestart.inc.php"); ?>

<?php


### DATEN START
    include("includes/daten.inc.php");

   // echo "<code>".var_dump($m_aAufgaben)."</code>";

    if (isset($_GET["username"]))
        $_SESSION["username"] = $_GET["username"];

    if (!isset($_GET["username"]) && !isset($_SESSION["username"]))
        header("Location: index.php");


    if (!isset($_SESSION["aktuelle_seite"])){
        $_SESSION["aktuelle_seite"] = 1;
        $m_iaPage =  $_SESSION["aktuelle_seite"];
        $no = $_SESSION["aktuelle_seite"]- 1;
    }   


    ### Page forward and back
    if (isset($_GET["back"])){
        if ( $_SESSION["aktuelle_seite"] >1){
            $_SESSION["aktuelle_seite"] =  $_SESSION["aktuelle_seite"] - 1;
            $m_iaPage =  $_SESSION["aktuelle_seite"];
            $no = $_SESSION["aktuelle_seite"]- 1;
      }
    }   

    if (isset($_GET["forward"])){
        if ( $_SESSION["aktuelle_seite"] <= count($m_aAufgaben)){
            $_SESSION["aktuelle_seite"] =  $_SESSION["aktuelle_seite"] + 1;
            $m_iaPage =  $_SESSION["aktuelle_seite"];
            $no = $_SESSION["aktuelle_seite"]- 1;
            $store_answer = "s{$no}";
            $_SESSION["$store_answer"] =  0;
      }
    }   

    
    if (isset($_GET["checkresult"])){
            $_SESSION["aktuelle_seite"] =  $_SESSION["aktuelle_seite"] + 1;
            $_SESSION["checkresult"] = 1;

            $no = count($m_aAufgaben);
            $checklist = array();
            $k = 0;

            foreach  ($_SESSION as $key => $value){
                if (substr($key, 0, 1) == 's') {
                $checklist [$k] = $value;
               
                $k++;
            }
        }
        print_r($checklist);   
          
      }
      
   ## End Page forward and back 

### Store Answers in Session-Variables
if (isset($_GET["answer"]) && 
    ( (isset($_GET["forward"])) || 
        (isset($_GET["checkresult"])) )){
         $store_answer = "s{$no}";
        $_SESSION["$store_answer"] =  ( $_GET["answer"] -1);
      ;
  
}   

### End Store Answers in Session Variables


    $m_sUsername = $_SESSION["username"];
    $m_iRichtig = 0;
    $m_iGesamt = 1;
    $m_fProzent = 0.00;
    $m_aEingabe = array();
    for ($i = 0; $i < count($m_aAufgaben); $i++) {
        $m_aEingabe[] = isset($_GET[$i]) ? $_GET[$i] : null;
    }
### DATEN ENDE
?>



<?php
### VERARBEITUNG START



 /*   $m_iGesamt = count($m_aAufgaben);

    for ($i = 0; $i < count($m_aAufgaben); $i++) {
        if ($m_aAufgaben[$i][1] == $m_aEingabe[$i]) {
            $m_iRichtig++;
        }
    }*/
function checkresults  ($checklist, $m_aAufgaben){
    $m_aResults = array();
    foreach ($checklist as $key => $value) {
       // print_r($m_aAufgaben[$key][1]);
        if ($checklist[$key] == $m_aAufgaben[$key][1]) {

            $m_aResults[$key] = array ($m_aAufgaben[$key][0], 'richtig');
        }else {
            
            $m_aResults[$key] = array ($m_aAufgaben[$key][0], 'falsch');
        }
    }
    return $m_aResults;
}



    $m_fProzent = round($m_iRichtig/$m_iGesamt, 2)*100;
### VERARBEITUNG ENDE
?>



<?php
### AUSGABE START
?>
<?php if ($no != count($m_aAufgaben)): ?>


<h1>Das Quiz</h1>    
<h3>Hallo <?= $m_sUsername ?>! Hier sind Deine Fragen:</h3>
<h4>Frage <?php echo($_SESSION["aktuelle_seite"]) ?></h4>
<?php
echo "$no";

?>



<form action="<?= $_SERVER["PHP_SELF"]; ?>" method="get">
<?php


    echo "<p>".$m_aAufgaben[$no][0]."</p>";
    echo "<ul>";
    for ($j = 2; $j < count($m_aAufgaben[$no]); $j++) {
        echo "<li><input type='radio' name='answer' id='$j' value='$j'>".$m_aAufgaben[$no][$j]." </li>";

        

}
echo("</ul>"); 

echo "<input type='submit' name='back' value='Zurück'>";
if ( $_SESSION["aktuelle_seite"] < count($m_aAufgaben )){
    echo "<input type='submit' name='forward' value='Weiter'>";
}else {
    echo "<input type='submit' name='checkresult' value='Ergebnis prüfen'>";
}
?>
</form>
<?php endif; ?>

<h1> Das Quiz</h1>    

<?php 

if ($no == count($m_aAufgaben)) {
    $m_aResults = checkresults  ($checklist, $m_aAufgaben);
  var_dump($m_aResults);
  

    echo "<h2>Deine Ergebnisse $m_sUsername:</h2>";
    echo "<ul>";
        foreach ( $m_aResults as $key => $value) {
         
            echo "<li> $m_aResults[$key][0]&nbsp; Deine Antwort war  $m_aResults[$key][1]!";
        }

    
     echo "</ul>";  
    }

?> 

<?php
### AUSGABE ENDE
?>

<?php include("includes/pageend.inc.php"); ?>