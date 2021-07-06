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
if (isset($_GET['username'])){
    $_SESSION['username'] = $_GET['username'];
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