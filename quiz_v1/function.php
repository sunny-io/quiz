<?php


function showquestion (array $liste){
   {
       $list = "";

    foreach ($liste  as $value )
        echo "<li>".$value."</li>";
    }
}

function showresults ($m_aResultslist){
    if (isset($m_aResultslist)) {
    foreach ($m_aResultslist as $key )
        echo "<li>".$m_aResultslist[$key][0]."Deine Antwort ist ".$m_aResultslist[$key][1]."</li>";
    }
}


?>