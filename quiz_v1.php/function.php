<?php


function showquestion ($m_aAntwortauswahl ){
    if (isset($m_aAntwortauswahl )) {
    foreach ($m_aAntwortauswahl  as $key )
        echo "<li>".$m_aAntwortauswahl[$key]."</li>";
    }
}

function showresults ($m_aResultslist){
    if (isset($m_aResultslist)) {
    foreach ($m_aResultslist as $key )
        echo "<li>".$m_aResultslist[$key][0]."Deine Antwort ist ".$m_aResultslist[$key][1]."</li>";
    }
}


?>