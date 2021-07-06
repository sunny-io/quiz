<?php
/*
#########################################################################
#
# Handhabung des Formular-Inputs
#
#
#
#########################################################################
*/

/* Login */
if ((isset($_GET['username'])) && (!isset($_SESSION['username']))){
    $_SESSION['username'] = $_GET['username'];
    $_SESSION['aktuelle_frage'] = 1;
    $_SESSION['answers'] = array();
    $m_iFrage =  $_SESSION['aktuelle_frage'] ;
   

}

/* Vorwärts blättern und Antwort speichern */

if ( isset($_SESSION['aktuell_frage']) && (isset($_GET['next']) OR isset($_GET[$m_iEvaluate]) )) {
    if ($_SESSION['aktuelle_frage'] < count($m_aFragen)){
         $_SESSION['aktuelle_frage'] = $_SESSION['aktuelle_frage'] +1;
            }
    $_SESSION['answers'][$m_iFrage -1] = (isset($_GET['antwort'])) ?  $_GET['antwort']: 0;

    $m_iFrage =  $_SESSION['aktuelle_frage'] ;


}

/* Rückwärts blättern, Antwort erhalten */

if ((isset($_GET['back'])) &&  ($_SESSION['aktuelle_frage'] > 1)) {
    $_SESSION['aktuelle_frage'] = $_SESSION['aktuelle_frage'] -1;
}

/* Auswertung starten */

if (isset($_GET[$m_iEvaluate]) ){
    $m_iEvaluate = 1;

    for ($i=0; $i < count($m_aAntworten); $i++){
        if ($m_aFragen[$i][1] == $m_aAntworten[$i]){
            
            $m_aRichtig[] = '1';
        } else {
            $m_aRichtig[] = '0';
        }

    }

    $m_iRichtigeAntworten = array_sum($m_aRichtig);
    $m_nProzentRichtig = round(($m_iRichtigeAntworten/$m_iAnzahlFragen *100 ),2);

    for ( $i = 0; $i < count($m_aRichtig); $i++) 
    {
        $m_aResultslist[$i][0]= $m_aFragen[$i][0];
        $m_aResultslist[$i][1]= $m_aRichtig[$i];

        }
}



/*
##########################################################################
#
#
#Display logic
#
#
##########################################################################
*/

if (!isset($_GET['username']) && (!isset($_SESSION['username']))){
    $m_sLogin = "";
}else {
$m_sLogin = "hidden";
}

if (isset($_SESSION['aktuelle_seite'] ) && !$m_iEvaluate){
$m_sLogin = "hidden";
$m_sQuestions = "questions";
$m_sResults = "hidden";
} elseif (isset($_SESSION['aktuelle_seite'] ) && (isset($m_iEvaluate))){
    $m_sLogin = "hidden";
$m_sQuestions = "hidden";
$m_sResults = "results";
}

?>