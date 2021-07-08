<?php


function showquestion (array $liste){
  
       $list = "";
   /*    echo "<ol>"; 
       foreach ($liste  as $value ) {
       echo "<li>".$value."</li>";
   }
   echo "</ol>";*/
 echo "<ul>";
    foreach ($liste as $key => $value){
      
        echo "<li><input type='radio' name='useranswer' id='useranswer'  value='".$key."'>".$value."</li>";
    }
    echo "</ul>";
   
}


function showresults ($m_aResultslist){
    if (isset($m_aResultslist)) {
    foreach ($m_aResultslist as $key )
        echo "<li>".$m_aResultslist[$key][0]."Deine Antwort ist ".$m_aResultslist[$key][1]."</li>";
    }
}


?>

